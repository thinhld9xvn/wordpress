<?php 
	
	consulting_get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "page_cache", "uc_templates/page.php", false  ); 

	get_footer(); ?>