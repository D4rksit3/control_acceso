<?php

  include_once 'conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();

  //Recepcion de los datos enviados mediante el metodo POST desde mi archivo de js
  $ip = (isset($_POST['ip'])) ? $_POST['ip'] : '';
  $sistema_operativo = (isset($_POST['sistema_operativo'])) ? $_POST['sistema_operativo'] : '';
  $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
  $apellido_pa = (isset($_POST['apellido_pa'])) ? $_POST['apellido_pa'] : '';
  $apellido_ma = (isset($_POST['apellido_ma'])) ? $_POST['apellido_ma'] : '';
  $dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
  $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
  $campaña = (isset($_POST['campaña'])) ? $_POST['campaña'] : '';
  $sub_campaña = (isset($_POST['sub_campaña'])) ? $_POST['sub_campaña'] : '';
  $cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : '';
  $vpn = (isset($_POST['vpn'])) ? $_POST['vpn'] : '';
  $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
  $tecnico = (isset($_POST['tecnico'])) ? $_POST['tecnico'] : '';
  $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
  $registros_id = (isset($_POST['registros_id'])) ? $_POST['registros_id'] : '';

  switch($opcion) {
    case 1://ALTA

      $sql = " INSERT INTO registros (ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico) VALUES ('$ip', '$sistema_operativo', '$nombres', '$apellido_pa', '$apellido_ma', '$dni', '$telefono', '$campaña', '$sub_campaña', '$cargo', '$vpn', '$fecha', '$tecnico') ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
    
      $sql = " SELECT registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico FROM registros ORDER BY registros_id DESC LIMIT 1 ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
      $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    break;

    case 2://EDICION
      $sql = " UPDATE registros SET ip = '$ip', sistema_operativo = '$sistema_operativo', nombres = '$nombres', apellido_pa = '$apellido_pa', apellido_ma = '$apellido_ma', dni = '$dni', telefono = '$telefono', campaña = '$campaña', sub_campaña = '$sub_campaña', cargo = '$cargo', vpn = '$vpn', fecha = '$fecha', tecnico = '$tecnico' WHERE registros_id = '$registros_id' ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
    
      $sql = " SELECT registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico FROM registros WHERE registros_id = '$registros_id' ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
      $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    break;

    case 3://ELIMINACION
      $sql = "DELETE FROM registros WHERE registros_id='$registros_id' ";		
      $resultado = $conexion->prepare($sql);
      $resultado->execute();                           
    break;        
  }

  print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a js
  $conexion = NULL;

?>