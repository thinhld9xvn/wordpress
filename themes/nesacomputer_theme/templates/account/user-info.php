<?php
    if ( !is_account_page_url() ) return;
    use \Membership\UpdateUserMeta;
    if ( isset($_POST['btnSubmitInfo'] ) ) :
        $fullname = $_POST['txtFullName'];
        $phone = $_POST['txtPhone'];
        $cmnd = $_POST['txtCmnd'];
        $results = UpdateUserMeta::update(['uid' => $current_user->ID, 'fullname' => $fullname, 'phone' => $phone, 'cmnd' => $cmnd]);
    endif;
?>
<?php list($full_name, $email, $phone, $cmnd) = \Membership\GetUserMeta::get($current_user->ID); ?>
<div class="account__content">
    <div class="account__content-group">
        <h2 class="title__global-3">
            Thông tin cá nhân
        </h2>
        <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <div class="input__box">
                <p>
                    Họ và tên
                </p>
                <input type="text" name="txtFullName" id="" class="input__control" value="<?= $full_name ?>" required>
            </div>
            <div class="input__box">
                <p>
                    Địa chỉ email
                </p>
                <input type="text" name="txtEmail" id="" class="input__control" readonly="readonly" value="<?= $email ?>">
            </div>
            <div class="input__box">
                <p>
                    Số điện thoại
                </p>
                <input type="text" name="txtPhone" id="" class="input__control" value="<?= $phone ?>" required>
            </div>
            <div class="input__box">
                <p>
                    CMND/Passport
                </p>
                <input type="text" name="txtCmnd" id="" class="input__control" value="<?= $cmnd ?>" required>
            </div>
            <div class="input__box __fullwidth">
                <button type="submit" name="btnSubmitInfo" class="btn btn__update">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>    
</div>