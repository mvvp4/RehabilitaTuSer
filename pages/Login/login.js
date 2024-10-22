document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.src = 'eye-open-icon.png'; // Cambia la imagen del ojo cuando la contraseña es visible
    } else {
        passwordField.type = 'password';
        eyeIcon.src = 'eye-icon.png'; // Cambia la imagen del ojo cuando la contraseña está oculta
    }
});
