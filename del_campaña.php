<?php
$conexion = mysqli_connect("localhost","root","root","control_acceso");
$id = $_GET['id'];

$sql = "DELETE FROM campaña WHERE campaña_id='$id'";
mysqli_query($conexion,$sql);
header("location: mtto.php");

?>