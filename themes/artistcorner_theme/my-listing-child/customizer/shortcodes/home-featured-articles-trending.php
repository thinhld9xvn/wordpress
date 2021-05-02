<?php 
    add_shortcode( 'artistcorner-featured-articles-trending', '__sc_artist_corner_featured_articles_trending' );

    function __sc_artist_corner_featured_articles_trending( $atts ) { 

         $atts = shortcode_atts( array(                   
                    'heading' => 'Article Trending',
                    'num_items' => 6
                ), $atts, 'artistcorner-featured-articles-trending' ); 
                
            $args = array(
                'post_type' => 'post',
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => (int) $atts['num_items']
            );

            query_posts( $args );
        
        ?>

        <div class="fullwidth-section section-featured-article bg_white __grab">

            <div class="container">

                <div class="section-wrapper">

                    <h2 class="home-headline"><?php echo $atts['heading'] ?></h2>

                    <div class="main-content mtop60">

                        <?php if ( have_posts() ) : ?>

                            <div class="grid-three-columns">

                                <?php while ( have_posts() ) : the_post(); 
                                
                                    $post_modified_time = get_post_modified_time();
                                    $month = date('F', $post_modified_time);
                                    $day = date('d', $post_modified_time); 
                                    
                                    $thumbnail_url = get_the_post_thumbnail_url( get_the_id(), 'full' ); 
                                    
                                    $categories = get_the_category(); ?>

                                    <div class="single-blog-feed grid-item">
                                        <div class="sbf-container">
                                            <div class="lf-head">
                                                <div class="lf-head-btn event-date">
                                                    <span class="e-month"><?php echo $month ?></span> 
                                                    <span class="e-day"><?php echo $day ?></span>
                                                </div>
                                            </div>
                                            <div class="sbf-thumb">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="overlay"></div>
                                                    <?php if ( $thumbnail_url ) : ?>
                                                        <div
                                                            class="sbf-background"
                                                            style="background-image: url('<?php echo $thumbnail_url ?>');"
                                                        ></div> 
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="sbf-title">
                                                <a href="<?php the_permalink(); ?>" 
                                                    class="case27-secondary-text"><?php the_title(); ?></a>
                                                <p><?php print_excerpt(80); ?></p>
                                            </div>
                                            <div class="listing-details">

                                                <?php if ( $categories ) : ?>

                                                    <ul class="c27-listing-preview-category-list">

                                                        <?php foreach( $categories as $cat ) : ?>
                                                            <li>
                                                                <a href="<?php echo get_category_link( $cat ) ?>">
                                                                    <span class="cat-icon" style="background-color: #6c1cff;"> 
                                                                        <i class="mi bookmark_border" style="color: #fff;"></i> </span> 
                                                                    <span class="category-name"><?php echo strtoupper( $cat->name ) ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>

                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div> 

                                <?php endwhile; ?>

                            </div>

                        <?php endif; 
                             wp_reset_query(); ?>

                    </div>

                </div>

            </div>

        </div>

        

<?php }