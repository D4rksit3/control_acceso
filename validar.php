<?php
 $cargo = $_POST['cargo'];
 $usuario = $_POST['usuario'];
 $contraseña = $_POST['contraseña'];
 session_start();
 $_SESSION['usuario'] = $usuario;
 $_SESSION['contraseña'] = $contraseña;
 $_SESSION['id_tipo_cargo'] = $cargo;
 
 $conexion=mysqli_connect("localhost", "root", "root", "control_acceso");
 
 $sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' and contraseña = '$contraseña' and id_tipo_cargo = '$cargo' ";
 $resultado = mysqli_query($conexion, $sql);
 
 $filas = mysqli_fetch_array($resultado);
 
 if($filas['id_tipo_cargo'] == 1) { //administrador
     header("location:home_admin.php");
 }else
 if($filas['id_tipo_cargo'] == 2){ //DH
     header("location:home_soporte.php");
 }
 
 
    else {
        
        ?>
        <?php
        include("login.php");
        ?>
    
        <h1 class="text-center">ERROR EN LA AUTENTIFICACION</h1>
    
        <?php
    }
 
 mysqli_free_result($resultado);
 mysqli_close($conexion);

?>