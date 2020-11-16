<?php 

	function register_ultimated_cache_menubar() {

		global $wp_admin_bar;

		$delete_cache_icon = ULTIMATED_CACHE_DELETE_ICON;

		$menu_url = $_SERVER['REQUEST_URI'];

		$uc_action = $_GET['uc_action'];

		if ( ! isset( $uc_action ) || 'delete_cache' !== $uc_action ) :

			$menu_url = remove_query_arg( 'uc_action', $menu_url );		
			$menu_url = add_query_arg( 'uc_action', 'delete_cache', $menu_url );		

		endif;

		$args = array(
			"id" => "ultimated-cache-delete-all-cache",
			"title" => "<img style='width: 30px;vertical-align: middle; margin-right: 5px' src='{$delete_cache_icon}' alt='ultimated-delete-cache' />" .
					   "<span style='vertical-align: middle'>Delete cache</span>",
			"href" => "{$menu_url}"
		);

		$wp_admin_bar->add_menu( $args );
	}

	add_action( 'admin_bar_menu', 'register_ultimated_cache_menubar', 500 ); ?>