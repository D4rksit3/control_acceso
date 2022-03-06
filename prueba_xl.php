<main>
<div class="container py-4">
<header class="pb-3 mb-4 border-bottom"> <a href="/" class="d-flex align-items-center text-dark text-decoration-none"> <span class="fs-4">Importar archivo Excel a MySQL con PHPSpreadsheet</span> </a> </header>
<div class="row align-items-md-stretch">
<div class="col-md-6">
<form class="row g-3" action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
<div class="col-md-9">
<input class="form-control form-control-sm" id="file" name="file" type="file" accept=".xls,.xlsx">
</div>
<div class="col-md-3">
<button type="submit" id="submit" name="importar" class="btn btn-primary btn-sm mb-3">Importar</button>
</div>
</form>
</div>
</div>
<div class="row align-items-md-stretch">
<div class="col-md-6">
<div id="respuesta" class="alert alert-<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
<?php if(!empty($message)) { echo $message; } ?>
</div>
</div>
</div>
<div class="row align-items-md-stretch">
<div class="col-md-12">
<?php
$sqlSelect = "SELECT * FROM tbl_productos";
$result = $db->select($sqlSelect);
if (! empty($result)) {
?>
<table class="table table-sm table-striped">
<thead>
<tr>
<th scope="col">Producto</th>
<th scope="col">Descripción</th>
</tr>
</thead>
<tbody>
<?php
foreach ($result as $row) {
?>
<tr>
<td scope="row"><?php echo $row['producto']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php
}
?>
</div>
</div>

<!--End contenidos-->
<footer class="pt-3 mt-4 text-muted border-top"> &copy; <?=date("Y");?> </footer>
</div>
</main>
