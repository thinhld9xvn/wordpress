<div class="footer__top">
    <div class="container">
        <h3 class="footer__top-title">
            Đăng ký nhận Email thông báo khuyến mại hoặc để được tư vấn miễn phí
        </h3>
        <form action="">
            <div class="input__box">
                <input type="text" name="" id="" class="input__control" placeholder="Nhập email hoặc số điện thoại của bạn" />
            </div>
            <button type="button" class="btn btn__send">
                Gửi
            </button>
        </form>
    </div>
</div>
<footer id="footer">
    <div class="footer__mid">
        <div class="container">
            <div class="footer__main">
                <?php dynamic_sidebar('Footer Sidebar') ?>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <span>© GCO Group 2021. All rights reserved</span>
        </div>
    </div>    
</footer>
<button type="button" class="btn btn__up">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
</button>
<?php wp_footer(); ?>