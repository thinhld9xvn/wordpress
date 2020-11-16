<?php
	$global_options = get_option('section-global_option_name'); ?>

<!DOCTYPE html>

<html lang="vi">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<title>
			<?= $global_options['global-site-title-id'] ? $global_options['global-site-title-id'] : ''  ?>
		</title>

		<meta name="description" content="<?= $global_options['global-site-description-id'] ? strip_tags( $global_options['global-site-description-id'] ) : ''  ?>">
		<meta name="keywords" content="<?= $global_options['global-site-keywords-id'] ? strip_tags( $global_options['global-site-keywords-id'] ) : ''  ?>">
		<meta name="robots" content="<?= $global_options['global-site-robots-id'] ? strip_tags( $global_options['global-site-robots-id'] ) : 'noodp,index,follow'  ?>" />

		<meta name='revisit-after' content='<?= $global_options['global-site-revisit-after-id'] ? strip_tags( $global_options['global-site-revisit-after-id'] ) : '1 days'  ?>' />

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

		<?= $global_options['global-site-google-analytics-id'] ? $global_options['global-site-google-analytics-id'] : '' ?>    		

		<?php wp_head(); ?>

	</head>

	<body>

		<?php 
		  $header_options = get_option('section-header_option_name'); 	

		  $pitviet_navmenu_laptop_walker = new PitViet_NavMenu_Walker();
		  $pitviet_navmenu_mobile_walker = new PitViet_NavMenu_Mobile_Walker(); ?>

	<!-- wrapper -->
	<div id="wrapper">
		
		<!-- header -->
		<header id="header" class="bg_primary">

			<div id="header-laptop-screen" class="hidden-xs">

				<?php dynamic_sidebar( 'Header Top Sidebar' ); ?>

				<!-- header-lsecondary -->
				<div id="header-lsecondary">

					<!-- container -->
					<div class="container p_relative">

						<!-- logo -->
						<div class="logo">						

							<a href="<?php echo get_bloginfo('url'); ?>">
								<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
							</a>								
							
						</div>
						<!-- #logo -->

						<?php dynamic_sidebar('Header Secondary Sidebar'); ?>

						<!-- menu -->
						<div class="menu col-xs-12">

							<div id="menu" class="pull-right">

								<?php
									  
									$args = array(
										'theme_location' => 'primary',										
										'menu_id' => 'menu',									
										'walker' => $pitviet_navmenu_laptop_walker
									);
									
									wp_nav_menu( $args );

								?>								

							</div>

							<!-- ipad-menu -->
							<div id="ipad-menu" class="m-menu hidden pull-right">

								<div class="m-menu-wrap">

									<div class="m-menuicon vcenter tcenter">

										<span class="fa fa-navicon vmiddle"></span>	
										<span class="caption padleft10">MAIN MENU</span>

									</div>

									<div class="m-mainmenu">

										<?php
									  
											$args = array(
												'theme_location' => 'primary',
												'walker' => $pitviet_navmenu_mobile_walker
											);
											
											wp_nav_menu( $args );

										?>			

									</div>

								</div>

							</div>
							<!-- #ipad-menu -->
							
						</div>
						<!-- #menu -->									
						
					</div>
					<!-- #container -->
					
				</div>
				<!-- #header-secondary -->

			</div>

			<div id="header-mobile-screen" class="hidden-lg hidden-md hidden-sm">

				<div class="container">

					<div class="logo"> 

						<a href="<?php echo get_bloginfo('url'); ?>">
							<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
						</a>

					</div>

					<!-- mobile-menu -->
					<div id="mobile-menu" class="m-menu -mobile">

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon vmiddle"></span>
						</div>

						<div class="m-mainmenu">

							<?php
						  
								$args = array(
									'theme_location' => 'primary',
									'walker' => $pitviet_navmenu_mobile_walker
								);
								
								wp_nav_menu( $args );

							?>			

						</div>

					</div>
					<!-- #mobile-menu -->

				</div>
				
			</div>

		</header>
		<!-- #header -->