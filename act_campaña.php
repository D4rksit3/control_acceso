
  <?php 
$id = $_POST['id'];
$text = $_POST['text'];

  $conexion = mysqli_connect("localhost","root","root","control_acceso");
  $up = "UPDATE campaña SET campaña='$text' WHERE campaña_id='$id'";
  $ups = mysqli_query($conexion,$up);

  if ($ups) {
   
    header("location: mtto.php");
  
  }else{
  echo '<div class="alert alert-danger" role="alert">
  Error al realizar la actualizacion! 
  </div>';
}



?>