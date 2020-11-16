<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "archive_san_pham_cache", "/templates/archive-san-pham.php", false  ); 

	get_footer(); ?>