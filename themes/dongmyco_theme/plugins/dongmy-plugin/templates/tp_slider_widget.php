<?php 
    $options = get_option( 'section-slider_option_name' ); 
  
    $slider_post_type= $options['slider-select-id'];
    $slider_num = $option['slider-number-id'];
?>

<!-- slider -->
<div class="slider flexslider">
    
   <ul class="slides">
       
       <?php
       
           $args = array(
               'post_type' => $slider_post_type,
               'order' => 'desc',
               'orderby' => 'id',
               'posts_per_page' => $slider_num
           );
           
           query_posts( $args );
           while ( have_posts() ) : the_post(); 
               
               $thumb_id = get_post_thumbnail_id();
               $thumb_title = get_the_title();
               $thumb = wp_get_attachment_image_src( $thumb_id, 'full');
               $thumb = $thumb[0]; ?>
       
            <li>
              <img src="<?php echo $thumb ?>" alt="<?php echo $thumb_title; ?>" />
            </li>
            
        <?php endwhile; 
          wp_reset_query(); ?>
        
    </ul>
    
</div>
<!-- #slider -->