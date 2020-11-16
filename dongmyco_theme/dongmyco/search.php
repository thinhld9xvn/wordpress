<?php get_header() ?>
        
    </header>
    <!-- #header -->
    
    <!-- main -->
	<section id="main">

		<!-- container -->
		<div class="container">

			<!-- home-colleft -->
			<div class="home-column home-colleft col-md-8 col-sm-8 col-xs-12">
			    
			     <?php $s = get_search_query(); ?>
			     
				<!-- tquizHead -->
				<div id="tquizHead" class="tquizHead">
					Kết quả tìm kiếm: "<?php echo $s; ?>"
				</div>
				<!-- #tquizHead -->

				<!-- home-mtoastbox -->
				<div class="home-quizbox home-mtoastbox">

				<?php 
				       $args = array(
                           's' => $s
                       );
                       query_posts( $args );
                       
				      while ( have_posts() ) : the_post();
    						
    						$thumb_id = get_post_thumbnail_id();
    								
    						$thumb = wp_get_attachment_image_src( $thumb_id, 'full' );
    						$thumb = $thumb[0];
    						
    						$thumb_title = get_the_title( $thumb_id ); ?>
    
    						<!-- mtoastbox-section -->
    						<div class="mtoastbox-section <?= $n % 2 === 0 ? 'home-quizleft' : 'home-quizright' ?> col-md-6 col-sm-6 col-xs-12">
    	
    							<!-- mtoast-post -->
    							<div class="mtoast-post">
    	
    								<!-- thumb -->
    								<div class="thumb">
    									<a href="<?php the_permalink(); ?>">
    										<img src="<?php echo $thumb; ?>" alt="<?php echo $thumb_title; ?>" />
    									</a>
    								</div>
    								<!-- #thumb -->
    	
    								<!-- title -->
    								<div class="title">
    									
    									<a href="<?php the_permalink(); ?>">
    										<?php echo short_text( get_the_title(), 60 ); ?>
    									</a>
    									
    								</div>
    								<!-- #title -->
    	
    								<!-- meta -->
    								<div class="meta">
    	
    									<span class="date-created">
    										<?php echo get_the_date('d/m/Y'); ?>
    									</span>
    	
    									<span class="sp">
    										/
    									</span>
    	
    									</span class="view">
    										<?php echo getPostViews( get_the_id() ) . ' lượt xem'; ?>
    									</span>
    	
    								</div>
    								<!-- #meta -->
    	
    								<!-- excerpt -->
    								<div class="excerpt">
    									<?php echo short_text( get_the_excerpt(), 162 ); ?>
    								</div>
    								<!-- #excerpt -->
    	
    							</div>
    							<!-- #mtoast-post -->
    	
    						</div>
    						<!-- #mtoastbox-section -->	
    						
    			<?php endwhile; 
    				  wp_reset_query();
    				  
    				  echo easy_wp_pagenavigation(); ?>
					
				</div>
				<!-- #home-mtoastbox -->

			</div>
			<!-- home-colleft -->	

			<!-- home-colright -->
			<div class="home-column home-colright col-md-4 col-sm-4 col-xs-12">

				<?php dynamic_sidebar('ColRight Sidebar'); ?>

			</div>
			<!-- #home-colright -->

		</div>
		<!-- #container -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>       