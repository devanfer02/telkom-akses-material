document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const passwordConfirm = document.querySelector('#password_confirmation');

    const toggle = (input, toggleIcon) => {
        // toggle the type attribute
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        // toggle the eye slash icon
        toggleIcon.classList.toggle('fa-eye-slash');
    }

    if (togglePassword && password) {
        togglePassword.addEventListener('click', function (e) {
            toggle(password, this);
        });
    }

    if (togglePasswordConfirm && passwordConfirm) {
        togglePasswordConfirm.addEventListener('click', function (e) {
            toggle(passwordConfirm, this);
        });
    }
});
