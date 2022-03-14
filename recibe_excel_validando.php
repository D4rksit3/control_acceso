<?php require_once "vistas/header_admin.php" ?>
<?php include_once 'DB/funciones.php'; ?>
<div class="container">
<?php

require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

?>
<meta charset="iso-8859-1" >
<?php 
header('Content-Type: text/html; charset=ISO-8859-1');  

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $dni = !empty($datos[0])  ? ($datos[0]) : '';
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
      


        $nombre = htmlentities($nombres, ENT_QUOTES,'ISO-8859-1');
        
        $paterno = htmlentities($apellidos_pa, ENT_QUOTES,'ISO-8859-1');
        $materno = htmlentities($apellidos_ma, ENT_QUOTES,'ISO-8859-1');
        $campaña = htmlentities($campana, ENT_QUOTES,'ISO-8859-1');
    if( !empty($dni) ){
        
            //Validar si esta duplicando DNI
            $checkemail_duplicidad = ("SELECT dni FROM empleados WHERE dni='$dni' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
          /*   $array = mysqli_fetch_array($ca_dupli);  */
            //Razon Social
          /*  $razon_social_sql = "SELECT razon_social FROM razon_social";
            $query_rz = mysqli_query($con, $razon_social_sql);
            $array_rz = mysqli_fetch_array($query_rz); */
           /*  //CAMPAÑA
            $campaña_sql = "SELECT * FROM campaña";
            $query_camp = mysqli_query($con,$campaña_sql);  */
           /*  $array_camp = mysqli_fetch_array($query_camp);
            $camp = $array_camp['campaña']; */
        
            //Puesto
           $puesto1 = 'Mercadotecnia Directa y Contact Center';	 
           $puesto2 ='Wimprove SAC'	 ;
           $puesto3 ='MDY Intenational Business Process Outs'	; 
           $puesto4 ='Hernandez Asociados Administracion';	 
           $puesto5 ='Backup Service Peru SAC';
            //Centro
            $sede1 = 'COLONIAL';
            $sede2 = 'MAGDALENA';
            $sede3 = 'LINCE';
            //condicion
            $full_time = 'FULL TIME';
            $part_time = 'PART TIME'; 
            //modalidad
            $presencial = 'PRESENCIAL';
            $remoto = 'REMOTO'; 
            //estado
           /*  $activo = 'ACTIVO';
            $remoto = 'INACTIVO'  */

             
        }   

//No existe Registros Duplicados
        if ( $cant_duplicidad == 0  ) { 
            
            
/* if ($razon_social == $array_rz['motivo'] || $centro == $array['centro'] || $puesto == $array['puesto'] || $campana == $array['campaña'] ){
}else {
    echo "error";
} */      

            if ($centro == $sede1 or $centro == $sede2 or $centro == $sede3 or $modalidad == $presencial or $modalidad == $remoto or $condicion == $full_time or $condicion == $part_time or $puesto == $puesto1 or $puesto == $puesto2 or $puesto == $puesto3 or $puesto == $puesto4 or $puesto == $puesto5 ) {
                
                /* echo $modalidad.' and '.$condicion; */

               $insertarData = "INSERT INTO empleados (dni, nombres, apellido_pa, apellido_ma, fecha_ingreso, razon_social, puesto, centro, campana, condicion, jefe_inmediato, modalidad) VALUES('$dni', '$nombre', '$paterno', '$materno', '$fecha_ingreso', '$razon_social', '$puesto', '$centro', '$campaña', '$condicion', '$jefe_inmediato', '$modalidad')";
                mysqli_query($con, $insertarData);  

                ?>
            <table class="table table-sm table-dark">
               <tr class="bg-success" >
               
                   <td class="bg-success"><?php echo $result_update = "Usuario Agregado ".$nombre.' '.$paterno.' '.$materno.' con DNI: '.$dni;  ?></td>
               
               </tr>
           </table>
            
            <?php 
                    
            }
            else{
                /* echo $modalidad.' and '.$condicion; */
                ?>

                <table class="table table-sm table-dark">
                <tr class="bg-danger" >
                   
                   <td class="bg-danger"><?php echo $result_update = "Error en agregar ".$nombre.' '.$paterno.' '.$materno.' con DNI: '.$dni;  ?></td>
                  
               </tr>
               </table>
                <?php 
                
            }

          







            
        } 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    ?>
    <table class="table table-sm table-dark">
    <tr class="bg-warning" >
       
       <td class="bg-warning"><?php echo $result_update = "Usuario ya registrado ".$nombre.' '.$paterno.' '.$materno.' con DNI: '.$dni;  ?></td>
      
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