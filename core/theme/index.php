<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "index_cache", "/templates/index.php", false  ); 

	get_footer(); ?>