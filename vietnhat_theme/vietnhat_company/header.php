<!DOCTYPE html>

<html style="display: none" lang="vi">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title><?php wp_title( '|', true, 'right' );?></title>

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <script type="text/javascript">

        var jspath = "<?php echo get_template_directory_uri() ?>/js";

    </script>

	<?php wp_head(); ?> 


</head>

<body>

    <?php $head_options = get_option('section-header_option_name'); ?>
    
    <!-- wrapper -->
    <div id="wrapper">

      	<!-- header -->
		<header id="header">			

			<!-- hgtop -->
			<div class="hgtop padtb20-ms padtb5-xs">

				<!-- container -->
				<div class="container">

					<!-- logo -->
					<div class="logo col-md-2 col-sm-2 col-xs-3">

						<a href="<?php echo bloginfo('url'); ?>">
							<img src="<?php echo $head_options['logo-image-id']; ?>" alt="logo" />
						</a>

					</div>
					<!-- #logo -->

					<!-- slogun -->
					<div class="slogun col-md-7 col-sm-6 hidden-xs">
						<?php dynamic_sidebar('Header Slogun Sidebar'); ?>
					</div>
					<!-- slogun -->

					<!-- tel -->
					<div class="tel col-md-3 col-sm-4 hidden-xs">	
						<?php dynamic_sidebar('Header Phone Sidebar'); ?>
					</div>
					<!-- tel -->

					<!-- m-menu -->
					<div class="menu m-menu hidden-lg hidden-md hidden-sm">										

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon"></span>
						</div>
						
						<?php 
							wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class' => 'm-mainmenu'
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
			<div class="hgsecond hidden-xs">				

				<!-- menu -->
				<div id="menu" class="menu shown-lap">

					<!-- container -->
					<div class="container">

						<?php 
							wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class' => 'main-menu'
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
									'menu_class' => 'm-mainmenu'
								)
							);
					?>						

				</div>
				<!-- #m-menu -->			

			</div>
			<!-- #hgsecond -->

		</header>
		<!-- #header -->