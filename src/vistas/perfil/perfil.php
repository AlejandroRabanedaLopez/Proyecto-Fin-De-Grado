<?php session_start();

$usuarioData = array(
    'nombre' => 'Nombre de ejemplo',
    'apellidos' => 'Apellidos de ejemplo',
    'DNI' => '00000000A',
    'usuario' => 'usuario_ejemplo',
    'contraseña' => 'MiContraseña123!',
    'email' => 'usuario@ejemplo.com',
    'licencia' => 'Caza menor',
    'telefono' => '600000000'
);
$error = '';

if (isset($_SESSION['usuario'])) {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyecto_intermodular;charset=utf8', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conexion->prepare('SELECT nombre, apellidos, DNI, usuario, contraseña, email, licencia, telefono FROM perfiles WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $_SESSION['usuario']));
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if ($resultado !== false) {
            $usuarioData = $resultado;
        } else {
            $error = 'No se encontró la información del usuario en la base de datos.';
        }
    } catch (PDOException $e) {
        $error = 'Error de conexión: ' . $e->getMessage();
    }
}

require 'perfil.view.php';
