<?php 
	/* Template Name: Products List Layout Page */  ?>

<?php get_header(); ?>

<div class="breadcrumb producs-list">
	<div class="container">
		<div class="breadcrumb-inner">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
		</div>
	</div>
</div>
<div class="body-content blog-page outer-top-ts">

	<div class="container">

		<div class="page-layout-box">

			<div class="sidebar __left __sm __xs">

				<?php include get_stylesheet_directory() . '/widgets/sidebar.php' ?>

			</div>

			<div class="main-page __sm __xs">

				<?php 
					//include get_stylesheet_directory() . '/layout/search/banner.php';
					include get_stylesheet_directory() . '/layout/archive-product/results.php'; ?>


			</div>
		
		</div>

	</div>

</div>

<?php get_footer(); ?>