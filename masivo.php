<?php require_once "vistas/header_admin.php" ?>
<?php include_once 'DB/funciones.php'; ?>

<head>



</head>
<body>
    
    <div class="container">
        <h1> Carga Masiva </h1>

        <!-- Interactuar excel con php/mysql-->

            <form action="validar_excel.php" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">    
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Subir Archivo</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="file" id="file" class="custom-file-input" id="inputGroupFile01" >
                        <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                        
                    </div>
                    
                </div>
                <button type="submit" id="submit" name="import"
                class="btn btn-success">Import</button>
                <br>
            </form>
            
        <div class="exitoso">
        <br>
            <div class="alert alert-success" role="alert">
                
            Se importo correctamente!
            </div>    
        </div>

        <div class="F">
            <div class="alert alert-danger" role="alert">
            Error de importacion!
            </div>

        </div>


    </div>
</body>
<?php require_once "vistas/footer.php" ?>