<?php 	
	
	// khai báo  cờ xác định load scripts ở terms metabox ( terms, category )
	global $metabox_terms_enqueue_scripts;

	// khai báo  cờ xác định load scripts ở post type metabox
	global $metabox_post_type_enqueue_scripts;

	// khai báo mảng chứa slug nơi cần load scripts
	global $metabox_terms_enqueue_scripts_where;
	global $metabox_post_type_enqueue_scripts_where;
	
	$metabox_terms_enqueue_scripts = true;
	$metabox_post_type_enqueue_scripts = true;		

	$metabox_post_type_enqueue_scripts_where = array(
        'post'
    ); ?>