<div class="header__mid">
    <a href="<?php echo get_site_url() ?>" class="logo" title="NESA Computer">
        <div class="logo-img">
            <img src="<?= $logo ?>" alt="logo">
        </div>
    </a>
    <div class="addon__search">
        <button type="button" class="btn btn__toggle-search">
            <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__search.png" alt="icon__search.png">
        </button>
        <div class="main__search">
            <div class="container">
                <form class="form__search">
                    <input type="text" placeholder="Nhập nội dung cần tìm" class="input__search">
                    <button type="submit" class="btn btn__search">
                        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__search.png" alt="icon__search.png">
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="header__mid-group">
        <div class="header__mid-box">
            <a href="#" class="hot__line">
                <div class="hot__line-img">
                    <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__Call-blu.png" alt="icon__Call-blu.png">
                </div>
                <p>
                    <span>Hotline</span>
                    <b>
                        Mua hàng
                    </b>
                </p>
            </a>
            <a href="#" class="cart__link">
                <div class="cart__link-img">
                    <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__buy.png" alt="icon__buy.png">
                    <span>0</span>
                </div>
                <p>Giỏ hàng</p>
            </a>
        </div>
    </div>
    <button type="button" class="btn toggle__menu">
        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__menu.png" alt="icon__menu.png">
    </button>
</div>