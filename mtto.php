<?php require_once "vistas/header_admin.php" ?>

<style>

    .font-black {
      color: black
    }

    .margin-bottom-5 {
        margin-bottom: 5px;
    }

    .font-size-15 {
        font-size: 15px
    }

</style>

 <?php

    include_once 'DB/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    //Consulta Razon Social
    $sql_razonSocial = " SELECT * FROM razon_social";
    $resultado = $conexion->prepare($sql_razonSocial);
    $resultado->execute();
    $reportes=$resultado->fetchAll(PDO::FETCH_ASSOC); 

    //Consulta Puestos
    $sqlPuesto = "SELECT * FROM puesto";
    $resultadoPuesto = $conexion->prepare($sqlPuesto);
    $resultadoPuesto->execute();
    $puesto = $resultadoPuesto->fetchAll(PDO::FETCH_ASSOC);

    //Consultas Campañas

    $sqlCampañas = "SELECT * FROM campaña";
    $resultadoCamp = $conexion->prepare($sqlCampañas);
    $resultadoCamp ->execute();
    $campaña = $resultadoCamp->fetchAll(PDO::FETCH_ASSOC);

    //borrar razon social





?> 

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Razon Social</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Puesto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Campaña</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">




  
          
        <div class="container" style="">

        <h2>Razon Social</h2>

        <a href="agr_rsocial.php" class="btn btn-dark">Agregar Razon Social</a>
        
          
        <div class="table-responsive">
        <table class="table table-striped table-hover">
        <tr>
          <th>ID</th>
          <th>Razon Social</th>
          <th>Editar</th>
        </tr>

        <?php
          foreach($reportes as $reportes){
        ?>
       

        <tr>
          <td><?php echo $reportes['razon_id'] ?></td>
          <td><?php echo $reportes['razon_social'] ?></td>
          <td>
          <a href="edit_rsocial.php?id=<?php echo $reportes['razon_id']; ?>" class="btn btn-warning btn-circle btn-sm" ><i class="">Editar</i></a>
          <a href="#" data-id="<?php echo $reportes['razon_id']; ?>" data-tipo="registro" class="btn btn-danger btn-circle btn-sm borrar_registro" ><i class="fas fa-trash"></i></a>
        </td>
          <?php 
        } ?>      
          

        </tr>
        

</table>
</div>

</div>
        
       








        </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  
          
          <div class="container" style="">
          <h2>Puesto</h2>
          <a href="agr_puesto.php" class="btn btn-dark">Agregar Puesto</a>
         
          <div class="table-responsive">
        <table class="table table-striped table-hover">
        <tr>
          <th>ID</th>
          <th>Puesto</th>
          <th>Editar</th>
        </tr>

        <?php
          foreach($puesto as $puesto){
        ?>
       

        <tr>
          <td><?php echo $puesto['puesto_id'] ?></td>
          <td><?php echo $puesto['puesto'] ?></td>
          <td>
          <a href="edit_puesto.php?id=<?php echo $puesto['puesto_id']; ?>" class="btn btn-warning btn-circle btn-sm" ><i class="">Editar</i></a>
          <a href="#" data-id="<?php echo $puesto['puesto_id']; ?>" data-tipo="registro" class="btn btn-danger btn-circle btn-sm borrar_registro" ><i class="fas fa-trash"></i></a>
        </td>
          <?php } ?>      
         

        </tr>
        

</table>
</div>
        </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      
                <div class="container" style="">
                <h2>Campaña</h2>
                <a href="agr_campaña.php" class="btn btn-dark">Agregar Campaña</a>

                
          <div class="table-responsive">
        <table class="table table-striped table-hover">
        <tr>
          <th>ID</th>
          <th>Campaña</th>
          <th>Editar</th>
        </tr>

        <?php
          foreach($campaña as $campaña){
        ?>
       

        <tr>
          <td><?php echo $campaña['campaña_id'] ?></td>
          <td><?php echo $campaña['campaña'] ?></td>
          <td>
          <a href="edit_campaña.php?id=<?php echo $campaña['campaña_id']; ?>" class="btn btn-warning btn-circle btn-sm" ><i class="">Editar</i></a>
          <a href="#" data-id="<?php echo $campaña['campaña_id']; ?>" data-tipo="registro" class="btn btn-danger btn-circle btn-sm borrar_registro" ><i class="fas fa-trash"></i></a>
        </td>
          <?php } ?>      
          

        </tr>
        

</table>
</div>





            </div>




  </div>
</div>











<?php require_once "vistas/footer.php" ?>