<?php 
    $options = get_option( 'section-slider_option_name' );   
  
    $slider_post_type= $options['slider-select-id'];
    $slider_num = $options['slider-number-id']; ?>

<!-- bxslider-wrapper -->
<div class="bxslider-wrapper">

    <!-- slider -->
    <div id="slider">

        <ul id="main-bxslider" class="bxslider mainslider --fademode">
           
            <?php
         
                $args = array(
                     'post_type' => $slider_post_type,
                     'order' => 'desc',
                     'orderby' => 'date',
                     'posts_per_page' => $slider_num
                );

                query_posts( $args );

                while ( have_posts() ) : the_post(); 

                    $slider_heading = get_post_meta( get_the_id(), '_pt-field-slider-heading', true );
                    $slider_small = get_post_meta( get_the_id(), '_pt-field-slider-small', true ); ?>

                    <li>

                        <!-- mainslide-wrap -->
                        <div class="mainslide-wrap">

                            <!-- featured-thumbnail -->
                            <div class="featured-thumbnail">
                                
                                <?php 
                                    the_post_thumbnail( 'feature-image-slider', 
                                                        array(
                                                               'class' => 'fixed-horizontal'
                                                             ) 
                                                      ); ?>

                            </div>
                            <!-- #featured-thumbnail -->

                            <!-- featured-caption -->
                            <div class="featured-caption">

                                <!-- featured-caption-wrap -->
                                <div class="featured-caption-wrap flex">

                                    <div class="slider-caption-wrap">

                                        <h1 class="caption">
                                            <?php echo strip_tags( $slider_heading ); ?>
                                        </h1>

                                        <small class="caption">
                                            <?php echo strip_tags( $slider_small ); ?>
                                        </small>

                                    </div>

                                </div>
                                <!-- #featured-caption-wrap -->

                            </div>
                            <!-- #featured-caption -->

                        </div>
                        <!-- #mainslide-wrap -->

                    </li>
              
          <?php endwhile; 
            wp_reset_query(); ?>

        </ul>   
        
    </div>
    <!-- #slider -->

</div>
<!-- #bxslider-wrapper -->