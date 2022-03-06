<?php
require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $dni               = !empty($datos[0])  ? ($datos[0]) : '';
		$nombres                = !empty($datos[1])  ? ($datos[1]) : '';
        $apellidos_pa               = !empty($datos[2])  ? ($datos[2]) : '';
        $apellidos_ma               = !empty($datos[3])  ? ($datos[3]) : '';
        $fecha_ingreso               = !empty($datos[4])  ? ($datos[4]) : '';
        $razon_social               = !empty($datos[5])  ? ($datos[5]) : '';
        $puesto               = !empty($datos[6])  ? ($datos[6]) : '';
        $centro = !empty($datos[7])  ? ($datos[7]) : '';
        $campana = !empty($datos[8])  ? ($datos[8]) : '';
        $condicion = !empty($datos[9])  ? ($datos[9]) : '';
        $jefe_inmediato = !empty($datos[10])  ? ($datos[10]) : '';
        $modalidad = !empty($datos[11])  ? ($datos[11]) : '';
        $estado = !empty($datos[12])  ? ($datos[12]) : '';
       
        $insertar = "INSERT INTO empleados (dni, nombres, apellido_pa, apellido_ma, fecha_ingreso, razon_social, puesto, centro, campana, condicion, jefe_inmediato, modalidad, estado) VALUES('$dni', '$nombres', '$apellido_pa', '$apellido_ma', '$fecha_ingreso', '$razon_social', '$puesto', '$centro', '$campana', '$condicion', '$jefe_inmediato', '$modalidad', '$estado')";
        mysqli_query($con, $insertar);
    }

      echo '<div>'. $i. "). " .$linea.'</div>';
    $i++;
}


  echo '<p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p>';

?>

<a href="index.php">Atras</a>