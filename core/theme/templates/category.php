<?php	

	$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
	$cat_id = get_query_var('cat'); 

	$category = get_category( $cat_id ); 

	$args = array(

        'post_type' => 'post',
        'category__in' => $cat_id,
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

	<!-- categorySection -->
	<div class="pageSection categorySection">

		<!-- container -->
		<div class="container">

			<!-- spHeadingTitle -->
			<h2 class="spHeadingTitle">

				<span><?php echo $category->name; ?></span>

			</h2>
			<!-- #spHeadingTitle -->

			<?php if ( have_posts() ) : ?>

				<!-- sectionMainContent -->
				<div class="sectionMainContent ohidden mtop20">

					<!-- four-columns-layout -->
					<div class="split-columns four-columns-layout"
						 data-navig="compactcontent" 
						 data-multiple="true" 
						 data-object=".article" 
						 data-setcompact=".title > a, .excerpt" 
						 data-numCharOnIpad="40, 40" 
						 data-numCharOnMobile="30, 30" 
						 data-endShortContent="..., [...]" 
						 data-delimiter-css-property="clear" 
						 data-delimiter-css-value="both">

						<?php while ( have_posts() ) : the_post(); ?>

							<!-- article -->
							<div class="item-layout article col-md-3 col-sm-6 col-xs-12">

								<!-- thumbnail -->
								<div class="thumbnail">

									<a href="<?php the_permalink(); ?>">

										<?php the_post_thumbnail( 'feature-image-article-thumbnail', array('class' => 'fixed-vertical') ); ?>

									</a>
									
								</div>
								<!-- #thumbnail -->

								<!-- title -->
								<h4 class="title mtop10">

									<a class="block" 
									   href="<?php the_permalink(); ?>"
									   data-originalContent="<?php echo title(100); ?>">

										<?php echo title(100); ?>

									</a>

								</h4>
								<!-- #title -->

								<!-- excerpt -->
								<div class="excerpt mtop10"
									 data-originalContent="<?php echo excerpt(100); ?>">

									 <?php echo excerpt(100); ?>									
									
								</div>
								<!-- #excerpt -->
								
							</div>
							<!-- #article -->

						<?php endwhile; ?>

					</div>
					<!-- #four-columns-layout -->

				</div>
				<!-- #sectionMainContent -->

				<?php the_page_navigation(); ?>

			<?php endif; 
				 wp_reset_query(); ?>
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #categorySection -->

</section>
<!-- #main -->