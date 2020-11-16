<?php 
    consulting_get_header(); 

        global $uc_cache;

        $uc_cache->load_cache( "tag_cache", "uc_templates/tag.php", false  ); 

    get_footer(); ?>