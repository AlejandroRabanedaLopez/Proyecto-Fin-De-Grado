<?php session_start();

if(isset($_SESSION['usuario'])) {
	header('Location: contenido.php');
	die();
} else {
	header('Location: registro.php');
}

?>