<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "single_san_pham_cache", "/templates/single-san-pham.php", false  ); 

	get_footer(); ?>