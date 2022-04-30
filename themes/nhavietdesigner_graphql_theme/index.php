<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header();
?>
    <!--<div data-layout="onePage"></div>-->
    <h1 class="d-none">Công ty cổ phần xây dựng và hoàn thiện nội thất Nhà Việt </h1>
    <div id="fullpage">
        <div class="section">
            <div class="vk-home__video">
                <video playsinline autoplay muted loop data-autoplay id="myVideo">
                    <source src="<?php echo get_field('link_video_youtube_banner_copy'); ?>"
                            type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>

                <script>
                    document.getElementById('myVideo').play();
                </script>
                <a href="#next" class="text-center mt-125 scroll-link">
                    <img src="<?php echo link_asset_theme.'/images/scroll.png';?>" title="" alt="">
                </a>
            </div>

        </div>


        <!-- Khối thứ nhất -->
        <div class="section" style="display: none;">
            <div class="vk-home__slider slick-slider vk-slider--style-2" data-slider="banner-2">
                <?php if (have_rows('slider_2_qa')):
                        while (have_rows('slider_2_qa')) : the_row(); ?>
                            <div class="_item">
                                <div class="_wrapper">
                                    <div class="vk-img"><img src="<?php echo get_sub_field('background'); ?>" alt=""></div>
                                    <div class="_content">
                                        <h2 class="_title"><?php echo get_sub_field('tieu_de'); ?></h2>
                                        <a href="<?php echo get_sub_field('link_button'); ?>"
                                           class="_btn"><?php echo get_sub_field('name_button'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!--./item-->
                        <?php
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
        <!-- End thứ nhất -->
        
        <!-- Khối thứ hai -->
        <div class="section section-12">
            <div class="vk-home__shop">
                <div class="vk-shop__top">
                    <div class="vk-slider vk-shop__slider" data-slider="banner">
                        <?php if (have_rows('slider_2_qa')):
                            while (have_rows('slider_2_qa')) : the_row(); ?>
                                <div class="_item">
                                    <div class="_wrapper">
                                        <div class="vk-img"><img src="<?php echo get_sub_field('background'); ?>"
                                                                 alt="">
                                        </div>
                                        <div class="_content">
                                            <h2 class="_title"><?php echo get_sub_field('tieu_de'); ?></h2>
                                            <a href="<?php echo get_sub_field('link_button'); ?>"
                                               class="_btn"><?php echo get_sub_field('name_button'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>

                    </div>

                </div>
                <!--./top-->
                <?php if (have_rows('option_3_column_copy')): ?>

                    <div class="vk-shop__bot">
                        <div class="vk-shop__list row no-gutters">

                            <?php $i = 1;
                            while (have_rows('option_3_column_copy')) :
                                the_row(); ?>
                                <div class="col-lg-4 _item">
                                    <div class="vk-shop-item vk-shop-item--style-1" data-animation="fadeInLeft"
                                         data-animation-delay="0" data-animation-duration="2">
                                        <div class="vk-shop-item__img">
                                            <img src="<?php echo get_sub_field("thumb_image"); ?>"
                                                 alt="<?php echo get_sub_field("title"); ?>" class="_img">
                                        </div>

                                        <div class="vk-shop-item__brief">
                                            <div class="vk-shop-item__box">
                                                <h3 class="vk-shop-item__title"><?php echo get_sub_field("title"); ?></h3>
                                                <div class="vk-shop-item__icon"><img
                                                            src="<?php echo link_asset_theme.'/images/icon-1.png';?>" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?php echo get_sub_field("thu_vien")[0]['url']; ?>"
                                           class="vk-shop-item__link"
                                           data-fancybox="gallery-y-<?php echo $i++; ?>"><img
                                                    src="<?php echo get_sub_field("thumb_image"); ?>"
                                                    alt="<?php echo get_sub_field("title"); ?>"
                                                    class=""></a>
                                    </div>
                                </div>
                                <!--./vk-shop-item-->
                            <?php endwhile; ?>

                        </div>
                    </div>
                <?php endif; ?>
                <!--./bot-->
                <?php if (have_rows('option_3_column_copy')): ?>
                    <div class="d-none">
                        <?php $i = 1;
                        while (have_rows('option_3_column_copy')) : the_row();
                            $number = $i++; ?>
                            <?php foreach (get_sub_field("thu_vien") as $value) : ?>
                                <a href="<?php echo $value["url"]; ?>"
                                data-fancybox="gallery-y-<?php echo $number; ?>">
                                <img src="<?php echo $value["url"]; ?>"/>
                                </a>
                            <?php endforeach; ?>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End khối hai -->


        <div class="section section-12">
            <div class="vk-home__shop">
                <div class="vk-shop__top">
                    <div class="vk-slider vk-shop__slider" data-slider="banner">
                        <?php if (have_rows('slider_3_qa')):
                            while (have_rows('slider_3_qa')) : the_row(); ?>
                                <div class="_item">
                                    <div class="_wrapper">
                                        <div class="vk-img"><img src="<?php echo get_sub_field('background'); ?>"
                                                                 alt="">
                                        </div>
                                        <div class="_content">
                                            <h2 class="_title"><?php echo get_sub_field('tieu_de'); ?></h2>
                                            <a href="<?php echo get_sub_field('link_button'); ?>"
                                               class="_btn"><?php echo get_sub_field('name_button'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>

                    </div>

                </div>
                <!--./top-->
                <?php if (have_rows('option_3_column')): ?>

                    <div class="vk-shop__bot">
                        <div class="vk-shop__list row no-gutters">
                            <?php $i = 1;
	                            while (have_rows('option_3_column')) :
	                                the_row(); ?>
	                                <div class="col-lg-4 _item">
	                                    <div class="vk-shop-item vk-shop-item--style-1" data-animation="fadeInLeft"
	                                         data-animation-delay="0" data-animation-duration="2">
	                                        <div class="vk-shop-item__img">
	                                            <img src="<?php echo get_sub_field("thumb_image"); ?>"
	                                                 alt="<?php echo get_sub_field("title"); ?>" class="_img">
	                                        </div>

	                                        <div class="vk-shop-item__brief">
	                                            <div class="vk-shop-item__box">
	                                                <h3 class="vk-shop-item__title"><?php echo get_sub_field("title"); ?></h3>
	                                                <div class="vk-shop-item__icon"><img
	                                                            src="<?php echo link_asset_theme.'/images/icon-1.png';?>" alt="">
	                                                </div>
	                                            </div>
	                                        </div>

	                                        <a href="<?php echo get_sub_field("thu_vien")[0]['url']; ?>"
	                                           class="vk-shop-item__link"
	                                           data-fancybox="gallery-b-<?php echo $i++; ?>"><img
	                                                    src="<?php echo get_sub_field("thumb_image"); ?>"
	                                                    alt="<?php echo get_sub_field("title"); ?>"
	                                                    class=""></a>
	                                    </div>
	                                </div>
	                                <!--./vk-shop-item-->
	                            <?php endwhile; ?>


                        </div>
                    </div>
                <?php endif; ?>
                <!--./bot-->
                <?php if (have_rows('option_3_column')): ?>
                    

                    <div class="d-none">
                        <?php $i = 1;
                        while (have_rows('option_3_column')) : the_row();
                            $number = $i++; ?>
                            <?php foreach (get_sub_field("thu_vien") as $value) : ?>
                                <a href="<?php echo $value["url"]; ?>"
                                data-fancybox="gallery-b-<?php echo $number; ?>">
                                <img src="<?php echo $value["url"]; ?>"/>
                                </a>
                            <?php endforeach; ?>

                        <?php endwhile; ?>
                    </div>
                    
                <?php endif; ?>

                <div class="banner_bt">
                   <div class="vk-img_bt">
                        <img src="<?php echo get_field('banner_product'); ?>" alt="">
                    </div>
                    <div class="info_content">
                        <h2 class="_title">Sản phẩm</h2>
                     <a href="<?php echo get_field('link_product'); ?>" class="_btn" tabindex="0">Xem thêm</a>
                    </div>
                </div>


            </div>
        </div>


        <div class="section fp-auto-height">

            <footer class="vk-footer vk-footer--style-3">
                <div class="vk-container">
                    <div class="vk-footer__content">
                        <?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) || is_active_sidebar( 'footer-four' ) ):  ?>
                        <div class="_item">
                            <div class="vk-footer__list--style-1">
                            <?php if( is_active_sidebar( 'footer-one') ) dynamic_sidebar( 'footer-one' ); ?>
                            </div>
                        </div>
                        <!--./item-->

                        <div class="_item">
                                <div class="vk-footer__list--style-1">
                                    <?php if( is_active_sidebar( 'footer-two') ) dynamic_sidebar( 'footer-two' ); ?>
                                </div>
                        </div>

                        <div class="_item">
                            <div class="vk-footer__list--style-1">
                                <?php if( is_active_sidebar( 'footer-three') ) dynamic_sidebar( 'footer-three' ); ?>
                            </div>
                        </div>

                    <div class="big_item">
                        <div class="_item">
                            <?php if( is_active_sidebar( 'footer-four') ) dynamic_sidebar( 'footer-four' );  ?>
                        </div>
                        <?php endif; ?>
                        <br>
                        <div class="_item">
                            <h2 class="vk-footer__title">Liên hệ</h2>
                            <div class="vk-form--register" style="height:50px">
                             <?php echo do_shortcode('[contact-form-7 id="1597" title="Liên hệ footer"]'); ?>
                            </div>
                            <div class="_copyright"><?php echo !empty(get_field('text_copyright','option'))?get_field('text_copyright','option'):'';?></div>
                        </div>
                    </div>

                    </div>
                </div>
            </footer>
            <!--./vk-footer-->

        </div>
    </div>


    </section>
    <!--./content-->


    <script>
        var loadDeferredStyles = function () {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
        };
        var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
            window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
        if (raf) raf(function () {
            window.setTimeout(loadDeferredStyles, 0);
        });
        else window.addEventListener('load', loadDeferredStyles);
    </script>
<?php
get_footer();
