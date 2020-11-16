<?php 

	class qTranslate_Nav_Menus {

		public function __construct() {
			$this->register_qtranslate_nav_menus();
		}

		function register_qtranslate_nav_menus() {

			global $wpdb;

			$tbl_terms = $wpdb->prefix . 'terms';

			$nav_menus = array();
			$languages = $_SESSION['qtranslate_languages'];

			foreach ( $languages as $lang ) :

				$nav_menus["qt-navmenu-$lang->code"] = __( "Primary Menu ( $lang->name )", "pitvietco" );					   

			endforeach;

			register_nav_menus( $nav_menus );

			foreach ( $languages as $lang ) :

				// Check if the menu exists
				$menu_name = "Menu $lang->name";
				$menu_exists = wp_get_nav_menu_object( $menu_name );

				// If it doesn't exist, let's create it.
				if( ! $menu_exists ) :

				    $qt_menu_id = wp_create_nav_menu($menu_name);

					wp_update_nav_menu_item($qt_menu_id, 0, array(
					    "menu-item-title" =>  __("Home"),
					    "menu-item-classes" => "home",
					    "menu-item-url" => home_url( "/$lang->code" ), 
					    "menu-item-status" => "publish"
					));

				    // Set the menu to primary menu location
					$locations = get_theme_mod( "nav_menu_locations" );

					$locations["qt-navmenu-$lang->code"] = $qt_menu_id;

					set_theme_mod ( "nav_menu_locations", $locations );

					$wpdb->query(

						"
							UPDATE 
								$tbl_terms
							SET
								qtranslate_term_langcode = '$lang->code'
							WHERE
								term_id = $qt_menu_id

						"

					);

				endif;

			endforeach;
		}

		// mỗi một ngôn ngữ sẽ hiển thị đúng với mỗi nav menu đã được định sẵn
		function modify_nav_menu_args( $args ) {

			$langcode = $_SESSION['qtranslate_mainsite_langcode'];		

			$args["theme_location"] = "qt-navmenu-$langcode"; 

			return $args;		 
			
		}

		// lọc tất cả nội dung trong trang nav-menus.php hiển thị đúng theo ngôn ngữ hiện tại
		function qtranslate_nav_menu_contents_filter() {

			if ( false !== strpos( $_SERVER['REQUEST_URI'], 'nav-menus.php' ) ) :

				$post_types = get_post_types( array( 'show_in_nav_menus' => true ), 'object' );

				$qtranslate_navmenu_post_type_items_callback = function( $posts, $args, $post_type ) {

					$filtered_posts = array();
					$active_langcode = $_SESSION['qtranslate_active_lang'];

					foreach( $posts as $post ) :

						if ( $active_langcode == $post->qtranslate_post_langcode ) :

							$filtered_posts[] = $post;

						endif;

					endforeach;

					return $filtered_posts;		
					

				};

				foreach ( $post_types as $post_type ) :

					add_filter("nav_menu_items_{$post_type->name}", $qtranslate_navmenu_post_type_items_callback);
					add_filter("nav_menu_items_{$post_type->name}_recent", $qtranslate_navmenu_post_type_items_callback);

				endforeach;

			endif;

		}

	}

	$qt_nav_menus = new qTranslate_Nav_Menus();

	add_filter('wp_nav_menu_args', array( $qt_nav_menus, 'modify_nav_menu_args' ) );
	add_action('admin_init', array( $qt_nav_menus, 'qtranslate_nav_menu_contents_filter' ) ); ?>