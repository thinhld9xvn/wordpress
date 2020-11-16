<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "search_cache", "/templates/search.php", false  ); 

	get_footer(); ?>