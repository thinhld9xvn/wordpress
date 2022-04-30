<?php
/* Template Name: Can Mau Template */
get_header();
get_template_part('template-parts/header', 'page');
?>
    <div class="container pt-60 pb-60 pt-lg-100 pb-lg-100">

        <?php if (!empty(get_field('section_1'))) : ?>
            <div class="vk-about__section">
                <div class="row">
                    <div class="col-lg-5">
                        <h2 class="vk-about__title--style-1"><?php echo get_field('section_1')['titile_left']; ?></h2>
                    </div>
                    <div class="col-lg-7">
                        <?php echo get_field('section_1')['mo_ta_right']; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (get_field('youtube_source')) : ?>
            <div class="vk-about__section">
                <a href="<?php echo get_field('youtube_source')['link']; ?>" data-fancybox=""
                   class="vk-img vk-canmau__video">
                    <img src="<?php echo get_field('youtube_source')['thumb']['url']; ?>" alt="">
                </a>
            </div>
        <?php endif; ?>

        <div class="vk-about__section">
            <div class="row">
                <?php if (get_field('section_2')['mo_ta_trai']): ?>
                    <div class="col-lg-6">
                        <div class="pr-lg-40">
                            <?php echo get_field('section_2')['mo_ta_trai']; ?>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_field('section_2')['mo_ta_phai']): ?>
                    <div class="col-lg-6">
                        <div class="pl-lg-40">
                            <?php echo get_field('section_2')['mo_ta_phai']; ?>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty(get_field('thu_vien_anh'))) :
        $image_galerry = get_field('thu_vien_anh'); ?>
        <div class="vk-about__section1">
            <div class="row vk-canmau__list">
                <?php foreach ($image_galerry as $item) : ?>
                    <div class="col-6 _item">
                        <div class="vk-canmau-item">
                            <a href="<?php echo $item['url'];?>" data-fancybox="gallery"
                               class="vk-canmau-item__img">
                                <img src="<?php echo $item['url'];?>" alt="" class="_img">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>


        </div>
        <?php if (!empty(get_field('footer'))) : ?>
            <div class="vk-canmau__bot">

                <div class="container">

                    <div class="vk-canmau__bot-content">
                        <div class="_title"><?php echo get_field('footer')['title_left']; ?></div>
                        <?php if (!empty(get_field('footer')['btn_right'])) : ?>
                            <a href="<?php echo get_field('footer')['btn_right']['link']; ?>"
                               class="vk-btn"><?php echo get_field('footer')['btn_right']['title']; ?></a>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        <?php endif; ?>


    </div>
<?php
get_footer();
