<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "tag_cache", "/templates/tag.php", false  ); 

	get_footer(); ?>