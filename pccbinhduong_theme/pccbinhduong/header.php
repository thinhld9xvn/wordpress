<!DOCTYPE html>

<html lang="vi" style="display: none">

<head>

    <meta charset="utf-8" />   

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title><?php wp_title( '|', true, 'right' );?></title>

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <script type="text/javascript">

        var jspath = "<?php echo get_template_directory_uri() ?>/js",
        	$lg = null;

    </script>

	<?php wp_head(); ?> 


</head>

<body>

    <?php
		$options = get_option('section-header_option_name'); 
		$pitviet_navmenu_walker = new PitViet_NavMenu_Walker(); ?>
		
    <!-- wrapper -->
    <div id="wrapper">
		
		<!-- header -->
		<header id="header">			

			<!-- hgtop -->
			<div class="hgtop bg_lightgray padtb10-ms padtb5-xs">

				<!-- container -->
				<div class="container">

					<!-- logo -->
					<div class="logo pull-left">

						<a href="<?php echo bloginfo('url'); ?>">
							<img src="<?php echo $options['logo-image-id'] ?>" alt="logo" />
						</a>

					</div>
					<!-- #logo -->

					<!-- slogun -->
					<div class="slogun pull-left padleft20 mtop20 hidden-xs">

						<?php dynamic_sidebar( 'Header Slogun Sidebar' ); ?>
						
					</div>
					<!-- slogun -->
					
					<!-- contact -->
					<div class="contact pull-right mtop20 cushidden-xs">	
					
						<?php dynamic_sidebar( 'Header Phone Sidebar' ); ?>
						
					</div>
					<!-- #contact -->

					<!-- m-menu -->
					<div class="menu m-menu hidden-lg hidden-md hidden-sm">

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon"></span>
						</div>

						<?php 
							wp_nav_menu(
								
								array(
									'theme_location' => 'primary',
									'menu_class' => 'm-mainmenu',
									'walker' => $pitviet_navmenu_walker
								)
								
							);
						?>

					</div>
					<!-- #m-menu -->

				</div>
				<!-- #container -->

			</div>
			<!-- #hgtop -->	

			<!-- hgsecond -->
			<div class="hgsecond bg_red hidden-xs">				

				<!-- menu -->
				<div id="menu" class="menu shown-lap">

					<!-- container -->
					<div class="container">

						<?php 
							wp_nav_menu(
								
								array(
									'theme_location' => 'primary'
								)
								
							);
						?>

					</div>
					<!-- #container -->

				</div>
				<!-- #menu -->		

				<!-- m-menu -->
				<div class="menu m-menu shown-mb">										

					<div class="m-menuicon tcenter">
						<span class="fa fa-navicon"></span>
						Main Menu
					</div>
					
					<?php 
						wp_nav_menu(
							
							array(
								'theme_location' => 'primary',
								'menu_class' => 'm-mainmenu',
								'walker' => $pitviet_navmenu_walker
							)
							
						);
					?>

				</div>
				<!-- #m-menu -->			

			</div>
			<!-- #hgsecond -->		

		</header>
		<!-- #header -->
      	