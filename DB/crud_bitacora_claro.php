<?php

  include_once 'conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();

  //Recepcion de los datos enviados mediante el metodo POST desde mi archivo de js
  $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
  $hora = (isset($_POST['hora'])) ? $_POST['hora'] : '';
  $remedy = (isset($_POST['remedy'])) ? $_POST['remedy'] : '';
  $falla = (isset($_POST['falla'])) ? $_POST['falla'] : '';
  $coordinador = (isset($_POST['coordinador'])) ? $_POST['coordinador'] : '';
  $gestion = (isset($_POST['gestion'])) ? $_POST['gestion'] : '';
  $campaña = (isset($_POST['campaña'])) ? $_POST['campaña'] : '';
  $actividad = (isset($_POST['actividad'])) ? $_POST['actividad'] : '';
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
  $asesor = (isset($_POST['asesor'])) ? $_POST['asesor'] : '';
  $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
  $tecnico = (isset($_POST['tecnico'])) ? $_POST['tecnico'] : '';
  $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
  $bitacora_claro_id = (isset($_POST['bitacora_claro_id'])) ? $_POST['bitacora_claro_id'] : '';

  switch($opcion) {
    case 1://ALTA
      $sql = " INSERT INTO bitacora_claro (fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico) VALUES ('$fecha', '$hora', '$remedy', '$falla', '$coordinador', '$gestion', '$campaña', '$actividad', '$descripcion', '$asesor', '$estado', '$tecnico') ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
    
      $sql = " SELECT bitacora_claro_id, fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico FROM bitacora_claro ORDER BY bitacora_claro_id DESC LIMIT 1 ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
      $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    break;

    case 2://EDICION
      $sql = " UPDATE bitacora_claro SET fecha = '$fecha', hora = '$hora', remedy = '$remedy', falla = '$falla', coordinador = '$coordinador', gestion = '$gestion', campaña = '$campaña', actividad = '$actividad', descripcion = '$descripcion', asesor = '$asesor', estado = '$estado', tecnico = '$tecnico' WHERE bitacora_claro_id = '$bitacora_claro_id' ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
    
      $sql = " SELECT bitacora_claro_id, fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico FROM bitacora_claro WHERE bitacora_claro_id = '$bitacora_claro_id' ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
      $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    break;

    case 3://ELIMINACION
      $sql = "DELETE FROM bitacora_claro WHERE bitacora_claro_id='$bitacora_claro_id' ";		
      $resultado = $conexion->prepare($sql);
      $resultado->execute();                           
    break;        
  }

  print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a js
  $conexion = NULL;

?>