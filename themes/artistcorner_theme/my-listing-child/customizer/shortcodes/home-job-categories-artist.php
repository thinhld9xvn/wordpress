<?php
    
    add_shortcode( 'artistcorner-job-categories-list', '__sc_artist_corner_job_categories_list' );

    function __sc_artist_corner_job_categories_list( $atts ) { 

         $atts = shortcode_atts( array(                   
                    'heading' => 'Discover Job Categories'
                ), $atts, 'artistcorner-job-categories-list' ); ?>

       <div class="fullwidth-section section-home-singlists section-home-bglayer1">
            <div class="container">
                <div class="section-wrapper">
                    <h2 class="home-headline"><?= $atts['heading'] ?></h2>
                    <div class="section-main mtop60">   
                        
                        <div class="listing-type-anchors listing-type-wrapper flex flex-wrap">                                          
                        
                            <?php 
                                $args = array(

                                    'taxonomy' => JOBS_TAXONOMY,
                                    'hide_empty' => false,
                                    'parent' => 0


                                );

                                $terms = get_terms( $args );     
                                
                                $count = 0;

                                $arrJobsCat = array();

                                foreach ( $terms as $term ) :

                                    $ids = get_listing_type_ids_by_term($term);                               

                                    if ( is_category_jobs_based_ids($ids) ) :

                                        $arrJobsCat[] = $term;                                        
                                    
                                    endif;

                                endforeach;

                                $length = 9;

                                foreach ( $arrJobsCat as $term ) :

                                    if ( $count >= $length ) return;

                                    print_job_categories_begin_tags($count);

                                        print_job_categories_entry($term, $count, $length);

                                    print_job_categories_end_tags($count, $length);

                                    $count++;

                                endforeach;

                                
                            ?>             
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       

<?php }

    