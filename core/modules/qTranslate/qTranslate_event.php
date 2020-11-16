<?php 
	class qTranslateEvent {

		private $mydb;

		public function __construct() {

			global $q_db;

			$this->mydb = $q_db;

			$this->admin_form_submit_callback();   

	        $this->admin_check_and_set_default_lang();
	        $this->admin_check_and_remove_lang();

	        $this->admin_check_and_set_active_lang_menu();       

		}

		// sự kiện submit admin form
	    public function admin_form_submit_callback() {  

	    	// tạo ngôn ngữ mới
	        if ( isset( $_POST['btnNewLanguageSubmit'] ) ) :

	            $this->admin_form_submit_create_new_lang();

	        
	        // lưu thông tin các chuỗi dịch
	        elseif ( isset( $_POST['btnSubmitStrTranslate'] ) ) :

	        	$this->admin_form_submit_save_translate_strings();

	        // lưu thông tin các nav menus
	        elseif ( isset( $_POST['btnQNavMenusSave'] ) ) :

	        	$this->admin_form_submit_save_nav_menus();
	        	
	       	// thiết lập nâng cao
	       	elseif ( isset( $_POST['btnAdvancedSettingsSubmit'] ) ) :

	       		$this->admin_form_submit_set_advanced_settings();

	        endif;

	    }	

	    // submit form tạo ngôn ngữ mới
	    public function admin_form_submit_create_new_lang() {

	    	$mydb = $this->mydb;
	           
            $name = $_POST['txtqtransLangName'];
            $locale = $_POST['txtqtransLangLocale'];
            $code = $_POST['txtqtransLangCode'];

            $mydb->insert_new_language( $name, $locale, $code );

	    }   

	    // submit form lưu thông tin các chuỗi dịch
	    public function admin_form_submit_save_translate_strings() {

	    	$mydb = $this->mydb;

        	$arr_translate_strings = $_POST['qtranslate_strings'];

        	//print_r( $arr_translate_strings ); die();

        	if ( $arr_translate_strings ) :

	        	for( $i = 0; $i < sizeof( $arr_translate_strings ); $i++ ) :

	        		$arr_translate_strings[$i]['src'] = trim( $arr_translate_strings[$i]['src'] );

	        		$dest_keys = array_keys( $arr_translate_strings[$i]['dest'] );

	        		for( $j = 0; $j < sizeof( $arr_translate_trings[$i]['dest'] ); $j++ ) :

	        			$key = $dest_keys[$j];
	        			$arr_translate_strings[$i]["dest"]["$key"] = trim( $arr_translate_strings[$i]["dest"]["$key"] );

	        		endfor;

	        	endfor;	   

	        	$mydb->insert_and_update_translate_strings( $arr_translate_strings );

	        else :

	        	$mydb->remove_all_translate_strings();

	        endif; 

	    } 

	    // submit form thiết lập tùy chọn nâng cao
	    public function admin_form_submit_set_advanced_settings() {

	    	$mydb = $this->mydb;
	    	$setting = $_POST['qtranslate_advanced_settings'];

	    	switch ( $setting ) :

	    		// set ngôn ngữ mặc định cho tất cả nội dung đã tạo
	    		case 'set_all_default':

	    			$def_langcode = $_POST['slQtransDefLangCode'];

	    			$mydb->set_all_contents_to_lang_default( $def_langcode );
	    			
	    			break;
	    		
	    		default:	    		
	    			break;

	    	endswitch;

	    }

	    // submit form thiêt lập nav menus
	    public function admin_form_submit_save_nav_menus() {

	    	global $wpdb;	    		    	

	    	$q_nav_menus = $_POST['qtranslate_nav_menu_lang'];

	    	foreach ( $q_nav_menus as $term_id => $langcode ) :	    		

	    		$wpdb->query(

	    			"UPDATE {$wpdb->prefix}terms SET qtranslate_term_langcode = '{$langcode}' WHERE term_id = {$term_id}"

	    		);
	    		
	    	endforeach;

	    	wp_redirect( admin_url( "options-general.php?page=qtranslate-settings-admin&tab_id=nav-tab-navmenus-lang" ) ); die();
	    	
	    }

	    // hàm set một ngôn ngữ làm ngôn ngữ mặc định 
	    public function admin_check_and_set_default_lang() {

	        $name = $_GET['set_default_lang'];

	        if ( isset( $name ) ) :

	            $mydb = $this->mydb;
	            $mydb->check_and_set_default_language( $name );

	        endif;

	    }

	    // hàm xóa một ngôn ngữ
	    public function admin_check_and_remove_lang() {

	        $name = $_GET['remove_lang'];

	        if ( isset( $name ) ) :

	            $mydb = $this->mydb;
	            $mydb->remove_language( $name );

	        endif;

	    }

	    // hàm kiểm tra và set active ngôn ngữ khi chọn trên thanh menu
	    public function admin_check_and_set_active_lang_menu() {

	    	$active_lang = $_GET['qtranslate_lang'];

	    	if ( isset( $active_lang ) ) :

	    		$_SESSION['qtranslate_active_lang'] = $active_lang;

	    	endif;

	    }

	}