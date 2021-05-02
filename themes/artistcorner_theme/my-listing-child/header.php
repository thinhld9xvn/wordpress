<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php esc_attr( bloginfo( 'charset' ) ) ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="pingback" href="<?php esc_attr( bloginfo( 'pingback_url' ) ) ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
		/**
		 * Action hook immediately after the opening <body> tag.
		 *
		 * @since 1.6.6
		 */
		do_action( 'mylisting/body/start' ) ?>

		<?php
		// Initialize custom styles global.
		$GLOBALS['case27_custom_styles'] = '';

		// Wrap site in #c27-site-wrapper div.
		printf( '<div id="c27-site-wrapper">' );

		// Include loading screen animation.
		c27()->get_partial( 'loading-screens/' . c27()->get_setting( 'general_loading_overlay', 'none' ) );
		
		$header_options = get_option('section-header_option_name'); ?>
		
		<header class="c27-main-header header header-style-default header-dark-skin header-scroll-dark-skin hide-until-load header-fixed header-menu-right">

			<div class="header-skin"></div>

			<div class="header-container">

				<div class="header-top container-fluid flex flex-algn-center">

					<div class="header-left">

						<div class="logo">
							
							<a href="<?php echo bloginfo('url') ?>" class="static-logo">
								<img src="<?= $header_options['logo-image-id'] ?>" />
							</a>
							
						</div>	

						<div class="quick-search-instance text-left" id="c27-header-search-form" data-focus="default">

							<form action="<?= EXPLORE_JOBS_MORE_URL ?>" method="GET">

								<div class="dark-forms header-search search-shortcode-light">

									<i class="mi search"></i> 

									<input type="search" 
											placeholder="What are you looking for?" 
											name="search_keywords" 
											autocomplete="off" />

									<div class="instant-results">

										<?php 
											$categories = get_jobs_categories();
											
											if ( $categories ) : ?>

												<ul class="instant-results-list default-results">

													<?php foreach ( $categories as $key => $category ) : 
														
														$term_bg_color = get_profile_term_color($category); 
														$term_text_color = get_profile_term_text_color($category); 
														$term_icon = get_profile_term_icon($category); ?>													

														<li>

															<a href="<?php echo get_term_link($category) ?>">

																<span class="cat-icon" 

																	<?php if ( $term_bg_color ) : ?>

																		style="background-color: <?= $term_bg_color ?>;"

																	<?php endif; ?>>

																	<i class="<?= $term_icon ?>" 

																		<?php if ( $term_text_color ) : ?>
																		
																			style="color: <?= $term_text_color ?>;"

																		<?php endif; ?>></i>

																</span> 

																<span class="category-name"><?php echo $category->name ?></span>

															</a>

														</li>		

												<?php endforeach; ?>

												</ul>

										<?php endif; ?>

									</div>


								</div>

							</form>

						</div>
						
					</div>

					<div class="top-menu header-center">

						<?php $primary_menu_walker = new Unicorn_NavMenu_Walker(); ?>

						<button class="btnNavMenu">
							<span class="fa fa-navicon"></span>
						</button>

						<button class="close btnNavMenuClose">
							<span class="fa fa-close"></span>
						</button>

						<div class="i-nav">
							
							<?php 
								wp_nav_menu(

									array(
										'theme_location' => 'primary',
										'container' => '',
										'menu_class' => 'main-menu main-nav',
										'menu_id' => 'menu-main-menu',
										'walker' => $primary_menu_walker
									)

								);
							?>

						</div>

					</div>				

					<div class="header-right">

						<?php if ( ! is_user_logged_in() ) :

								print_header_user_not_logged_in();							

							else:
								
								print_header_user_logged_in();		
							
							endif; ?>					
						

						<div class="search-trigger" data-toggle="modal" data-target="#quicksearch-mobile-modal">
							<a href="#"><i class="mi search"></i></a>
						</div>

					</div>

					
				</div>
				
			</div>
			
		</header>