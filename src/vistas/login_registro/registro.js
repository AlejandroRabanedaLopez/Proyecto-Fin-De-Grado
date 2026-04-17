// Alternar visibilidad de contraseñas
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.querySelector('input[name="password"]');
    const password2Input = document.querySelector('input[name="password2"]');
    const toggleButtons = document.querySelectorAll('.toggle-password');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const inputName = this.getAttribute('data-target');
            const input = document.querySelector(`input[name="${inputName}"]`);
            
            if (input) {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            }
        });
    });
    
    // Validar formulario antes de enviar
    const form = document.querySelector('form[name="login"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validarRegistro()) {
                e.preventDefault();
            }
        });
    }
});

function validarRegistro() {
    const usuario = document.querySelector('input[name="usuario"]').value.trim();
    const password = document.querySelector('input[name="password"]').value;
    const password2 = document.querySelector('input[name="password2"]').value;
    
    // Validar usuario
    if (usuario.length < 8) {
        alert('El nombre de usuario debe tener mínimo 8 caracteres');
        return false;
    }
    
    // Validar primera contraseña
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
    
    // Validar segunda contraseña
    if (password2.length < 8) {
        alert('La confirmación de contraseña debe tener mínimo 8 caracteres');
        return false;
    }
    
    if (!/\d/.test(password2)) {
        alert('La confirmación debe contener al menos un número');
        return false;
    }
    
    if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password2)) {
        alert('La confirmación debe contener al menos un símbolo (!@#$%^&* etc)');
        return false;
    }
    
    // Validar que las contraseñas coincidan
    if (password !== password2) {
        alert('Las contraseñas no coinciden');
        return false;
    }
    
    return true;
}
