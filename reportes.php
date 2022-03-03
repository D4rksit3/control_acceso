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
    
    $sql = " SELECT reportes_id, nombres, puesto, estado, dni, centro, ip, inicio, fin FROM reportes";
    $sql .= " ORDER BY reportes_id DESC "; 
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    $reportes=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class="text-center font-black">Reporte Marcaciones PERU</h1>
    <!--DataTables-->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="example" class="table table-striped table-bordered font-black" cellspacing="0" width="100%">
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Puesto</th>
                                <th>Estado</th>                               
                                <th>Documento</th>
                                <th>Centro</th>
                                <th>IP</th>
                                <th>inicio</th>
                                <th>fin</th>

                            </tr>

                        </thead>

                        <tbody class="font-size-15">

                            <?php
                              foreach($reportes as $reportes){
                            ?>
    
                            <tr>
                                
                               <td><?php echo $reportes['reportes_id'];?></td>
                               <td><?php echo $reportes['nombres'];?></td>
                               <td><?php echo $reportes['puesto'];?></td>
                               <td><?php echo $reportes['estado'];?></td>
                               <td><?php echo $reportes['dni'];?></td>
                               <td><?php echo $reportes['centro'];?></td>
                               <td><?php echo $reportes['ip'];?></td>
                               <td><?php echo $reportes['inicio'];?></td>
                               <td><?php echo $reportes['fin'];?></td>
                               
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