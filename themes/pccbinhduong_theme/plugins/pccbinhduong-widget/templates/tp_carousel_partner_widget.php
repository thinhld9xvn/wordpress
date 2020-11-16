<?php 
    echo $before_widget;
    
        $args = array(
                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'id',
                'posts_per_page' => $posts_per_page
            ); 
            
        query_posts( $args ); 
        
        echo $before_title . $title . $after_title; 
      
      	if ( have_posts() ) : ?>

			<!-- boxLogoPartner -->
			<div class="boxLogoPartner mtop20">

				<div class="marqueePartner --rightToLeft">

					<p>
					
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php the_post_thumbnail( 'theme-feature-image-logo-partner', array( 'class' => 'outline --w2 --lightgray' ) ); ?>
							
						<?php endwhile; 
							wp_reset_query(); ?>

					</p>
					

				</div>							

			</div>
			<!-- #boxLogoPartner -->

		
	<?php endif; ?>
    	
<?php echo $after_widget; ?>