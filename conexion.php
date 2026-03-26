<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto_intermodular;charset=utf8', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    die("Error crítico: No se pudo conectar a la base de datos.");
}
?>