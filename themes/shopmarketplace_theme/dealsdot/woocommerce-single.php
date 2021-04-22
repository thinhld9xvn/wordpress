<?php
/**
 * woocommerce-single.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.0
 * 
 */
?>

<?php get_header(); ?>
	<?php $breadcrumb = get_theme_mod('dealsdot_shop_breadcrumb','1'); ?>

	<?php if($breadcrumb == '1'){ ?>
		<?php woocommerce_breadcrumb(); ?>	
	<?php } else { ?>
		<div class="empty-klb"></div>
	<?php } ?>
	
<div class="body-content outer-top-ts">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-12'>
				<?php woocommerce_content(); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>