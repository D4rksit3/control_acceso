<?php

$conexion=mysqli_connect("localhost", "root", "root", "mapeo_mdy");
$nombres = $_POST['nombres'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$documento = $_POST['documento'];
$celular = $_POST['celular'];
$ip = $_POST['ip'];
$sistema_operativo = $_POST['sistema_operativo'];
$campaña = $_POST['campaña'];
$sub_campaña = $_POST['sub_campaña'];
$cargo = $_POST['cargo'];
$fecha = $_POST['fecha'];
$vpn = $_POST['vpn'];
$tecnico = $_POST['tecnico'];
$registros_id = $_POST['registros_id'];

if($_POST['registrar'] == 'nuevo') {

  

    try {
        
        $stmt = $conexion -> prepare("INSERT INTO registros (ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssssssssssss", $ip, $sistema_operativo, $nombres, $apellido_paterno, $apellido_materno, $documento, $celular, $campaña, $sub_campaña, $cargo, $vpn, $fecha, $tecnico);
        $stmt -> execute();
        $registros_id = $stmt->insert_id;
        if($registros_id > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'registro_id' => $registros_id
            );
            
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt -> close();
        $conexion -> close();
    } catch (Exception $e) {
        echo "Error:" . $e->getMessage();
    }

    die(json_encode($respuesta));
    
}

if($_POST['registrar'] == 'actualizar') {
    try {
        $stmt = $conexion->prepare('UPDATE registros SET ip = ?, sistema_operativo = ?, nombres = ?, apellido_pa = ?, apellido_ma = ?, dni = ?, telefono = ?, campaña = ?, sub_campaña = ?, cargo = ?, vpn = ?, fecha = ?, tecnico = ? WHERE registros_id = ?');
        $stmt->bind_param("sssssssssssssi", $ip, $sistema_operativo, $nombres, $apellido_paterno, $apellido_materno, $documento, $celular, $campaña, $sub_campaña, $cargo, $vpn, $fecha, $tecnico, $registros_id);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conexion->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

        die(json_encode($respuesta));

}

if($_POST['registrar'] == 'eliminar') {
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conexion->prepare('DELETE FROM registros WHERE registros_id = ?');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

?>