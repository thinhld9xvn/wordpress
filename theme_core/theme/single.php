<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "single_cache", "/templates/single.php", false  ); 

	get_footer(); ?>