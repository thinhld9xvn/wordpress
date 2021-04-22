<form id="frmProductsListFilter" 
		method="get" 
		data-trigger-submit="false" 
		action="<?= \Urls\UrlGetStoreDetailsPageUtils::get() ?>">

	<?php $sidebar_options = get_option('section-sidebar-left_option_name'); ?>

	<?php include dirname(__FILE__) . '/layout/stores/searchbox_widget.php'; ?>

	<?php include dirname(__FILE__) . '/layout/filter_price_widget.php'; ?>

	<?php include dirname(__FILE__) . '/layout/stores/categories-list-widget.php'; ?>

	<?php //include dirname(__FILE__) . '/layout/categories_list_widget.php'; ?>
	<?php //include dirname(__FILE__) . '/layout/carousel_testimolates_widget.php'; ?>

	<?php 

		$id = \Strings\StringGetQueryUtils::get('shop_id');
		
		$commercants_list = \Commercants\CommercantGetListUtils::get();
		
		$shop_data = \Commercants\CommercantGetShopUtils::get_by_id($commercants_list, $id); ?>

	<input type="hidden" name="shop_name" value="<?php echo $shop_data[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE] ?>" />

</form>