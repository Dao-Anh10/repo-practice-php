<div class="form-login-wrapper">
    <h3 class="title-form-login">Login</h3>
    <form class="form-login" action="<?= $this->getBaseUrl() ?>/admin/user/login" method="POST" onsubmit="return validateFormLogin()">
        <input type="text" name="username" id="username" placeholder="Enter Username">
        <div id="input-err-username" class="input-error">Bạn phải nhập username</div>
        <input type="password" name="pass" id="password" placeholder="Enter Pass">
        <div id="input-err-password" class="input-error">Bạn phải nhập pass</div>
        <div id="checkbox-wrapper">
            <input type="checkbox" id="checkbox-show-password" onclick="showPassword()">
            <span>show password</span>
        </div>
        <input type="submit" class="btn-submit-form-login" value="Login">
    </form>
</div>