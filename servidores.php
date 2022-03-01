<?php require_once "vistas/header_admin.php" ?>

<style>

    .font-black {
      color: black
    }
    
</style>

<!-- Inicio de contenido principal -->

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql = " SELECT servidores_id, servidor, ip, usuario, contrasena, marca, modelo, servicios FROM servidores ";
$sql .= " ORDER BY servidores_id ";
$resultado = $conexion->prepare($sql);
$resultado->execute();
$servidores=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="text-center font-black">Servidores - Colonial</h1>
      
<h3 class="text-center">Credenciales de servidores</h3>
     
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered font-black" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Servidor</th>
                                <th>IP</th>                               
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Servicios</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                              foreach($servidores as $servidores){
                           ?>
                          <tr>
                              <td><?php echo $servidores['servidores_id']?></td>
                              <td><?php echo $servidores['servidor']?></td>
                              <td><?php echo $servidores['ip']?></td>
                              <td><?php echo $servidores['usuario']?></td>
                              <td><?php echo $servidores['contrasena']?></td>
                              <td><?php echo $servidores['marca']?></td>
                              <td><?php echo $servidores['modelo']?></td>
                              <td><?php echo $servidores['servicios']?></td>
                            </tr>
                            <?php
                                }
                            ?>                          
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>

    <!-- Fin de contenido principal -->

<?php require_once "vistas/footer.php" ?>