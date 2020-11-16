<?php 
	$lang = qt_get_current_lang();

    consulting_get_header(); 

        global $uc_cache;

        $uc_cache->load_cache( "front_page_cache_{$lang}", "uc_templates/front-page.php", true  ); 

    get_footer(); ?>