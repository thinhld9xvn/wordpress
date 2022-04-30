<?php
/* Template Name: SHOP Template */
get_header();
get_template_part('template-parts/header', 'style-2');
?>
    <div class="vk_tab_content">
        <div class="">
            <ul class="nav nav-tabs" role="tablist">
                <?php 
                    $args = array(
                        'type' =>'productnv',//optional
                        'number' => '',
                        'hide_empty' => 0,
                        'taxonomy'  => 'productnv1',
                    );
                    $categories = get_categories( $args );
                ?>
                <?php
                    $i = 0;
                    foreach($categories as $cat):
                    $i++;
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if( $i == 1 ){ echo 'active'; } ?>" href="#<?php echo $cat->slug; ?>" role="tab" data-toggle="tab"><?php echo $cat->name;  ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php $i = 0; ?>
                <?php foreach ($categories as $cat): $i++?>
                    <div role="tabpanel" class="tab-pane fade <?php 
                        if( $i == 1 ){
                            echo 'in show active';
                        }
                    ?>" id="<?php echo $cat->slug; ?>">
                        <div class="vk-container row">
                        <?php 
                            $args = array(
                                'posts_per_page' => -1,
                                'post_type' => 'productnv',
                                'post_status' => 'publish',
                                'tax_query' => array(
                                array(
                                        'taxonomy' => 'productnv1',
                                        'field' => 'term_id',
                                        'terms' => $cat->term_id
                                    )
                                )
                            );
                         $the_query = new WP_Query($args);
                         if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 box">
                                <div class="item_pr" >
                                    <a href="javascript:0" class="img_cate" >
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                    <h3>
                                        <a href="javascript:0"><?php echo get_the_title() ?></a>
                                    </h3>
                                    <span class="caret"></span>
                                </div>
                                <div class="box_pr_featured" id="target">
                                    <div class="vk-container row">
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-12">
                                            <?php 
                                            $images = get_field('thu_vien_anh'); 
                                            if( $images ): ?>
                                                <div class="owl-carousel owl-theme pr_featured">
                                                    <?php foreach ($images as $image): ?>
                                                        <div class="item">
                                                            <img src="<?php echo $image['sizes']['large']; ?>" 
                                                                alt="<?php echo $image['alt']; ?>" class="_img">
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-4 col-md-5 col-sm-5 col-12">
                                            <div class="infor_pr_featured">
                                                <h3>
                                                    <a href="javascript:;"><?php echo get_the_title(); ?></a>
                                                </h3>
                                                <div class="vk_des_pr_featured">
                                                    <?php echo get_field('mo_ta'); ?>
                                                </div>
                                                <a class="vk_more d-lg-none d-md-none d-sm-none" href="javascript:;0">Giá liên hệ</a>
                                                <a class="vk_more vk_more_mb" href="#">Giá liên hệ</a>
                                            </div>
                                        </div>
                                        <button class="btn_button">X</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                        </div>
                  </div>
              <?php endforeach ?>
            </div>
        </div>
    </div>
<?php
    get_footer();