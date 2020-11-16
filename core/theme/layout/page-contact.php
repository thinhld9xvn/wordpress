<?php 
	/* Template Name: Liên hệ */  ?>

<?php 
	get_header(); 

		global $uc_cache;

		$uc_cache->load_cache( "page_contact_cache", "/templates/layout/page-contact.php", false  );

	get_footer(); ?>