<?php 

	$ultimate_cache_options = get_option('section-ultimate-cache_option_name');	
	$ultimate_cache_deleted_timeout = (int) $ultimate_cache_options['ultimate-cache-delete-timeout-id'];

	define('ULTIMATE_CACHE_DELETE_TIMEOUT', $ultimate_cache_deleted_timeout ); // tự động xóa cache sau

	class Ultimated_Cache_Schedule {

		public function __construct() {			

		}

		public function schedule_delete_cache() {

			$schedule_file = ULTIMATED_CACHE_DIRECTORY . '/schedule.ini';

			if ( ! file_exists( $schedule_file ) ) :

				$cache_begin_time = time();

				file_put_contents($schedule_file, "delete_cache_time_init={$cache_begin_time}");

			else :

				$data = parse_ini_file( $schedule_file );

				if ( $data['delete_cache_time_init'] ) :

					$cache_begin_time = (int) $data['delete_cache_time_init'];
					$cache_current_time = time();

					$cache_delta_time = $cache_current_time - $cache_begin_time;				

					if ( $cache_delta_time >= ULTIMATE_CACHE_DELETE_TIMEOUT ) :						

						require_once ULTIMATED_CACHE_DIRECTORY_HELPER . '/uc_delete_cache.php';

						$uc_delete_cache_helper = new UC_Delete_Cache();

						$uc_delete_cache_helper->delete_cache();

						file_put_contents($schedule_file, "delete_cache_time_init={$cache_current_time}");

					endif;

				endif;

			endif;			

		}

	}

	$ultimate_cache_schedule = new Ultimated_Cache_Schedule();

	add_action('after_setup_theme', array( $ultimate_cache_schedule, 'schedule_delete_cache' ) );
	
?>