<?php 
    $options = get_option( 'section-slider_option_name' );   
  
    $slider_post_type= $options['slider-select-id'];
    $slider_num = $options['slider-number-id'];  ?>

<!-- bxslider-cn-wrapper -->
<div class="bxslider-cn-wrapper">

    <!-- main-bxslider -->
    <ul id="main-bxslider" 
        class="bxslider" 
        data-bxslider-mode="fade">

        <?php
     
            $args = array(
                 'post_type' => $slider_post_type,
                 'order' => 'desc',
                 'orderby' => 'date',
                 'posts_per_page' => $slider_num,
                 'no_paging' => true
            );

            query_posts( $args );

            while ( have_posts() ) : the_post(); ?>

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
    <!-- #main-bxslider -->

</div>
<!-- #bxslider-cn-wrapper -->