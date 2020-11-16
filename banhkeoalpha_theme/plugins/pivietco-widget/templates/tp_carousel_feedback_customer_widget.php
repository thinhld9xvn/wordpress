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

			<!-- boxCustomerFeedback -->
			<div class="boxCustomerFeedback mtop20">
		
				<!-- owl-carousel -->
				<div class="owl-carousel" data-carousel-items="1" data-carousel-autoplay="true" data-carousel-navigation="false" data-carousel-pagination="true" data-carousel-singleitem="true">
					
					<?php while ( have_posts() ) : the_post(); ?>
		
						<!-- item -->
						<div class="item">								
			
							<!-- avatar -->
							<div class="avatar">
			
								<?php the_post_thumbnail( 'theme-feature-image-avatar-customer');  ?>
			
							</div>
							<!-- #avatar -->
			
							<!-- feedback -->
							<div class="feedback">
			
								<div class="fck-content">
									
									<span class="chquote fa fa-quote-left"></span> 
									
									<?php echo excerpt(200); ?>
									
									<span class="chquote fa fa-quote-right"></span>
			
								</div>
			
								<div class="fck-author mtop10">
									<strong><?php the_title(); ?></strong>
								</div>
			
							</div>
							<!-- #feedback -->
			
						</div>
						<!-- #item -->
						
					<?php endwhile; 
						wp_reset_query(); ?>
		
				</div>
				<!-- #owl-carousel -->
		
			</div>
			<!-- #boxCustomerFeedback -->
		
	<?php endif; ?>
    	
<?php echo $after_widget; ?>