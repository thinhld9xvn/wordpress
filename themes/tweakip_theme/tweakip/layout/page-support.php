<?php 
	/* Template Name: Support Template */ 

	define('SUPPORT_LAYOUT_DIRECTORY', get_template_directory() . '/layout/support');	 
	define('VRAGEN_LAYOUT_DIRECTORY', SUPPORT_LAYOUT_DIRECTORY . '/vragen');	 
	
	global $post;	

	$page_layout = get_post_meta( $post->ID, '_pt-field-support-item-layout', true ); 

	get_header(); ?>

</header>
<!-- #header -->

<!-- main -->
<section id="main">

	<?php		

		switch ($page_layout) :	

			case 'service-desk':

				include SUPPORT_LAYOUT_DIRECTORY . '/service-desk.php';

				break;

			case 'vragen':			    
				include SUPPORT_LAYOUT_DIRECTORY . '/vragen.php';

				break;							
			
			default:

				include SUPPORT_LAYOUT_DIRECTORY . '/support.php';
				
				break;

		endswitch; ?>
	
</section>
<!-- #main -->

<?php get_footer(); ?>