<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
if(empty($posts_per_row)) $posts_per_row = 4;
$css_class .= ' ' . $style;
$css_class .= ' cols_' . $posts_per_row;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type' => 'stm_service',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged
);

$categories = get_terms( 'stm_service_category' );

if( empty( $img_size ) ) {
    $img_size = 'consulting-image-255x182-croped';
}

if( $category != 'all' ) {
    $args[ 'stm_service_category' ] = $category;
}

$services = new WP_Query( $args );

$count_posts = wp_count_posts( 'stm_service' );
$term_list = wp_get_post_terms( get_the_ID(), 'stm_service_category' );
$published_posts = $count_posts->publish;

if($style == 'style_3'){
    wp_enqueue_style( 'owl.carousel' );
    wp_enqueue_script( 'owl.carousel' );
}
?>

<?php if( $services->have_posts() ): ?>
    <?php if( $style == 'style_3' ): ?>
        <div class="owl-carousel stm_services<?php echo esc_attr( $css_class ); ?>" data-per-row="<?php echo esc_attr($posts_per_row); ?>">
            <?php while ( $services->have_posts() ): $services->the_post(); ?>
                <?php
                $term_list = wp_get_post_terms( get_the_ID(), 'stm_service_category' );
                ?>
                <div class="item">
                    <div class="item_wr">
                        <?php $url = esc_url( get_the_permalink( get_the_id() ) ); ?>
                        <div class="content">
                            <?php if( !$service_cat2 and $term_list ): ?>
                                <h4
                                    class="category"
                                    <?php if(!empty($category_color)) echo 'style="color:' . esc_attr($category_color) . '"'; ?>><?php echo esc_html( $term_list[ 0 ]->name ); ?></h4>
                            <?php endif; ?>
                            <?php if( !$service_title ): ?>
                                <h5><a
                                    href="<?php echo esc_url( $url ); ?>"
                                    <?php if(!empty($title_color)) echo 'style="color:' . esc_attr($title_color) . '"'; ?>><?php the_title(); ?></a></h5>
                            <?php endif; ?>
                        </div>
                        <?php if( !$service_image and has_post_thumbnail() ): ?>
                            <?php
                            $post_thumbnail = wpb_getImageBySize( array(
                                'attach_id' => get_post_thumbnail_id(),
                                'thumb_size' => $img_size,
                            ) );
                            $post_thumbnail = $post_thumbnail[ 'thumbnail' ];
                            ?>

                            <div class="item_thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo consulting_filtered_output( $post_thumbnail ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php elseif( $style == 'style_2' ) : ?>
        <div class="stm_services<?php echo esc_attr( $css_class ); ?>">
            <?php while ( $services->have_posts() ): $services->the_post(); ?>
                <?php
                $term_list = wp_get_post_terms( get_the_ID(), 'stm_service_category' );
                ?>
                <div class="item">
                    <div class="item_wr">
                        <?php $url = esc_url( get_the_permalink( get_the_id() ) ); ?>
                        <div class="content">
                            <?php if( !$service_cat2 and $term_list ): ?>
                                <h4
                                class="category"
                                <?php if(!empty($cattegory_color)) echo 'style="color:' . esc_attr($category_color) . '"'; ?>><?php echo esc_html( $term_list[ 0 ]->name ); ?></h4>
                            <?php endif; ?>
                            <?php if( !$service_title ): ?>
                                <h5><a
                                        href="<?php echo esc_url( $url ); ?>"
                                        <?php if(!empty($title_color)) echo 'style="color:' . esc_attr($title_color) . '"'; ?>><?php the_title(); ?></a></h5>
                            <?php endif; ?>
                        </div>
                        <?php if( !$service_title and has_post_thumbnail() ): ?>
                            <?php
                            $post_thumbnail = wpb_getImageBySize( array(
                                'attach_id' => get_post_thumbnail_id(),
                                'thumb_size' => $img_size,
                            ) );
                            $post_thumbnail = $post_thumbnail[ 'thumbnail' ];
                            ?>

                            <div class="item_thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo consulting_filtered_output( $post_thumbnail ); ?>
                                </a>
                                <?php if( stm_check_layout( 'layout_18' ) ): ?>
                                    <h5
                                        class="stm_title_l18"
                                        <?php if(!empty($ctitle_color)) echo 'style="color:' . esc_attr($title_color) . '"'; ?>><?php the_title(); ?></h5>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="stm_services<?php echo esc_attr( $css_class ); ?>">
            <?php while ( $services->have_posts() ): $services->the_post(); ?>
                <?php
                $term_list = wp_get_post_terms( get_the_ID(), 'stm_service_category' );
                ?>
                <div class="item">
                    <div class="item_wr">
                        <?php if( !$service_title and has_post_thumbnail() ): ?>
                            <?php
                            $post_thumbnail = wpb_getImageBySize( array(
                                'attach_id' => get_post_thumbnail_id(),
                                'thumb_size' => $img_size,
                            ) );
                            $post_thumbnail = $post_thumbnail[ 'thumbnail' ];
                            ?>

                            <div class="item_thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo consulting_filtered_output( $post_thumbnail ); ?>
                                </a>
                                <?php if( stm_check_layout( 'layout_18' ) ): ?>
                                    <h5
                                        class="stm_title_l18"
                                        <?php if(!empty($title_color)) echo 'style="color:' . esc_attr($title_color) . '"'; ?>><?php the_title(); ?></h5>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php $url = esc_url( get_the_permalink( get_the_id() ) ); ?>
                        <div class="content" <?php if(!empty($excerpt_color)) echo 'style="color:' . esc_attr($excerpt_color) . '"'; ?>>
                            <?php if( !$service_cat and $term_list ): ?>
                                <div class="category" <?php if(!empty($cattegory_color)) echo 'style="color:' . esc_attr($category_color) . '"'; ?>>
                                    <?php echo esc_html( $term_list[ 0 ]->name ); ?> <i
                                            class=" fa fa-chevron-right stm_icon"></i>
                                </div>
                            <?php endif; ?>
                            <?php if( !$service_title ): ?>
                                <h5><a href="<?php echo esc_url( $url ); ?>" <?php if(!empty($title_color)) echo 'style="color:' . esc_attr($title_color) . '"'; ?>><?php the_title(); ?></a></h5>
                            <?php endif; ?>
                            <?php if( !$service_excerpt and get_the_excerpt() ) : ?>
                                <?php the_excerpt(); ?>
                            <?php endif; ?>
                            <?php if( !$service_more ): ?>
                                <a class="read_more" href="<?php echo esc_url( $url ); ?>" <?php if(!empty($link_color)) echo 'style="color:' . esc_attr($link_color) . '"'; ?>>
                                    <span><?php echo esc_html__( 'read more', 'consulting' ); ?></span>
                                    <i class=" fa fa-chevron-right stm_icon"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php endif;
wp_reset_postdata(); ?>