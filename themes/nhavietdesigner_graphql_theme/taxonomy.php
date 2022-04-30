<?php

get_header();


get_template_part('template-parts/header', 'taxonomy');

?>


<div class="vk-shop__bot">
    <div class="row no-gutters">
        <?php
        $term = get_queried_object();
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $term->taxonomy,
                    'field' => 'id',
                    'terms' => $term->term_id,
                )
            )
        );

        $query = new WP_Query($args);
        if (!empty($query)) :
            $posts = $query->posts;
            if (!empty($posts)) :
                $colum_3_array = array_chunk($posts, 3); ?>
                <?php foreach ($colum_3_array as $value) : ?>
                <div class="col-lg-4">

                    <div class="vk-shop__list--style-1 vk-slider--style-3 row no-gutters" data-slider="shop-1">
                        <?php foreach ($value as $item) : ?>
                            <div class="col-12 _item item_<?php echo $item->ID; ?> item_slider_hb"
                                 id-post="<?php echo $item->ID; ?>" taxonomy="<?php echo $term->taxonomy; ?>">
                                <div class="vk-shop-item vk-shop-item--style-1">
                                    <div class="vk-shop-item__img">
                                        <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail')[0]; ?>"
                                             alt="" class="_img">

                                    </div>

                                    <div class="vk-shop-item__brief">
                                        <div class="vk-shop-item__box">
                                            <h3 class="vk-shop-item__title"><?php echo get_the_title($item->ID); ?></h3>
                                            <div class="vk-shop-item__icon"><img
                                                        src="<?php echo link_asset_theme . 'images/icon-1.png'; ?>"
                                                        alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <a class="vk-shop-item__link " href="<?php echo get_permalink($item->ID); ?>"
                                       title="<?php echo get_the_title($item->ID); ?>" data-toggle="modal"
                                       data-target="#exampleModal" onclick=""
                                    ></a>

                                </div>
                                <!--./vk-shop-item -->
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>


            <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>


</div>
<!--./bot-->
<!-- Modal -->
<div class="vk-modal modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered vk-modal__dialog" role="document">
        <div class="modal-content vk-modal__content">
            <button type="button" class="vk-modal__close"  data-dismiss="modal" aria-label="Close"
                    onclick="getNewContentBack('<?php echo get_term_link( get_queried_object());?>','<?php echo wp_title();?>')"
            >
                <img src="http://tpl.gco.vn/nhaviet/images/icon-3.png" alt="">
            </button>

            <!--            <div id="main_content"></div>-->


            <div class="vk-design-detail__slider vk-slider--style-1 slick-slider">

            </div>
            <!--./slider-->


        </div>
    </div>
</div>


<?php
get_footer();
?>
<script>
    (function ($) {
        $('.item_slider_hb ').click(function () {
            var title = $(this).find('.vk-shop-item__link ').attr('title');
            var hreflink = $(this).find('.vk-shop-item__link ').attr("href");


            var id_post = $(this).attr("id-post");
            var taxonomy = $(this).attr('taxonomy');

            if (id_post != '' & taxonomy != '') {
                $(".main-wrapper").animsition({
                    inClass: 'fade-in',
                    outClass: 'fade-out',
                    inDuration: 1500,
                    outDuration: 800,
                    loading: true,
                    loadingParentElement: 'body', //animsition wrapper element
                    overlay: true,
                    overlayClass: 'animsition-overlay-slide',
                    overlayParentElement: 'body'
                });
                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: '<?php echo admin_url('admin-ajax.php');?>',
                    data: {
                        action: "data_slider",
                        id_post: id_post,
                        taxonomy: taxonomy

                    },
                    context: this,
                    success: function (response) {
                        if (response != false) {

                            document.title = title;
                            window.history.pushState({
                                "pageTitle": title
                            }, "", hreflink);
                            $('#exampleModal  .vk-design-detail__slider').html(response);
                            $('#exampleModal  .vk-design-detail__slider').removeClass('slick-initialized');
                            $('#exampleModal  .vk-design-detail__slider ').slick({
                                slidesToShow: 1,
                                fade: true,
                                autoplay: true,
                                autoplaySpeed: 4000,
                                infinite: true,
                                pauseOnHover: false,
                                speed: 250,

                                dots: false,
                                arrows: true,
                                prevArrow: '<button class="vk-slider__arrow _prev"><i class="fa fa-angle-left"></i></button>',
                                nextArrow: '<button class="vk-slider__arrow _next"><i class="fa fa-angle-right"></i></button>',

                                responsive: [{
                                    breakpoint: 992,
                                    settings: {
                                        arrows: false,
                                    }

                                }, {

                                    breakpoint: 768,
                                    settings: {
                                        arrows: false,
                                    }

                                }, {

                                    breakpoint: 576,
                                    settings: {
                                        arrows: false,
                                    }

                                }]
                            });
                            $("#exampleModal  .slick-slider").slick('slickNext');
                            $('#exampleModal').modal();
                        }
                        else {
                            alert('Không tìm thấy dữ liệu');
                            $('.animsition-loading').remove();
                            $('.animsition-overlay-slide').remove();
                        }


                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('The following error occured: ' + textStatus, errorThrown);
                    }

                })
                setTimeout(function () {
                    $('.animsition-loading').remove();
                    $('.animsition-overlay-slide').remove();
                }, 3000);
            }
            return false;


        });


    })(jQuery);
    ;
</script>
