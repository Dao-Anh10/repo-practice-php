function validateFormLogin() {
    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let submit = true;
    let inputErrUsername = document.getElementById('input-err-username');
    let inputErrPassword = document.getElementById('input-err-password');

    inputErrUsername.style.display = 'none';
    inputErrPassword.style.display = 'none';

    if (!username.value) {
        inputErrUsername.style.display = 'flex';

        return submit = false;
    }

    if (!password.value) {
        inputErrPassword.style.display = 'flex';
        return submit = false;
    }

    return submit;
}

function showPassword() {
    let password = document.getElementById('password');
    console.log(password.type);
    if (password.type == 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
}
