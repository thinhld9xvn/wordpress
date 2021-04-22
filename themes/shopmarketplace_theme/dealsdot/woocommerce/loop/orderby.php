<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="clearfix filters-container m-t-10">
	<div class="row">
		<?php if(get_theme_mod('dealsdot_grid_list_view','0') == '1'){ ?>
		<div class="col col-md-6 col-xs-6">
			<div class="filter-tabs">
				<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
					<li class="active"> <a class="button-grid"><i class="icon fa fa-th-large"></i><?php esc_html_e('Grid','dealsdot'); ?></a> </li>
					<li><a class="button-list" ><i class="icon fa fa-bars"></i><?php esc_html_e('List','dealsdot'); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="col col-md-6 col-xs-6 text-right">
		<?php } else { ?>
		<div class="col col-md-12 text-right">
		<?php } ?>
			<form class="woocommerce-ordering" method="get">
				<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'dealsdot' ); ?>">
					<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
						<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" name="paged" value="1" />
				<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
			</form>
		</div>
	</div>
</div>