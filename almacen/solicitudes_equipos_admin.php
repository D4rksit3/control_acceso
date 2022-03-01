<?php require_once "vistas/header_admin.php" ?>

<!-- Inicio de contenido principal -->

<style>
    .font-black {
      color: black
    }
    
    .margin-bottom-5 {
        margin-bottom: 5px;
    }

    .font-size-12 {
        font-size: 12px
    }

</style>

<?php
include_once 'DB/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql = " SELECT * FROM solicitudes_equipos ";
$sql .= " ORDER BY solicitudes_equipos_id ";
$resultado = $conexion->prepare($sql);
$resultado->execute();
$solicitudes_equipos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Inicio de contenido principal -->


<h1 class="text-center font-black">Registro de solicitudes para prestamo</h1>
      
<h3 class="text-center">Prestamo de equipos de computo</h3>
  
    <div class="col-xl-12 margin-bottom-5">
        <div class="row">
            <div class="col-lg-12">

               <button  id="btnNuevo3" type='button' class='btn btn-success' data-toggle="modal">Registrar</button>

            </div>
        </div>  
    </div>
     
    <!--Ejemplo tabla con DataTables-->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="TablaSolicitudesEquipos" class="table table-striped table-bordered font-black" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>                                    
                                <th>Apellido Materno</th>
                                <th>Documento</th>
                                <th>Celular</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Referencia</th>
                                <th>Razon Social</th>
                                <th>Segmento</th>
                                <th>Campaña</th>
                                <th>Sub Campaña</th>
                                <th>Sede</th>
                                <th>Puesto</th>
                                <th>Equipo Solicitado</th>
                                <th>Solicitante</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              foreach($solicitudes_equipos as $solicitudes_equipos){
                            ?>
    
                            <tr>
                              <td><?php echo $solicitudes_equipos['solicitudes_equipos_id'];?></td>
                              <td><?php echo $solicitudes_equipos['estado'];?></td>
                              <td><?php echo $solicitudes_equipos['fecha'];?></td>
                              <td><?php echo $solicitudes_equipos['nombre'];?></td>
                              <td><?php echo $solicitudes_equipos['apellido_pa'];?></td>
                              <td><?php echo $solicitudes_equipos['apellido_ma'];?></td>
                              <td><?php echo $solicitudes_equipos['dni'];?></td>
                              <td><?php echo $solicitudes_equipos['celular'];?></td>
                              <td><?php echo $solicitudes_equipos['telefono'];?></td>
                              <td><?php echo $solicitudes_equipos['direccion'];?></td>
                              <td><?php echo $solicitudes_equipos['referencia'];?></td>
                              <td><?php echo $solicitudes_equipos['razon_social'];?></td>
                              <td><?php echo $solicitudes_equipos['segmento'];?></td>
                              <td><?php echo $solicitudes_equipos['campaña'];?></td>
                              <td><?php echo $solicitudes_equipos['sub_campaña'];?></td>
                              <td><?php echo $solicitudes_equipos['sede'];?></td>
                              <td><?php echo $solicitudes_equipos['puesto'];?></td>
                              <td><?php echo $solicitudes_equipos['equipo_prestamo'];?></td>
                              <td><?php echo $solicitudes_equipos['solicitante'];?></td>
                              <td></td>
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

                    <form id="solicitudesEquipos">

                        <div class="modal-body row" >
                           <div class="col-sm-12 mb-3 mb-sm-0" >

                               <label for="">Estado</label>
                               <select class="form-control" id="estado" name="estado" required> 
                                   <option value = "En Espera">En Espera</option>
                                   <option value = "Aprobado">Aprobado</option>
                                   <option value = "Rechazado">Rechazado</option>
                                </select>

                           </div>

                           <div class="col-sm-6">
                               <label for="">Fecha</label>
                               <input type="date" class="form-control form-control-user" id="fecha" name="fecha" value="<?= $fecha_actual ?>" required>
                           </div>
                        </div>

                        <div class="modal-body">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control form-control-user" id="nombre" name="nombre" placeholder="Nombres" required>
                        </div>

                        <div class="modal-body row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_pa" name="apellido_pa" placeholder="Apellido Paterno" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Apellido Materno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_ma" name="apellido_ma" placeholder="Apellido Materno" required>
                            </div>
                        </div>
                       
                        <div class="modal-body row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Documento</label>
                                <input type="text" class="form-control form-control-user" id="dni" name="dni" placeholder="DNI / PTP" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Celular</label>
                                <input type="text" class="form-control form-control-user" id="celular" name="celular" placeholder="Celular" required>
                            </div>
                        </div>
                        
                        <div class="modal-body row">
                           <div class="col-sm-6 mb-3 mb-sm-0">

                               <label for="">Telefono</label>
                               <input type="text" class="form-control form-control-user" id="telefono" name="telefono" placeholder="Telefono Fijo" required>

                           </div>

                           <div class="col-sm-6">
                               <label for="">Direccion</label>
                               <input type="text" class="form-control form-control-user" id="direccion" name="direccion" placeholder="Direccion" required>
                            </div>
                        </div>

                        <div class="modal-body">
                            <label for="">Referencia</label>
                            <input type="text" class="form-control form-control-user" id="referencia" name="referencia" placeholder="Referencia" required>
                        </div>

                        <div class="modal-body row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="">Razon Social</label>

                              <select class="form-control" id="razon_social" name="razon_social" required>
                                   <option value = ""></option>
                                   <option value = "MDY INTERNATIONAL BUSINESS PROCESS OUTSOURCING S.A.C">MDY INTERNATIONAL BUSINESS PROCESS OUTSOURCING S.A.C</option>
                                   <option value = "HERNANDEZ ASESORES EMPRESARIALES S.A.C">HERNANDEZ ASESORES EMPRESARIALES S.A.C</option>
                                   <option value = "BACK UP SERVICES PERU S.A.C.">BACK UP SERVICES PERU S.A.C.</option>
                              </select>
                           </div>

                           <div class="col-sm-6">
                              <label for="">Segmento</label>
                              <select class="form-control" id="segmento" name="segmento" required> 
                                   <option value = ""></option>
                                   <option value = "Atencion al Cliente">Atencion al Cliente</option>
                                   <option value = "Ventas">Ventas</option>
                                   <option value = "Nuevos Proyectos">Nuevos Proyectos</option>
                                   <option value = "Nuevos Negocios">Nuevos Negocios</option>
                                   <option value = "Administrativo">Administrativo</option>
                              </select>
                           </div>
                        </div>

                        <div class="modal-body row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="">Campaña</label>
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
                                 <option value = "INNOVACIÓN Y TECNOLOGÍA">INNOVACIÓN Y TECNOLOGÍA</option>
                                 <option value = "INTELIGENCIA Y PLANEACIÓN">INTELIGENCIA Y PLANEACIÓN</option>
                                 <option value = "MCY">MCY</option>
                             </select>
                           </div>

                           <div class="col-sm-6">
                              <label for="">Sub Campaña</label>
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
                                 <option value = "INNOVACIÓN Y TECNOLOGÍA">INNOVACIÓN Y TECNOLOGÍA</option>
                                 <option value = "INTELIGENCIA Y PLANEACIÓN">INTELIGENCIA Y PLANEACIÓN</option>
                                 <option value = "MCY">MCY</option>
                            </select>
                           </div>
                        </div>

                        <div class="modal-body row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="">Sede</label>

                              <select class="form-control" id="sede" name="sede" required> 
                                   <option value = ""></option>
                                   <option value = "Colonial">Colonial</option>
                                   <option value = "Magdalena">Magdalena</option>
                              </select>
                           </div>

                           <div class="col-sm-6">
                              <label for="">Puesto</label>
                              <select class="form-control" id="puesto" name="puesto" required>
                                   <option value = ""></option>
                                   <option value = "Asesor">Asesor</option>
                                   <option value = "Back Office">Back Office</option>
                                   <option value = "Supervisor">Supervisor</option>
                                   <option value = "Analista">Analista</option>
                                   <option value = "Ejecutivo">Ejecutivo</option>
                                   <option value = "Jefe">Jefe</option>
                              </select>
                           </div>
                        </div>

                        <div class="modal-body row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="">Equipo Solicitado</label>

                              <select class="form-control" id="equipo_prestamo" name="equipo_prestamo" required>
                                   <option value = ""></option>
                                   <option value = "CPU">CPU</option>
                                   <option value = "Router IFI">Router IFI</option>
                                   <option value = "CPU / Diadema">CPU / Diadema</option>
                                   <option value = "CPU / Router IFI">CPU / Router IFI</option>
                              </select>
                           </div>

                           <div class="col-sm-6">
                              <label for="">Solicitante</label>
                              <select class="form-control" id="solicitante" name="solicitante" required> 
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