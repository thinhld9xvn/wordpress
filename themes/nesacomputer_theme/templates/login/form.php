<div class="input__box">
    <p>
        Tên đăng nhập <strong>*</strong>
    </p>
    <input type="text" name="txtUserName" id="txtUserName" class="input__control" required>
</div>
<div class="input__box">
    <p>
        Mật khẩu <strong>*</strong>
    </p>
    <input type="password" name="txtPassword" id="txtPassword" class="input__control" required>
</div>
<?php if ( FALSE === $userLoggedIn ) : ?>
    <div class="input__box">
        <p class="error-box">
            <span class="fa fa-exclamation-circle"></span> 
            <span class="padleft5">Mật khẩu hoặc người dùng chưa đúng, mời nhập lại.</span>
        </p>    
    </div>
<?php endif; ?>
<button type="submit" name="btnLogin" class="btn btn__login">
    Đăng nhập
</button>