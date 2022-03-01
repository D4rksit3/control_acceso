<?php

$conexion=mysqli_connect("localhost", "root", "root", "control_acceso");
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellido_pa = $_POST['apellido_pa'];
$apellido_ma = $_POST['apellido_ma'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$razon_social = $_POST['razon_social'];
$puesto = $_POST['puesto'];
$centro = $_POST['centro'];
$campana = $_POST['campana'];
$condicion = $_POST['condicion'];
$jefe_inmediato = $_POST['jefe_inmediato'];
$modalidad = $_POST['modalidad'];
$estado = $_POST['estado'];
$empleados_id = $_POST['empleados_id'];

if($_POST['registrar'] == 'nuevo') {

  

    try {
        
        $stmt = $conexion -> prepare("INSERT INTO empleados (dni, nombres, apellido_pa, apellido_ma, fecha_ingreso, razon_social, puesto, centro, campana, condicion, jefe_inmediato, modalidad, estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssssssssssss", $dni, $nombres, $apellido_pa, $apellido_ma, $fecha_ingreso, $razon_social, $puesto, $centro, $campana, $condicion, $jefe_inmediato, $modalidad, $estado);
        $stmt -> execute();
        $empleados_id = $stmt->insert_id;
        if($empleados_id > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'empleado_id' => $empleados_id
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
        $stmt = $conexion->prepare('UPDATE empleados SET dni = ? , nombres = ?, apellido_pa = ?, apellido_ma = ?, fecha_ingreso = ?, razon_social = ?, puesto = ?, centro = ?, campana = ?, condicion = ?, jefe_inmediato = ?, modalidad = ?, estado = ? WHERE empleados_id = ?');
        $stmt->bind_param("sssssssssssssi", $dni, $nombres, $apellido_pa, $apellido_ma, $fecha_ingreso, $razon_social, $puesto, $centro, $campana, $condicion, $jefe_inmediato, $modalidad, $estado, $empleados_id);
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
        $stmt = $conexion->prepare('DELETE FROM empleados WHERE empleados_id = ?');
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