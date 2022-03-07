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
                    <a href="masivo.php" class="btn btn-primary"> Cargar Masivo</a>
                    <br>
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
                                <option value =""></option>
                                <?php 

$conexion = mysqli_connect("localhost","root","root","control_acceso");
$r_social = "SELECT * FROM razon_social";
$consulta_social = mysqli_query($conexion,$r_social);

while ($fila = mysqli_fetch_array($consulta_social)) {


    ?>
                                    <option value = "<?php echo $fila['razon_social'] ?>"><? echo $fila['razon_social'] ?></option>
                                    <?php

}
?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Puesto</label>
                                <select class="form-control" id="puesto" name="puesto" required>
                                <option value =""></option>
                                <? 
                                $puesto = "SELECT * FROM puesto";
                                $puesto_sql = mysqli_query($conexion,$puesto);

                                while ($fila_puesto = mysqli_fetch_array($puesto_sql)) {
                                    # code...
                                    ?>
                                        
                                        <option value = "<? echo $fila_puesto['puesto']  ?>"><? echo $fila_puesto['puesto']  ?></option>


                                    <?
                                
                                }
                                ?>
                                   
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
                                <?
                                $campaña = "SELECT * FROM campaña";
                                $sql_campaña = mysqli_query($conexion,$campaña);

                                while ($fila_campaña = mysqli_fetch_array($sql_campaña)) {
                                    
?>

                                    <option value = "<? $fila_campaña['campaña'] ?>"><? echo $fila_campaña['campaña'] ?></option>
<?
                                }

                                ?>
								    
                                   
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