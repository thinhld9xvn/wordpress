<?php 
    consulting_get_header(); 

        global $uc_cache;

        $uc_cache->load_cache( "category_cache", "uc_templates/category.php", false  ); 

    get_footer(); ?>