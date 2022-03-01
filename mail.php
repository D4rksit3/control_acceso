<?php

$correo = "gonzaloroque21@gmail.com";

$title = "<html>".
'<head><title>Email con HTML</title></head>'.
'<body><h1>Email con HTML</h1>'.
'Esto es un email que se envía en el formato HTML'.
'<hr>'.
'Enviado por mi programa en PHP'.
'</body>'.
'</html>';

$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$cabeceras .= 'From: Juan Roque';

$enviado = mail($para, $titulo, $mensaje, $cabeceras);

if ($enviado)
  echo 'Email enviado correctamente';
else
  echo 'Error en el envío del email';

//tabla mantenimiento  -> jalar data de campañas,agregar puesto, etc
//carga masiva
//fecha de ingreso -> cambiar fecha en registro / realizado
//candado para no duplicar la entrada, y si no haz marcado entrada
//enviar correo a DNI no existente / realizado
//agregar ip a registro de reportes ->agregar variables a las ip y verificar si es en sede 
//inactivos no registran 
//rango de horarios para marcacion 