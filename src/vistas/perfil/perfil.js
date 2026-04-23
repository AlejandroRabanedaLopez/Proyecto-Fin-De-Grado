document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    if (!passwordInput || !toggleButton) {
        return;
    }

    toggleButton.addEventListener('click', function() {
        const currentType = passwordInput.getAttribute('type');
        if (currentType === 'password') {
            passwordInput.setAttribute('type', 'text');
            toggleButton.textContent = 'Ocultar';
        } else {
            passwordInput.setAttribute('type', 'password');
            toggleButton.textContent = 'Ver';
        }
    });
});
