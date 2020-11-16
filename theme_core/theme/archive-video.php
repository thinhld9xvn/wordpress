<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "archive_video_cache", "/templates/archive-video.php", false  ); 

	get_footer(); ?>