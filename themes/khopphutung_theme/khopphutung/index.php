<?php get_header(); ?>

	<!-- main -->
	<section id="main">

		<!-- container -->
		<div class="container">

			<!-- mainColLeft -->
			<div class="mainColLeft col-md-3 col-sm-4 col-xs-12">

				<?php dynamic_sidebar( 'ColLeft Sidebar' ); ?>

			</div>
			<!-- #mainColLeft -->

			<!-- mainColRight -->
			<div class="mainColRight col-md-9 col-sm-8 col-xs-12 mtop20-xs">

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

				<!-- mColumnContent -->
				<div class="mColumnContent padleft20-ms">

					<?php 
						dynamic_sidebar( 'Slider Sidebar' );
						dynamic_sidebar( 'ColRight Home Sidebar' ); ?>

				</div>
				<!-- #mColumnContent -->

			</div>
			<!-- #mainColRight -->

		</div>
		<!-- #container -->
		
	</section>
	<!-- #main -->

<?php get_footer(); ?>