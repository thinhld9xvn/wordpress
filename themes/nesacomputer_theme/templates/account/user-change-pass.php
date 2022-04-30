<?php
    use Membership\ChangeUserPassword;  
    if ( !is_change_password_page_url() ) return;    
    $boolValidate = true;
    if ( isset($_POST['btnSubmitInfo'] ) ) :
        $old_pass = $_POST['txtOldPass'];
        $new_pass = $_POST['txtNewPass'];
        if ( !wp_check_password($old_pass, $current_user->user_pass, $current_user->ID) ) :
            $boolValidate = false;
        else :
            ChangeUserPassword::change($current_user->ID, $new_pass);
        endif;
    endif;
?>
<div class="account__content">
    <div class="account__content-group">
        <h2 class="title__global-3">
            Đổi mật khẩu
        </h2>
        <form class="block" method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <div class="input__box">
                <p>
                   Mật khẩu cũ
                </p>
                <input type="password" name="txtOldPass" id="" class="input__control" value="" required>
            </div>
            <div class="input__box">
                <p>
                    Mật khẩu mới
                </p>
                <input type="password" name="txtNewPass" id="" class="input__control" value="" required>
            </div>
            <?php if ( FALSE === $boolValidate ) : ?>
                <div class="input__box">
                    <p class="error-box">
                        <span class="fa fa-exclamation-circle"></span> 
                        <span class="padleft5">Mật khẩu người dùng không chính xác, mời nhập lại.</span>
                    </p>    
                </div>
            <?php endif; ?>
            <div class="input__box __fullwidth">
                <button type="submit" name="btnSubmitInfo" class="btn btn__update">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>    
</div>