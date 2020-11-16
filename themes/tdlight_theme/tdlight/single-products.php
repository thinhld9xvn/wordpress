<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "single_products_cache", "/templates/single-products.php", false  ); 

	get_footer(); ?>