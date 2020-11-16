<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "archive_products_cache", "/templates/archive-products.php", false  ); 

	get_footer(); ?>