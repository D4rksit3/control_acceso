<?php

$conexion=mysqli_connect("localhost", "root", "root", "control_acceso");

$boton = $_POST['boton'];
$btn_salida = $_POST['salida'];

?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<!-- <style>
body {
    margin: 300px;
    font-family: var(--bs-body-font-family);
    font-size: var(--bs-body-font-size);
    font-weight: var(--bs-body-font-weight);
    line-height: var(--bs-body-line-height);
    color: var(--bs-body-color);
    text-align: center;
    background-color: var(--bs-body-bg);
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
}

</style> -->

</head>
<body >

<div style="margin:300px;text-align:center;" class="noexiste" >
<div class="alert alert-danger" role="alert">
	<h1>DNI no existente</h1>

<h1>Contactate con el Área de Desarrollo Humano</h1>
<h2>dh_colonial@mdycontactcenter.com </h2>
<h2>dh_lince@mdycontactcenter.com</h2>

<a href='http://198.27.86.147:90'></a>
<a class="btn btn-warning" href='http://198.27.86.147:90'>Regresar</a> </div>
</div>
</body>
<?

if($btn_salida){
				$dni = $_POST["palabra"];
	   			$hora = date('d-m-Y h:i:s a', time());
				$consulta_mysql= "SELECT * FROM empleados WHERE dni='$dni';";
       
       			$ip_add = $_SERVER['REMOTE_ADDR'];
				$update = "UPDATE reportes SET fin='$hora' WHERE dni='$dni' and fin='fin';";
				$resultado =mysqli_query($conexion,$update);
				if ($resultado == $resultado){
					
					mysqli_query($conexion,$resultado);

				};	
				$result = mysqli_query($conexion,$consulta_mysql);
				while($registro = mysqli_fetch_array($result)) 
				{
					$nombre = $registro['nombres'];
        			$apellido = $registro['apellido_pa']." ".$registro['apellido_ma'];
					$dato_completo = $nombre." ".$apellido;
					$status = $registro['estado'];
					$puesto=$registro['puesto'];
					$dni = $registro['dni'];
					$campaña = $registro['campana'];
					$centro = $registro['centro'];
					if ($status == "ACTIVO"){
						$status = "Activo";
						$color = "verde";
		
					}else{
						$status = "Inactivo";
						$color = "rojo";
					};
					if ($color == 'verde'){
						?>
						<head>
							<title>Control Acceso MDY PR</title>
							<meta http-equiv="content-type" content="text/html; charset=utf-8" />
							<meta name="description" content="" />
							<meta name="keywords" content="" />
							<script src="style_acceso/jquery.min.js"></script>
							<script src="style_acceso/skel.min.js"></script>
							<script src="style_acceso/init.js"></script>
							<noscript>
							<link rel="stylesheet" href="style_index/skel.css" />
							<link rel="stylesheet" href="style_index/style.css" />
							<link rel="stylesheet" href="style_index/style-desktop.css" />
							<link rel="stylesheet" href="http://158.69.241.104:90/Acceso/content/css/style-noscript.css" />
							</noscript>
							<script>
							function redireccionar() {
								setTimeout("location.href='http://198.27.86.147:90'", 5000);
							}
							</script>
							<style>
							
							.noexiste {
								display: none;
								visibility:hidden
							} 
													
							strong, b {
								font-weight: 50;
								color: #484848;
							}
							h2 {
    font-size: 1.6em;
    letter-spacing: -0.015em;
}
						</style>
						</head>
						<body style="background:#009F3C">
							<div id="wrapper" onLoad="redireccionar()">
									
									<!-- Nav -->
									<nav id="nav">
										<div id='ingresohora' style='    font-size: 24px;' ><?php echo $hora ?></div>

										<div id='ingresoip' ><?php echo $ip_add ?></div>
										<div id='equipo' style='position: absolute;
                left: 3%;
                top: 5%;
                margin: 0;
                
                width: 120px;
                color: #CCCCCC;
                
                font-size: 30px;
                text-align: left;
                height: 50px;'>Salida</div>

										<div id='saredi'>
											<b>Nº Empleado:</b><a href="http://198.27.86.147:90/"> <!-- <input id='sare' type="submit" value="Marcar" name="boton">--> </a> 
										</div>
										
										
									</nav>
									<div id="main" >
										<!-- Me -->
										<article  id="me" class="panel">
											<header id='resultado' >
											
											<h2 ><?=$dato_completo?></h2>
											<h2>Puesto:<b> <?=$puesto?></b></h2>
											<h2>Estatus:<b> <?=$status?></b></h2>
											<h2>DNI:<b> <?=$dni?></b></h2>
											<h2>Centro:<b> <?=$centro?></b></h2>
											<h2>Campaña:<p><b> <?=$campaña?></p></b></h2>
											<div id="activo">Activo</div>
											</header>
											<a href="http://198.27.86.147:90/control_acceso/" class="jumplink pic">
												<span class="arrow icon fa-chevron-right"><span>See my work</span></span>

												<img id='my_image' src="img_index/user.png" alt="" style="widht:10%;"/>
											</a>
										</article>
									</div>
							
									<!-- Footer -->
									<div id="footer">
										<ul class="copyright">
											<li></li><li>Design: <a href="http://mdybpo.com/">&copy; MDY BPO.</a></li>
										</ul>
									</div>
							
								</div>
							</body>
												

						<?php
					}else{
						?>
						<head>
							<title>Control Acceso MDY PR</title>
							<meta http-equiv="content-type" content="text/html; charset=utf-8" />
							<meta name="description" content="" />
							<meta name="keywords" content="" />
							<script src="style_acceso/jquery.min.js"></script>
							<script src="style_acceso/skel.min.js"></script>
							<script src="style_acceso/init.js"></script>
							<noscript>
							<link rel="stylesheet" href="style_index/skel.css" />
							<link rel="stylesheet" href="style_index/style.css" />
							<link rel="stylesheet" href="style_index/style-desktop.css" />
							<link rel="stylesheet" href="http://158.69.241.104:90/Acceso/content/css/style-noscript.css" />
							</noscript>
							<style>
							.noexiste {
								display: none;
								visibility:hidden
							} 
						
							strong, b {
								font-weight: 50;
								color: #484848;
							}h2 {
								font-size: 1.6em;
								letter-spacing: -0.015em;
							}

						</style>
						</head>
						<body style="background:#DF0024">
							<!-- Wrapper-->
							<div id="wrapper">
								
								<!-- Nav -->
							<nav id="nav">
							<div id='ingresohora' ><?php echo $hora ?></div>

							<div id='ingresoip' ><?php echo $ip_add ?></div>
							<div id='equipo' style='position: absolute;
                left: 3%;
                top: 5%;
                margin: 0;
                
                width: 120px;
                color: #CCCCCC;
                
                font-size: 30px;
                text-align: left;
                height: 50px;'>Salida</div>

							<div id='saredi'>
							<b>Nº Empleado:</b><a href="http://198.27.86.147:90/"> <!-- <input id='sare' type="submit" value="Marcar" name="boton">--> </a> 
							</div>
									
							</nav>

								<!-- Main -->
							<div id="main" style="display:flex;flex-direction: column">
									<!-- Me -->
							<article id="me" class="panel">
								<header id='resultado' >
										
									<h2 ><?=$dato_completo?></h2>
									<h3>Puesto:<b> <?=$puesto?></b></h3>
									<h3>Estatus:<b> <?=$status?></b></h3>
									<h3>DNI:<b> <?=$dni?></b></h3>
									<h3>Centro:<b> <?=$centro?></b></h3>
									<h3>Campaña:<p><b> <?=$campaña?></p></b></h3>
									<div id="inactivo">Inactivo</div>
								</header>
								<a href="http://198.27.86.147:90/control_acceso/" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img id='my_image' src="img_index/user.png" alt="" style="widht:28%;"/>
								</a>
							</article>
							</div>
						
								<!-- Footer -->
								<div id="footer">
									<ul class="copyright">
										<li></li><li>Design: <a href="http://mdybpo.com/">&copy; MDY BPO.</a></li>
									</ul>
								</div>
						
							</div>
						</body>





						<?php
					}




















				};


};





