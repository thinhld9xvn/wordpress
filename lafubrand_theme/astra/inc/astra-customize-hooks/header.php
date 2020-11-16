<?php

    function astra_custom_below_header() {

        do_action( 'astra_custom_below_header' );

    }

    if ( ! function_exists('astra_polylang_switcher_mobile_markup') ) :

        function astra_polylang_switcher_mobile_markup() { ?>

                <ul class="l-bar lang-bar-mobile">
                    <?php pll_the_languages(); ?>
                </ul>

    <?php
    }

	add_action( 'astra_custom_below_header', 'astra_polylang_switcher_mobile_markup', 5 );

endif;

if ( ! function_exists( 'astra_site_branding_markup' ) ) {



	/**

	 * Site Title / Logo

	 *

	 * @since 1.0.0

	 */

	function astra_site_branding_markup() {

		?>



		<div class="site-branding">

			<div

			<?php

				echo astra_attr(

					'site-identity',

					array(

						'class' => 'ast-site-identity',

					)

				);

			?>

			>

				<?php astra_logo(); ?>

			</div>

		</div>



		<!-- .site-branding -->

		<?php

	}

}



add_action( 'astra_custom_below_header', 'astra_site_branding_markup', 8 );



/**

 * Function to get Toggle Button Markup

 */

if ( ! function_exists( 'astra_toggle_buttons_markup' ) ) {



	/**

	 * Toggle Button Markup

	 *

	 * @since 1.0.0

	 */

	function astra_toggle_buttons_markup() {

		$disable_primary_navigation = astra_get_option( 'disable-primary-nav' );

		$custom_header_section      = astra_get_option( 'header-main-rt-section' );

		$hide_custom_menu_mobile    = astra_get_option( 'hide-custom-menu-mobile', false );

		$above_header_merge         = astra_get_option( 'above-header-merge-menu' );

		$above_header_on_mobile     = astra_get_option( 'above-header-on-mobile' );

		$below_header_merge         = astra_get_option( 'below-header-merge-menu' );

		$below_header_on_mobile     = astra_get_option( 'below-header-on-mobile' );

		$menu_bottons               = true;



		if ( ( $disable_primary_navigation && 'none' == $custom_header_section ) || ( $disable_primary_navigation && true == $hide_custom_menu_mobile ) ) {

			$menu_bottons = false;

			if ( ( true == $above_header_on_mobile && true == $above_header_merge ) || ( true == $below_header_on_mobile && true == $below_header_merge ) ) {

				$menu_bottons = true;

			}

		}



		if ( apply_filters( 'astra_enable_mobile_menu_buttons', $menu_bottons ) ) {

			?>

		<div class="ast-mobile-menu-buttons">



			<?php astra_masthead_toggle_buttons_before(); ?>



			<?php astra_masthead_toggle_buttons(); ?>



			<?php astra_masthead_toggle_buttons_after(); ?>



		</div>

			<?php

		}

	}

}



add_action( 'astra_custom_below_header', 'astra_toggle_buttons_markup', 9 );



/**

 * Function to get Primary navigation menu

 */

if ( ! function_exists( 'astra_primary_navigation_markup' ) ) {



	/**

	 * Site Title / Logo

	 *

	 * @since 1.0.0

	 */

	function astra_primary_navigation_markup() {



		$disable_primary_navigation = astra_get_option( 'disable-primary-nav' );

		$custom_header_section      = astra_get_option( 'header-main-rt-section' );



		if ( $disable_primary_navigation ) {



			$display_outside = astra_get_option( 'header-display-outside-menu' );



			if ( 'none' != $custom_header_section && ! $display_outside ) {



				echo '<div class="main-header-bar-navigation ast-header-custom-item ast-flex ast-justify-content-flex-end">';

				/**

				 * Fires before the Primary Header Menu navigation.

				 * Disable Primary Menu is checked

				 * Last Item in Menu is not 'none'.

				 * Take Last Item in Menu outside is unchecked.

				 *

				 * @since 1.4.0

				 */

				do_action( 'astra_main_header_custom_menu_item_before' );



				echo astra_masthead_get_menu_items(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped



				/**

				 * Fires after the Primary Header Menu navigation.

				 * Disable Primary Menu is checked

				 * Last Item in Menu is not 'none'.

				 * Take Last Item in Menu outside is unchecked.

				 *

				 * @since 1.4.0

				 */

				do_action( 'astra_main_header_custom_menu_item_after' );



				echo '</div>';



			}

		} else {



			$submenu_class = apply_filters( 'primary_submenu_border_class', ' submenu-with-border' );



			// Menu Animation.

			$menu_animation = astra_get_option( 'header-main-submenu-container-animation' );

			if ( ! empty( $menu_animation ) ) {

				$submenu_class .= ' astra-menu-animation-' . esc_attr( $menu_animation ) . ' ';

			}



			/**

			 * Filter the classes(array) for Primary Menu (<ul>).

			 *

			 * @since  1.5.0

			 * @var Array

			 */

			$primary_menu_classes = apply_filters( 'astra_primary_menu_classes', array( 'main-header-menu', 'ast-nav-menu', 'ast-flex', 'ast-justify-content-flex-end', $submenu_class ) );



			// Fallback Menu if primary menu not set.

			$fallback_menu_args = array(

				'theme_location' => 'primary',

				'menu_id'        => 'primary-menu',

				'menu_class'     => 'main-navigation',

				'container'      => 'div',

				'before'         => '<ul class="' . esc_attr( implode( ' ', $primary_menu_classes ) ) . '">',

				'after'          => '</ul>',

				'walker'         => new Astra_Walker_Page(),

			);



			$items_wrap  = '<nav ';

			$items_wrap .= astra_attr(

				'site-navigation',

				array(

					'id'         => 'site-navigation',

					'class'      => 'ast-flex-grow-1 navigation-accessibility',

					'aria-label' => esc_attr__( 'Site Navigation', 'astra' ),

				)

			);

			$items_wrap .= '>';

			$items_wrap .= '<div class="main-navigation">';

			$items_wrap .= '<ul id="%1$s" class="%2$s">%3$s</ul>';

			$items_wrap .= '</div>';

			$items_wrap .= '</nav>';



			// Primary Menu.

			$primary_menu_args = array(

				'theme_location'  => 'primary',

				'menu_id'         => 'primary-menu',

				'menu_class'      => esc_attr( implode( ' ', $primary_menu_classes ) ),

				'container'       => 'div',

				'container_class' => 'main-header-bar-navigation',

				'items_wrap'      => $items_wrap,

			);



			if ( has_nav_menu( 'primary' ) ) {

				// To add default alignment for navigation which can be added through any third party plugin.

				// Do not add any CSS from theme except header alignment.

				echo '<div ' . astra_attr( 'ast-main-header-bar-alignment' ) . '>';

					wp_nav_menu( $primary_menu_args );

				echo '</div>';

			} else {



				echo '<div ' . astra_attr( 'ast-main-header-bar-alignment' ) . '>';

					echo '<div class="main-header-bar-navigation">';

						echo '<nav ';

						echo astra_attr(

							'site-navigation',

							array(

								'id' => 'site-navigation',

							)

						);

						echo ' class="ast-flex-grow-1 navigation-accessibility" aria-label="' . esc_attr__( 'Site Navigation', 'astra' ) . '">';

							wp_page_menu( $fallback_menu_args );

						echo '</nav>';

					echo '</div>';

				echo '</div>';

			}

		}



	}

}



add_action( 'astra_custom_below_header', 'astra_primary_navigation_markup', 10 );