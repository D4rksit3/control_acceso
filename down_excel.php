<?php

$conexion=mysqli_connect("localhost", "root", "root", "control_acceso");

$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

if(isset($_POST['generar_reporte'])){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename= productos.xls");
    /* header('Content-type:application/vnc.ms-excel, charset=iso-8859-1');
	header('Content-Disposition: attachment; filename=usuarios.xls');
    header("Pragma: no-cache");
    header("Expires: 0");  */

?>
<table>
    <caption>Reporte por fecha</caption>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Puesto</th>
        <th>Estado</th>
        <th>DNI</th>
        <th>Centro</th>
        <th>IP</th>
        <th>Fecha</th>
        <th>Inicio</th>
        <th>Fin</th>
    </tr>


<?php
     //Query para crear el reporte
     $reporteCsv = "SELECT * FROM reportes WHERE fecha>='$fecha1' AND fecha<='$fecha2'";/*  */
     $resultado = mysqli_query($conexion, $reporteCsv);
     while ($row = mysqli_fetch_array($resultado)) {
         ?>
       <tr>
           <td><?php echo $row['reportes_id']; ?></td>
           <td><?php echo $row['nombres']; ?></td>
           <td><?php echo $row['puesto'];?></td>
           <td><?php echo $row['estado'];?></td>
           <td><?php echo $row['dni'];?></td>
           <td><?php echo $row['centro'];?></td>
           <td><?php echo $row['ip'];?></td>
           <td><?php echo $row['fecha'];?></td>
           <td><?php echo $row['inicio'];?></td>
           <td><?php echo $row['fin'];?></td>

       </tr>

        <?php
    
     } mysqli_free_result($resultado);
     
   /*   $tablas = mysqli_query($conexion,$resultado);
     while ($filaR = $tablas ->fetch_assoc()) {
         ftputcsv($salida, array($filaR['empleados_id'],$filaR['nombres'],$filaR['puesto'],$filaR['estado'],$filaR['dni'],$filaR['centro'],$filaR['ip'],$filaR['fecha'],$filaR['inicio'],$filaR['fin']));
     } */
   

    /* $sep = "\t";
    for ($i = 0; $i<mysql_num_fields($result); $i++) {
        echo mysql_field_name($result, $i) . "\t";
      }
      print("\n");

      $reporteCsv = "SELECT * FROM reportes WHERE fecha>='$fecha1' AND fecha<='$fecha2'";

      $reporteCsv = $bd->prepare($consulta, [
        PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
    ]);
    $sentencia->execute();

    $numeroDeFila = 2;
while ($producto = $sentencia->fetchObject()) {
  # Trabajar con $producto aquí :^)
}   */
   /*  //nombre de archivo y charset
    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_fechas.csv"');

    //Salida del archivo
    $salida = fopen('php://output', 'w');

    //encabezados
    fputcsv($salida, array('reportes_id','nombres','puesto','estado','dni','centro','ip','fecha','inicio','fin'));

    //Query para crear el reporte
    $reporteCsv = "SELECT * FROM reportes WHERE fecha>='$fecha1' AND fecha<='$fecha2'";
    $tablas = mysqli_query($conexion,$resultado);
    while ($filaR = $tablas ->fetch_assoc()) {
        ftputcsv($salida, array($filaR['empleados_id'],$filaR['nombres'],$filaR['puesto'],$filaR['estado'],$filaR['dni'],$filaR['centro'],$filaR['ip'],$filaR['fecha'],$filaR['inicio'],$filaR['fin']));
    } */
    ?>
</table>
<?
} 

?>

