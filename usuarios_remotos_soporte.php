<?php require_once "vistas/header_soporte.php" ?>

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

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql = " SELECT registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico FROM registros ";
$sql .= " ORDER BY registros_id ";
$resultado = $conexion->prepare($sql);
$resultado->execute();
$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Inicio de contenido principal -->


<h1 class="text-center font-black">Consolidado Home Office</h1>
      
<h3 class="text-center">Personal laborando en gestion Remota</h3>
  
    <div class="col-xl-12 margin-bottom-5">
        <div class="row">
            <div class="col-lg-12">

               <button  id="btnNuevo" type='button' class='btn btn-success' data-toggle="modal">Registrar</button>

            </div>
        </div>  
    </div>
     
    <!--Ejemplo tabla con DataTables-->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="TablaUsersRemotoSoporte" class="table table-striped table-bordered font-black" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                                <th style="display: none">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="font-size-15">
                            <?php
                              foreach($registros as $registros){
                            ?>
    
                            <tr>
                               <td><?php echo $registros['registros_id'];?></td>
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
                               <td style="display: none"></td>
                            </tr>
        
                            <?php } ?>

                                          
                        </tbody>
                   </table>                  
                </div>
            </div>
        </div>  
    </div>
     
    <!--########################################################## MODAL #############################################################-->
    <div class='modal fade' id='modalCRUD' tabindex="-1" role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title font-black' id='exampleModalLabel'></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span>
                    </button>
                </div>

                    <?php

                      date_default_timezone_set ('America/Lima');
                      $fecha_actual = date("Y-m-d");

                    ?>

                    <form id="usuariosRemotosSoporte">

                        <div class="modal-body">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control form-control-user" id="nombres" name="nombres" placeholder="Nombres" required>
                        </div>

                        <div class="modal-body row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="apellido_paterno">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_pa" name="apellido_pa" placeholder="Apellido Paterno" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_ma" name="apellido_ma" placeholder="Apellido Materno" required>
                            </div>
                        </div>
                       
                        <div class="modal-body row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="dni">Documento</label>
                                <input type="text" class="form-control form-control-user" id="dni" name="dni" placeholder="DNI \ PTP \ Carne extranjeria"required>
                            </div>
                            <div class="col-sm-6">
                                <label for="telefono">Celular</label>
                                <input type="text" class="form-control form-control-user" id="telefono" name="telefono" placeholder="Celular" required>
                            </div>
                        </div>

                        <div class="modal-body row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="ip">IP</label>
                                <input type="text" class="form-control form-control-user" id="ip" name="ip" placeholder="IP" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="sistema_operativo">Sistema Operativo</label>
                                <select class="form-control" id="sistema_operativo" name="sistema_operativo" required>
                                 <option value=""></option>
                                 <option value = "Windows 10">Windows 10</option>
                                 <option value = "Windows 8.1">Windows 8.1</option>
                                 <option value = "Windows 8">Windows 8</option>
                                 <option value = "Windows 7">Windows 7</option>
                                 <option value = "Linux">Linux</option>
                                 <option value = "iOS">iOS</option>
                                 <option value = "Chrome OS">Chrome OS</option>
                             </select>
                            </div>
                        </div>

                        <div class="modal-body row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                             <label for="campaña">Campaña</label>
                                
                             <select class="form-control" id="campaña" name="campaña" required>
                             <option value = ""></option>
                                 <option value = "AJE">AJE</option>
                                 <option value = "ARVAL">ARVAL</option>
                                 <option value = "ATRACCION DE TALENTO HUMANO">ATRACCION DE TALENTO HUMANO</option>
                                 <option value = "CLARO ANIVERSARIO">CLARO ANIVERSARIO</option>
                                 <option value = "CLARO APP MI CLARO">CLARO APP MI CLARO</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA">CLARO ATENCION TECNOLOGICA</option>
                                 <option value = "CLARO BLINDAJE PORT OUT - ENTEL">CLARO BLINDAJE PORT OUT - ENTEL</option>
                                 <option value = "CLARO BLINDAJE PREPAGO">CLARO BLINDAJE PREPAGO</option>
                                 <option value = "CLARO CLIENTES EXCLUSIVOS">CLARO CLIENTES EXCLUSIVOS</option>
                                 <option value = "CLARO CLOSE THE LOOP">CLARO CLOSE THE LOOP</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO">CLARO CONTACTADOS POSTPAGO</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO RED">CLARO CONTACTADOS POSTPAGO RED</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO CHURN">CLARO CONTACTADOS POSTPAGO CHURN</option>
                                 <option value = "CLARO CONTACTADOS WHATSAPP">CLARO CONTACTADOS WHATSAPP</option>
                                 <option value = "CLARO CONSULTA PREVIA POSTPAGO">CLARO CONSULTA PREVIA POSTPAGO</option>
                                 <option value = "CLARO CONSULTA PREVIA PREPAGO">CLARO CONSULTA PREVIA PREPAGO</option>
                                 <option value = "CLARO DESISTIMIENTO DOWNGRADE">CLARO DESISTIMIENTO DOWNGRADE</option>
                                 <option value = "CLARO ENCUESTAS PREPAGO">CLARO ENCUESTAS PREPAGO</option>
                                 <option value = "CLARO TELEVENTAS INBOUND">CLARO TELEVENTAS INBOUND</option>
                                 <option value = "CLARO MIGRACIONES">CLARO MIGRACIONES</option>
                                 <option value = "CLARO OUTBOUND UPGRADE">CLARO OUTBOUND UPGRADE</option>
                                 <option value = "CLARO PORTABILIDAD OUTBOUND">CLARO PORTABILIDAD OUTBOUND</option>
                                 <option value = "CLARO POSTPAGO">CLARO POSTPAGO</option>
                                 <option value = "CLARO PREPAGO">CLARO PREPAGO</option>
                                 <option value = "CLARO PREVENTIVA CORPORATIVA">CLARO PREVENTIVA CORPORATIVA</option>
                                 <option value = "CLARO PREVENTIVA MOVIL">CLARO PREVENTIVA MOVIL</option>
                                 <option value = "CLARO PREVENTIVA WHATSAPP">CLARO PREVENTIVA WHATSAPP</option>
                                 <option value = "CLARO RECARGAS PREPAGO">CLARO RECARGAS PREPAGO</option>
                                 <option value = "CLARO RECUPERACION DE CLIENTES">CLARO RECUPERACION DE CLIENTES</option>
                                 <option value = "CLARO RENOVACIONES OUT">CLARO RENOVACIONES OUT</option>
                                 <option value = "CLARO RETENCIONES INBOUND">CLARO RETENCIONES INBOUND</option>
                                 <option value = "CLARO SUIC">CLARO SUIC</option>
                                 <option value = "CLARO UPGRADE">CLARO UPGRADE</option>
                                 <option value = "CLARO UPGRADE IFI INBOUND">CLARO UPGRADE IFI INBOUND</option>
                                 <option value = "CLARO UPGRADE IFI OUTBOUND">CLARO UPGRADE IFI OUTBOUND</option>
                                 <option value = "CLARO VIDEO">CLARO VIDEO</option>
                                 <option value = "HONDA">HONDA</option>
                                 <option value = "CAPACITACION">CAPACITACION</option>
                                 <option value = "CALIDAD">CALIDAD</option>
                                 <option value = "REFERIDOS">REFERIDOS</option>
                                 <option value = "IAFAS">IAFAS</option>
                                 <option value = "DOMINO'S PIZZA">DOMINO'S PIZZA</option>
                                 <option value = "INNOVACIÓN Y TECNOLOGÍA">INNOVACIÓN Y TECNOLOGÍA</option>
                                 <option value = "INTELIGENCIA Y PLANEACIÓN">INTELIGENCIA Y PLANEACIÓN</option>
                                 <option value = "MCY">MCY</option>
                             </select>

                            </div>
                            <div class="col-sm-6">
                                
                                <label for="sub_campaña">Sub Campaña</label>

                                <select class="form-control" id="sub_campaña" name="sub_campaña" required>
                                 <option value = ""></option>
                                 <option value = "AJE">AJE</option>
                                 <option value = "ARVAL">ARVAL</option>
                                 <option value = "ATRACCION DE TALENTO HUMANO">ATRACCION DE TALENTO HUMANO</option>
                                 <option value = "CLARO ANIVERSARIO">CLARO ANIVERSARIO</option>
                                 <option value = "CLARO APP MI CLARO">CLARO APP MI CLARO</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA - 2DO NIVEL">CLARO ATENCION TECNOLOGICA - 2DO NIVEL</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA - CASOS">CLARO ATENCION TECNOLOGICA - CASOS</option>
                                 <option value = "CLARO ATENCION TECNOLOGICA - MOVIL">CLARO ATENCION TECNOLOGICA - MOVIL</option>
                                 <option value = "CLARO BLINDAJE PORT OUT - ENTEL">CLARO BLINDAJE PORT OUT - ENTEL</option>
                                 <option value = "CLARO BLINDAJE PREPAGO">CLARO BLINDAJE PREPAGO</option>
                                 <option value = "CLARO CLIENTES EXCLUSIVOS">CLARO CLIENTES EXCLUSIVOS</option>
                                 <option value = "CLARO CLOSE THE LOOP">CLARO CLOSE THE LOOP</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO">CLARO CONTACTADOS POSTPAGO</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO RED">CLARO CONTACTADOS POSTPAGO RED</option>
                                 <option value = "CLARO CONTACTADOS POSTPAGO CHURN">CLARO CONTACTADOS POSTPAGO CHURN</option>
                                 <option value = "CLARO CONTACTADOS WHATSAPP">CLARO CONTACTADOS WHATSAPP</option>
                                 <option value = "CLARO CONSULTA PREVIA POSTPAGO">CLARO CONSULTA PREVIA POSTPAGO</option>
                                 <option value = "CLARO CONSULTA PREVIA PREPAGO">CLARO CONSULTA PREVIA PREPAGO</option>
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
                                 <option value = "CLARO RETENCIONES INBOUND">CLARO RETENCIONES INBOUND</option>
                                 <option value = "CLARO SUIC">CLARO SUIC</option>
                                 <option value = "CLARO TELEVENTAS INBOUND">CLARO TELEVENTAS INBOUND</option>
                                 <option value = "CLARO UPGRADE">CLARO UPGRADE</option>
                                 <option value = "CLARO UPGRADE IFI INBOUND">CLARO UPGRADE IFI INBOUND</option>
                                 <option value = "CLARO UPGRADE IFI OUTBOUND">CLARO UPGRADE IFI OUTBOUND</option>
                                 <option value = "CLARO VIDEO">CLARO VIDEO</option>
                                 <option value = "HONDA">HONDA</option>
                                 <option value = "CAPACITACION">CAPACITACION</option>
                                 <option value = "CALIDAD">CALIDAD</option>
                                 <option value = "REFERIDOS">REFERIDOS</option>
                                 <option value = "IAFAS">IAFAS</option>
                                 <option value = "DOMINO'S PIZZA">DOMINO'S PIZZA</option>
                                 <option value = "INNOVACIÓN Y TECNOLOGÍA">INNOVACIÓN Y TECNOLOGÍA</option>
                                 <option value = "INTELIGENCIA Y PLANEACIÓN">INTELIGENCIA Y PLANEACIÓN</option>
                                 <option value = "MCY">MCY</option>
                            </select>

                            </div>
                        </div>
                        <div class="modal-body row">
                           <div class="col-sm-12 mb-3 mb-sm-0">

                               <label for="cargo">Cargo</label>

                               <select class="form-control" id="cargo" name="cargo" required> 
                                    <option value = ""></option>
                                    <option value = "Asesor">Asesor</option>
                                    <option value = "Supervisor">Supervisor</option>
                                    <option value = "Back Office">Back Office</option>
                                    <option value = "Ejecutivo">Ejecutivo</option>
                                    <option value = "Jefe">Jefe</option>
                                    <option value = "Cliente">Cliente</option>
                               </select>
                           </div>

                           <div class="col-sm-6" style="display: none">
                               <label for="fecha">Fecha</label>
                               <input type="date" class="form-control form-control-user" id="fecha" name="fecha" value="<?= $fecha_actual ?>" required>
                           </div>
                        </div>

                        <div class="modal-body row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="vpn">VPN</label>
      
                                <select class="form-control" id="vpn" name="vpn" required> 
                                    <option value = ""></option>
                                    <option value = "Open VPN">Open VPN</option>
                                    <option value = "Claro VPN">Claro VPN</option>
                                    <option value = "FortiClient">FortiClient</option>
                                </select>
                            </div>
                        

                            <div class="col-sm-6">
                                <label for="tecnico">Tecnico</label>
                                <select class="form-control" id="tecnico" name="tecnico" required> 
                                    <option value = "<?php echo utf8_decode($row['usuario']); ?>"><?php echo utf8_decode($row['usuario']); ?></option>
                                </select>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type="button" class="btn btn-light" data-dismiss='modal'>Cancelar</button>
                            <button type="submit"  id='btnGuardar'  class="btn btn-dark">Guardar cambios</button>
                        </div>
                        
                    </form>
            </div>
        </div>
    </div>

    <!-- Fin de contenido principal -->
<?php require_once "vistas/footer.php" ?>