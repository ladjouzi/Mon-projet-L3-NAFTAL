import * as zrUtil from 'zrender/src/core/util';
import * as textContain from 'zrender/src/contain/text';
import BoundingRect from 'zrender/src/core/BoundingRect';
import {makeInner} from '../util/model';
import {makeLabelFormatter} from './axisHelper';

var inner = makeInner();

/**
 * @param {module:echats/coord/Axis} axis
 * @return {Object} {
 *     labels: [{
 *         formattedLabel: string,
 *         rawLabel: string,
 *         tickValue: number
 *     }, ...],
 *     labelCategoryInterval: number
 * }
 */
export function createAxisLabels(axis) {
    // Only ordinal scale support tick interval
    return axis.type === 'category'
        ? makeCategoryLabels(axis)
        : makeRealNumberLabels(axis);
}

/**
 * @param {module:echats/coord/Axis} axis
 * @param {module:echarts/model/Model} tickModel For example, can be axisTick, splitLine, splitArea.
 * @return {Object} {
 *     ticks: Array.<number>
 *     tickCategoryInterval: number
 * }
 */
export function createAxisTicks(axis, tickModel) {
    // Only ordinal scale support tick interval
    return axis.type === 'category'
        ? makeCategoryTicks(axis, tickModel)
        : {ticks: axis.scale.getTicks()};
}

function makeCategoryLabels(axis) {
    var labelModel = axis.getLabelModel();

    var labelsCache = getListCache(axis, 'labels');
    var optionLabelInterval = getOptionCategoryInterval(labelModel);
    var result = listCacheGet(labelsCache, optionLabelInterval);

    if (result) {
        return result;
    }

    var labels;
    var numericLabelInterval;

    if (!labelModel.get('show')) {
        labels = [];
    }
    else if (zrUtil.isFunction(optionLabelInterval)) {
        labels = makeLabelsByCustomizedCategoryInterval(axis, optionLabelInterval);
    }
    else {
        numericLabelInterval = optionLabelInterval === 'auto'
            ? makeAutoCategoryInterval(axis) : optionLabelInterval;
        labels = makeLabelsByNumericCategoryInterval(axis, numericLabelInterval);
    }

    // Cache to avoid calling interval function repeatly.
    return listCacheSet(labelsCache, optionLabelInterval, {
        labels: labels, labelCategoryInterval: numericLabelInterval
    });
}

function makeCategoryTicks(axis, tickModel) {
    var ticksCache = getListCache(axis, 'ticks');
    var optionTickInterval = getOptionCategoryInterval(tickModel);
    var result = listCacheGet(ticksCache, optionTickInterval);

    if (result) {
        return result;
    }

    var ticks;
    var numericTickInterval = optionTickInterval;

    // Optimize for the case that large category data and no label displayed,
    // we should not return all ticks.
    if (!tickModel.get('show')) {
        ticks = [];
    }

    if (zrUtil.isFunction(numericTickInterval)) {
        ticks = makeLabelsByCustomizedCategoryInterval(axis, numericTickInterval, true);
    }
    // Always use label interval by default.
    else {
        if (numericTickInterval === 'auto') {
            var labelsResult = makeCategoryLabels(axis);
            numericTickInterval = labelsResult.labelCategoryInterval;
            if (numericTickInterval != null) {
                ticks = zrUtil.map(labelsResult.labels, function (labelItem) {
                    return labelItem.tickValue;
                });
            }
            else {
                numericTickInterval = makeAutoCategoryInterval(axis, true);
            }
        }
        if (ticks == null) {
            ticks = makeLabelsByNumericCategoryInterval(axis, numericTickInterval, true);
        }
    }

    // Cache to avoid calling interval function repeatly.
    return listCacheSet(ticksCache, optionTickInterval, {
        ticks: ticks, tickCategoryInterval: numericTickInterval
    });
}

function makeRealNumberLabels(axis) {
    var ticks = axis.scale.getTicks();
    var labelFormatter = makeLabelFormatter(axis);
    return {
        labels: zrUtil.map(ticks, function (tickValue, idx) {
            return {
                formattedLabel: labelFormatter(tickValue, idx),
                rawLabel: axis.scale.getLabel(tickValue),
                tickValue: tickValue
            };
        })
    };
}

// Large category data calculation is performence sensitive, and ticks and label
// probably be fetched by multiple times. So we cache the result.
// axis is created each time during a ec process, so we do not need to clear cache.
function getListCache(axis, prop) {
    // Because key can be funciton, and cache size always be small, we use array cache.
    return inner(axis)[prop] || (inner(axis)[prop] = []);
}

function listCacheGet(cache, key) {
    for (var i = 0; i < cache.length; i++) {
        if (cache[i].key === key) {
            return cache[i].value;
        }
    }
}

function listCacheSet(cache, key, value) {
    cache.push({key: key, value: value});
    return value;
}

function makeAutoCategoryInterval(axis, useFake) {
    var cacheKey = useFake ? 'fakeAutoInterval' : 'autoInterval';
    var result = inner(axis)[cacheKey];
    if (result != null) {
        return result;
    }
    var fakeRect = useFake && new BoundingRect(0, 0, 5, 5);
    return (inner(axis)[cacheKey] = calculateCategoryInterval(axis, fakeRect));
}

/**
 * Calculate interval for category axis ticks and labels.
 * To get precise result, at least one of `getRotate` and `isHorizontal`
 * should be implemented in axis.
 */
