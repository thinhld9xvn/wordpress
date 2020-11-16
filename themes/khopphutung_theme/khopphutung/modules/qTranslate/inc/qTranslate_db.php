<?php 
	class qTranslate_db {

		private $mydb;

		public function __construct() {

			global $wpdb;

			$this->mydb = $wpdb;
			$this->generate_require_tables();

		}

		// tạo các bảng hệ thống
		function generate_require_tables() {

			require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

			$mydb = $this->mydb;

			$tbl_qtranslate_options = $mydb->prefix . 'pfx_qtranslate_options';

			$option = $mydb->get_var(
				"
					SELECT 
						option_name
					FROM 
						$tbl_qtranslate_options
					WHERE
						option_name = 'option_tables_ready'
				"
			);

			if ( '1' != $option ) :

				$tbl_qtranslate_strings = $mydb->prefix . 'pfx_qtranslate_strings';
				$tbl_qtranslate_languages = $mydb->prefix . 'pfx_qtranslate_languages';

				$tbl_terms = $mydb->prefix . 'terms';
				$tbl_posts = $mydb->prefix . 'posts';

				$charset_collate = $mydb->get_charset_collate();

				$result = $mydb->get_var( " SHOW TABLES LIKE '$tbl_qtranslate_options' " );

				// bảng không tồn tại => tạo bảng mới
				if ( $tbl_qtranslate_options != $result ) :

					dbDelta(

						"
						  CREATE TABLE $tbl_qtranslate_options (
						  		id MEDIUMINT(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						  		option_name VARCHAR(50) NOT NULL, 	
						  		option_value VARCHAR(50) NOT NULL, 	
						  	UNIQUE KEY ( option_name )				  		
						  	
						  ) $charset_collate;

						  CREATE INDEX primary_{$tbl_qtranslate_options}_index ON $tbl_qtranslate_options ( option_name );

						"				

					);

				endif;			

				$result = $mydb->get_var( " SHOW TABLES LIKE '$tbl_qtranslate_strings' " );

				// bảng không tồn tại => tạo bảng mới
				if ( $tbl_qtranslate_strings != $result ) :

					dbDelta(

						"
						  CREATE TABLE $tbl_qtranslate_strings (
						  		id MEDIUMINT(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						  		string_name VARCHAR(100) NOT NULL, 	
						  	UNIQUE KEY ( string_name )				  		
						  	
						  ) $charset_collate;

						  CREATE INDEX primary_{$tbl_qtranslate_strings}_index ON $tbl_qtranslate_strings ( string_name );

						"				

					);

				endif;

				$result = $mydb->get_var( " SHOW TABLES LIKE '$tbl_qtranslate_languages' " );

				// bảng không tồn tại => tạo bảng mới
				if ( $tbl_qtranslate_languages != $result ) :

					dbDelta(					

						"
						  CREATE TABLE $tbl_qtranslate_languages (

						  		id MEDIUMINT(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						  		name VARCHAR(50) NOT NULL,
						  		locale VARCHAR(5) NOT NULL,
						  		code VARCHAR(2) NOT NULL,
						  		ldefault TINYINT(1) NOT NULL DEFAULT 0,	
						  		UNIQUE KEY ( name )

						  ) $charset_collate;

						  CREATE INDEX primary_{$tbl_qtranslate_languages}_index ON $tbl_qtranslate_languages ( name );

						"				

					);

				endif;		

				$result = $mydb->get_var( " SHOW COLUMNS FROM $tbl_terms LIKE 'qtranslate_term_langcode' " );

				// cột không tồn tại => tạo cột mới
				if ( 0 == sizeof( $result ) ) :

					$mydb->query(				

						"
						  ALTER TABLE $tbl_terms ADD COLUMN qtranslate_term_langcode VARCHAR(2) NOT NULL

						"					
					);

				endif;	

				/*$result = $mydb->get_var( " SHOW COLUMNS FROM $tbl_terms LIKE 'qtranslate_term_id_primary' " );

				// cột không tồn tại => tạo cột mới
				if ( 0 == sizeof( $result ) ) :

					$mydb->query(

						"
						  ALTER TABLE $tbl_terms ADD COLUMN qtranslate_term_id_primary MEDIUMINT(9) NOT NULL

						"					
					);

				endif;	*/

				$result = $mydb->get_var( " SHOW COLUMNS FROM $tbl_posts LIKE 'qtranslate_post_langcode' " );

				// cột không tồn tại => tạo cột mới
				if ( 0 == sizeof( $result ) ) :

					$mydb->query(				

						"
						  ALTER TABLE $tbl_posts ADD COLUMN qtranslate_post_langcode VARCHAR(2) NOT NULL

						"					
					);

				endif;	

				/*$result = $mydb->get_var( " SHOW COLUMNS FROM $tbl_posts LIKE 'qtranslate_post_id_primary' " );

				// cột không tồn tại => tạo cột mới
				if ( 0 == sizeof( $result ) ) :

					$mydb->query(				

						"
						  ALTER TABLE $tbl_posts ADD COLUMN qtranslate_post_id_primary MEDIUMINT(9) NOT NULL

						"					
					);

				endif;	*/	

				$mydb->query(
					"
						REPLACE INTO 
							$tbl_qtranslate_options (option_name, option_value) 
						VALUES ('option_tables_ready', '1')
					"
				);


			endif;

		}

		function check_all_contents_lang_default() {

			$mydb = $this->mydb;

			$tbl_qtranslate_options = $mydb->prefix . 'pfx_qtranslate_options';

			return $mydb->get_var (
				
				"
					SELECT 
						option_value FROM $tbl_qtranslate_options
					WHERE 
						option_name = 'option_set_contents_def_lang'
				"
			);

		}

		function set_all_contents_to_lang_default( $def_langcode ) {

			$mydb = $this->mydb;

			$tbl_qtranslate_options = $mydb->prefix . 'pfx_qtranslate_options';

			$tbl_terms = $mydb->prefix . 'terms';
			$tbl_posts = $mydb->prefix . 'posts';

			$set_contents_def_callback = function( $db, $arr_tables, $lcode ) {				

				$db->query(

					"
						UPDATE 
							{$arr_tables['terms']}
						SET 
							qtranslate_term_langcode = '$lcode'
						WHERE 1
					"

				);	

				$db->query(

					"
						UPDATE 
							{$arr_tables['posts']}
						SET 
							qtranslate_post_langcode = '$lcode'
						WHERE 1
					"

				);					

			};

			$option = $mydb->get_row (
				"
					SELECT 
						option_name, option_value FROM $tbl_qtranslate_options
					WHERE 
						option_name = 'option_set_contents_def_lang'
				"
			);

			// chưa tồn tại option trong bảng => tạo mới
			if ( is_null( $option ) ) :

				$mydb->insert(

					$tbl_qtranslate_options,

					array(
						'option_name' => 'option_set_contents_def_lang',
						'option_value' => '1'
					),

					array(
						'%s',
						'%s'
					)

				);	

				$set_contents_def_callback( $mydb, 
											array( 'terms' => $tbl_terms,
												   'posts' => $tbl_posts ),
											$def_langcode );

			// tồn tại option trong bảng 
			else :

				// chưa được set là default
				if ( '1' != $option->option_value ) :

					$mydb->update(

						$tbl_qtranslate_options,

						array(
							'option_value' => '1'
						),

						array(
							'option_name' => 'option_set_contents_def_lang'
						),

						array(
							'%s'
						)

					);	

					$set_contents_def_callback( $mydb,
												array( 'terms' => $tbl_terms,
												   	   'posts' => $tbl_posts ),											
												$def_langcode );

				endif;

			endif;

		}

		// tạo một ngôn ngữ mới trong database
		function insert_new_language( $name, $locale, $code ) {

			$mydb = $this->mydb;

			$tbl_qtranslate_languages = $mydb->prefix . 'pfx_qtranslate_languages';
			$ldefault = 0;

			$result = $mydb->get_var( "SELECT name FROM $tbl_qtranslate_languages WHERE name = '$name' " );			

			// ngôn ngữ chưa tồn tại trong bảng
			if ( $name != $result ) :

				$count = $mydb->get_var( "SELECT COUNT(id) FROM $tbl_qtranslate_languages" );

				// bảng chưa có dữ liệu thì set ngôn ngữ này làm ngôn ngữ mặc định
				if ( 0 == $count ) :
					$ldefault = 1;
				endif;

				$mydb->insert(

					$tbl_qtranslate_languages,

					array(
						'name' => $name,
						'locale' => $locale,
						'code' => $code,
						'ldefault' => $ldefault
					),

					array(
						'%s',
						'%s',
						'%s'					
					)

				);

			endif;

		}

		// lấy tất cả các ngôn ngữ đã tạo trong database
		function get_all_languages() {

			$mydb = $this->mydb;

			$tbl_qtranslate_languages = $mydb->prefix . 'pfx_qtranslate_languages';

			return $mydb->get_results(

				"
					SELECT name, locale, code, ldefault FROM $tbl_qtranslate_languages
				"

			);

		}

		// xóa một ngôn ngữ trong database 
		function remove_language( $name ) {

			$mydb = $this->mydb;

			$tbl_qtranslate_languages = $mydb->prefix . 'pfx_qtranslate_languages';

			$result = $mydb->get_var( "SELECT name FROM $tbl_qtranslate_languages WHERE name = '$name' " );

			// ngôn ngữ đã tồn tại
			if ( $name == $result ) :

				$mydb->delete(

					$tbl_qtranslate_languages,

					array(
						'name' => $name
					),

					array(
						'%s'										
					)

				);

			endif;

		}

		// kiểm tra và set một ngôn ngữ làm ngôn ngữ mặc định
		function check_and_set_default_language( $name ) {

			$mydb = $this->mydb;

			$tbl_qtranslate_languages = $mydb->prefix . 'pfx_qtranslate_languages';

			$ldefault = $mydb->get_var( "SELECT ldefault FROM $tbl_qtranslate_languages WHERE name = '$name'" );

			// chưa là ngôn ngữ mặc định thì mới set
			if ( 0 == $ldefault ) :

				$mydb->query(

					"
						UPDATE $tbl_qtranslate_languages
						SET ldefault = IF ( name = '$name', 1, 0 )

					"

				);

			endif;

		}

		// lấy ngôn ngữ mặc định từ database
		function get_default_language() {

			$mydb = $this->mydb;

			$tbl_qtranslate_languages = $mydb->prefix . 'pfx_qtranslate_languages';

			return $mydb->get_row( "SELECT name, locale, code FROM $tbl_qtranslate_languages WHERE ldefault=1" );			

		}

		// kiểm tra và tạo thêm một column trong bảng 'qTranslate_strings'		 
		// tương ứng với từng ngôn ngữ đã tạo với prefix 'string_value_$langcode'
		// Ví dụ: 'Tiếng Việt' => 'string_value_vi'
		// 		  'Tiếng Anh'  => 'string_value_en'
		protected function check_and_create_column_lang_string( $langcode ) {

			require_once (ABSPATH . 'wp-admin/includes/upgrade.php');	

			$mydb = $this->mydb;
			$tbl_qtranslate_strings = $mydb->prefix . 'pfx_qtranslate_strings';	

			$result = $mydb->get_results(

				"
					SHOW COLUMNS FROM $tbl_qtranslate_strings LIKE 'string_value_$langcode'
				"

			);

			if ( 0 == sizeof( $result ) ) :

				$mydb->query( 

					"						
						ALTER TABLE $tbl_qtranslate_strings ADD COLUMN string_value_$langcode VARCHAR(100) NOT NULL
					" 

				);

			endif;

		}

		// chèn một mảng chuỗi dịch mới vào bảng 'qTranslate_strings' tương ứng với $langcode	
		function insert_and_update_translate_strings( $arr_strings ) {

			$mydb = $this->mydb;
			$tbl_qtranslate_strings = $mydb->prefix . 'pfx_qtranslate_strings';

			// xóa toàn bộ những rows không thuộc mảng dữ liệu
			$delete_mysql = "DELETE FROM $tbl_qtranslate_strings WHERE string_name not in (";

			foreach( $arr_strings as $string ):

				$delete_mysql .= sprintf( " '%s' ", $string['src'] );

				if ( $string != end( $arr_strings ) ) :

					$delete_mysql .= ", ";

				else :

					$delete_mysql .= ")";

				endif;

			endforeach; 

			$mydb->query( $delete_mysql );

			// cập nhật toàn bộ rows trong bảng, dữ liệu sẽ bị ghi đè
			$insert_mysql = "REPLACE INTO $tbl_qtranslate_strings( string_name";

			$keys = array_keys( $arr_strings[0]['dest'] );

			foreach ( $keys as $column_key ) :

				$this->check_and_create_column_lang_string( $column_key );
				$insert_mysql .= ", string_value_{$column_key}";

			endforeach;

			$insert_mysql .= ") VALUES";

			foreach ( $arr_strings as $string ) :

				$insert_mysql .= sprintf( "('%s'", $string["src"] );

				foreach ( $keys as $column_key ) :

					$insert_mysql .= sprintf( ", '%s'", $string["dest"]["$column_key"] );

				endforeach;

				$insert_mysql .= ")";

				if ( $string != end( $arr_strings ) ) :

					$insert_mysql .= ", ";

				endif;

			endforeach;			

			$mydb->query( $insert_mysql );

		}

		// xóa toàn bộ dữ liệu bảng 'qTranslate_strings'
		function remove_all_translate_strings() {

			$mydb = $this->mydb;
			$tbl_qtranslate_strings = $mydb->prefix . 'pfx_qtranslate_strings';

			// xóa toàn bộ những rows không thuộc mảng dữ liệu
			$delete_mysql = "DELETE FROM $tbl_qtranslate_strings";

			$mydb->query( $delete_mysql );

		}

		// lấy dữ liệu chuỗi dịch ở bảng 'qTranslate_strings' từ database
		function get_all_translate_strings() {

			$mydb = $this->mydb;
			$tbl_qtranslate_strings = $mydb->prefix . 'pfx_qtranslate_strings';	

			return $mydb->get_results(
				"SELECT * FROM $tbl_qtranslate_strings ORDER BY id ASC",
				ARRAY_A
			);

		}

		// lấy dữ liệu term foreign của term có id = $term_id
		// và term foreign có mã ngôn ngữ = $t_langcode
		/*function get_term_foreign( $term_id, $t_langcode ) {

			$mydb = $this->mydb;

			$tbl_terms = $mydb->prefix . 'terms';

			return $mydb->get_row(

				"
					SELECT 
						term_id, name, slug
					FROM 
						$tbl_terms
					WHERE
						qtranslate_term_langcode = '$t_langcode' AND
						qtranslate_term_id_primary = $term_id					

				"

			);

		}*/

		// lấy dữ liệu term primary của term foreign có id = $term_id
		/*function get_term_primary( $term_id ) {

			$mydb = $this->mydb;

			$tbl_terms = $mydb->prefix . 'terms';

			return $mydb->get_row(

				"
					SELECT 
						term_id, name, slug
					FROM 
						$tbl_terms
					WHERE
						term_id IN (

							SELECT 
								qtranslate_term_id_primary
							FROM 
								$tbl_terms
							WHERE
								term_id = $term_id

						)

				"

			);

		}*/

		// lấy dữ liệu post foreign của post có id = $post_id
		// và post foreign có mã ngôn ngữ = $p_langcode
		/*function get_post_foreign( $post_id, $p_langcode ) {

			$mydb = $this->mydb;

			$tbl_posts = $mydb->prefix . 'posts';

			return $mydb->get_row(

				"
					SELECT 
						id, post_title, post_name
					FROM 
						$tbl_posts
					WHERE
						qtranslate_post_langcode = '$p_langcode' AND
						qtranslate_post_id_primary = $post_id
				"

			);

		}

		// lấy dữ liệu post primary của post foreign có id = $post_id
		function get_post_primary( $post_id ) {

			$mydb = $this->mydb;

			$tbl_posts = $mydb->prefix . 'posts';

			return $mydb->get_row(

				"
					SELECT 
						id, post_title, post_name
					FROM 
						$tbl_posts
					WHERE
						id IN (

							SELECT 
								qtranslate_post_id_primary
							FROM 
								$tbl_posts
							WHERE
								id = $post_id						

						)

				"

			);

		}*/

	}
?>