document.addEventListener('DOMContentLoaded', function() {
    const botones = document.querySelectorAll('.replay-toggle');

    botones.forEach(function(boton) {
        boton.addEventListener('click', function() {
            const tarjeta = boton.closest('.historial-card');
            if (!tarjeta) {
                return;
            }

            const video = tarjeta.querySelector('video');
            if (!video) {
                return;
            }

            if (video.paused) {
                video.play();
                boton.textContent = 'Pausar replay';
            } else {
                video.pause();
                boton.textContent = 'Reproducir replay';
            }
        });
    });
});
