<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    <div class="perfil-contenedor">
        <h1>Datos del usuario</h1>

        <?php if (!empty($error)): ?>
            <div class="error-mensaje"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="campo-datos">
            <label>Nombre</label>
            <input type="text" value="<?php echo htmlspecialchars($usuarioData['nombre']); ?>" readonly>
        </div>

        <div class="campo-datos">
            <label>Apellidos</label>
            <input type="text" value="<?php echo htmlspecialchars($usuarioData['apellidos']); ?>" readonly>
        </div>

        <div class="campo-datos">
            <label>DNI</label>
            <input type="text" value="<?php echo htmlspecialchars($usuarioData['DNI']); ?>" readonly>
        </div>

        <div class="campo-datos">
            <label>Usuario</label>
            <input type="text" value="<?php echo htmlspecialchars($usuarioData['usuario']); ?>" readonly>
        </div>

        <div class="campo-datos fila-contraseña">
            <label>Contraseña</label>
            <input id="password" type="password" value="<?php echo htmlspecialchars($usuarioData['contraseña']); ?>" readonly>
            <button id="togglePassword" class="toggle-view" type="button">Ver</button>
        </div>

        <div class="campo-datos">
            <label>Email</label>
            <input type="email" value="<?php echo htmlspecialchars($usuarioData['email']); ?>" readonly>
        </div>

        <div class="campo-datos">
            <label>Tipo de licencia</label>
            <input type="text" value="<?php echo htmlspecialchars($usuarioData['licencia']); ?>" readonly>
        </div>

        <div class="campo-datos">
            <label>Teléfono</label>
            <input type="text" value="<?php echo htmlspecialchars($usuarioData['telefono']); ?>" readonly>
        </div>
    </div>

    <script src="perfil.js"></script>
</body>
</html>
