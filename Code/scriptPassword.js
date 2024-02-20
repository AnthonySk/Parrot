document.addEventListener('DOMContentLoaded', function() {

    function checkMatchesPassword() {
        
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const messagePasswordMatches = document.getElementById('messagePasswordMatches');

        if (password !== confirmPassword) {
            messagePasswordMatches.textContent = 'Les mots de passe ne correspondent pas';
        } else {
            messagePasswordMatches.textContent = '';
        }
    }



    function setPassword() {
        const password = document.getElementById('password').value;
        const infoPwd = document.getElementById('informationPassword');
        const matchesNumberPwd = password.match(/[0-9]/g) || [];
        const regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        const matchesSpecialCharPwd = regex.test(password);
        infoPwd.textContent = '';

        if (password.length < 8) {
            infoPwd.innerHTML += 'le mot de passe doit faire plus de 8 caractéres';
        } if (matchesNumberPwd.length < 2) {
            infoPwd.innerHTML += '<br>le mot de passe doit contenir au moins 2 chiffres';
        } if (!matchesSpecialCharPwd) {
            infoPwd.innerHTML += '<br>le mot de passe doit contenir au moins 1 caractére spécial (!@#$%^&*()_+-=[]{};:\'"\|,.<>?)';
        }
    }

    // FUNCTIONS CALL
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');

    password.addEventListener('input', setPassword);

    password.addEventListener('input', checkMatchesPassword);
    confirmPassword.addEventListener('input', checkMatchesPassword);
}); 