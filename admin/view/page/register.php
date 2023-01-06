<div class="form-register-wrapper">
    <h3 class="title-form-register">Register</h3>
    <form class="form-register" action="<?= $this->getBaseUrl() ?>/admin/user/register" method="POST" onsubmit="return validateForm()">
        <input type="text" name="User[email]" id="email" placeholder="Enter Email">
        <div id="input-err-email" class="input-error">Bạn phải nhập email</div>

        <input type="text" name="User[username]" id="username" placeholder="Enter Username">
        <div id="input-err-username" class="input-error">Bạn phải nhập username</div>

        <input type="password" name="User[pass]" id="password" placeholder="Enter Pass">
        <div id="input-err-password" class="input-error">Bạn phải nhập password</div>

        <div id="checkbox-wrapper">
            <input type="checkbox" id="checkbox-show-password" onclick="showPassword('password')">
            <span>show password</span>
        </div>
        <input type="password" name="User[re-pass]" id="re-password" placeholder="Enter Pass Again">
        <div id="input-err-re-password" class="input-error">Bạn phải nhập lại password</div>


        <div id="checkbox-wrapper">
            <input type="checkbox" id="checkbox-show-password" onclick="showPassword('re-password')">
            <span>show password</span>
        </div>
        <input type="submit" class="btn-submit-form-login" value="Login">
    </form>
</div>