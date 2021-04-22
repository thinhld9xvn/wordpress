<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.0
 * 
 */
 ?>
 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( "charset" ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (!get_theme_mod( 'dealsdot_loader' )) { ?>
<div id="preloader"></div>
<?php } ?>

	<header class="header-style-1">
		<?php $topheader = get_theme_mod('dealsdot_top_header','0'); ?>
		<?php if($topheader == '1'){ ?>
			<div class="top-bar animate-dropdown">
				<div class="container">
					<div class="header-top-inner">
						<div class="cnt-account">
							<?php 
							   wp_nav_menu(array(
							   'theme_location' => 'top-right-menu',
							   'container' => '',
							   'fallback_cb' => 'show_top_menu',
							   'menu_id' => '',
							   'menu_class' => 'list-unstyled',
							   'echo' => true,
							   'depth' => 0 
								)); 
							 ?>
						</div>

						<div class="cnt-block">
							<?php 
							   wp_nav_menu(array(
							   'theme_location' => 'top-left-menu',
							   'container' => '',
							   'fallback_cb' => 'show_top_menu',
							   'menu_id' => '',
							   'menu_class' => 'list-unstyled list-inline',
							   'echo' => true,
							   'walker' => new dealsdot_topleft_walker(),
							   'depth' => 0 
								)); 
							 ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if(get_theme_mod('dealsdot_sticky_header') == "on"){ ?>
			<?php $menutype = 'fixed-menu'?>
		<?php } else { ?>
			<?php $menutype = 'static-menu'?>
		<?php } ?>

		<div class="main-header <?php echo esc_attr($menutype); ?>">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-2 col-sm-12 col-md-3 logo-holder">
						<div class="logo">
							<?php if (get_theme_mod( 'dealsdot_logo' )) { ?>
								<?php $size = get_theme_mod( 'dealsdot_logo_size', array( 'width' => '176', 'height' => '37') ); ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'dealsdot_logo' )) ); ?>" height="<?php echo esc_attr( $size["height"] ); ?>" width="<?php echo esc_attr( $size["width"] ); ?>" alt="<?php bloginfo("name"); ?>"  class="img-fluid">
								</a>
							<?php } elseif (get_theme_mod( 'dealsdot_logo_text' )) { ?>
								<a class="nav-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<span><?php echo esc_html(get_theme_mod( 'dealsdot_logo_text' )); ?></span>
								</a>
							<?php } else { ?>
								<a class="nav-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<span><?php esc_html_e("Dealsdot","dealsdot"); ?></span>
								</a>
							<?php } ?>
						</div>
					</div>
					
					<?php $searchbutton = get_theme_mod('dealsdot_header_search_button','0'); ?>
					<?php if($searchbutton == '1'){ ?>
					<div class="col-lg-5 col-md-4 col-sm-5 col-xs-12 top-search-holder"> 
						<?php get_template_part( 'includes/header/search' ); ?>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 navmenu"> 
					<?php } else { ?>
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 navmenu"> 
					<?php } ?>
						<div class="yamm navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
								<span class="sr-only"><?php esc_html_e('Toggle navigation','dealsdot'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
							</div>
							<div class="nav-bg-class">
								<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
									<div class="nav-outer">
										<?php 
										wp_nav_menu(array(
										"theme_location" => "main-menu",
										"container" => "",
										"fallback_cb" => "show_top_menu",
										"menu_id" => "",
										"menu_class" => "nav navbar-nav",
										"echo" => true,
										"walker" => new dealsdot_description_walker(),
										"depth" => 0 
										)); 
										?>
									
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>

						<?php get_template_part( 'includes/header/cart' ); ?>
						
					</div>
				</div>
			</div>		
		</div>
	</header>
<div class="body-content" id="top-banner-and-menu">