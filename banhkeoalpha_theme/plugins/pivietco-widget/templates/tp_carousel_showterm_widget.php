<?php 

    $uconvert = new UConvert( $title, UConvert::UNICODE );                                  

    echo $before_widget;

        echo $before_title . $uconvert->transform( UConvert::VNI ) . $after_title;

        $term = get_term_by( 'id', $term_id, $taxonomy_slug );
    
        $args = array(
                
            'post_type' => $custom_post_type,
            'order' => 'desc',
            'orderby' => 'id',
            'posts_per_page' => $posts_per_page,
            'tax_query' => array(

                array(
                    'taxonomy' => $taxonomy_slug,
                    'field' => 'slug',
                    'terms' => array( $term->slug )
                )

            )
        ); 
            
        query_posts( $args ); 

        if ( have_posts() ) : ?>

            <!-- sectionContent -->
            <div class="sectionContent padtb20">               

                <!-- carouselProduct -->
                <div class="bxslider --carousel carouselProduct">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <!-- itemCProd -->
                        <div class="slide itemCProd">

                            <!-- itemCProdWrap -->
                            <div class="itemCProdWrap bg_white">

                                <!-- CProdThumb -->
                                <div class="CProdThumb">

                                    <a href="<?php the_permalink(); ?>">

                                        <?php 
                                            echo get_the_post_thumbnail( get_the_id(), 
                                                                         'feature-image-carousel-product', 
                                                                         array(
                                                                            'class' => 'fixed-vertical'
                                                                         ) 
                                                                       ); ?>
                                        
                                    </a>

                                </div>
                                <!-- #CProdThumb -->                                        

                            </div>
                            <!-- #itemCProdWrap -->

                            <!-- CProdTitle -->
                            <div class="CProdTitle mtop10">

                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>

                            </div>
                            <!-- #CProdTitle -->

                        </div>
                        <!-- #itemCProd --> 

                    <?php endwhile; 
                          wp_reset_query(); ?>

                </div>
                <!-- #carouselProduct -->

            </div>
            <!-- #sectionContent -->

    <?php endif; 

    echo $after_widget; ?>