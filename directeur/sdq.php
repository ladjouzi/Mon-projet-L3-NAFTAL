<?php

require '../vendor/autoload.php';
use  PhpOffice\PhpSpreadsheet\IOFactory;



$objReader = IOFactory::createReader("Xlsx");
$objPHPExcelReader = $objReader->load('incidents.xlsx');

$loadedSheetNames = $objPHPExcelReader->getSheetNames();

$objWriter =IOFactory::createWriter($objPHPExcelReader, 'Csv');

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $objWriter->setSheetIndex($sheetIndex);
    $objWriter->save($loadedSheetName.'.csv');
}
?>