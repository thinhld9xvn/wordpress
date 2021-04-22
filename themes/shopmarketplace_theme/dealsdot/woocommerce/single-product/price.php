<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<div class="price-container info-container m-t-20">
	<div class="row">
		

		<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			<div class="price-box">
				<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>"><?php echo dealsdot_sanitize_data($product->get_price_html()); ?></p>
			</div>
		</div>

		<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			<div class="favorite-button">
				<?php do_action( 'klb_favorite_buttons' ); ?>
			</div>
		</div>

	</div>
</div>
