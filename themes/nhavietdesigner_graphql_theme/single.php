<?php

get_header();
get_template_part('template-parts/header', 'page');
?>



        <div class="container pt-60 pb-60 pt-lg-100 pb-lg-100">

            <div class="vk-blog-detail__content">

                <div class="vk-blog-detail__date"><i
                            class="_icon fa fa-newspaper-o"></i> <?php echo get_the_date('j F Y'); ?></div>
                <h1 class="vk-blog-detail__title"><?php echo get_the_title(); ?></h1>
                <div class="_brief">
                    <?php echo !empty(get_field('mo_ta_ngan')) ? get_field('mo_ta_ngan') : ''; ?>
                </div>
                <div class="_thumbnail">
                    <?php The_post_thumbnail();?>
                </div>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>

                        <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted
                            in <?php the_category(', ') ?>
                            | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?></p>
                    </div>
                <?php endwhile; endif; ?>


            </div>

        </div>

        <div class="vk-blog__relate">

            <div class="container">
            
                <div class="vk-blog__list--style-2 row vk-slider slick-initialized slick-slider"
                     data-slider="blog-relate">
                     <div aria-live="polite" class="slick-list draggable">
                        <div class="row">
                            <?php 
                                $category=get_the_category(); 
                                foreach($category as $cate){
                                    $id=$cate->term_id;
                                }
                                $query=new WP_Query(array(
                                    'post_type'=>'post',
                                    'posts_per_page'=>3,
                                    'orderby'=>'ID',
                                    'order'=>'DESC',
                                    'tax_query'=>array(
                                        array(
                                            'taxonomy'=>'category',
                                            'field'=>'term_id',
                                            'terms'=>$id
                                        )
                                    )
                                ));
                                while($query->have_posts()): $query->the_post();
                            ?>
                            <div class="col-xs-6 col-md-4 _item"
                                 data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 380px;">
                                <div class="vk-blog-item vk-blog-item--style-2">
                                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo the_title();?>"
                                       class="vk-blog-item__img" tabindex="-1">
                                        <?php echo get_the_post_thumbnail(get_the_ID()); ?>
                                    </a>

                                    <div class="vk-blog-item__brief">
                                        <h3 class="vk-blog-item__title"><a href="<?php echo get_the_permalink(); ?>"
                                                                           title="<?php echo the_title();?>"
                                                                           tabindex="-1"><?php echo the_title();?></a></h3>
                                    </div>
                                </div> <!--./vk-blog-item-->
                            </div>
                            <?php endwhile; ?>
                    </div>
                </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



<?php

get_footer();
