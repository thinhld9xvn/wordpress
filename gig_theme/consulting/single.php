<?php 
	consulting_get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "single_cache", "uc_templates/single.php", false  ); 

	get_footer(); ?>