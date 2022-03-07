<?php require_once "vistas/header_admin.php" ?>
<?php include_once 'DB/funciones.php'; ?>
<div class="container">
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
      


    if( !empty($dni) ){
        
            $checkemail_duplicidad = ("SELECT dni FROM empleados WHERE dni='$dni' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
        if ( $cant_duplicidad == 0 ) { 
            
             ?>
             <table class="table table-sm table-dark">
                <tr class="bg-success" >
                
                    <td class="bg-success"><?php echo $result_update = "Usuario Agregado ".$nombres.' '.$apellidos_pa.' '.$apellidos_ma.' con DNI: '.$dni;  ?></td>
                
                </tr>
            </table>
             
             <?php 

            
            $insertarData = "INSERT INTO empleados (dni, nombres, apellido_pa, apellido_ma, fecha_ingreso, razon_social, puesto, centro, campana, condicion, jefe_inmediato, modalidad) VALUES('$dni', '$nombres', '$apellidos_pa', '$apellidos_ma', '$fecha_ingreso', '$razon_social', '$puesto', '$centro', '$campana', '$condicion', '$jefe_inmediato', '$modalidad')";
            mysqli_query($con, $insertarData); 
                    
        } 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    ?>
    <table class="table table-sm table-dark">
    <tr class="bg-success" >
       
       <td class="bg-danger"><?php echo $result_update = "Usuario ya registrado ".$nombres.' '.$apellidos_pa.' '.$apellidos_ma.' con DNI: '.$dni;  ?></td>
      
   </tr>
   </table>
    <?php 
    /* $result_update = "Datos ya registrados".$dni;
    echo $result_update; */
    /* $updateData =  ("UPDATE clientes SET 
        nombre='" .$nombre. "',
		correo='" .$correo. "',
        celular='" .$celular. "'  
        WHERE celular='".$celular."'
    ");
    $result_update = mysqli_query($con, $updateData); */
    } 
  }

 $i++;
}

?>

<a class="btn btn-dark" href="http://198.27.86.147:90/control_acceso/masivo.php">Atras</a>
</div>
<?php require_once "vistas/footer.php" ?>