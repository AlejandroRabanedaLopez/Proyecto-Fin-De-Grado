<?php session_start();

$error = '';

$historialItems = [
    [
        'fecha_hora' => '2026-05-01 09:25',
        'video_url' => '',
        'descripcion' => 'Repetición de tiro al blanco'
    ],
    [
        'fecha_hora' => '2026-04-28 18:40',
        'video_url' => '',
        'descripcion' => 'Repetición de seguimiento de objetivo'
    ],
    [
        'fecha_hora' => '2026-04-24 11:10',
        'video_url' => '',
        'descripcion' => 'Repetición de práctica de campo'
    ]
];

if (isset($_SESSION['usuario'])) {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyecto_intermodular;charset=utf8', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conexion->prepare('SELECT fecha_hora, video_url, descripcion FROM historial WHERE usuario = :usuario ORDER BY fecha_hora DESC');
        $statement->execute(array(':usuario' => $_SESSION['usuario']));
        $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($resultado !== false && count($resultado) > 0) {
            $historialItems = $resultado;
        }
    } catch (PDOException $e) {
        $error = 'Error de conexión: ' . $e->getMessage();
    }
}

require 'historial.view.php';
