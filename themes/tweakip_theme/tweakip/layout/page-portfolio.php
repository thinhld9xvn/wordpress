<?php 
	/* Template Name: Portfolio Template */ 

	global $post;

	define('PORTFOLIO_DIRECTORY_LAYOUT', get_template_directory() . '/layout/portfolio' );

	$page_layout = get_post_meta( $post->ID, '_pt-field-portfolio-item-layout', true );	

	get_header(); ?>

</header>
<!-- #header -->

	<?php 
		switch ($page_layout) :

			case 'case':

				include PORTFOLIO_DIRECTORY_LAYOUT . '/portfolio-case.php';
				
				break;
			
			default:

				include PORTFOLIO_DIRECTORY_LAYOUT . '/portfolio-self.php';
				
				break;

		endswitch;

get_footer(); ?>