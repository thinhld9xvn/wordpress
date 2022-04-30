<?php
$term = get_queried_object();
$slider_image = get_field('banner-slider', $term);

?>

    <div class="vk-shop__top">
        <div class="vk-slider vk-shop__slider" data-slider="banner">
            <?php if (!empty($slider_image)) :
                foreach ($slider_image as $image) :
                ?>
                <div class="_item">
                    <div class="vk-img"><img
                                src="<?php echo $image['image']['url']; ?>"
                                alt=""></div>
                </div>

            <?php
                endforeach;
                endif; ?>
        </div>

        <div class="vk-shop__title-box">
            <div class="_left">
                <h1 class="vk-shop__title"><?php echo !empty(get_field('tieu_de',$term)) ? get_field('tieu_de',$term) : ''; ?></h1>
            </div>
            <div class="_right">
                <?php if (!empty(get_field('description',$term))) : ?>
                    <div class="vk-shop__title-text">
                        <?php echo get_field('description',$term); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--./top-->
