<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "category_cache", "/templates/category.php", false  ); 

	get_footer(); ?>