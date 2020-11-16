<?php get_header(); 
	  $head_options = get_option('section-header_option_name');
	  $slider_options = get_option('section-slider_option_name'); ?>
	 
	<!-- main -->
	<section id="main">

		<!-- flexslider -->
		<div class="flexslider">
		    
		   <ul class="slides">
		       
		       <?php
		       
		           $args = array(
		               'post_type' => $slider_options['slider-select-id'],
		               'order' => 'asc',
		               'orderby' => 'id',		             
		               'posts_per_page' => $slider_options['slider-number-id']
		           );

		           query_posts( $args );

		           while ( have_posts() ) : the_post(); 
		               
		               $thumb_id = get_post_thumbnail_id();
		               $thumb_tag = wp_get_attachment_image( $thumb_id, 'full' ); ?>
		       
		            <li>
		              <?php echo $thumb_tag; ?>
		            </li>
		            
		        <?php endwhile; 		        
		          wp_reset_query(); ?>
		        
		    </ul>
		    
		</div>
		<!-- #slider -->

		<!-- support -->
		<div class="support">

			<!-- container -->
			<div class="container">
				<img class="w100p" src="<?php echo $head_options['banner-support-id']; ?>" alt="support" />
			</div>
			<!-- #container -->

		</div>
		<!-- #support -->

		<!-- spboxlist -->
		<div class="spboxlist">

			<!-- container -->
			<div class="container">

				<!-- colleft -->
				<div class="colleft col-md-3 col-sm-3 col-xs-12">

					<?php dynamic_sidebar('ColLeft Sidebar'); ?>

				</div>
				<!-- #colleft -->

				<!-- colright -->
				<div class="colright padleft20-md padleft20-sm mtop20-xs col-md-9 col-sm-9 col-xs-12">	
				
					<?php dynamic_sidebar('ColRight Home Sidebar'); ?>
					
				</div>
				<!-- #colright -->

			</div>
			<!-- #container -->

		</div>
		<!-- #spboxlist -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>