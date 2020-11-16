<?php 
    consulting_get_header(); 

        global $uc_cache;

        $uc_cache->load_cache( "author_cache", "uc_templates/author.php", false  ); 

    get_footer(); ?>