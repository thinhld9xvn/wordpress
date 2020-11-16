<?php 
	$global_options = get_option('section-global_option_name'); ?>

<!DOCTYPE html>

<html style="display: none" lang="vi">

<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title><?= $global_options['global-site-title-id'] ? $global_options['global-site-title-id'] : ''  ?></title>

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
    	  $pitviet_navmenu_walker = new PitViet_NavMenu_Walker();
    	  $pitviet_navmenu_mobile_walker = new PitViet_NavMenu_Mobile_Walker(); ?>

    <!-- wrapper -->
    <div id="wrapper">

      	<!-- header -->
		<header id="header">			

			<!-- htop -->
			<div class="htop bg_primary">

				<!-- container -->
				<div class="container">

					<!-- htop-columns-wrap -->
					<div class="htop-columns-wrap col-xs-12 hidden-xs">						

						<?php dynamic_sidebar('Header Contact Sidebar');
							  dynamic_sidebar('Header Social Sidebar'); ?>

					</div>
					<!-- #htop-columns-wrap -->

					<!-- htop-mobile-wrap -->
					<div class="htop-mobile-wrap hidden-lg hidden-md hidden-sm">

						<div class="logo">
							<a href="<?php echo get_site_url() ?>">
								<img style="max-height:40px" src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
							</a>
						</div>

						<!-- m-menu -->
						<div class="m-menu vcenter">

							<div class="m-menuicon tcenter">
								<span class="fa fa-navicon"></span>	
							</div>

							<?php							  
								$args = array(
									'theme_location' => 'mobile',								
									'menu_class' => 'm-mainmenu',
									'walker' => $pitviet_navmenu_mobile_walker							
								);
							
								wp_nav_menu( $args ); ?>

						</div>
						<!-- #m-menu -->

					</div>
					<!-- #htop-mobile-wrap -->

				</div>
				<!-- #container -->

			</div>
			<!-- #htop -->

			<!-- hsecond -->
			<div class="hsecond padtb10 hidden-xs">

				<div class="menu-lap-wrap shown-lap">

					<!-- menu -->
					<div id="menu" class="vcenter">

						<?php							  
							$args = array(
								'theme_location' => 'primary',
								'walker' => $pitviet_navmenu_walker							
							);						
							wp_nav_menu( $args ); ?>

					</div>
					<!-- #menu -->

				</div>

				<div class="menu-ipad-wrap shown-mb">

					<!-- m-menu -->
					<div class="m-menu vcenter">

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon vmiddle"></span>
							<span class="vmiddle">Menu</span>
						</div>

						<?php							  
							$args = array(
								'theme_location' => 'mobile',								
								'menu_class' => 'm-mainmenu',
								'walker' => $pitviet_navmenu_mobile_walker							
							);
						
							wp_nav_menu( $args ); ?>

					</div>
					<!-- #m-menu -->

				</div>

			</div>
			<!-- #hsecond -->

		</header>
		<!-- #header -->