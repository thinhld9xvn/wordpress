<?php 
    $options = get_option( 'section-slider_option_name' ); 
  
    $slider_post_type= $options['slider-select-id'];
    $slider_num = $option['slider-number-id']; ?>

<!-- slider -->
<div id="slider" class="slider mtop20-ms">
    
   <ul class="bxslider" 
       data-direction="fade" 
       data-minSlides="1">
       
       <?php
       
           $args = array(
               'post_type' => $slider_post_type,
               'order' => 'desc',
               'orderby' => 'id',
               'posts_per_page' => $slider_num
           );

           query_posts( $args );

           while ( have_posts() ) : the_post(); ?>
       
              <li>
                <?php the_post_thumbnail( 'feature-image-slider' ); ?>
              </li>
            
        <?php endwhile; 
          wp_reset_query(); ?>
        
    </ul>
    
</div>
<!-- #slider -->