<?php require_once "vistas/header_admin.php";
$hora = date('d-m-Y h:i:s a', time());
$fecha = date('d/m/y');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="date/jquery.es.js"></script>
    <!-- <script src="bootstrap-datepicker.es.js" charset="UTF-8"></script> -->
</head>
<!-- <body>
    <input id="datepicker" width="276" />
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body> -->


<div class="container">
    <h1>Descargar Reportes por Fecha</h1>
    <form class="form-inline" action="http://198.27.86.147:90/control_acceso/down_excel.php" method="POST">
        <label class="sr-only" for="inlineFormInputName2"></label>
        <div class="input-group mb-2 mr-sm-2">
        <!-- <input type="date" class="form-control form-control-user" id="fecha_ingreso" name="fecha_ingreso" required> -->
        <input type="text"  id="datepicker" value="<? echo $fecha; ?>"  width="276" name="fecha1">
        
     </div>
        <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <input type="text"  id="datepicker2" value="<? echo $fecha; ?>" width="276" name="fecha2">
            </div>
            <!-- <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Ingresa fecha 06/03/22" name="fecha2"> -->
            
    

        </div>

    
        
        <button type="submit" class="btn btn-primary mb-2" name="generar_reporte">Descargar Reporte</button>
    </form>
</div>



<script>


        $('#datepicker').datepicker({
            weekStart: 1,
            format: "dd/mm/yy",
 
            
            
           
            });

        $('#datepicker2').datepicker({
            weekStart: 1,
            format: 'dd/mm/yy',
       
               });



    </script>







<!-- Fin de contenido principal -->

<?php require_once "vistas/footer.php" ?>