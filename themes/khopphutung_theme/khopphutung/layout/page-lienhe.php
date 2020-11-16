<?php 
	/* Template Name: Liên hệ */ 

	get_header(); 
	global $post; ?>

<!-- main -->
<section id="main">

	<!-- container -->
	<div class="container">

		<!-- menu -->
		<div id="menu" class="lapmenu padleft20 shown-lap">

			<?php 							  
				$args = array(
					'theme_location' => 'primary'
				);
			
				wp_nav_menu( $args ); ?>

		</div>
		<!-- #menu -->

		<!-- m-menu -->
		<div class="lapmenu m-menu shown-mb cushidden-xs">									

			<div class="m-menuicon tcenter">
				<span class="fa fa-navicon"></span>
				Main Menu
			</div>

			<?php 							  
				$args = array(
					'theme_location' => 'primary',									
					'menu_class' => 'm-mainmenu'
				);
			
				wp_nav_menu( $args ); ?>

		</div>
		<!-- #m-menu -->

		<!-- fullwidth-pagesection -->
		<div class="fullwidth-pagesection boxColumnHBorder --left --top pad20-ms mtop20">

			<h3 class="uppercase">
				<strong><?php echo $post->post_title; ?></strong>
			</h3>

			<!-- page-content -->
			<div class="page-content page-contact mtop20">					

				<?php echo apply_filters( 'the_content', $post->post_content ); ?>

			</div>
			<!-- #page-content -->


		</div>
		<!-- #fullwidth-pagesection -->			
	

	</div>
	<!-- #container -->
		
</section>
<!-- #main -->

<?php get_footer(); ?>

