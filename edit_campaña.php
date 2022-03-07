<?php
$conexion = mysqli_connect("localhost","root","root","control_acceso");
$id = $_GET['id'];


?>
<?php require_once "vistas/header_admin.php" ?>



<head>



</head>
<body>


<div class="container">

<h1>Editar Razon Social</h1>  
<form method="POST" action="act_campaña.php">
 
<div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Editar Campaña</span>
      </div>
      <?php

        
        $user = "SELECT * FROM campaña WHERE campaña_id='$id'";
        $result = mysqli_query($conexion,$user);
        while ($fila = mysqli_fetch_array($result)){
    ?>


 <input type="hidden" class="form-control" name="id" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?echo $fila["campaña_id"]?>">
  <input type="text" class="form-control" name="text" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?echo $fila["campaña"]?>">


  <?php 
}

?>
    
</div>



  





  
  <button type="submit" class="btn btn-primary" name="submit">Editar</button>





</form>




</div>
</body>
<?php require_once "vistas/footer.php" ?>









