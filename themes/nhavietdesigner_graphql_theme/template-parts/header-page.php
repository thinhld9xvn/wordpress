<div class="vk-blog">
    <?php
    if (!empty(get_field('thumb_banner', 'option'))) :
        $group_thumb = get_field('thumb_banner', 'option');
        if (is_archive()) :
            $thumb = $group_thumb['image_default_cat'];
        elseif (is_single()) :
            $thumb = $group_thumb['image_default_post'];
        else:
            $thumb = '';
        endif;
    endif;

    ?>
    <div class="vk-blog__banner"
         style="background-image: url('<?php echo !empty(get_field('banner')) ? get_field("banner") : $thumb; ?>'">

        <div class="container">
            <?php if (!empty(get_field('tieu_de') || !empty(get_field('heading_banner')))) : ?>
                <div class="_content">
                    <div class="_box">
						<h1 class="vk-blog__title"><?php echo get_the_title(); ?></h1>
                        <?php if (!empty(get_field('heading_banner'))) : ?>
                            <div>
                                <?php echo get_field('heading_banner'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div> <!--./banner-->
