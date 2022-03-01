<?php require_once "vistas/header_admin.php" ?>
<?php include_once 'DB/funciones.php'; ?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Registrar Empleado</h1>
                    </div>
                    <form role="form" id="guardar-registro" name="guardar-registro" method="post" action="ediciones_registro.php" class="user">

					    <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Documento</label>
                                <input type="text" class="form-control form-control-user" id="dni" name="dni" placeholder="DNI / PTP" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Nombres</label>
                                <input type="text" class="form-control form-control-user" id="nombres" name="nombres" placeholder="Nombres" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_pa" name="apellido_pa" placeholder="Apellido Paterno" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Apellido Materno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_ma" name="apellido_ma" placeholder="Apellido Materno" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">

						    <div class="col-sm-6">
                                <label for="">Fecha de Ingreso</label>
                                <input type="date" class="form-control form-control-user" id="fecha_ingreso" name="fecha_ingreso" required>
                            </div>

                            <div class="col-sm-6">
							    <label for="">Razon Social</label>
							    <select class="form-control" id="razon_social" name="razon_social" required>
                                    <option value = ""></option>
                                    <option value = "MDY Intenational Business Process Outs">MDY Intenational Business Process Outs</option>
                                    <option value = "Backup Service Peru SAC">Backup Service Peru SAC</option>
                                    <option value = "Hernandez Randich Administracion">Hernandez Randich Administracion</option>
                                    <option value = "Mercadotecnia Directa y Contact Center">Mercadotecnia Directa y Contact Center</option>
                                    <option value = "Wimprove SAC">Wimprove SAC</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Puesto</label>
                                <select class="form-control" id="puesto" name="puesto" required>
                                    <option value = ""></option>
                                    <option value = "Analista de Base de Datos">Analista de Base de Datos</option>
                                    <option value = "Administrativo SUIC">Administrativo SUIC</option>
                                    <option value = "Analista de Gerencia de Valor al Cliente">Analista de Gerencia de Valor al Cliente</option>
                                    <option value = "Analista de Inteligencia y Planeacion">Analista de Inteligencia y Planeacion</option>
                                    <option value = "Analista de Operaciones">Analista de Operaciones</option>
                                    <option value = "Asesor Telefonico Ventas">Asesor Telefonico Ventas</option>
                                    <option value = "Asistente Social">Asistente Social</option>
                                    <option value = "Asistente Contable">Asistente Contable</option>
                                    <option value = "Asistente de Gerencia">Asistente de Gerencia</option>
                                    <option value = "Asistente de Reclutamiento y Seleccion">Asistente de Reclutamiento y Seleccion</option>
                                    <option value = "ASTELATC02">ASTELATC02</option>
                                    <option value = "Backoffice">Backoffice</option>
                                    <option value = "Coach comercial">Coach comercial</option>
                                    <option value = "Desarrollador de Automatizacion e Innovacion">Desarrollador de Automatizacion e Innovacion</option>
                                    <option value = "Ejecutivo Contable">Ejecutivo Contable</option>
                                    <option value = "Ejecutivo de Calidad de Procesos">Ejecutivo de Calidad de Procesos</option>
                                    <option value = "Ejecutivo de Nominas">Ejecutivo de Nominas</option>
                                    <option value = "Ejecutivo de Torre de Control">Ejecutivo de Torre de Control</option>
                                    <option value = "Ejecutivo Junior de Desarrollo Humano">Ejecutivo Junior de Desarrollo Humano</option>
                                    <option value = "Ejecutivo Junior de Innovacion Tecnologica">Ejecutivo Junior de Innovacion Tecnologica</option>
                                    <option value = "Ejecutivo Junior de Reclutamiento y Seleccion">Ejecutivo Junior de Reclutamiento y Seleccion</option>
                                    <option value = "Ejecutivo Senior de Calidad">Ejecutivo Senior de Calidad</option>
                                    <option value = "Ejecutivo Senior de Desarrollo Humano">Ejecutivo Senior de Desarrollo Humano</option>
                                    <option value = "Ejecutivo senior de Innovacion Tecnologica">Ejecutivo senior de Innovacion Tecnologica</option>
                                    <option value = "GEWIMIT">GEWIMIT</option>
                                    <option value = "Jefe de Informacion y Eficiencia">Jefe de Informacion y Eficiencia</option>
                                    <option value = "Mantenimiento">Mantenimiento</option>
                                    <option value = "Prevencionista">Prevencionista</option>
                                    <option value = "Recepcionista">Recepcionista</option>
                                    <option value = "Soporte de Innovacion Tecnologica">Soporte de Innovacion Tecnologica</option>
                                    <option value = "Supervisor de Calidad">Supervisor de Calidad</option>
                                    <option value = "Supervisor de Capacitacion">Supervisor de Capacitacion</option>
                                    <option value = "Supervisor de Mantenimiento">Supervisor de Mantenimiento</option>
                                    <option value = "Supervisor de Valor a Cliente">Supervisor de Valor a Cliente</option>
                                </select>
                            </div>

                            <div class="col-sm-6">

                                <label for="">Centro</label>
                                
                                <select class="form-control" id="centro" name="centro" required>
							        <option value = ""></option>
                                    <option value = "CORPORATIVO PERU">CORPORATIVO PERU</option>
                                    <option value = "MAGDALENA">MAGDALENA</option>
                                    <option value = "LINCE">LINCE</option>
                                    <option value = "COLONIAL">COLONIAL</option>
                                </select>

                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <label for="">Campaña</label>

                                <select class="form-control" id="campana" name="campana" required>
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
                                    <option value = "CLARO CORPORATIVO MOVIL">CLARO CORPORATIVO MOVIL</option>
                                    <option value = "CLARO CORPORATIVO MOVIL">CLARO CORPORATIVO MOVIL PERSONALIZADO</option>
                                    <option value = "CLARO CORPORATIVO MOVIL">CLARO CORPORATIVO MOVIL SOPORTE</option>
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
                                    <option value = "CREDISCOTIA">CREDISCOTIA</option>
                                    <option value = "IAFAS">IAFAS</option>
                                    <option value = "DESPACHO">DESPACHO</option>
                                    <option value = "MASIVO DTH">MASIVO DTH</option>
                                    <option value = "MASIVO HFC">MASIVO HFC</option>
                                    <option value = "LISTACIONES">LISTACIONES</option>
                                    <option value = "NUEVOS PROYECTOS">NUEVOS PROYECTOS</option>
                                    <option value = "OUTBOUND UPGRADE">OUTBOUND UPGRADE</option>
                                    <option value = "ON TOP">ON TOP</option>
                                    <option value = "INNOVACIÓN Y TECNOLOGÍA">INNOVACIÓN Y TECNOLOGÍA</option>
                                    <option value = "INTELIGENCIA Y PLANEACIÓN">INTELIGENCIA Y PLANEACIÓN</option>
                                    <option value = "MCY">MCY</option>
                                </select>

                            </div>

							<div class="col-sm-6 mb-3 mb-sm-0">

                             <label for="">Condicion</label>
                                
                             <select class="form-control" id="condicion" name="condicion" required>
							        <option value = ""></option>
                                    <option value = "Full Time">Full Time</option>
                                    <option value = "Part Time">Part Time</option>
                             </select>

                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-6 mb-3 mb-sm-0">

                               <label for="">Jefe Inmediato</label>
                               <input type="text" class="form-control form-control-user" id="jefe_inmediato" name="jefe_inmediato" placeholder="Jefe Inmediato" required>

                           </div>

                           <div class="col-sm-6">
						        <label for="">Modalidad</label>
                                
								<select class="form-control" id="modalidad" name="modalidad" required>
									<option value = ""></option>
									<option value = "No notificado">No notificado</option>
									<option value = "PRESENCIAL">PRESENCIAL</option>
									<option value = "REMOTO">REMOTO</option>
								</select>

                           </div>
                        </div>

                        <div class="form-group row">
                           
                            <label for="">Estado</label>
                            <select class="form-control" id="estado" name="estado" required> 
                                 <option value = ""></option>
                                 <option value = "ACTIVO">ACTIVO</option>
                                 <option value = "INACTIVO">INACTIVO</option>
                            </select>
                           
                        </div>
                        
                        <div>
                            <input type="hidden" name="registrar" value="nuevo">
                            <button type="submit" class="btn btn-primary btn-user btn-block">Registrar</button>
                        </div>
                        
                    </form>
                    <hr>
                 
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php require_once "vistas/footer.php" ?>