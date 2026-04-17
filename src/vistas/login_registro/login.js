// Alternar visibilidad de contraseña
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.querySelector('input[name="password"]');
    const toggleButton = document.querySelector('.toggle-password');
    
    if (toggleButton && passwordInput) {
        toggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }
    
    // Validar formulario antes de enviar
    const form = document.querySelector('form[name="login"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validarLogin()) {
                e.preventDefault();
            }
        });
    }
});

function validarLogin() {
    const usuario = document.querySelector('input[name="usuario"]').value.trim();
    const password = document.querySelector('input[name="password"]').value;
    
    // Validar usuario
    if (usuario.length < 8) {
        alert('El nombre de usuario debe tener mínimo 8 caracteres');
        return false;
    }
    
    // Validar contraseña
    if (password.length < 8) {
        alert('La contraseña debe tener mínimo 8 caracteres');
        return false;
    }
    
    if (!/\d/.test(password)) {
        alert('La contraseña debe contener al menos un número');
        return false;
    }
    
    if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) {
        alert('La contraseña debe contener al menos un símbolo (!@#$%^&* etc)');
        return false;
    }
    
    return true;
}
