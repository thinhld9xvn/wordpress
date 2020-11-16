<?php 

	consulting_get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "post_cache", "uc_templates/post.php", false  ); 

	get_footer(); ?>