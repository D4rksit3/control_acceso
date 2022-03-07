<?php
$conexion = mysqli_connect("localhost","root","root","control_acceso")

?>
<?php require_once "vistas/header_admin.php" ?>



<head>



</head>
<body>

<div class="container">
  <h1>Agregar Puesto</h1>  

  <form class="row g-3" method="POST" action="agr_puesto.php">
  
  <div class="col-auto">
  
    <input type="text" class="form-control" id="inputPassword2" name="text" placeholder="Agregar Puesto">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3" name="submit">Agregar Puesto</button>
  </div>
  
</form>
<?php

$text = $_POST['text'];

if (isset($_POST['submit'])) {
  
  $consulta = "INSERT INTO puesto (puesto) VALUES ('$text')";
  mysqli_query($conexion, $consulta);

  echo '<div class="alert alert-success" role="alert">
  Puesto agregado correctamente!
</div>';

}



?></div>

</body>



<?php require_once "vistas/footer.php" ?>