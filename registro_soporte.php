<?php require_once "vistas/header_soporte.php" ?>
<?php include_once 'DB/funciones.php'; ?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Registrar personal Home Office</h1>
                    </div>
                    <form role="form" id="guardar-registro" name="guardar-registro" method="post" action="ediciones_registro.php" class="user">

                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control form-control-user" id="nombres" name="nombres" placeholder="Nombres" required>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Apellido Materno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Documento</label>
                                <input type="text" class="form-control form-control-user" id="documento" name="documento" placeholder="DNI \ PTP \ Carne extranjeria" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Celular</label>
                                <input type="text" class="form-control form-control-user" id="celular" name="celular" placeholder="Celular" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">IP</label>
                                <input type="text" class="form-control form-control-user" id="ip" name="ip" placeholder="IP" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Sistema Operativo</label>
                                <select class="form-control" id="sistema_operativo" name="sistema_operativo" required>
                                 <option value = ""></option>
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

                        <div class="form-group row">
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
                        <div class="form-group row">
                           <div class="col-sm-6 mb-3 mb-sm-0">

                               <label for="">Cargo</label>

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

                           <div class="col-sm-6">
                               <label for="">Fecha</label>
                               <input type="date" class="form-control form-control-user" id="fecha" name="fecha" required>
                           </div>
                        </div>

                        <div class="form-group row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="">VPN</label>

                              <select class="form-control" id="vpn" name="vpn" required> 
                                   <option value = ""></option>
                                   <option value = "Open VPN">Open VPN</option>
                                   <option value = "Claro VPN">Claro VPN</option>
                                   <option value = "FortiClient">FortiClient</option>
                              </select>
                           </div>

                           <div class="col-sm-6">
                              <label for="">Tecnico</label>

                              <select class="form-control" id="tecnico" name="tecnico" required> 
                                   <option value = "<?php echo utf8_decode($row['usuario']); ?>"><?php echo utf8_decode($row['usuario']); ?></option>
                              </select>
                           </div>
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