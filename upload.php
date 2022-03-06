<?php
session_start(); 
require 'vendor/autoload.php';
use phpOffice\phpspreadsheet\Spreadsheet;
use phpOffice\phpspreadsheet\Writer\Xlsx;

if(isset($_POST['import_file_btn'])){
        
    $allowed_ext = ['xls','csv','xlsx'];        
    $fileName = $_FILES['import_file']['name'];
    $checkpoint = explode(".", $fileName);
    $file_ext = end($checkpoint);

    if (in_array($file_ext, $allowed_ext)){

        $targetPath = $_FILES['import_file']['name'];
        
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath, \PhpOffice\PhpSpreadsheet\Reader\IReader::LOAD_WITH_CHARTS);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $row) {
            echo $dni = $row['0'];
            $nombres = $row['1'];
            $apellido_pa = $row['2'];
            $apellido_ma = $row['3'];
            $fecha_ingreso = $row['4'];
            $razon_social = $row['5'];
            $puesto = $row['6'];
            $centro = $row['7'];
            $campana = $row['8'];
            $condicion = $row['9'];
            $jefe_inmediato = $row['10'];
            $modalidad = $row['11'];
            $estado = $row['12'];
        }  
    }else{

        
       $_SESSION['status'] = "Archivo Invalido";
        header("Location: masivo.php");
        exit(0);
    }
 


        

    }



?>

