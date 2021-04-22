<?php 
	/* Template Name: Store Details Layout Page */  ?>

<?php get_header(); ?>

<div class="breadcrumb product-search">
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

			<div class="sidebar __left __sm __xs __stores">

				<?php include get_stylesheet_directory() . '/widgets/stores-sidebar.php' ?>

			</div>

			<div class="main-page __sm __xs">

				<?php include get_stylesheet_directory() . '/layout/stores/location.php'; 
					  include get_stylesheet_directory() . '/layout/stores/results.php'; ?>


			</div>
		
		</div>

	</div>

</div>

<?php get_footer(); ?>