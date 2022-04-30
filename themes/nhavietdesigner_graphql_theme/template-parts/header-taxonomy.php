<?php

if (!empty(get_queried_object())) :
    $term = get_queried_object();
    $banner_slider = get_field('banner-slider', $term->taxonomy . '_' . $term->term_id);


    ?>
    <div class="vk-shop__top">
        <div class="vk-slider vk-shop__slider" data-slider="banner">
            <?php if (!empty($banner_slider)) : ?>
                <?php foreach ($banner_slider as $value) : ?>
                    <div class="_item">
                        <div class="vk-img"><img src="<?php echo $value['image']['url']; ?>" alt=""></div>
                    </div>
                <?php endforeach; ?>
            <?php else :

                if (get_field('thumb_banner','option')['image_default_cat']) :
                    ?>
                    <div class="_item">
                        <div class="vk-img"><img src="<?php echo get_field('thumb_banner','option')['image_default_cat']; ?>" alt=""></div>
                    </div>

                <?php
                endif;
            endif; ?>
        </div>

        <div class="vk-shop__title-box">
            <div class="_left">
                <h1 class="vk-shop__title"><?php echo !empty(get_field('tieu_de', $term)) ? get_field('tieu_de', $term) : ''; ?></h1>
            </div>
            <div class="_right">
                <div class="vk-shop__title-text">
                    <?php echo !empty(get_field('description', $term)) ? get_field('description', $term) : ''; ?>
                </div>
            </div>
        </div>
    </div>
    <!--./top-->
<?php endif; ?>