<div class="header__top">
    <div class="header__top-group">
        <div class="header__top-box">
            <div class="header__top-item highlight ">
                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__location.png" alt="icon__location.png">
                <a href="#" title="Số 23. Đại An, Văn Quán, Hà Đông, Hà Nội ">
                    Số 23. Đại An, Văn Quán, Hà Đông, Hà Nội
                </a>
            </div>
            <div class="header__top-item highlight">
                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__Call.png" alt="icon__Call.png">
                <a href="#" title="Bán hàng trực tuyến ">
                    Bán hàng trực tuyến
                </a>
            </div>
            <div class="header__top-item">
                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__page.png" alt="icon__page.png">
                <a href="#" title="Trang tin công nghệ ">
                    Trang tin công nghệ
                </a>
            </div>
            <div class="header__top-item">
                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__gift.png" alt="icon__gift.png">
                <a href="#" title="Tổng hợp khuyến mãi ">
                    Tổng hợp khuyến mãi
                </a>
            </div>
            <div class="header__top-item">
                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__setup.png" alt="icon__setup.png">
                <a href="#" title="Yêu cầu kỹ thuật ">
                    Yêu cầu kỹ thuật
                </a>
            </div>
        </div>
    </div>
    <?php if ( !is_user_logged_in() ) : ?>
        <a href="/login" class=" login" title="Đăng nhập ">
            <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__user.png" alt="icon__user.png">
            <p>
                Đăng nhập
            </p>
        </a>
    <?php endif; ?>
    <?php if ( is_user_logged_in() ) : 
            $current_user = wp_get_current_user(); ?>
        <div class="login __loggedin">
            <a href="/tai-khoan" class="login">
                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__user.png" alt="icon__user.png">
                <p>
                    <?= $current_user->user_login ?>
                </p>
            </a>
            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="logout">
                Đăng xuất
            </a>
        </div>
    <?php endif; ?>
</div>