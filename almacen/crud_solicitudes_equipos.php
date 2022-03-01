<?php

  include_once 'conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();

  //Recepcion de los datos enviados mediante el metodo POST desde mi archivo de js
  $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
  $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
  $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
  $apellido_pa = (isset($_POST['apellido_pa'])) ? $_POST['apellido_pa'] : '';
  $apellido_ma = (isset($_POST['apellido_ma'])) ? $_POST['apellido_ma'] : '';
  $dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
  $celular = (isset($_POST['celular'])) ? $_POST['celular'] : '';
  $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
  $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
  $referencia = (isset($_POST['referencia'])) ? $_POST['referencia'] : '';
  $razon_social = (isset($_POST['razon_social'])) ? $_POST['razon_social'] : '';
  $segmento = (isset($_POST['segmento'])) ? $_POST['segmento'] : '';
  $campaña = (isset($_POST['campaña'])) ? $_POST['campaña'] : '';
  $sub_campaña = (isset($_POST['sub_campaña'])) ? $_POST['sub_campaña'] : '';
  $sede = (isset($_POST['sede'])) ? $_POST['sede'] : '';
  $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
  $equipo_prestamo = (isset($_POST['equipo_prestamo'])) ? $_POST['equipo_prestamo'] : '';
  $solicitante = (isset($_POST['solicitante'])) ? $_POST['solicitante'] : '';
  $solicitudes_equipos_id = (isset($_POST['solicitudes_equipos_id'])) ? $_POST['solicitudes_equipos_id'] : '';

  switch($opcion) {
    case 1://ALTA
      $sql = " INSERT INTO solicitudes_equipos (estado, fecha, nombre, apellido_pa, apellido_ma, dni, celular, telefono, direccion, referencia, razon_social, segmento, campaña, sub_campaña, sede, puesto, equipo_prestamo, solicitante) VALUES ('$estado', '$fecha', '$nombre', '$apellido_pa', '$apellido_ma', '$dni', '$celular', '$telefono', '$direccion', '$referencia', '$razon_social', '$segmento', '$campaña, '$sub_campaña', '$sede', '$puesto', '$equipo_prestamo', '$solicitante') ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
    
      $sql = " SELECT solicitudes_equipos_id, estado, fecha, nombre, apellido_pa, apellido_ma, dni, celular, telefono, direccion, referencia, razon_social, segmento, campaña, sub_campaña, sede, puesto, equipo_prestamo, solicitante FROM solicitudes_equipos ORDER BY solicitudes_equipos_id DESC LIMIT 1 ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
      $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    break;

    case 2://EDICION
      $sql = " UPDATE solicitudes_equipos SET estado = '$estado', fecha = '$fecha', nombre = '$nombre', apellido_pa = '$apellido_pa', apellido_ma = '$apellido_ma', dni = '$dni', celular = '$celular', telefono = '$telefono', direccion = '$direccion', referencia = '$referencia', razon_social = '$razon_social', segmento = '$segmento', campaña = '$campaña', sub_campaña = '$sub_campaña', sede = '$sede', puesto = '$puesto', equipo_prestamo = '$equipo_prestamo', solicitante = '$solicitante' WHERE solicitudes_equipos_id = '$solicitudes_equipos_id' ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
    
      $sql = " SELECT solicitudes_equipos_id, estado, fecha, nombre, apellido_pa, apellido_ma, dni, celular, telefono, direccion, referencia, razon_social, segmento, campaña, sub_campaña, sede, puesto, equipo_prestamo, solicitante FROM solicitudes_equipos WHERE solicitudes_equipos_id = '$solicitudes_equipos_id' ";
      $resultado = $conexion->prepare($sql);
      $resultado->execute();
      $data = $resultado->fetchALL(PDO::FETCH_ASSOC);
    break;

    case 3://ELIMINACION
      $sql = "DELETE FROM solicitudes_equipos WHERE solicitudes_equipos_id='$solicitudes_equipos_id' ";		
      $resultado = $conexion->prepare($sql);
      $resultado->execute();                           
    break;        
  }

  print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a js
  $conexion = NULL;

?>