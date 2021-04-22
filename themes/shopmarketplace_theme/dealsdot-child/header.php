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
		<header class="header-style-1 hidden-xs">
			<?php $topheader = get_theme_mod('dealsdot_top_header','0'); ?>
			<?php if($topheader == '1'){ ?>
			<div class="top-bar animate-dropdown">
				<div class="container">
					<div class="header-top-inner flex flex-algn-center flex-just-end">
						<!--<div class="polylang-bar">
							<select>
								<option name="fr">
									France
								</option>
								<option name="en">
									English
								</option>
							</select>
						</div>-->
						<div class="top-right-menu">

							<?php 
						    	$args = array(
									'theme_location' => 'top-right-menu',
									'menu_class' => 'flex'
								);
								
								wp_nav_menu( $args ); ?>

						</div>
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

				<?php $logo_image = Theme_Options\Theme_Options::get_field(Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,
																					Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_ID); ?>

				<div class="container">

					<div class="main-header-wrapper flex flex-algn-center flex-just-space">

						<div class="logo __sm __xs">

							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">

								<img src="<?php echo esc_url( $logo_image ); ?>" 
									alt="<?php bloginfo("name"); ?>" class="img-fluid" />

							</a>

						</div>

						<div class="searchbar top-search-holder hidden-sm hidden-xs">

							<div class="search-area">

								<form role="search" 
									  method="get" 
									  id="searchform" 
									  action="<?php bloginfo('url') ?>">

									<div class="control-group">

										<div id="searchbar-categories-dropdown" class="searchbar-categories-dropdown">

											<?php 
												$args = array(

													'taxonomy' => PRODUCT_TAXONOMY,
													'hide_empty' => true

												);
									
												$data_product_categories_list = get_terms($args);
												
												$product_cat_id = $_GET['product_cat_id'] ? (int) $_GET['product_cat_id'] : -1; ?>

											<select id="slHeadSearchBarShopCategories"
													class="form-control js-select2-header-dropdown-simple"
													data-field-value-init="<?= $product_cat_id ?>"													
													data-field-id-binding="txtHidHeadFilCategory">

												<option value="-1">--- Sélectionnez une catégorie de produit ---</option>

												<?php 
													foreach ($data_product_categories_list as $key => $category) : ?>

														<option value="<?php echo $category->term_id ?>">

															<?php echo $category->name ?>
															
														</option>
													
												<?php endforeach; ?>

												

											</select>

											

										</div>

										<div class="search-dropdown">

											<a id="btnSearchBarDropDown" href="#">
												<span class="fa fa-angle-down"></span>
												<span class="caption">
													Tous
												</span>
											</a>
											
										</div>

										<input type="text" 
												class="search-field" 
												autocomplete="off" 
												value="<?php echo $_GET['s'] ?>" 
												name="s" 
												id="s" 
												placeholder="Cherchez un produit">

										<button type="submit" class="search-button"> </button>										

									</div>

							<input type="hidden" id="txtHidHeadFilCategory" name="product_cat_id" value="<?= $product_cat_id ?>" />

								</form>

							</div>

						</div>						

						<div class="main-menu">

						    <?php 
						    	$args = array(
									'theme_location' => 'main-menu'
								);
								
								wp_nav_menu( $args ); ?>

						</div>
						
					</div>

				</div>

			</header>

			<header class="header-style-1 __mobile hidden-lg hidden-md hidden-sm">

				<div class="logo __sm __xs">

					<?php if (get_theme_mod( 'dealsdot_logo' )) { ?>
				
						<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">

							<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'dealsdot_logo' )) ); ?>" 
								alt="<?php bloginfo("name"); ?>" class="img-fluid" />

						</a>

					<?php } ?>

				</div>

				<div class="search-short-bar hidden-lg hidden-md">

					<form method="get" action="<?php bloginfo('url') ?>">

					    <a class="short-search-button" href="#">
					    	<span class="fa fa-search"></span>
						</a>

						<input type="text" class="short-search-field" name="s" value="" />

					</form>

				</div>

				<div class="nav-menu nav-menu-mobile hidden-lg hidden-md hidden-sm">
							
					<div class="container">

						<button id="nav-mobile-button">
							<span class="fa fa-navicon"></span>
						</button>

						<?php 
						    	$args = array(
									'theme_location' => 'mobile-primary-menu',
									'menu_id' => 'mobile-main-menu'
								);
								
								wp_nav_menu( $args ); ?>
					

					</div>					
					
				</div>
				
			</header>

			<div class="body-content" id="top-banner-and-menu">

