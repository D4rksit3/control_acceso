<?php require_once "vistas/header_admin.php" ?>


<div class="container">
    <h1>Descargar Reportes por Fecha</h1>
    <form class="form-inline" action="http://198.27.86.147:90/control_acceso/down_excel.php" method="POST">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Ingresa fecha 05/03/22" name="fecha1">

        <label class="sr-only" for="inlineFormInputGroupUsername2">Ingresa fecha 05/03/22</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Ingresa fecha 06/03/22" name="fecha2">
        </div>

        

        <button type="submit" class="btn btn-primary mb-2" name="generar_reporte">Descargar Reporte</button>
    </form>
</div>











<!-- Fin de contenido principal -->

<?php require_once "vistas/footer.php" ?>