function calculateCategoryInterval(axis, fakeRect) {
    var params = fetchAutoCategoryIntervalCalculationParams(axis);
    var labelFormatter = makeLabelFormatter(axis);
    var rotation = (params.axisRotate - params.labelRotate) / 180 * Math.PI;

    var ordinalScale = axis.scale;
    var ordinalExtent = ordinalScale.getExtent();
    // Providing this method is for optimization:
    // avoid generating a long array by `getTicks`
    // in large category data case.
    var tickCount = ordinalScale.count();

    if (ordinalExtent[1] - ordinalExtent[0] < 1) {
        return 0;
    }

    var step = 1;
    // Simple optimization. Empirical value: tick count should less than 40.
    if (tickCount > 40) {
        step = Math.max(1, Math.floor(tickCount / 40));
    }
    var tickValue = ordinalExtent[0];
    var unitSpan = axis.dataToCoord(tickValue + 1) - axis.dataToCoord(tickValue);
    var unitW = Math.abs(unitSpan * Math.cos(rotation));
    var unitH = Math.abs(unitSpan * Math.sin(rotation));

    var maxW = 0;
    var maxH = 0;
    // Caution: Performance sensitive for large category data.
    // Consider dataZoom, we should make appropriate step to avoid O(n) loop.
    for (; tickValue <= ordinalExtent[1]; tickValue += step) {
        // Not precise, do not consider align and vertical align
        // and each distance from axis line yet.
        var rect = fakeRect || textContain.getBoundingRect(
            labelFormatter(tickValue), params.font, 'center', 'top'
        );
        // Polar is also calculated in assumptive linear layout here.

        // Magic number
        maxW = Math.max(maxW, rect.width * 1.3);
        maxH = Math.max(maxH, rect.height * 1.3);
    }

    // Note that unitH or unitW might be Infinity.
    var interval = Math.max(0, Math.floor(Math.min(maxW / unitW, maxH / unitH)));

    var cache = inner(axis.model);
    var lastAutoInterval = cache.lastAutoInterval;
    var lastTickCount = cache.lastTickCount;

    // Use cache to keep interval stable while moving zoom window,
    // otherwise the calculated interval might jitter when the zoom
    // window size is close to the interval-changing size.
    if (lastAutoInterval != null
        && lastTickCount != null
        && Math.abs(lastAutoInterval - interval) <= 1
        && Math.abs(lastTickCount - tickCount) <= 1
        // Always choose the bigger one, otherwise the critical
        // point is not the same when zooming in or zooming out.
        && lastAutoInterval > interval
    ) {
        interval = lastAutoInterval;
    }
    // Only update cache if cache not used, otherwise the
    // changing of interval is too insensitive.
    else {
        cache.lastTickCount = tickCount;
        cache.lastAutoInterval = interval;
    }

    return interval;
}

function fetchAutoCategoryIntervalCalculationParams(axis) {
    var labelModel = axis.getLabelModel();
    return {
        axisRotate: axis.getRotate
            ? axis.getRotate()
            : (axis.isHorizontal && !axis.isHorizontal())
            ? 90
            : 0,
        labelRotate: labelModel.get('rotate') || 0,
        font: labelModel.getFont()
    };
}

function makeLabelsByNumericCategoryInterval(axis, categoryInterval, onlyTick) {
    var labelFormatter = makeLabelFormatter(axis);
    var ordinalScale = axis.scale;
    var ordinalExtent = ordinalScale.getExtent();
    var labelModel = axis.getLabelModel();
    var result = [];

    // TODO: axisType: ordinalTime, pick the tick from each month/day/year/...

    var step = Math.max((categoryInterval || 0) + 1, 1);
    var startTick = ordinalExtent[0];
    var tickCount = ordinalScale.count();

    // Calculate start tick based on zero if possible to keep label consistent
    // while zooming and moving while interval > 0. Otherwise the selection
    // of displayable ticks and symbols probably keep changing.
    // 3 is empirical value.
    if (startTick !== 0 && step > 1 && tickCount / step > 2) {
        startTick = Math.round(Math.ceil(startTick / step) * step);
    }

    // (1) Only add min max label here but leave overlap checking
    // to render stage, which also ensure the returned list
    // suitable for splitLine and splitArea rendering.
    // (2) Scales except category always contain min max label so
    // do not need to perform this process.
    var showMinMax = {
        min: labelModel.get('showMinLabel'),
        max: labelModel.get('showMaxLabel')
    };

    if (showMinMax.min && startTick !== ordinalExtent[0]) {
        addItem(ordinalExtent[0]);
    }

    // Optimize: avoid generating large array by `ordinalScale.getTicks()`.
    var tickValue = startTick;
    for (; tickValue <= ordinalExtent[1]; tickValue += step) {
        addItem(tickValue);
    }

    if (showMinMax.max && tickValue !== ordinalExtent[1]) {
        addItem(ordinalExtent[1]);
    }

    function addItem(tVal) {
        result.push(onlyTick
            ? tVal
            : {
                formattedLabel: labelFormatter(tVal),
                rawLabel: ordinalScale.getLabel(tVal),
                tickValue: tVal
            }
        );
    }

    return result;
}

// When interval is function, the result `false` means ignore the tick.
// It is time consuming for large category data.
function makeLabelsByCustomizedCategoryInterval(axis, categoryInterval, onlyTick) {
    var ordinalScale = axis.scale;
    var labelFormatter = makeLabelFormatter(axis);
    var result = [];

    zrUtil.each(ordinalScale.getTicks(), function (tickValue) {
        var rawLabel = ordinalScale.getLabel(tickValue);
        if (categoryInterval(tickValue, rawLabel)) {
            result.push(onlyTick
                ? tickValue
                : {
                    formattedLabel: labelFormatter(tickValue),
                    rawLabel: rawLabel,
                    tickValue: tickValue
                }
            );
        }
    });

    return result;
}

// Can be null|'auto'|number|function
function getOptionCategoryInterval(model) {
    var interval = model.get('interval');
    return interval == null ? 'auto' : interval;
}
