<?php 

$errores = '';
$enviado = '';

if (isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $nombre = stripslashes($nombre);
    } else {
        $errores .= 'Por favor, introduce un nombre <br>';
    }

    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .='Por favor, introduce un correo válido <br>';
        }
    } else {
        $errores .= 'Por favor, introduce un correo <br>';
    }

    if (!empty($mensaje)){
        $mensaje = trim($mensaje);
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= 'Por favor, introduce un mensaje <br>';
    }

    if(!$errores) {
        $enviar_a = 'correo@correo.com';
        $asunto = 'Correo enviado desde paginaPrueba.com';
        $mensaje_preparado = "De $nombre \n";
        $mensaje_preparado .= "De $correo \n";
        $mensaje_preparado .= "Mensaje: ". $mensaje;

        $enviado = 'true';
    }
} 



require 'login.view.php';

?>