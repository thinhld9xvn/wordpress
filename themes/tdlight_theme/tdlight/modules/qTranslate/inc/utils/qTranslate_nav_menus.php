<?php 

	class qTranslate_Nav_Menus {

		public function __construct() {

			$this->register_qtranslate_nav_menus();

		}

		public function create_nav_menu( $name, $location, $lang ) {

			global $wpdb;

			$tbl_terms = $wpdb->prefix . 'terms';

			// Check if the menu exists

			$menu_name = $name;

			$menu_exists = wp_get_nav_menu_object( $menu_name );

			// If it doesn't exist, let's create it.

			if( ! $menu_exists ) :

			    $qt_menu_id = wp_create_nav_menu( $menu_name );

				if ( ! is_wp_error( $qt_menu_id ) ) :

					wp_update_nav_menu_item( $qt_menu_id, 0, array(

					    "menu-item-title" =>  __("Home"),

					    "menu-item-classes" => "home",

					    "menu-item-url" => home_url( "/{$lang->code}" ), 

					    "menu-item-status" => "publish"

					));

				    // Set the menu to primary menu location

					$locations = get_theme_mod( "nav_menu_locations" );

					$locations["$location"] = $qt_menu_id;

					set_theme_mod ( "nav_menu_locations", $locations );			

					$wpdb->query(

						"
							UPDATE 

								{$tbl_terms}

							SET

								qtranslate_term_langcode = '{$lang->code}'

							WHERE

								term_id = {$qt_menu_id}
						"

					);

				endif;

			endif;

		}

		public function register_qtranslate_nav_menus() {

			include get_template_directory() . '/options/config.php';						

			$nav_menus = array();

			$languages = $_SESSION['qtranslate_languages'];

			// tạo các vị trí đặt primary menu cho từng ngôn ngữ
			foreach ( $languages as $lang ) :

				$nav_menus["qt-navmenu-$lang->code"] = __( "Primary Menu ( $lang->name )", "pitvietco" );
				
			endforeach;

			// tạo các vị trí đặt mobile menu cho từng ngôn ngữ
			if ( $qtranslate_nav_menus['mobile'] ) :

				foreach ( $languages as $lang ) :									

					$nav_menus["qt-navmenu-mobile-$lang->code"] = __( "Mobile Menu ( $lang->name )", "pitvietco" );								 

				endforeach;

			endif;

			register_nav_menus( $nav_menus );

			foreach ( $languages as $lang ) :

				$this->create_nav_menu( "Menu $lang->name", "qt-navmenu-$lang->code", $lang );

				// tạo các mobile menu cho từng ngôn ngữ
				if ( $qtranslate_nav_menus['mobile'] ) :					

					$this->create_nav_menu( "Mobile $lang->name", "qt-navmenu-mobile-$lang->code", $lang );

				endif; 

			endforeach;

		}

		// mỗi một ngôn ngữ sẽ hiển thị đúng với mỗi nav menu đã được định sẵn
		function modify_nav_menu_args( $args ) {

			if ( false !== $args['qt_modify'] ) :

				$langcode = $_SESSION["qtranslate_mainsite_langcode"];

				if ( $args["mobile"] ) :

					$args["theme_location"] = "qt-navmenu-mobile-$langcode";

				else :

					$args["theme_location"] = "qt-navmenu-$langcode";

				endif;		

			endif;				

			return $args;

		}

		// lọc tất cả nội dung trong trang nav-menus.php hiển thị đúng theo ngôn ngữ hiện tại
		function qtranslate_nav_menu_contents_filter() {

			if ( false !== strpos( $_SERVER['REQUEST_URI'], 'nav-menus.php' ) ) :

				$post_types = get_post_types( array( 'show_in_nav_menus' => true ), 'object' );

				$qtranslate_navmenu_post_type_items_callback = function( $posts, $args, $post_type ) {

					$active_langcode = $_SESSION['qtranslate_active_lang'];

			        $filter_posts = array();

			        foreach ( $posts as $post ) :

			        	if ( $active_langcode === $post->qtranslate_post_langcode ) :

				            $_post = $post;

				            if ( 0 === strpos( $_post->post_title, $active_langcode . '_' ) ) :

				                $_post->post_title = mb_substr( $_post->post_title, strlen( $active_langcode . '_' ) );

				            endif;     

				            if ( 0 === strpos( $_post->post_name, $active_langcode . '_' ) ) :

				                $_post->post_name = mb_substr( $_post->post_name, strlen( $active_langcode . '_' ) );

				            endif; 

				            $filter_posts[] = $_post;

				        endif;
			            
			        endforeach;              

			        return $filter_posts;

				};

				foreach ( $post_types as $post_type ) :

					add_filter("nav_menu_items_{$post_type->name}", $qtranslate_navmenu_post_type_items_callback);

					add_filter("nav_menu_items_{$post_type->name}_recent", $qtranslate_navmenu_post_type_items_callback);

				endforeach;

			endif;

		}

		// lọc theme location trong trang nav-menus.php hiển thị đúng theo ngôn ngữ hiện tại
		function qtranslate_nav_menu_theme_location_filter() {

			$request_uri = $_SERVER['REQUEST_URI'];		

			$menu_id = $_GET['menu'];
			$qlang = $_GET['qtranslate_lang'];	

			if ( false !== strpos( $request_uri, 'nav-menus.php' ) ) :

				global $_wp_registered_nav_menus;

				$active_langcode = $_SESSION['qtranslate_active_lang'];

				$nav_menus_keys = array_keys( $_wp_registered_nav_menus );

				// filter theme location

				foreach( $nav_menus_keys as $nav_menu_key ) :

					$nav_menu_langcode = substr( $nav_menu_key, strlen( $nav_menu_key ) - 2 );

					if ( $active_langcode !== $nav_menu_langcode ) :

						unset( $_wp_registered_nav_menus["$nav_menu_key"] );

					endif;

				endforeach;

				if ( isset( $menu_id ) && isset( $qlang ) ) :

					$n_locations = get_nav_menu_locations();

					$keys = array_keys( $_wp_registered_nav_menus );

					$nav_menu_slug = $keys[0];
					$nav_menu_id = $n_locations["$nav_menu_slug"];

					if ( $nav_menu_id != $menu_id ) :

						$_request_uri = str_replace("menu={$menu_id}", "menu={$nav_menu_id}", $request_uri);
						$_request_uri = str_replace("&qtranslate_lang={$qlang}", "", $_request_uri);

						wp_redirect( $_request_uri );

						$_SESSION['qtranslate_nav_menu_redirect'] = true;

					endif;

				endif;						

			endif;

		}		

	}

	$qt_nav_menus = new qTranslate_Nav_Menus();

	add_filter('wp_nav_menu_args', array( $qt_nav_menus, 'modify_nav_menu_args' ) );

	add_action('admin_init', array( $qt_nav_menus, 'qtranslate_nav_menu_contents_filter' ) );
	add_action('admin_init', array( $qt_nav_menus, 'qtranslate_nav_menu_theme_location_filter' ) );