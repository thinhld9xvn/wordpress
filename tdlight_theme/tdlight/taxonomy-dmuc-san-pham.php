<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "taxonomy_dmuc_san_pham_cache", "/templates/taxonomy-dmuc-san-pham.php", false  ); 

	get_footer(); ?>