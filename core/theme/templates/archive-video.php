<?php 
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;	

    $post_type = get_query_var('post_type');    
    $post_type_obj = get_post_type_object( $post_type ); 

    $args = array(

         'post_type' => $post_type,
         'order' => 'desc',
         'orderby' => 'date',
         'paged' => $paged

    ); 

    query_posts( $args ); ?>

<!-- main -->
<section id="main">	

	<!-- breadcumbs -->
	<div id="breadcumbs">

		<!-- container -->
		<div class="container">

			<?php
				the_breadcrumbs('_breadcumbs', '_breadcumbs', 'Trang chủ', '<span class="divide"></span>'); ?>	

		</div>
		<!-- #container -->

	</div>
	<!-- #breadcumbs -->	

	<!-- categoryVideoSection -->
	<div class="pageSection categorySection categoryVideoSection">

		<!-- container -->
		<div class="container">

			<!-- spHeadingTitle -->
			<h2 class="spHeadingTitle">

				<span><?php echo $post_type_obj->label; ?></span>

			</h2>
			<!-- #spHeadingTitle -->

			<?php if ( have_posts() ) : ?>

					<!-- sectionMainContent -->
					<div class="sectionMainContent ohidden mtop20">

						<!-- four-columns-layout -->
						<div class="split-columns lightGallery four-columns-layout">

							<?php while ( have_posts() ) : the_post(); 

									$video_url = get_post_meta( get_the_id(), '_pt-field-video-url', true ); ?>

									<!-- video -->
									<div class="item-layout article video col-md-3 col-sm-6 col-xs-12">

										<!-- thumbnail -->
										<div class="thumbnail">

											<a class="item" href="<?php echo $video_url; ?>">

												<?php the_post_thumbnail( 'feature-image-article-thumbnail', array('class' => 'fixed-vertical') ); ?>

												<span class="play-button">
												</span>

											</a>									

										</div>
										<!-- #thumbnail -->

										<h4 class="mtop20">

											<?php echo title(100); ?>
											
										</h4>
										
									</div>
									<!-- #video -->

							<?php endwhile; ?>

						</div>
						<!-- #four-columns-layout -->
						
					</div>
					<!-- #sectionMainContent -->

			<?php endif; 
				 wp_reset_query(); 

				the_page_navigation(); ?>
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #categoryVideoSection -->

</section>
<!-- #main -->