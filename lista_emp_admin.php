<?php require_once "vistas/header_admin.php" ?>

<style>

    .font-black {
      color: black
    }

    .margin-bottom-5 {
        margin-bottom: 5px;
    }

    .font-size-15 {
        font-size: 15px
    }

</style>

<!-- Inicio de contenido principal -->

<?php
    include_once 'DB/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    $sql = " SELECT empleados_id, dni, nombres, apellido_pa, apellido_ma, fecha_ingreso, razon_social, puesto, centro, campana, condicion, jefe_inmediato, modalidad, estado FROM empleados ";
    $sql .= " ORDER BY empleados_id ";
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    $empleados=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class="text-center font-black">Lista De Empleados</h1>
    <!--DataTables-->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="example" class="table table-striped table-bordered font-black" cellspacing="0" width="100%">
                        <thead>

                            <tr>
                                <th>Accion</th>
                                <th>ID</th>
                                <th>Documento</th>
                                <th>Nombres</th>                               
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Fecha de Ingreso</th>
                                <th>Razon Social</th>
                                <th>Puesto</th>
                                <th>Centro</th>
                                <th>Campaña</th>
                                <th>Condicion</th>
                                <th>Jefe Inmediato</th>
                                <th>Modalidad</th>
                                <th>Estado</th>

                            </tr>

                        </thead>

                        <tbody class="font-size-15">

                            <?php
                              foreach($empleados as $empleados){
                            ?>
    
                            <tr>
                                
                               <td>
                                    <a href="editar_registro.php?id=<?php echo $empleados['empleados_id']; ?>" class="btn btn-warning btn-circle btn-sm" ><i class="">E</i></a>
                                    <a href="#" data-id="<?php echo $empleados['empleados_id']; ?>" data-tipo="registro" class="btn btn-danger btn-circle btn-sm borrar_registro" ><i class="fas fa-trash"></i></a>
                               </td>
                               <td><?php echo $empleados['empleados_id'];?></td>
                               <td><?php echo $empleados['dni'];?></td>
                               <td><?php echo $empleados['nombres'];?></td>
                               <td><?php echo $empleados['apellido_pa'];?></td>
                               <td><?php echo $empleados['apellido_ma'];?></td>
                               <td><?php echo $empleados['fecha_ingreso'];?></td>
                               <td><?php echo $empleados['razon_social'];?></td>
                               <td><?php echo $empleados['puesto'];?></td>
                               <td><?php echo $empleados['centro'];?></td>
                               <td><?php echo $empleados['campana'];?></td>
                               <td><?php echo $empleados['condicion'];?></td>
                               <td><?php echo $empleados['jefe_inmediato'];?></td>
                               <td><?php echo $empleados['modalidad'];?></td>
                               <td><?php echo $empleados['estado'];?></td>
                               
                            </tr>
        
                            <?php } ?>

                                          
                        </tbody>   
                    </table>                  
                </div>
            </div>
        </div>  
    </div>

    <!-- Fin de contenido principal -->


<?php require_once "vistas/footer.php" ?>