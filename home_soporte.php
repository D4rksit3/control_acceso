<?php require_once "vistas/header_soporte.php" ?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql = " SELECT count(id_tipo_equipo) as equipos_virtuales FROM mapeo WHERE id_tipo_equipo = 2 ";
$sql .= " ORDER BY mapeo_id ";
$resultado = $conexion->prepare($sql);
$resultado->execute();
$mapeo=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_2 = " SELECT count(id_tipo_equipo) as equipos_fisicos FROM mapeo WHERE id_tipo_equipo = 1 ";
$sql_2 .= " ORDER BY mapeo_id ";
$resultado_2 = $conexion->prepare($sql_2);
$resultado_2->execute();
$mapeo_2=$resultado_2->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_3 = " SELECT count(id_tipo_gestion) as gestion_remota FROM mapeo WHERE id_tipo_gestion = 2 ";
$sql_3 .= " ORDER BY mapeo_id ";
$resultado_3 = $conexion->prepare($sql_3);
$resultado_3->execute();
$mapeo_3=$resultado_3->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_4 = " SELECT count(id_tipo_gestion) as gestion_presencial FROM mapeo WHERE id_tipo_gestion = 1 ";
$sql_4 .= " ORDER BY mapeo_id ";
$resultado_4 = $conexion->prepare($sql_4);
$resultado_4->execute();
$mapeo_4=$resultado_4->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_5 = " SELECT count(id_tipo_equipo) as equipos_virtuales_operaciones FROM mapeo WHERE id_tipo_equipo = 2 and id_tipo_area = 1 ";
$sql_5 .= " ORDER BY mapeo_id ";
$resultado_5 = $conexion->prepare($sql_5);
$resultado_5->execute();
$mapeo_5=$resultado_5->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_6 = " SELECT count(id_tipo_equipo) as equipos_fisicos_operaciones FROM mapeo WHERE id_tipo_equipo = 1 and id_tipo_area = 1 ";
$sql_6 .= " ORDER BY mapeo_id ";
$resultado_6 = $conexion->prepare($sql_6);
$resultado_6->execute();
$mapeo_6=$resultado_6->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_7 = " SELECT count(id_tipo_equipo) as equipos_virtuales_capacitacion FROM mapeo WHERE id_tipo_equipo = 2 and id_tipo_area = 2 ";
$sql_7 .= " ORDER BY mapeo_id ";
$resultado_7 = $conexion->prepare($sql_7);
$resultado_7->execute();
$mapeo_7=$resultado_7->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_8 = " SELECT count(id_tipo_equipo) as equipos_fisicos_capacitacion FROM mapeo WHERE id_tipo_equipo = 1 and id_tipo_area = 2 ";
$sql_8 .= " ORDER BY mapeo_id ";
$resultado_8 = $conexion->prepare($sql_8);
$resultado_8->execute();
$mapeo_8=$resultado_8->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_9 = " SELECT count(id_tipo_equipo) as equipos_virtuales_administrativo FROM mapeo WHERE id_tipo_equipo = 2 and id_tipo_area = 4 ";
$sql_9 .= " ORDER BY mapeo_id ";
$resultado_9 = $conexion->prepare($sql_9);
$resultado_9->execute();
$mapeo_9=$resultado_9->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_10 = " SELECT count(id_tipo_equipo) as equipos_fisicos_administrativo FROM mapeo WHERE id_tipo_equipo = 1 and id_tipo_area = 4 ";
$sql_10 .= " ORDER BY mapeo_id ";
$resultado_10 = $conexion->prepare($sql_10);
$resultado_10->execute();
$mapeo_10=$resultado_10->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_11 = " SELECT count(id_tipo_equipo) as equipos_remotos_fisicos_operaciones FROM mapeo WHERE id_tipo_gestion = 2 and id_tipo_equipo = 1 and id_tipo_area = 1 ";
$sql_11 .= " ORDER BY mapeo_id ";
$resultado_11 = $conexion->prepare($sql_11);
$resultado_11->execute();
$mapeo_11=$resultado_11->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql_12 = " SELECT count(id_tipo_equipo) as equipos_remotos_fisicos_capacitacion FROM mapeo WHERE id_tipo_gestion = 2 and id_tipo_equipo = 1 and id_tipo_area = 2 ";
$sql_12 .= " ORDER BY mapeo_id ";
$resultado_12 = $conexion->prepare($sql_12);
$resultado_12->execute();
$mapeo_12=$resultado_12->fetchAll(PDO::FETCH_ASSOC);
?>


  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class=" mb-0 text-black ">DASHBOARD</h1>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class="h3 mb-0 text-gray-900">Datos Generales Mapeo</h2>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (virtual devices) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Equipos Virtuales Totales</div>

                        <?php foreach($mapeo as $mapeo) { ?>

                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <table>    
                                <tr>
                                   <td><?php echo $mapeo['equipos_virtuales'] ?></td> 
                                </tr> 
                              </table>                      
                           </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Earnings (Physical devices) Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Equipos fisicos Totales</div>

                        <?php foreach($mapeo_2 as $mapeo_2) { ?>

                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <table>    
                                   <tr>
                                      <td><?php echo $mapeo_2['equipos_fisicos'] ?></td> 
                                   </tr> 
                              </table> 
                           </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (gestion remota) Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Gestion remota</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">

                            <?php foreach($mapeo_3 as $mapeo_3) { ?>

                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                   <table>    
                                      <tr>
                                         <td><?php echo $mapeo_3['gestion_remota'] ?></td> 
                                      </tr> 
                                  </table> 
                                </div>

                            <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending (gestion presencial) Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gestion presencial</div>

                        <?php foreach($mapeo_4 as $mapeo_4) { ?>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <table>    
                              <tr>
                                 <td><?php echo $mapeo_4['gestion_presencial'] ?></td> 
                              </tr> 
                          </table> 
                        </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 class="h3 mb-0 text-gray-900">Datos Especificos Mapeo</h2>
</div>

<div class="row">

   <!-- Pending (equipos virtuales operaciones) Card  -->
   <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Equipos Virtuales Operaciones</div>

                        <?php foreach($mapeo_5 as $mapeo_5) { ?>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <table>    
                              <tr>
                                 <td><?php echo $mapeo_5['equipos_virtuales_operaciones'] ?></td> 
                              </tr> 
                          </table> 
                        </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Earnings (Equipos Fisicos Operaciones) Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Equipos Fisicos Operaciones</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">

                            <?php foreach($mapeo_6 as $mapeo_6) { ?>

                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                   <table>    
                                      <tr>
                                         <td><?php echo $mapeo_6['equipos_fisicos_operaciones'] ?></td> 
                                      </tr> 
                                  </table> 
                                </div>

                            <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Earnings (Equipos Virtuales Capacitacion) Card  -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Equipos Virtuales Capacitacion</div>

                        <?php foreach($mapeo_7 as $mapeo_7) { ?>

                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <table>    
                                   <tr>
                                      <td><?php echo $mapeo_7['equipos_virtuales_capacitacion'] ?></td> 
                                   </tr> 
                              </table> 
                           </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Earnings (Equipos Fisicos Capacitacion) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Equipos Fisicos Capacitacion</div>

                        <?php foreach($mapeo_8 as $mapeo_8) { ?>

                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <table>    
                                <tr>
                                   <td><?php echo $mapeo_8['equipos_fisicos_capacitacion'] ?></td> 
                                </tr> 
                              </table>                      
                           </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!-- Earnings (Equipos Virtuales administrativos) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Equipos Virtuales Administrativos</div>

                        <?php foreach($mapeo_9 as $mapeo_9) { ?>

                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <table>    
                                <tr>
                                   <td><?php echo $mapeo_9['equipos_virtuales_administrativo'] ?></td> 
                                </tr> 
                              </table>                      
                           </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Earnings (Equipos Fisicos Administrativo) Card  -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Equipos Fisicos Administrativos</div>

                        <?php foreach($mapeo_10 as $mapeo_10) { ?>

                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <table>    
                                   <tr>
                                      <td><?php echo $mapeo_10['equipos_fisicos_administrativo'] ?></td> 
                                   </tr> 
                              </table> 
                           </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!-- Earnings (Equipos remotos fisicos operaciones) Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Equipos remotos fisicos operaciones</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">

                            <?php foreach($mapeo_11 as $mapeo_11) { ?>

                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                   <table>    
                                      <tr>
                                         <td><?php echo $mapeo_11['equipos_remotos_fisicos_operaciones'] ?></td> 
                                      </tr> 
                                  </table> 
                                </div>

                            <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- Pending (equipos virtuales operaciones) Card  -->
   <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Equipos remotos fisicos capacitacion</div>

                        <?php foreach($mapeo_12 as $mapeo_12) { ?>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <table>    
                              <tr>
                                 <td><?php echo $mapeo_12['equipos_remotos_fisicos_capacitacion'] ?></td> 
                              </tr> 
                          </table> 
                        </div>

                        <?php } ?>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<?php require_once "vistas/footer.php" ?>