if($boton){   
   ?>
       <?php

       $dni = $_POST["palabra"];
		
	   $hora = date('d-m-Y h:i:s a', time());
		
	   
		
		
	   /* $update = "UPDATE reportes SET fin='$hora' WHERE dni='$dni' AND fin IS NULL";
		mysqli_query($conexion,$update);
		mysqli_close($conexion) */
	   /* $null = "SELECT fin FROM reportes WHERE dni='$dni' AND fin IS NULL OR fin='' and reportes_id = reportes_id"; 
	   $resultado_null = mysqli_query($conexion,$null);
	 	if ($resultado_null == false ){
		die(mysqli_error($conexion));
		/* $null = "SELECT * FROM reportes WHERE dni='$dni' AND fin IS NULL";  
			

		}; 
		/* echo $resultado_null; 
	   while($row= mysqli_fetch_array($resultado_null)) 
       {
			echo "prueba".[0];
	   };  */

	  	
		   

	  /* if ($null == NULL){
		   $update = "UPDATE reportes SET fin='$hora' WHERE dni='$dni' AND fin IS NULL";
		   $resultado =mysqli_query($conexion,$update);
		   if ($resultado == false){
			   die(mysqli_error($conexion));
			   echo "eres un exito doc";
			   };
	   };   */
 
       $consulta_mysql= "SELECT * FROM empleados WHERE dni='$dni';";
       
       $ip_add = $_SERVER['REMOTE_ADDR'];

       /* $puesto = $row['puesto']; 
	    $status = $row['activo']; 
	    $centro = $row['centro'];
	    $campaña = $row['campana']; */
       $result = mysqli_query($conexion,$consulta_mysql);
       while($registro = mysqli_fetch_array($result)) 
       {
        $nombre = $registro['nombres'];
        $apellido = $registro['apellido_pa']." ".$registro['apellido_ma'];
		$dato_completo = $nombre." ".$apellido;
        $status = $registro['estado'];
		$puesto=$registro['puesto'];
		$dni = $registro['dni'];
		$campaña = $registro['campana'];
		$centro = $registro['centro'];
        if ($status == "ACTIVO"){
            $status = "Activo";
            $color = "verde";
        }else{
            $status = "Inactivo";
            $color = "rojo";
        }
		/* $select = "SELECT fin FROM reportes WHERE dni='$dni' and fin='cero';";
		$nulo = mysqli_query($conexion,$select);	
		while($registro = mysqli_fetch_array($nulo)) {
			$id = $registro['fin'];
			echo $id;
			
			if ($id == 'cero'){ */
				
				

		/* 	} 
		
		
		}; 
 */
		$POST_data = "INSERT INTO reportes (nombres,puesto,estado,dni,centro,inicio) VALUES ('$dato_completo','$puesto','$status','$dni','$centro','$hora');";
		$result = mysqli_query($conexion,$POST_data);
		
		



		/* if ($result == false){
			die(mysqli_error($conexion));
			/* $null = "SELECT * FROM reportes WHERE dni='$dni' AND fin IS NULL";  
				

		};
		 */

		
		


		

			
		/* $conexion -> prepare($POST_data); */



           ?> 
        <?php
        if ($color == 'verde'){
			
			
			
			
			
            ?>
        


           <head>
		<title>Control Acceso MDY PR</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script> -->

		<script src="style_acceso/jquery.min.js"></script>
		<script src="style_acceso/skel.min.js"></script>
		<script src="style_acceso/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="style_index/skel.css" />
			<link rel="stylesheet" href="style_index/style.css" />
			<link rel="stylesheet" href="style_index/style-desktop.css" />
			<link rel="stylesheet" href="http://158.69.241.104:90/Acceso/content/css/style-noscript.css" />
		</noscript>
		<style>
									.noexiste {
								display: none;
								visibility:hidden
							}
							strong, b {
								font-weight: 50;
								color: #484848;
							}
							h2 {
    font-size: 1.6em;
    letter-spacing: -0.015em;
}</style>
       </head>
       <body style="background:#009F3C">
       <div id="wrapper" >
			
			<!-- Nav -->
			<nav id="nav">
				<div id='ingresohora' ><?php echo $hora ?></div>

				<div id='ingresoip' ><?php echo $ip_add ?></div>
				<div id='equipo' style='position: absolute;
                left: 3%;
                top: 5%;
                margin: 0;
                
                width: 120px;
                color: #CCCCCC;
                
                font-size: 30px;
                text-align: left;
                height: 50px;'>Entrada</div>

				<div id='saredi'>
					<b>Nº Empleado:</b><a href="http://198.27.86.147:90/"> <!-- <input id='sare' type="submit" value="Marcar" name="boton"> --> </a>
				</div>
				
				
			</nav>
            <div id="main" >
				<!-- Me -->
				<article  id="me" class="panel">
					<header id='resultado' >
                    
                    <h2 ><?=$dato_completo?></h2>
                    <h2>Puesto:<b> <?=$puesto?></b></h2>
                    <h2>Estatus:<b> <?=$status?></b></h2>
                    <h2>DNI:<b> <?=$dni?></b></h2>
                    <h2>Centro:<b> <?=$centro?></b></h2>
                    <h2>Campaña:<p><b> <?=$campaña?></p></b></h2>
                    <div id="activo">Activo</div>
					</header>
					<a href="http://198.27.86.147:90/control_acceso/" class="jumplink pic">
						<span class="arrow icon fa-chevron-right"><span>See my work</span></span>

						<img id='my_image' src="img_index/user.png" alt="" style="widht:28%;"/>
					</a>
				</article>
			</div>
	
			<!-- Footer -->
			<div id="footer">
				<ul class="copyright">
					<li></li><li>Design: <a href="http://mdybpo.com/">&copy; MDY BPO.</a></li>
				</ul>
			</div>
	
		</div>
	</body>







            <?php 
            }elseif ($color == 'rojo'){
				
				
				?>
              <head>
		<title>Control Acceso MDY PR</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script> -->

		<script src="http://158.69.241.104:90/Acceso/content/js/jquery.min.js"></script>
		<script src="http://158.69.241.104:90/Acceso/content/js/skel.min.js"></script>
		<script src="http://158.69.241.104:90/Acceso/content/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="style_index/skel.css" />
			<link rel="stylesheet" href="style_index/style.css" />
			<link rel="stylesheet" href="style_index/style-desktop.css" />
			<link rel="stylesheet" href="http://158.69.241.104:90/Acceso/content/css/style-noscript.css" />
		</noscript>
		<style>
									.noexiste {
								display: none;
								visibility:hidden
							}
							strong, b {
								font-weight: 50;
								color: #484848;
							}
							h2 {
    font-size: 1.6em;
    letter-spacing: -0.015em;
}</style>
		
       </head>
				
			  <body style="background:#DF0024">
		<!-- Wrapper-->
		<div id="wrapper">
			
			<!-- Nav -->
			<nav id="nav">
					<div id='ingresohora' ><?php echo $hora ?></div>

					<div id='ingresoip' ><?php echo $ip_add ?></div>
					<div id='equipo' style='position: absolute;
                left: 3%;
                top: 5%;
                margin: 0;
                
                width: 120px;
                color: #CCCCCC;
                
                font-size: 30px;
                text-align: left;
                height: 50px;'>Entrada</div>

				<div id='saredi'>
					<b>Nº Empleado:</b><a href="http://198.27.86.147:90/"> <!-- <input id='sare' type="submit" value="Marcar" name="boton"> --> </a>
				</div>
				
			</nav>

			<!-- Main -->
			<div id="main" style="display:flex;flex-direction: column">
				<!-- Me -->
				<article id="me" class="panel">
					<header id='resultado' >
					
                    <h2 ><?=$dato_completo?></h2>
                    <h3>Puesto:<b> <?=$puesto?></b></h3>
                    <h3>Estatus:<b> <?=$status?></b></h3>
                    <h3>DNI:<b> <?=$dni?></b></h3>
                    <h3>Centro:<b> <?=$centro?></b></h3>
                    <h3>Campaña:<p><b> <?=$campaña?></p></b></h3>
                    <div id="inactivo">Inactivo</div>
					</header>
					<a href="http://198.27.86.147:90/control_acceso/" class="jumplink pic">
						<span class="arrow icon fa-chevron-right"><span>See my work</span></span>

						<img id='my_image' src="img_index/user.png" alt="" style="widht:28%;"/>
					</a>
				</article>
			</div>
	
			<!-- Footer -->
			<div id="footer">
				<ul class="copyright">
					<li></li><li>Design: <a href="http://mdybpo.com/">&copy; MDY BPO.</a></li>
				</ul>
			</div>
	
		</div>
	</body>


              <?php   
            }?>
	<!--    ▄───▄
			█▀█▀█
			█▄█▄█
			─███──▄▄
			─████▐█─█
			─████───█
			─▀▀▀▀▀▀▀
		 -->
			
			<!-- /* else{
				
			}; *///Fin bucle por status activo / no activo -->
            
           <?php 
       }
	   //fin blucle de busqueda por boton
    ?>
   
    <?php
}else {
	?>
	
<?php
}
	
?>



	
   
    

    <?php
// fin if 
?>

