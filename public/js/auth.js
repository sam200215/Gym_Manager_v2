// public/js/auth.js
function toggleForms() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const loginMessage = document.getElementById('loginMessage');
    const registerMessage = document.getElementById('registerMessage');

    loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
    registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
    loginMessage.style.display = loginMessage.style.display === 'none' ? 'block' : 'none';
    registerMessage.style.display = registerMessage.style.display === 'none' ? 'block' : 'none';
}