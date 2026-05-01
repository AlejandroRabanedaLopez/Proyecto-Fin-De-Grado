<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
    <link rel="stylesheet" href="historial.css">
</head>
<body>
    <div class="historial-contenedor">
        <h1>Historial de repeticiones</h1>

        <?php if (!empty($error)): ?>
            <div class="historial-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (empty($historialItems)): ?>
            <div class="historial-empty">No hay registros en el historial todavía.</div>
        <?php else: ?>
            <div class="historial-grid">
                <?php foreach ($historialItems as $item): ?>
                    <div class="historial-card">
                        <div class="card-header">
                            <div>
                                <span class="card-label">Fecha y hora</span>
                                <div class="card-date"><?php echo htmlspecialchars($item['fecha_hora']); ?></div>
                            </div>
                            <button class="replay-toggle" type="button">Reproducir replay</button>
                        </div>

                        <?php if (!empty($item['descripcion'])): ?>
                            <div class="card-subtitle"><?php echo htmlspecialchars($item['descripcion']); ?></div>
                        <?php endif; ?>

                        <div class="video-box">
                            <?php if (!empty($item['video_url'])): ?>
                                <video src="<?php echo htmlspecialchars($item['video_url']); ?>" controls loop muted preload="metadata"></video>
                            <?php else: ?>
                                <div class="video-sin-archivo">No se encontró un video asociado a esta repetición.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="historial.js"></script>
</body>
</html>
