<?php
/**
 * 404.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.0
 */
?>

<?php get_header(); ?>


<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1><?php esc_html_e('404','dealsdot'); ?></h1>
					<p><?php esc_html_e('We are sorry, the page you have requested is not available', 'dealsdot'); ?> </p>
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="outer-top-vs outer-bottom-xs" role="search" method="get">
						<input name="s" type="text" id="s" placeholder="<?php esc_attr_e('Search', 'dealsdot') ?>" autocomplete="off">
						<button type="submit" class="btn-default le-button"><?php esc_html_e('Go','dealsdot'); ?></button>
					</form>
					<a href="<?php echo esc_url( home_url('/') ); ?>"><i class="fa fa-home"></i> <?php esc_html_e('Go To Homepage','dealsdot'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>