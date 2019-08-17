<!DOCTYPE html>
<html>
<head>
    <title>dqsd</title>
    <meta charset="utf-8">
</head>
<style type="text/css">
    #container
    {
    position:relative;
    background:#190c12;
    top: 100px;
    left: 0px;
    width:1000px;
    height:510px;
    box-shadow: 0px 0px 6px 2px orange;
    z-index: 0;
    }
</style>
<div id="container"></div>
<body>
<script src="http://localhost/projet/directeur/echarts/dist/echarts.js"></script>
<script src="http://localhost/projet/directeur/highcharts/highcharts.js"></script>
<script src="http://localhost/projet/directeur/highcharts/highcharts-3d.js"></script>

<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
        type: 'column',
        backgroundColor:'#190c12',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        }
    },
    title: {
        text: '3D chart with null values'
    },
    subtitle: {
        text: 'Notice the difference between a 0 value and a null point'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: Highcharts.getOptions().lang.shortMonths,
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series: [{
        name: 'Sales',
        data: [2, 3, null, 4, 0, 5, 1, 4, 6, 3]
    }]
});
</script>
</body>
</html>

