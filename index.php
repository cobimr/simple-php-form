<?php

$errores = '';
$enviado = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    # Nombre
    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores = $errores . 'Por favor ingresa un nombre <br>';
    }

    # Correo
    if (!empty($email)) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores = $errores . 'Por favor ingresa un correo valido <br>';
        }
    } else {
        $errores = $errores . 'Por favor ingresa un correo <br>';
    }

    # Mensaje
    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores = $errores . 'Por favor ingresa un mensaje <br>';
    }

    # Enviar mail si no existen errores de validacion
    if (!$errores) {

        $enviado = true;

        // $destino = 'jacobojavier98@gmail.com';
        // $asunto = 'Correo enviado desde PHP';
        // $mensajeMail = "
        //     De: $nombre \n
        //     Correo: $email \n
        //     Mensaje: $mensaje
        // ";
        // mail($destino, $asunto, $mensajeMail);

    }
}

require 'index.view.php';