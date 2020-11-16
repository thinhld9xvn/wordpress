<?php 
	$global_options = get_option('section-global_option_name'); 
	$language = qt_get_current_lang(); ?>

<!DOCTYPE html>

<html class="lang_<?php echo $language ?>" lang="<?php echo $language ?>">

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
    	  //$pitviet_navmenu_walker = new PitViet_NavMenu_Walker();
    	  $pitviet_navmenu_mobile_walker = new PitViet_NavMenu_Mobile_Walker(); ?>

    <!-- wrapper -->
    <div id="wrapper">

      	<!-- header -->
		<header id="header">			

			<!-- htop -->
			<div class="htop padtb10">

				<!-- container -->
				<div class="container">	

					<!-- head-laptop-wrap -->
					<div class="head-laptop-wrap hidden-xs">

						<!-- nav-languages -->
						<div class="nav-languages col-xs-12">

							<ul class="pull-right">

								<?php 
									qt_the_languages(

										array(
											'link_class' => 'language-flag block'
										)

									); ?>

							</ul>

						</div>
						<!-- #nav-languages -->

						<!-- logo -->
						<div class="logo pull-left">

							<a href="<?php echo get_site_url(); ?>">
								<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
							</a>

						</div>
						<!-- #logo -->

						<!-- menu -->
						<div class="menu pull-left">

							<!-- menu -->
							<div id="menu">

								<?php								
									wp_nav_menu( 

										array( 'theme_location' => '', 
											   'menu_id' => 'main-menu',
											   'menu_class' => 'main-menu' ) 
									); ?>

							</div>
							<!-- #menu -->

							<!-- m-menu -->
							<div id="ipad-menu" class="m-menu hidden">

								<div class="m-menuicon tcenter">
									<span class="fa fa-navicon vmiddle"></span>	
									<span class="caption padleft10">MAIN MENU</span>
								</div>

								<div class="m-mainmenu">

									<?php								
										wp_nav_menu( 
											array( 'theme_location' => '',
												   'menu_id' => 'ipad-main-menu',
												   'menu_class' => 'ipad-main-menu' )
										); ?>
								</div>
								<!-- #m-mainmenu -->						

							</div>
							<!-- #m-menu -->

						</div>
						<!-- #menu -->

						<!-- nav-management -->
						<div class="nav-management pull-right">

							<?php															
								wp_nav_menu(

									array(
										"theme_location" => "support-menu-$language",
										"menu_class" => "pull-right",
										"qt_modify" => false
									) 

								); ?>

						</div>
						<!-- #nav-management -->

					</div>
					<!-- #head-laptop-wrap -->

					<!-- head-mobile-wrap -->
					<div class="head-mobile-wrap hidden-lg hidden-md hidden-sm">

						<!-- logo -->
						<div class="logo pull-left">

							<a href="<?php echo get_site_url(); ?>">
								<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
							</a>

						</div>
						<!-- #logo -->

						<!-- m-menu -->
						<div class="m-menu -mobile">

							<div class="m-menuicon tcenter">
								<span class="fa fa-navicon"></span>	
							</div>

							<div class="m-mainmenu">

								<?php								
									wp_nav_menu( 
										array( 'theme_location' => '', 
											   'menu_id' => 'mobile-main-menu',
											   'menu_class' => 'mobile-main-menu',
											   'mobile' => true,
											   'walker' => $pitviet_navmenu_mobile_walker )
									); ?>

							</div>
							<!-- #m-mainmenu -->						

						</div>
						<!-- #m-menu -->

					</div>
					<!-- #head-mobile-wrap -->

				</div>
				<!-- #container -->

			</div>
			<!-- #htop -->