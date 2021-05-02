<?php 
    add_shortcode( 'artistcorner-explore-providers', '__sc_artist_corner_explore_providers' );

    function __sc_artist_corner_explore_providers( $atts ) { 

        global $current_user;

         $atts = shortcode_atts( array(                   
                    'heading' => 'Explore Our Most Value Provider',
                    'num_items' => 6
                ), $atts, 'artistcorner-explore-providers' ); 
                
        $args = array(

            'post_type' => JOBS_POST_TYPE,
            'posts_per_page' => (int) $atts['num_items'],
            'order' => 'desc',
            'orderby' => 'date',
            'author__not_in' => array($current_user->ID),
            'meta_key' => _FIELD_JOBS_TYPE_KEY,
            'meta_value' => _FIELD_JOBS_TYPE_VALUE

        );
        
        query_posts( $args ); ?>

        <div class="fullwidth-section section-explore-provider bg_white __grab">

            <div class="container">

                <div class="section-wrapper">

                    <h2 class="home-headline"><?php echo $atts['heading'] ?></h2>

                    <?php if ( have_posts() ) : ?>

                        <div class="provider-lists __three-columns mtop60">

                            <?php while ( have_posts() ) : the_post(); 

                                    print_entry_profile_in_loop();
                        
                                 endwhile; ?>
                            
                        </div>

                        <div class="load-mores flex flex-just-center mtop40">
                            <a class="button-primary btnExploreProvider" href="<?php print_explore_jobs_more_url() ?>">
                                Explore more <span class="fa fa-angle-double-down padLeft5"></span>
                            </a>
                        </div>

                    <?php endif; 
                          wp_reset_query(); ?>

                </div>

            </div>

        </div>     
        

<?php }