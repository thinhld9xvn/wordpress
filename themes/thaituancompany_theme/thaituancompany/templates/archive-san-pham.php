<?php	

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $post_type = get_query_var('post_type');    

    $post_type_obj = get_post_type_object( $post_type ); ?>

<!-- main -->

<section id="main">

	<?php dynamic_sidebar( 'Slider Sidebar' ); ?>

	<!-- breadcumbs -->
	<div id="breadcumbs">

		<div class="container">

			<?php the_breadcrumbs('bread-cumbs', 'bread-cumbs', 'Trang chủ', '<span class="divide"></span>');?>
	
		</div>		

	</div>	
	<!-- #breadcumbs -->

	<!-- mainColumns -->
     <div class="mainColumns singleProduct mtop20">

        <!-- container -->
        <div class="container">

        	<div class="col-md-3 col-sm-3 col-xs-12">

				<?php dynamic_sidebar( 'ColLeft Sidebar' ); ?>

			</div>

		    <div class="col-md-9 col-sm-9 col-xs-12 padleft20-ms mtop20-xs">

				<!-- home-cat-products -->	
				<div class="fullwidth-section home-cat-products">					

					<!-- headingCProductTitle -->
					<h3 class="headingCProductTitle ohidden">

						<span class="inlineblock pull-left">
							<?php echo $post_type_obj->label; ?>
						</span>				

					</h3>
					<!-- #headingCProductTitle -->

					<div class="split-columns three-columns-layout mtop20">

						<?php  
							$args = array(

								'post_type' => $post_type,
								'order' => 'desc',
								'orderby' => 'date'						

							);

							query_posts( $args );

							if ( have_posts() ) :

								while ( have_posts() ) : the_post(); ?>

									<!-- item-layout -->
									<div class="item-layout product col-md-4 col-sm-6 col-xs-12">

										<!-- thumbnail -->
										<div class="thumbnail">

											<a href="<?php the_permalink(); ?>"></a>

											<div class="thumbnail-wrap ohidden">

												<?php 
													the_post_thumbnail( 'feature-image-product-four-columns', array('class' => 'fixed-vertical') ); ?>

											</div>
											
										</div>
										<!-- #thumbnail -->

										<!-- title -->
										<h4 class="title">

											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>								
											</a>
											
										</h4>
										<!-- #title -->

									</div>
									<!-- #item-layout -->

						<?php 	endwhile;
								wp_reset_query(); 

							endif; ?>

					</div>					
					
									
				</div>
				<!-- #home-cat-products -->

			</div>	

		</div>
		<!-- #container -->

	</div>
	<!-- #mainColumns -->

</section>

<!-- #main -->	