<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "archive_catalogue_cache", "/templates/archive-catalogue.php", false  ); 

	get_footer(); ?>