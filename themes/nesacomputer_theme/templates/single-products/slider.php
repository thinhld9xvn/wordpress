<div class="detail__product-slide">
    <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <?php foreach ($galleries as $key => $gallery) : 
                    list($full, $medium, $thumbnail) = $gallery; ?>
                <div class="swiper-slide">
                    <div class="frame">
                        <img src="<?= $full['url'] ?>" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($galleries as $key => $gallery) : 
                    list($full, $medium, $thumbnail) = $gallery; ?>
                <div class="swiper-slide">
                    <div class="frame">
                        <img src="<?= $thumbnail['url'] ?>" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>