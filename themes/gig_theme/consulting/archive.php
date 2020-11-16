<?php 
    consulting_get_header(); 

        global $uc_cache;

        $uc_cache->load_cache( "archive_cache", "uc_templates/archive.php", false  ); 

    get_footer(); ?>