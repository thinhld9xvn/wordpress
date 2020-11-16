<?php 
	$lang = qt_get_current_lang();

    global $uc_cache;

    $uc_cache->load_cache( "template_header_cache_{$lang}", "uc_templates/header.php", true  );