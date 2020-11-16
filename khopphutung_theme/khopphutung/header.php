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

    <script type="text/javascript">
    	var jspath = '<?php echo get_template_directory_uri() ?>/js';
    </script>

	<?php wp_head(); ?> 

</head>

<body>

    <?php 
    	  $header_options = get_option('section-header_option_name'); ?>

    <!-- wrapper -->
    <div id="wrapper">

      	<!-- header -->
		<header id="header">			

			<!-- hgtop -->
			<div class="hgtop padtb20-ms">

				<!-- container -->
				<div class="container">

					<div class="lang-bar col-md-12 col-sm-12 hidden-xs">

						<ul class="pull-right">
						    <?php 
						    	qt_the_languages();
						    ?>
						</ul>

					</div>					

					<!-- logo -->
					<div class="logo col-xs-4">

						<a href="<?php echo bloginfo('url') ?>">
							<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
						</a>

					</div>
					<!-- #logo -->

					<?php get_template_part('templates/header_search_products'); ?>

					<!-- head-contact -->
					<div class="head-contact pull-right hidden-xs">						

						<?php dynamic_sidebar( 'Header Contact Sidebar' ); ?>						

					</div>
					<!-- #head-contact -->					

					<!-- m-menu -->
					<div class="m-menu hidden-lg hidden-md hidden-sm">

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon"></span>							
						</div>

						<?php 							  
							$args = array(
								'menu_class' => 'm-mainmenu'
							);
						
							wp_nav_menu( $args ); ?>						

					</div>
					<!-- #m-menu -->

				</div>
				<!-- #container -->

			</div>
			<!-- #hgtop -->					

		</header>
		<!-- #header -->