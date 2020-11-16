<?php
	$global_options = get_option('section-global_option_name');
	$current_lang = qt_get_current_lang(); ?>

<!DOCTYPE html>

<html lang="<?php echo $current_lang ?>">

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
		<header id="header">

			<!-- header-laptop-screen -->
			<div class="header-laptop-screen hidden-xs">

				<!-- htop -->
				<div class="htop">

					<!-- container -->
					<div class="container">

						<!-- logo -->
						<div class="logo">

							<a href="<?php echo get_bloginfo('url') ?>">

								<img src="<?php echo $header_options['logo-image-id'] ?>" 
									 alt="logo" />

							</a>
							
						</div>
						<!-- #logo -->	

						<!-- htop-cpanel -->
						<div class="htop-cpanel">

							<!-- langbar -->
							<div class="langbar pull-right">

								<!-- lang-selected -->
								<div class="lang-selected">

									<a class="<?php echo $current_lang ?>"></a>

								</div>
								<!-- #lang-selected -->

								<ul>

								    <li>

								    	<a class="vi" href="/vi"></a>

								    </li>

								    <li>

								    	<a class="en" href="/en"></a>
								    	
								    </li>
								   
								</ul>
								
							</div>
							<!-- #langbar -->

							<?php dynamic_sidebar('Header Contact Sidebar'); ?>	
							
						</div>				
						<!-- #htop-cpanel -->	
						
					</div>
					<!-- #container -->
				
				</div>
				<!-- #htop -->

				<!-- hsecondary -->
				<div class="hsecondary">

					<!-- container -->
					<div class="container">

						<!-- menu -->
						<div class="menu">

							<!-- menu -->
							<div id="menu" class="main-menu">

								<?php 

									$args = array(

										'theme_location' => 'primary',
										'menu_class' => 'main-list-menu',
										'menu_id' => 'main-menu',
										'walker' => $pitviet_navmenu_laptop_walker

									);
								
									wp_nav_menu( $args ); ?>

							</div>
							<!-- #menu -->

							<!-- ipad-menu -->
							<div id="ipad-menu" class="ipad-menu m-menu col-xs-12 hidden">

								<div class="m-menu-wrap">

									<div class="m-menuicon vcenter tcenter">

										<span class="fa fa-navicon vmiddle"></span>	
										<span class="caption padleft10">MAIN MENU</span>

									</div>

									<div class="m-mainmenu">

										<?php 
											$args = array(
												'theme_location' => 'primary',
												'menu_class' => 'ipad-main-menu',
												'menu_id' => 'ipad-main-menu',
												'walker' => $pitviet_navmenu_mobile_walker
											);											
											wp_nav_menu( $args ); ?>

									</div>

								</div>

							</div>
							<!-- #ipad-menu -->

						</div>
						<!-- #menu -->

						<!-- searchbox -->
						<div class="searchbox">

							<form method="post" action="<?php echo get_bloginfo('url') ?>">

								<button type="button">
									<span class="fa fa-search"></span>
								</button>

								<div class="search-field">

									<input type="search" 
									   	   name="s"
									   	   class="form-control"
									   	   placeholder="Mời nhập từ khóa ...">
									
								</div>

							</form>
							
						</div>
						<!-- #searchbox -->

					</div>
					<!-- #container -->
					
				</div>
				<!-- #hsecondary -->
								
			</div>
			<!-- #header-laptop-screen -->	

			<!-- header-mobile-screen -->
			<div class="header-mobile-screen padtb10-xs hidden-lg hidden-md hidden-sm">

				<!-- container -->
				<div class="container">

					<!-- logo -->
					<div class="logo">

						<a href="<?php echo get_bloginfo('url'); ?>">

							<img src="<?php echo $header_options['logo-image-mobile-id'] ?>" 
								 alt="logo mobile" />

						</a>
						
					</div>
					<!-- #logo -->					

					<!-- mobile-menu -->
					<div id="mobile-menu" class="m-menu -mobile">

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon vmiddle"></span>
						</div>

						<div class="m-mainmenu">

							<?php 

								$args = array(
									'theme_location' => 'primary',						
									'menu_class' => 'main-mobile-menu',
									'menu_id' => 'main-mobile-menu',
									'walker' => $pitviet_navmenu_mobile_walker
								);
							
								wp_nav_menu( $args ); ?>

						</div>

					</div>
					<!-- #mobile-menu -->

				</div>
				<!-- #container -->
						
			</div>
			<!-- #header-mobile-screen -->

		</header>
		<!-- #header -->

		<!-- fixedTopMenu -->
		<div id="fixedTopMenu" class="fixedTopMenu hidden-sm hidden-xs">

			<!-- container -->
			<div class="container">	

				<!-- menu -->
				<div class="menu pull-left">

					<!-- fixed-menu -->
					<div id="fixed-menu" class="main-menu">

						<?php 

							$args = array(
								'theme_location' => 'primary',						
								'menu_class' => 'main-list-menu',
								'menu_id' => 'main-fixed-menu',
								'walker' => $pitviet_navmenu_laptop_walker
							);
						
							wp_nav_menu( $args ); ?>
						
					</div>
					<!-- #fixed-menu -->

					<!-- ipad-fixed-menu -->
					<div id="ipad-fixed-menu" class="m-menu ipad-menu flex col-xs-12 hidden">

						<div class="m-menu-wrap">

							<div class="m-menuicon vcenter tcenter">

								<span class="fa fa-navicon vmiddle"></span>	
								<span class="caption padleft10">MAIN MENU</span>

							</div>

							<div class="m-mainmenu">

								<?php

									$args = array(

										'theme_location' => 'primary',						
										'menu_class' => 'main-ipad-list-menu',
										'menu_id' => 'main-ipad-fixed-menu',
										'walker' => $pitviet_navmenu_mobile_walker
										
									);
								
									wp_nav_menu( $args ); ?>
								
							</div>

						</div>

					</div>
					<!-- #ipad-fixed-menu -->

				</div>
				<!-- #menu -->

				<!-- langbar -->
				<div class="langbar pull-right">

					<!-- lang-selected -->
					<div class="lang-selected">

						<a class="<?php echo $current_lang ?>"></a>

					</div>
					<!-- #lang-selected -->

					<ul>

					    <li>

					    	<a class="vi" href="/vi"></a>

					    </li>

					    <li>

					    	<a class="en" href="/en"></a>
					    	
					    </li>
					   
					</ul>
					
				</div>
				<!-- #langbar -->

			</div>
			<!-- #container -->
			
		</div>
		<!-- #fixedTopMenu -->