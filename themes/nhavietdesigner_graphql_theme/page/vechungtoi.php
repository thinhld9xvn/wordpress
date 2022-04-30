<?php
/* Template Name: Ve Chung Toi Template */
get_header();
if (have_rows('option_page')):
    ?>
    <div data-layout="" data-offset="0">
        <div class="vk-project__content" style="overflow: hidden">

            <div class="vk-project__container">
                <div class="row vk-project__list">
                    <?php while (have_rows('option_page')) : the_row(); ?>
                        <div class="col-lg-4 _item">
                            <div class="vk-project-item vk-project-item--style-2">
                                <a href="<?php echo get_sub_field('link');?>" class="vk-project-item__img" data-toggle="modal"
                                   data-target="#exampleModal">
                                    <img src="<?php echo get_sub_field('background')['url'];?>" alt="<?php echo get_sub_field('background')['alt'];?> class="_img">
                                </a>

                                <div class="vk-project-item__brief">
                                    <h3 class="vk-project-item__title"><a href="<?php echo get_sub_field('link');?>" title="<?php echo get_sub_field('ten');?>"
                                                                          data-toggle="modal"
                                                                          data-target="#exampleModal"><?php echo get_sub_field('ten');?></a></h3>
                                    <div class="vk-project-item__text">
                                        <?php echo get_sub_field('mo_ta');?>
                                    </div>

                                    <div class="vk-project-item__button">
                                        <a href="<?php echo get_sub_field('link');?>" class="vk-project-item__btn">Chi tiết <i
                                                    class="_icon fa fa-arrow-right"></i></a>
                                    </div>


                                </div>

                                <a href="<?php echo get_sub_field('link');?>" class="vk-project-item__link"></a>


                            </div> <!--./vk-project-item-->
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>


        </div>
    </div>
<?php endif; ?>

<?php
get_footer();
