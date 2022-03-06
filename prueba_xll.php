<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


$conexion = mysqli_connect("localhost","root","root","control_acceso");
require_once ('./vendor/autoload.php');

if (isset($_POST["importar"])) {

$allowedFileType = [
'application/vnd.ms-excel',
'text/xls',
'text/xlsx',
'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
];

if (in_array($_FILES["file"]["type"], $allowedFileType)) {

$targetPath = 'subidas/' . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadSheet = $Reader->load($targetPath);
$excelSheet = $spreadSheet->getActiveSheet();
$spreadSheetAry = $excelSheet->toArray();
$sheetCount = count($spreadSheetAry);

for ($i = 0; $i <= $sheetCount; $i ++) {
$producto = "";
if (isset($spreadSheetAry[$i][0])) {
$producto = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][0]);
}
$descripcion = "";
if (isset($spreadSheetAry[$i][1])) {
$descripcion = mysqli_real_escape_string($conexion, $spreadSheetAry[$i][1]);
}

if (! empty($producto) || ! empty($descripcion)) {
$query = "insert into tbl_productos(producto,descripcion) values(?,?)";
$paramType = "ss";
$paramArray = array(
$producto,
$descripcion
);
$insertId = $db->insert($query, $paramType, $paramArray);

if (! empty($insertId)) {
$type = "success";
$message = "Datos de Excel importados a la base de datos";
} else {
$type = "danger";
$message = "Problema al importar datos de Excel";
}
}
}
} else {
$type = "danger";
$message = "Tipo de archivo invalido. Cargar archivo de Excel.";
}
}
?>