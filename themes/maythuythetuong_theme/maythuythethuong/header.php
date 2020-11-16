<?php 
	$global_options = get_option('section-global_option_name'); ?>

<!DOCTYPE html>

<html lang="<?php echo $language ?>">

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
    	$pitviet_primary_menu_walker = new PitViet_NavMenu_Walker(); 
    	$pitviet_mobile_menu_walker = new PitViet_NavMenu_Mobile_Walker(); ?>

    <!-- wrapper -->
    <div id="wrapper">

      	<!-- header -->
		<header id="header" class="bg_primary">				

			<!-- htop -->
			<div class="htop">

				<!-- container -->
				<div class="container">	

					<!-- laptop-screen -->
					<div class="laptop-screen hidden-xs">				

						<?php dynamic_sidebar('Contact Header Sidebar'); ?>

					</div>
					<!-- #laptop-screen -->

					<!-- mobile-screen -->
					<div class="mobile-screen hidden-lg hidden-md hidden-sm">

						<div class="mobile-wrap padtb10">	

							<!-- logo -->
							<div class="logo">

								<a href="<?php echo get_site_url(); ?>">
									<img style="height: 40px" 
										 src="<?php echo $header_options['logo-image-id'] ?>" 
										 alt="logo" />
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
											'theme_location' => 'mobile',
											'menu_id' => '',
											'menu_class' => '',
											'walker' => $pitviet_mobile_menu_walker
										);							
										wp_nav_menu( $args ); ?>		

								</div>
								<!-- #m-mainmenu -->	

							</div>
							<!-- #mobile-menu -->

						</div>

					</div>
					<!-- #mobile-screen -->

				</div>
				<!-- #container -->

			</div>
			<!-- #htop -->

			<!-- hsecond -->
			<div class="hsecond padtb20 hidden-xs">

				<!-- container -->
				<div class="container">					

					<!-- logo -->
					<div class="logo">

						<a href="<?php echo get_site_url(); ?>">
							<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
						</a> 

					</div>
					<!-- #logo -->

					<!-- menu -->
					<div class="menu">						

						<!-- menu -->
						<div id="menu" class="col-xs-12">

							<?php
								$args = array(
									'theme_location' => 'primary',
									'menu_id' => 'main-menu',
									'menu_class' => 'main-menu',
									'walker' => $pitviet_primary_menu_walker
								);							
								wp_nav_menu( $args ); ?>

						</div>
						<!-- #menu -->

						<!-- ipad-menu -->
						<div id="ipad-menu" class="m-menu col-xs-12 hidden">

							<div class="m-menuicon vcenter tcenter">
								<span class="fa fa-navicon vmiddle"></span>	
								<span class="caption padleft10">MAIN MENU</span>
							</div>

							<div class="m-mainmenu">

								<?php
									$args = array(
										'theme_location' => 'mobile',
										'menu_id' => '',
										'menu_class' => '',
										'walker' => $pitviet_mobile_menu_walker
									);							
									wp_nav_menu( $args ); ?>								

							</div>
							<!-- #m-mainmenu -->	

						</div>
						<!-- #ipad-menu -->

					</div>
					<!-- #menu -->					

				</div>
				<!-- #container -->

			</div>
			<!-- #hsecond -->			

		</header>
		<!-- #header -->