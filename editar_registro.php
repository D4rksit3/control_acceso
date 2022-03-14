<?php require_once "vistas/header_admin.php" ?>


<?php 

$conexion=mysqli_connect("localhost", "root", "root", "control_acceso");

 $id = $_GET['id'];

 if(!filter_var($id, FILTER_VALIDATE_INT)) {
     die("Error!, no quieras pasarte de listo");
 }
?>

    <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Editar Lista De Empleados</h1>
                    </div>

                    <?php

                     $sql = " SELECT * FROM empleados WHERE empleados_id = $id ";
                     $resultado = $conexion->query($sql);
                     $empleados = $resultado->fetch_assoc();

                    ?>

                    <form role="form" id="guardar-registro" name="guardar-registro" method="post" action="ediciones_registro.php" class="user">

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Documento</label>
                                <input type="text" class="form-control form-control-user" id="dni" name="dni" placeholder="DNI / PTP" value="<?php echo $empleados['dni'];?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Nombres</label>
                                <input type="text" class="form-control form-control-user" id="nombres" name="nombres" placeholder="Nombres" value="<?php echo $empleados['nombres'];?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_pa" name="apellido_pa" placeholder="Apellido Paterno" value="<?php echo $empleados['apellido_pa'];?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Apellido Materno</label>
                                <input type="text" class="form-control form-control-user" id="apellido_ma" name="apellido_ma" placeholder="Apellido Materno" value="<?php echo $empleados['apellido_ma'];?>" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">

						    <div class="col-sm-6">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control form-control-user" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $empleados['fecha_ingreso'];?>" required>
                            </div>

                            <div class="col-sm-6">
                            <label for="">Razon Social</label>
                            <select class="form-control" id="razon_social" name="razon_social" required>
                                    <option value="<?php echo $empleados['razon_social'];?>"><?php echo $empleados['razon_social'];?></option>
                                <?
                                $co = mysqli_connect("localhost", "root", "root", "control_acceso");
                                $consulta = "SELECT razon_social FROM razon_social";
                                $query = mysqli_query($co,$consulta);
                                while ($array = mysqli_fetch_array($query)){
                                    ?>
                                    
                                    <option value = "<? echo $array['razon_social'] ?>"><? echo $array['razon_social'] ?></option>
                                    <?
                                }
                                ?>
							    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Puesto</label>
                                <select class="form-control" id="puesto" name="puesto" required>
                                    <option value = "<?php echo $empleados['puesto'];?>"><?php echo $empleados['puesto'];?></option>
                                    <?
                                    $puesto_array = "SELECT puesto FROM puesto";
                                    $query_array = mysqli_query($co,$puesto_array);
                                    while ($array_puesto = mysqli_fetch_array($query_array)){

                                        ?>
                                        
                                        <option value = "<? echo $array_puesto['puesto'] ?>"><? echo $array_puesto['puesto'] ?></option>

                                        <?php
                                    }
                                    ?>

                                 
                                </select>
                            </div>

                            <div class="col-sm-6">

                                <label for="">Centro</label>
                                
                                <select class="form-control" id="centro" name="centro" required>
							        <option value = "<?php echo $empleados['centro'];?>"><?php echo $empleados['centro'];?></option>

                                    <?
                                    $centro_arr = "SELECT centro FROM centro";
                                    $query_centro = mysqli_query($co,$centro_arr);
                                    while ($array_centro = mysqli_fetch_array($query_centro) ) {
                                        ?>
                                        <option value = "<? echo $array_centro['centro'] ?>"><? echo $array_centro['centro'] ?></option>
                                        <?
                                    }
                                    ?>

                                    
                                    
                                </select>

                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <label for="">Campaña</label>

                                <select class="form-control" id="campana" name="campana" required>
								    <option value = "<?php echo $empleados['campana'];?>"><?php echo $empleados['campana'];?></option>
                                    <?
                                    $camp_arr = "SELECT campaña FROM campaña";
                                    $query_camp = mysqli_query($co,$camp_arr);
                                    while ($array_camp = mysqli_fetch_array($query_camp) ) {
                                        ?>
                                        <option value = "<? echo $array_camp['campaña'] ?>"><? echo $array_camp['campaña'] ?></option>
                                        <?
                                    }
                                    ?>

                                </select>

                            </div>

							<div class="col-sm-6 mb-3 mb-sm-0">

                             <label for="">Condicion</label>
                                
                             <select class="form-control" id="condicion" name="condicion" required>
							        <option value = "<?php echo $empleados['condicion'];?>"><?php echo $empleados['condicion'];?></option>
                                    <option value = "Full Time">Full Time</option>
                                    <option value = "Part Time">Part Time</option>
                             </select>

                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-6 mb-3 mb-sm-0">

                               <label for="">Jefe Inmediato</label>
                               <input type="text" class="form-control form-control-user" id="jefe_inmediato" name="jefe_inmediato" placeholder="Jefe Inmediato" value="<?php echo $empleados['centro'];?>" required>

                           </div>

                           <div class="col-sm-6">
						        <label for="">Modalidad</label>
                                
								<select class="form-control" id="modalidad" name="modalidad" required>
									<option value = "<?php echo $empleados['modalidad'];?>"><?php echo $empleados['modalidad'];?></option>
                                    
									<option value = "PRESENCIAL">PRESENCIAL</option>
									<option value = "REMOTO">REMOTO</option>
                                    <option value = "MIXTA">MIXTA</option>
								</select>

                           </div>
                        </div>

                        <div class="form-group row">
                           
                            <label for="">Estado</label>
                            <select class="form-control" id="estado" name="estado" required> 
                                 <option value = "<?php echo $empleados['estado'];?>"><?php echo $empleados['estado'];?></option>
                                 <option value = "ACTIVO">ACTIVO</option>
                                 <option value = "INACTIVO">INACTIVO</option>
                            </select>
                           
                        </div>

                        <div>
                            <input type="hidden" name="registrar" value="actualizar">
                            <input type="hidden" name="empleados_id" value="<?php echo $id ?>">
                            <button type="submit" href="lista_emp_admin.php" class="btn btn-primary btn-user btn-block">Guardar cambios</button>
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