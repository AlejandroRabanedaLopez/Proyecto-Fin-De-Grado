<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario contacto:</title>
    <link rel="stylesheet" href="estilo_login.css">
</head>
<body>
    <div class="contenedor">
        <form method="post" action="logica_login.php">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre..." value="<?php if(!$enviado && isset($nombre)) echo $nombre?>">

            <input type="text" class="form-control" id="correo" name="correo" placeholder="Escribe tu correo..." value="<?php if(!$enviado && isset($correo)) echo $correo?>">
        
            <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Escribe tu mensaje..." ><?php if(!$enviado && isset($mensaje)) echo $mensaje?></textarea>
        
            <?php if(!empty($errores)): ?>
                <div class="alert error">
                    <?php echo $errores; ?>
                </div>
            <?php elseif($enviado): ?>
                <div class="alert correcto">
                    <p>Enviado correctamente</p>
                </div>
            <?php endif ?>

            

            <input type="submit" value="Enviar Correo" name="submit" class="btn btn-primary">        
        </form>
    </div>
</body>
</html>