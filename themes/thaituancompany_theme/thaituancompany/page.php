<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "page_cache", "/templates/page.php", false  ); 

	get_footer(); ?>