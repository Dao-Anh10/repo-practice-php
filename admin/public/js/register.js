
function validateForm() {
    let email = document.getElementById('email');
    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let rePassword = document.getElementById('re-password');
    let validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    let inputErrEmail = document.getElementById('input-err-email');
    let inputErrUsername = document.getElementById('input-err-username');
    let inputErrPassword = document.getElementById('input-err-password');
    let inputErrRePassword = document.getElementById('input-err-re-password');

    inputErrEmail.style.display = 'none';
    inputErrUsername.style.display = 'none';
    inputErrPassword.style.display = 'none';
    inputErrRePassword.style.display = 'none';

    if (!validRegex.test(email.value) || !email.value) {
        inputErrEmail.style.display = 'flex';
        resetForm('form-register');
        return false;
    }

    if (!username.value) {
        inputErrUsername.style.display = 'flex';
        return false;
    }

    if (!password.value) {
        inputErrPassword.style.display = 'flex';
        return false;
    }
    if (!rePassword.value) {
        inputErrRePassword.style.display = 'flex';
        return false;
    }

    if (password.value !== rePassword.value) {
        alert('Password confirm incorrect, please try again');
        password.value = '';
        rePassword.value = '';
        return false;
    }
}

function showPassword(pass) {
    let password = document.getElementById(pass);
    console.log(password.type);
    if (password.type == 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
}
