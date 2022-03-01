<?php require_once "vistas/header_admin.php" ?>

<style>
    .font-black {
      color: black
    }
</style>

<!-- Inicio de contenido principal -->


<h1 class="text-center font-black">Consolidado Home Office</h1>
      
<h3 class="text-center">Personal laborando en gestion Remota</h3>
  
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12">

               <button  id="btnNuevo" type='button' class='btn btn-success' data-toggle="modal">nuevo</button>

            </div>
        </div>  
    </div>
     
    <!--Ejemplo tabla con DataTables-->
    <div class="col-xl-12">
        <div class="row">
                <div class="col-lg-12">

                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered font-black" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Accion</th>
                                    <th>IP</th>
                                    <th>Sistema Operativo</th>
                                    <th>Nombres</th>                               
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Documento</th>
                                    <th>Telefono</th>
                                    <th>Campaña</th>
                                    <th>Sub Campaña</th>
                                    <th>Cargo</th>
                                    <th>VPN</th>
                                    <th>Fecha</th>
                                    <th>tecnico</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                              <?php
    
                               $conexion=mysqli_connect("localhost", "root", "root", "mapeo_mdy");
    
                               try {
                                  $sql = " SELECT registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico FROM registros ";
                                  $resultado = $conexion->query($sql);
                               } catch (Exception $e) {
                                   $error = $e->getMessage();
                                   echo $error;
                               }
    
                               while($registros = $resultado->fetch_assoc()) { ?>
    
                               <tr>
                                  <td>
                                      <a href="editar_registro.php?id=<?php echo $registros['registros_id']; ?>" class="btn btn-warning btn-circle btn-sm" ><i class="fas fa-exclamation-triangle"></i></a>
                                      <a href="#" data-id="<?php echo $registros['registros_id']; ?>" data-tipo="registro" class="btn btn-danger btn-circle btn-sm borrar_registro" ><i class="fas fa-trash"></i></a>
                                  </td>
                                  <td><?php echo $registros['ip'];?></td>
                                  <td><?php echo $registros['sistema_operativo'];?></td>
                                  <td><?php echo $registros['nombres'];?></td>
                                  <td><?php echo $registros['apellido_pa'];?></td>
                                  <td><?php echo $registros['apellido_ma'];?></td>
                                  <td><?php echo $registros['dni'];?></td>
                                  <td><?php echo $registros['telefono'];?></td>
                                  <td><?php echo $registros['campaña'];?></td>
                                  <td><?php echo $registros['sub_campaña'];?></td>
                                  <td><?php echo $registros['cargo'];?></td>
                                  <td><?php echo $registros['vpn'];?></td>
                                  <td><?php echo $registros['fecha'];?></td>
                                  <td><?php echo $registros['tecnico'];?></td>
                               </tr>
         
                              <?php } ?>
    
                                              
                            </tbody>
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>
     
    <!--Modal-->
    <div class='modal fade' id='modalCRUD' tabindex="-1" role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;
                    </span>
                    </button>
                </div>

                <form role="form" id="guardar-registro-sotano" name="guardar-registro" method="post" action="ediciones_conteo_equipos.php" class="user">

                        <div class="form-group">
                             <label for="">Campaña</label>

                                <select class="form-control" id="campaña" name="campaña" required>
                                 <option value = "<?php echo $mapeo['campaña'];?>"><?php echo $mapeo['campaña'];?></option>
                                 <option value = "AJE">AJE</option>
                                 <option value = "ARVAL">ARVAL</option>
                                 <option value = "ATRACCION DE TALENTO HUMANO">ATRACCION DE TALENTO HUMANO</option>
                                 <option value = "CLARO APP MI CLARO">CLARO APP MI CLARO</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA - 2DO NIVEL">CLARO ATENCION TECNOLOGICA - 2DO NIVEL</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA - CASOS">CLARO ATENCION TECNOLOGICA - CASOS</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA - MOVIL">CLARO ATENCION TECNOLOGICA - MOVIL</option>
                                 <option value = "CLARO BLINDAJE PORT OUT - ENTEL">CLARO BLINDAJE PORT OUT - ENTEL</option>
                                 <option value = "CLARO BLINDAJE PREPAGO">CLARO BLINDAJE PREPAGO</option>
                                 <option value = "CLARO CLOSE THE LOOP">CLARO CLOSE THE LOOP</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO RED">CLARO CONTACTADOS POSTPAGO RED</option>
                                 <option value = "CLARO CONTACTADOS WHATSAPP">CLARO CONTACTADOS WHATSAPP</option>
                                 <option value = "CLARO DESISTIMIENTO DOWNGRADE">CLARO DESISTIMIENTO DOWNGRADE</option>
                                 <option value = "CLARO ENCUESTAS PREPAGO">CLARO ENCUESTAS PREPAGO</option>
                                 <option value = "CLARO LEADS">CLARO LEADS</option>
                                 <option value = "CLARO MIGRACIONES">CLARO MIGRACIONES</option>
                                 <option value = "CLARO OUTBOUND UPGRADE">CLARO OUTBOUND UPGRADE</option>
                                 <option value = "CLARO PORTABILIDAD OUTBOUND">CLARO PORTABILIDAD OUTBOUND</option>
                                 <option value = "CLARO POSTPAGO - CROSS">CLARO POSTPAGO - CROSS</option>
                                 <option value = "CLARO POSTPAGO - FRONT">CLARO POSTPAGO - FRONT</option>
                                 <option value = "CLARO PREPAGO - CROSS">CLARO PREPAGO - CROSS</option>
                                 <option value = "CLARO PREPAGO - FRONT">CLARO PREPAGO - FRONT</option>
                                 <option value = "CLARO PREVENTIVA CORPORATIVA">CLARO PREVENTIVA CORPORATIVA</option>
                                 <option value = "CLARO PREVENTIVA MOVIL">CLARO PREVENTIVA MOVIL</option>
                                 <option value = "CLARO PREVENTIVA WHATSAPP">CLARO PREVENTIVA WHATSAPP</option>
                                 <option value = "CLARO RECARGAS PREPAGO">CLARO RECARGAS PREPAGO</option>
                                 <option value = "CLARO RECUPERACION DE CLIENTES">CLARO RECUPERACION DE CLIENTES</option>
                                 <option value = "CLARO RENOVACIONES OUT">CLARO RENOVACIONES OUT</option>
                                 <option value = "CLARO SUIC">CLARO SUIC</option>
                                 <option value = "CLARO TELEVENTAS INBOUND">CLARO TELEVENTAS INBOUND</option>
                                 <option value = "CLARO UPGRADE">CLARO UPGRADE</option>
                                 <option value = "CLARO UPGRADE IFI INBOUND">CLARO UPGRADE IFI INBOUND</option>
                                 <option value = "CLARO UPGRADE IFI OUTBOUND">CLARO UPGRADE IFI OUTBOUND</option>
                                 <option value = "CLARO VIDEO">CLARO VIDEO</option>
                                 <option value = "HONDA">HONDA</option>
                                 <option value = "IAFAS">IAFAS</option>
                                 <option value = "INNOVACIÓN Y TECNOLOGÍA">INNOVACIÓN Y TECNOLOGÍA</option>
                                 <option value = "INTELIGENCIA Y PLANEACIÓN">INTELIGENCIA Y PLANEACIÓN</option>
                                 <option value = "MCY">MCY</option>
                                 <option value = "NA">NA</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Segmento</label>
                                <select class="form-control" id="segmento" name="segmento" required>
                                 <option value="<?php echo $mapeo['segmento'];?>"><?php echo $mapeo['segmento'];?></option>
                                 <option value = "atc">Atencion Al Cliente</option>
                                 <option value = "vts">Ventas</option>
                                 <option value = "np">Nuevos Proyectos</option>
                                 <option value = "nn">Nuevos Negocios</option>
                                 <option value = "adm">Administrativo</option>
                                 <option value = "NA">NA</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                 <label for="">Cargo</label>
                                <select class="form-control" id="cargo" name="cargo" required>
                                 <option value="<?php echo $mapeo['cargo'];?>"><?php echo $mapeo['cargo'];?></option>
                                 <option value = "as">Asesor</option>
                                 <option value = "sup">Supervisor</option>
                                 <option value = "ejec">Ejecutivo</option>
                                 <option value = "an">Analista</option>
                                 <option value = "jef">Jefe</option>
                                 <option value = "cli">Cliente</option>
                                 <option value = "asist">Asistente</option>
                                 <option value = "NA">NA</option>
                                </select>
                            </div>

                            <div class="col-sm-12">
                              <label for="">Usuario</label>

                              <select class="form-control" id="usuario" name="usuario" required> 
                                   <option value = "<?php echo utf8_decode($row['usuario']); ?>"><?php echo utf8_decode($row['usuario']); ?></option>
                              </select>
                           </div>
                        </div>

                        <div calss='modal-footer'>
                            <button type="button" href="conteo_equipos_admin.php" class="btn btn-primary btn-user btn-block">Cancelar</button>
                            <button type="submit" href="conteo_equipos_admin.php" class="btn btn-primary btn-user btn-block">Guardar cambios</button>
                        </div>
                        
                    </form>
            </div>
        </div>
    </div>

    <!-- Fin de contenido principal -->

<?php require_once "vistas/footer.php" ?>