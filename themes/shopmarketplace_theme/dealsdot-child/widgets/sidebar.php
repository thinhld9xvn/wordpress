<form id="frmProductsListFilter" method="get" data-trigger-submit="false" action="<?php bloginfo('url') ?>">

	<?php $sidebar_options = get_option('section-sidebar-left_option_name'); ?>

	<?php include dirname(__FILE__) . '/layout/searchbox_widget.php'; ?>

	<?php include dirname(__FILE__) . '/layout/filter_price_widget.php'; ?>

	<?php include dirname(__FILE__) . '/layout/filter_distance_widget.php'; ?>

	<?php include dirname(__FILE__) . '/layout/filter_product_attributes_widget.php'; ?>

	<?php include dirname(__FILE__) . '/layout/categories_list_widget.php'; ?>

	<?php //include dirname(__FILE__) . '/layout/carousel_testimolates_widget.php'; ?>

	<?php
		if ( is_search() ) :

		 	$product_cat_id = $_GET['product_cat_id'] ? (int) $_GET['product_cat_id'] : -1;
			$s = $_GET['s'] ? $_GET['s'] : '';
			$sort_by = $_GET['sort_by'] ? $_GET['sort_by'] : 'default'; ?>

			<input type="hidden" id="txtHidSbLeftFilCategory" name="product_cat_id" value="<?= $product_cat_id ?>" />
			<input type="hidden" id="txtHidProductSearch" name="s" value="<?= $s ?>" />
			<input type='hidden' id='txtHidSortBy' name='sort_by' value="<?= $sort_by ?>" />

	<?php endif; ?>

</form>