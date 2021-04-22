<?php
/**
* woocommerce-page.php
* @package WordPress
* @subpackage Dealsdot
* @since Dealsdot 1.0
*
*/
?>
<?php get_header(); ?>

<div class="breadcrumb product-categories">
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

				<?php include dirname(__FILE__) . '/widgets/sidebar.php' ?>

			</div>

			<div class="main-page __sm __xs">

				<?php 
					//include dirname(__FILE__) . '/layout/search/banner.php';
					include dirname(__FILE__) . '/layout/categories/results.php'; ?>


			</div>
		
		</div>

	</div>

</div>

<?php get_footer(); ?>