<?php require_once "vistas/header_admin.php" ?>
<?php include_once 'DB/funciones.php'; ?>

<head>



</head>
<body>
    
    <div class="container">
        <h1> Carga Masiva </h1>

        <!-- Interactuar excel con php/mysql-->
<a href="dataEmpleados.csv">Descargar Formato</a>
            <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data">    
                <div class="form-group">
                    <label for="exampleFormControlFile1">Se requiere llenar el formato correctamente para realizar las creaciones sin errores.</label>
                    <input type="file" name="dataCliente" id="file-input"  class="form-control-file" >
    
                </div>
                    <input type="submit" name="subir" class="btn btn-success" value="Subir Excel"/>
                    
                    <br>
            </form>

            <?php
          
            ?>
       
            
       


    </div>
</body>
<?php require_once "vistas/footer.php" ?>