<?php 
	$lang = qt_get_current_lang();

    global $uc_cache;

    $uc_cache->load_cache( "template_footer_cache_{$lang}", "uc_templates/footer.php", true  );