<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$contaseña = $_POST['password'];
	$contaseña = hash('sha512', $contaseña);

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=proyecto_intermodular;charset=utf8', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	$statement = $conexion->prepare('SELECT * FROM perfiles WHERE usuario = :usuario AND contaseña = :contaseña');
	$statement->execute(array(
			':usuario' => $usuario,
			':contaseña' => $contaseña
		));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: index.php');
	} else {
		$errores = '<li>Datos incorrectos</li>';
	}
}

require 'views/login.view.php';

?>