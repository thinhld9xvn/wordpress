<div class="col-sm-6 col-md-6 col-lg-12 _item">
    <div class="vk-blog-item vk-blog-item--style-1">
        <a href="blog-details.html" title="<?php echo get_the_title();?>"
           class="vk-blog-item__img">
            <?php the_post_thumbnail(); ?>
        </a>

        <div class="vk-blog-item__brief">
            <h3 class="vk-blog-item__title"><a href="<?php echo get_permalink(); ?>"
                                               title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
            </h3>
            <div class="vk-blog-item__date"><i
                    class="_icon fa fa-newspaper-o"></i> <?php echo get_the_date('j F Y'); ?></div>
            <div class="vk-blog-item__text" data-truncate-lines="4">
                <?php the_excerpt(); ?>
            </div>
        </div>
</div>