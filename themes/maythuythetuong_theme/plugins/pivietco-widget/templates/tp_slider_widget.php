<?php 
    $options = get_option( 'section-slider_option_name' );   
  
    $slider_post_type= $options['slider-select-id'];
    $slider_num = $options['slider-number-id']; ?>

<!-- bxslider-cn-wrapper -->
<div class="bxslider-cn-wrapper mainslider-cn-wrapper">

    <!-- slider -->
    <div id="slider">

        <ul id="slider" class="bxslider --fademode --dot">
           
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
                       <?php 
                            the_post_thumbnail( 'feature-image-slider', 
                                                array(
                                                   'class' => 'fixed-horizontal'
                                                ) 
                                              ); ?>
                    </li>
              
          <?php endwhile; 
                wp_reset_query(); ?>

        </ul>   
        
    </div>
    <!-- #slider -->

</div>
<!-- #bxslider-wrapper -->