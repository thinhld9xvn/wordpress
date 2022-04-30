<?php
/* Template Name: About Template */
get_header();

?>
<section class="vk-content">
    <div class="vk-about">
        <div class="vk-about__banner"
             style="background-image: url('<?php echo !empty(get_field('banner')) ? get_field('banner') : ''; ?>')">
            <div class="_content">
                <h1 class="_title"><?php echo !empty(get_field('title')) ? get_field('title') : ''; ?></h1>
            </div>
        </div>

        <div class="container pt-30">
            <div class="vk-about__section" id="overallAbout">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="vk-about__title"> <?php echo !empty(get_field('section_1')['title_left']) ? get_field('section_1')['title_left'] : ''; ?></h2>
                    </div>
                    <div class="col-lg-9">
                        <?php echo !empty(get_field('section_1')['mo_ta_phai']) ? get_field('section_1')['mo_ta_phai'] : ''; ?>
                    </div>
                </div>
            </div>
            <div class="vk-about__section--style-1">
                <div class="vk-img">
                    <img src="<?php echo !empty(get_field('section_2')['image']) ? get_field('section_2')['image'] : ''; ?>"
                         alt="">
                </div>
            </div>
            <div class="vk-about__section" id="visionAbout">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="vk-about__title"><?php echo !empty(get_field('section_3')['title_left']) ? get_field('section_3')['title_left'] : ''; ?></h2>
                    </div>
                    <div class="col-lg-9">
                        <?php echo !empty(get_field('section_3')['mo_ta_phai']) ? get_field('section_3')['mo_ta_phai'] : ''; ?>
                    </div>
                </div>
            </div>
            <div class="vk-about__section--style-1">
                <div class="vk-img">
                    <img src="<?php echo !empty(get_field('section_4')['url']) ? get_field('section_4')['url'] : ''; ?>"
                         alt="">
                </div>
            </div>
            <div class="vk-about__section" id="whyAbout">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="vk-about__title"><?php echo !empty(get_field('section_5')['title_left']) ? get_field('section_5')['title_left'] : ''; ?></h2>
                    </div>
                    <div class="col-lg-9">
                        <!--                        <p class="mb-50">-->
                        <?php echo !empty(get_field('section_5')['mo_ta_dau']) ? get_field('section_5')['mo_ta_dau'] : ''; ?>
                        <!--                        </p>-->


                        <div class="accordion accordion--style-4" id="accordionExample">

                            <?php

                            if (get_field('section_5')['mo_ta_phai']) :
                                $i = 0;

                                foreach (get_field('section_5')['mo_ta_phai'] as $key => $value) : $number = $i++; ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link <?php echo !empty($key) == 0 ? '' : 'collapsed'; ?>"
                                               data-toggle="collapse"
                                               href="#collapse-<?php echo $number; ?>" aria-expanded="false">
                                                <?php echo $value['title']; ?>
                                            </a>
                                        </div>

                                        <div id="collapse-<?php echo $number; ?>"
                                             class="collapse <?php echo !empty($key) == 0 ? 'show' : ''; ?>"
                                             aria-labelledby="heading<?php echo $number; ?>"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php echo $value['content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                            endif;
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="vk-about__section--style-1">
                <div class="vk-img"><img src="<?php echo !empty(get_field('title')) ? get_field('title') : ''; ?>"
                                         alt=""></div>
            </div>

            <div class="vk-about__section" id="partnerAbout">
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="vk-about__title"><?php echo !empty(get_field('section_7')['title_left']) ? get_field('section_7')['title_left'] : ''; ?></h2>
                    </div>
                    <div class="col-lg-9">
                        <div class="vk-cus__list slick-slider vk-slider slick-initialized" data-slider="cus">
                            <div aria-live="polite" class="slick-list draggable">
                                <?php if (!empty(get_field('section_7')['logo_partner'])) :
                                    $column_2_item = array_chunk(get_field('section_7')['logo_partner'], 2); ?>
                                    <div class="slick-track" role="listbox"
                                         style="opacity: 1; width: 808px; left: 0px;">
                                        <?php $i = 0;
                                        foreach ($column_2_item as $key => $value) : ?>
                                            <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                                 aria-hidden="false" tabindex="-1" role="option"
                                                 aria-describedby="slick-slide<?php echo $i; ?>" style="width: 202px;">
                                                <?php foreach ($value as $value) : ?>
                                                    <div>
                                                        <div class="_item" style="width: 100%; display: inline-block;">
                                                            <div class="vk-img"><img
                                                                        src="<?php echo $value['image']['url']; ?>"
                                                                        alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        <?php endforeach; ?>


<!--                                        <div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false"-->
<!--                                             tabindex="-1" role="option" aria-describedby="slick-slide03"-->
<!--                                             style="width: 202px;">-->
<!--                                            <div>-->
<!--                                                <div class="_item" style="width: 100%; display: inline-block;">-->
<!--                                                    <div class="vk-img"><img-->
<!--                                                                src="http://tpl.gco.vn/nhaviet/images/cus-7.png" alt="">-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div>-->
<!--                                                <div class="_item" style="width: 100%; display: inline-block;">-->
<!--                                                    <div class="vk-img"><img-->
<!--                                                                src="http://tpl.gco.vn/nhaviet/images/cus-8.png" alt="">-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="vk-divider--style-1 mt-50 mb-30"></div>

<!--            <div class="vk-about__section mb-50" id="contactAbout">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-6">-->
<!--                        <div class="_left">-->
<!--                            <div class="vk-about__contact">-->
<!--                                <h2 class="vk-about__title">Liên hệ</h2>-->
<!--                                <ul class="vk-about__contact-list">-->
<!--                                    <li>-->
<!--                                        <i class="_icon fa fa-map-marker"></i>-->
<!--                                        <div class="_text">-->
<!--                                            --><?php //echo !empty(get_field('option_contact')) ? get_field('option_contact')['dia_chi'] : ''; ?>
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <i class="_icon fa fa-phone"></i>-->
<!--                                        <div class="_text">-->
<!--                                            <a href="tel:--><?php //echo !empty(get_field('option_contact')) ? get_field('option_contact')['sdt'] : ''; ?><!--">--><?php //echo !empty(get_field('option_contact')) ? get_field('option_contact')['sdt'] : ''; ?>
<!--                                                </a>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!---->
<!--                                    <li>-->
<!--                                        <i class="_icon fa fa-envelope"></i>-->
<!--                                        <div class="_text">-->
<!--                                            <a href="mailto:--><?php //echo !empty(get_field('option_contact')) ? get_field('option_contact')['email'] : ''; ?><!--<">--><?php //echo !empty(get_field('option_contact')) ? get_field('option_contact')['email'] : ''; ?><!--</a>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 pt-50 pt-lg-0">-->
<!--                        <div class="vk-about__form">-->
<!--                            <div class="vk-form vk-form--about">-->
<!--                                --><?php //echo do_shortcode('[contact-form-7 id="1596" title="Liên hệ"]'); ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>


<!--        <div class="vk-about__footer">-->
<!--            <a href="#" class="vk-img"><img src="http://nhavietdesign.vn/wp-content/uploads/2019/04/imagefix.png" alt=""></a>-->
<!--        </div>-->
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


    <?php
    get_footer();
    ?>

