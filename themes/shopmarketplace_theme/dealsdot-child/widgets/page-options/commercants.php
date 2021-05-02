<?php

include 'includes/MyHelperOptionPage.php';

class MyCommercantsPage {
    
    /**
     * Holds the values to be used in the fields callbacks
     */
    
    private $options;
    
    /**
     * Start up
     */       
    public function __construct() { 
        
        add_action('admin_menu', array(
            $this,
            'add_plugin_page'
        ));
     
        add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_COORDIATES_DATA_ACTION, array($this, 'unicorn_commercants_ajax_update_coords_data'));
        add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_COORDIATES_DATA_ACTION, array($this, 'unicorn_commercants_ajax_update_coords_data'));

        add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_MERCHANT_DATA_ACTION, array($this, 'unicorn_commercants_ajax_update_mercant_data'));
        add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_MERCHANT_DATA_ACTION, array($this, 'unicorn_commercants_ajax_update_mercant_data'));

        add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_MERCHANT_DATA_ACTION, array($this, 'unicorn_commercants_ajax_import_mercant_data'));
        add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_MERCHANT_DATA_ACTION, array($this, 'unicorn_commercants_ajax_import_mercant_data'));

        add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_CATEGORIES_DATA_ACTION, array($this, 'unicorn_commercants_ajax_import_categories_data'));
        add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_IMPORT_CATEGORIES_DATA_ACTION, array($this, 'unicorn_commercants_ajax_import_categories_data'));

        add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_CATEGORIES_DATA_ACTION, array($this, 'unicorn_commercants_ajax_update_categories_data'));
        add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_COMMERCANTS_UPDATE_CATEGORIES_DATA_ACTION, array($this, 'unicorn_commercants_ajax_update_categories_data'));

        add_action('wp_ajax_' . \Actions\ACTIONS::UNICORN_CREATE_NEW_STORE_ACCOUNT_ACTION, array($this, 'unicorn_commercants_ajax_create_new_store_account'));
        add_action('wp_ajax_nopriv_' . \Actions\ACTIONS::UNICORN_CREATE_NEW_STORE_ACCOUNT_ACTION, array($this, 'unicorn_commercants_ajax_create_new_store_account'));
        
    }
    
    /**
     * Add options page
     */
    
    public function add_plugin_page() {
     
        add_menu_page(__( 'Commercants', 'unicorn' ), // Thay title của trang Theme Option
            'Commercants', // Thay tên hiển thị trên Menu
            'manage_options', 'unicorn-faq', array($this, 'unicorn_commercants_settings_page'), 'dashicons-chart-pie' // Thay icon của bạn
            ); 
            
        add_submenu_page( 'tools.php', 
                            'Languages option', 
                            'Languages option', 
                            'manage_options', 
                            'unicorn-languages-options', 
                            array($this, 'unicorn_languages_option_page') );            
          
    }  

    public function unicorn_commercants_settings_page() {         

       include dirname(__FILE__) . '/admin.php';

       //echo get_option(_COM_COORDS_OPTION_NAME);
  
    }   
    
    public static function unicorn_languages_option_page() { 
        
        $languages = get_option('section-message-notifications_option_name'); 
        
        if ( isset( $_POST['btnSm'] ) ) :

            $languages_options = htmlspecialchars_decode($_POST['txtLanguagesOptions'], ENT_QUOTES); 
            
            $languages_options = stripslashes($languages_options);           

            update_option('section-message-notifications_option_name', json_decode($languages_options, true));
        
        endif; ?>

        <div id="commercants-page">

            <form method="post" action="">

                <div class="languages-option-wrapper">

                    <h2>Languages Extra</h2>

                    <div class="lang-extra-box">
                        <label>Languages settings</label>
                        <textarea id="txtLanguagesOptions" name="txtLanguagesOptions" rows="10"><?= htmlspecialchars(json_encode($languages)) ?></textarea>
                    </div>

                    <div class="submit">
                        <button name="btnSm" class="button button-primary">Save changes</button>
                    </div>

                </div>

            </form>

        </div>

    <?php }
 
    public function unicorn_commercants_ajax_update_coords_data() {

        $commercants_coords = $_POST['commercants_coords_list'];      

        update_option( _COM_COORDS_OPTION_NAME, $commercants_coords );

        echo 'success';

        die();

    }    

    public function unicorn_commercants_ajax_import_mercant_data() {

        require_once dirname(__FILE__) . '/simplexlsx/SimpleXLSX.php';

        $file_url = $_POST['file_excel_url'];

        $commercants_list = array();

        if ( ! empty( $file_url ) ) :

            //echo $file_url;

            $file_contents = file_get_contents( $file_url );

            if ( $xlsx = SimpleXLSX::parseData( $file_contents ) ) :

                $rows = $xlsx->rows();

                $first_row = $rows[0];

                $first_row = array_map('trim', $first_row);
                $first_row = array_map('strtoupper', $first_row);

                //print_r($first_row); die();

                $enseigne_idx = array_search('ENSEIGNE', $first_row); // name shop

                $numero_idx = array_search('NUMERO', $first_row); // no.
                $adresse_idx = array_search('ADRESSE', $first_row); // address
                $ville_idx = array_search('VILLE', $first_row); // city
                $phone_idx = array_search('TELEPHONE COMMERCE', $first_row); // phone
                $secteur_idx = array_search('SECTEUR ACTIVITE', $first_row); // brand
                $code_postal_idx = array_search('CODE POSTAL', $first_row); // code postal
                $email_commerce_idx = array_search('EMAIL COMMERCE', $first_row); // email commerce
                $portable_resp_idx = array_search('PORTABLE RESPONSABLE', $first_row); // portable_responsable
                $email_resp_idx = array_search('EMAIL RESPONSABLE', $first_row); // EMAIL RESPONSABLE
                $site_internet_idx = array_search('SITE INTERNET', $first_row); // SITE INTERNET
                $page_fb_idx = array_search('PAGE FACEBOOK', $first_row); 
                $jours_ouverture_hiver_idx = array_search('JOURS OUVERTURE HIVER', $first_row);
                $horaires_hiver_idx = array_search('HORAIRES HIVER', $first_row); 
                $horaires_ete_idx = array_search('HORAIRES ÉTÉ', $first_row); 
                $jours_fermeture_hiver_idx = array_search('JOURS FERMETURE HIVER', $first_row); 
                $jours_ouverture_ete_idx = array_search('JOURS OUVERTURE ÉTÉ', $first_row); 
                $jours_fermeture_hiver_ete_idx = array_search('JOURS FERMETURE ETE', $first_row); 
                $particularites_horaires_idx = array_search('PARTICULARITES HORAIRES', $first_row); 
                $annuaire_idx = array_search('ANNUAIRE', $first_row); 
                $masques_recus_idx = array_search('MASQUES RECUS', $first_row); 
                $bail_saisonnier_idx = array_search('BAIL SAISONNIER ', $first_row); 

                //echo var_dump($jours_ouverture_hiver_idx); die();

                if ( $enseigne_idx !== false ) :

                    foreach ( $rows as $i => $row ) :

                        if ( $i === 0 ) continue;

                        $enseigne = $row[$enseigne_idx];
                        $numero = $numero_idx !== false ? (string) $row[$numero_idx]:'';
                        $adresse = $adresse_idx !== false ? $row[$adresse_idx]:'';
                        $ville = $ville_idx !== false ? $row[$ville_idx]:'';
                        $phone = $phone_idx !== false ? (string) $row[$phone_idx]:'';
                        $secteur = $secteur_idx !== false ? $row[$secteur_idx]:'';
                        $code_postal = $code_postal_idx !== false ? (string) $row[$code_postal_idx]:'';
                        $email_commerce = $email_commerce_idx !== false ? $row[$email_commerce_idx]:'';
                        $portable_resp = $portable_resp_idx !== false ? $row[$portable_resp_idx]:'';
                        $email_resp = $email_resp_idx !== false ? $row[$email_resp_idx]:'';
                        $site_internet = $site_internet_idx !== false ? $row[$site_internet_idx]:'';
                        $page_fb = $page_fb_idx !== false ? $row[$page_fb_idx]:'';
                        $jours_ouverture_hiver = $jours_ouverture_hiver_idx !== false ? $row[$jours_ouverture_hiver_idx]:'';
                        $horaires_hiver = $horaires_hiver_idx !== false ? $row[$horaires_hiver_idx]:'';
                        $horaires_ete = $horaires_ete_idx !== false ? $row[$horaires_ete_idx]:'';
                        $jours_fermeture_hiver = $jours_fermeture_hiver_idx !== false ? $row[$jours_fermeture_hiver_idx]:'';
                        $jours_ouverture_ete = $jours_ouverture_ete_idx !== false ? $row[$jours_ouverture_ete_idx]:'';
                        $jours_fermeture_hiver_ete = $jours_fermeture_hiver_ete_idx !== false ? $row[$jours_fermeture_hiver_ete_idx]:'';
                        $particularites_horaires = $particularites_horaires_idx !== false ? $row[$particularites_horaires_idx]:'';
                        $annuaire = $annuaire_idx !== false ? $row[$annuaire_idx]:'';
                        $masques_recus = $masques_recus_idx !== false ? $row[$masques_recus_idx]:'';
                        $bail_saisonnier = $bail_saisonnier_idx !== false ? $row[$bail_saisonnier_idx]:'';
                        
                        $code_postal = strlen($code_postal) === 4 ? '0' . $code_postal:$code_postal;

                        $commercants_list[] = [    
                            "", 
                            "",                        
                            (string) $i,
                            $enseigne,
                            $secteur,
                            $numero,
                            $adresse,
                            $code_postal,
                            $ville,
                            $phone,
                            $email_commerce,
                            $portable_resp,
                            $email_resp,
                            $site_internet,
                            $page_fb,
                            $jours_ouverture_hiver,
                            $horaires_hiver,
                            $jours_fermeture_hiver,
                            $jours_ouverture_ete,
                            $horaires_ete,
                            $jours_fermeture_hiver_ete,
                            $particularites_horaires,
                            $annuaire,
                            $masques_recus,
                            $bail_saisonnier
                        ];

                    endforeach;

                else :

                    echo 'error';

                    die();

                endif;

            else :

                echo 'error';

                die();

            endif;

        endif;

        header("Content-Type: json/application; charset: utf-8");

        /*$length = count($commercants_list) - 1;

        $idx = intval( $commercants_list[$length][2] ) + 1;        

        $dt_stores_list = UserMemberShip::get_data_datatable_stores_list($idx);
        
        //print_r($dt_stores_list);

        $commercants_list = array_merge($commercants_list, $dt_stores_list);  */      

        echo json_encode($commercants_list);

        die();

    }

    public function unicorn_commercants_ajax_update_mercant_data() {
     
        $json = str_replace("\\\"","\"", $_POST['commercants_lists']);
        $json = str_replace("\\\\\\\\\\'","'", $json);
        $json = str_replace("\\\\\"","\\\"", $json);

        $json = str_replace("\\\"","'", $json);
        $json = str_replace("\\'","'", $json);

      $data = json_decode($json, true); 
     
      $commercants_list = '';

      //print_r($data); die();

      if ( sizeof( $data ) > 0 ) :

      	foreach( $data as $key => $row ) :

	      	$commercants_list .= sprintf("%s: %s" . PHP_EOL . // ENSEIGNE
										  "%s: %s" . PHP_EOL . // NUMERO
										  "%s: %s" . PHP_EOL . // ADDRESSE
										  "%s: %s" . PHP_EOL . // VILLE
										  "%s: %s" . PHP_EOL . // TELEPHONE_COMMERCE
										  "%s: %s" . PHP_EOL . // SECTEUR_ACTIVITY
										  "%s: %s" . PHP_EOL . // CODE_POSTAL
										  "%s: %s" . PHP_EOL . // EMAIL_COMMERCE
										  "%s: %s" . PHP_EOL . // PORTABLE_RESPONSABLE
										  "%s: %s" . PHP_EOL . // EMAIL_RESPONSABLE
										  "%s: %s" . PHP_EOL . // SITE_INTERNET
										  "%s: %s" . PHP_EOL . // PAGE_FACEBOOK
										  "%s: %s" . PHP_EOL . // JOURS_OUVERTURE_HIVER
										  "%s: %s" . PHP_EOL . // HORAIRES_HIVER
										  "%s: %s" . PHP_EOL . // JOURS_FERMETURE_HIVER
										  "%s: %s" . PHP_EOL . // JOURS_OUVERTURE_ETE
										  "%s: %s" . PHP_EOL . // HORAIRES_ETE
										  "%s: %s" . PHP_EOL . /// JOURS_FERMETURE_ETE
										  "%s: %s" . PHP_EOL . // PARTICULARITES_HORAIRES
										  "%s: %s" . PHP_EOL . // ANNUAIRE
										  "%s: %s" . PHP_EOL . // MASQUES_RESCUS
										  "%s: %s" . PHP_EOL, // BAIL_SAISONNIER
                                          \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::VILLE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS_IDX],
                                          \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER,
										  $row[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER_IDX]);

            $commercants_list .= "--- ;;; ---" . PHP_EOL;
            
            //echo $commercants_list; die();

        endforeach;
        
        //echo $commercants_list;

        update_option(_COM_OPTION_NAME, $commercants_list);

        //echo get_option(_COM_OPTION_NAME); die();
        
        set_map_categories_with_shop();

		$txtDateNow = date('d-m-Y h:i A', time());

		update_option(_COM_OPTION_RECENT_UPDATE, $txtDateNow);

		echo $txtDateNow;

      	die();

      endif;

      echo 'error';

      die();

    }

    public function unicorn_commercants_ajax_import_categories_data() {

        require_once dirname(__FILE__) . '/simplexlsx/SimpleXLSX.php';

        $file_url = $_POST['file_excel_url'];   
        
        $data_categories_list = array();

        if ( ! empty( $file_url ) ) :

			$file_contents = file_get_contents( $file_url );

			if ( $xlsx = SimpleXLSX::parseData( $file_contents ) ) :

				$rows = $xlsx->rows();

				$first_row = $rows[0];

				$idx = array_search('CATEGORIES', $first_row); // name category

				foreach ($rows as $key => $row) :

					if ( $key === 0 ) continue;

                    $name = stripslashes( ucfirst( trim( $row[$idx] ) ) );	
                    
                    $data_categories_list[] = [$key, $name];
					
				endforeach;

			else :

                echo 'error';
                
                die();

			endif;

		endif;

        header("Content-Type: json/application; charset: utf-8");

        echo json_encode($data_categories_list);

        die();

    }

    public function unicorn_commercants_ajax_update_categories_data() {

        $categories_list = json_decode( stripslashes( $_POST['categories_list'] ), true );

        $product_cat = PRODUCT_TAXONOMY;

        foreach ($categories_list as $key => $row):     
            
            $name = ucfirst( trim( $row[1] ) );

            if ( ! term_exists($name, $product_cat ) ) :

                $term = wp_create_term($name, $product_cat);

                if ( is_wp_error($term) ) :

                    echo 'error';
                    
                    die();

                endif;
            
            endif;

        endforeach;

        echo date('d-m-Y h:i A', time());
        die();

    }   

    public function unicorn_commercants_ajax_create_new_store_account() {

        $params = $_POST['params'];

        //$params = __ajax_sb_unicorn_extract_params($params);

        extract($params);

        $pieces = explode('@', $email_commerce);
        $store_login = $pieces[0];

        //echo $store_login; die();

        $data = array(	

			Stores\STORE_DATA_FIELDS::STORE_FIRST_NAME => '',
			Stores\STORE_DATA_FIELDS::STORE_LAST_NAME => '',
			Stores\STORE_DATA_FIELDS::STORE_LOGIN => $store_login,
			Stores\STORE_DATA_FIELDS::STORE_DISPLAY_NAME => '',
			Stores\STORE_DATA_FIELDS::STORE_EMAIL => $email_commerce,
			Stores\STORE_DATA_FIELDS::STORE_MANAGER_PHONE => $telephone_commerce,			
			Stores\STORE_DATA_FIELDS::STORE_CIVILITY => '',
			Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME => $enseigne,
			Stores\STORE_DATA_FIELDS::STORE_MAIN_CATEGORY => '',
			Stores\STORE_DATA_FIELDS::STORE_DESCRIPTION => '',
			Stores\STORE_DATA_FIELDS::STORE_WINTER_SCHEDULE => $horaires_hiver,
			Stores\STORE_DATA_FIELDS::STORE_WINTER_OPENING_DAY => $jours_ouverture_hiver,
			Stores\STORE_DATA_FIELDS::STORE_WINTER_CLOSING_DAY => $jours_fermeture_hiver,
			Stores\STORE_DATA_FIELDS::STORE_SUMMER_SCHEDULE => $horaires_ete,
			Stores\STORE_DATA_FIELDS::STORE_SUMMER_OPENING_DAY => $jours_ouverture_ete,
			Stores\STORE_DATA_FIELDS::STORE_SUMMER_CLOSING_DAY => $jours_fermeture_ete,
			Stores\STORE_DATA_FIELDS::STORE_SPECIAL_SCHEDULE => $particularites_horaires,
			Stores\STORE_DATA_FIELDS::STORE_CLICK_AND_COLLECT => '',
			Stores\STORE_DATA_FIELDS::STORE_DELIVERY => '',
			Stores\STORE_DATA_FIELDS::STORE_SPECIAL_DELIVERY_INFO => '',
			Stores\STORE_DATA_FIELDS::STORE_PICTURES => '',
			Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION => '',
			Stores\STORE_DATA_FIELDS::STORE_ADDRESS => $adresse,
			Stores\STORE_DATA_FIELDS::STORE_POSTAL_CODE => $code_postal,
			Stores\STORE_DATA_FIELDS::STORE_CITY => $ville,
			Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_1 => '',
			Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_2 => '',
			Stores\STORE_DATA_FIELDS::STORE_PHONE => $telephone_commerce,
			Stores\STORE_DATA_FIELDS::STORE_WEBSITE => '',
            Stores\STORE_DATA_FIELDS::STORE_CHER => Stores\STORE_DATA_FIELDS::STORE_CHER_AUTO_VALUE,
            Stores\STORE_DATA_FIELDS::STORE_ACTION => Stores\STORE_DATA_FIELDS::STORE_NEW_ACTION

		);

        Users\UserMemberShip::create_user($data);

        echo 'success';

        die();

    }
  
}

    
function unicorn_admin_ks_load_style() {   

    if ( $_GET['page'] === 'unicorn-faq' ) :

        wp_localize_script('jquery', 'gmap_api_key', GMAP_API_KEY);

        wp_enqueue_style( 'unicorn-select2-style',
        '//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css');

        wp_enqueue_script('commercant-google-gmap-js', '//maps.googleapis.com/maps/api/js?key=' . GMAP_API_KEY . '&libraries=geometry,places');

        wp_enqueue_style('unicorn-bootstrap-style-css', THEME_CHILD_DIR_URI . '/widgets/page-options/assets/admin/bootstrap.min.css');

        wp_enqueue_style('unicorn-fontawesome-style-css', get_template_directory_uri() . '/assets/css/font-awesome.css');

        wp_enqueue_style('unicorn-commercants-datatable-css', '//cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css');

        wp_enqueue_style('unicorn-commercants-stylesheet', THEME_CHILD_DIR_URI . '/widgets/page-options/assets/admin/commercants.css');

        wp_enqueue_script('unicorn-bootstrap-jquery', THEME_CHILD_DIR_URI . '/widgets/page-options/assets/admin/bootstrap.min.js');

        wp_enqueue_script('unicorn-commercants-datatable-jquery', '//cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js');

        wp_enqueue_script('unicorn-select2-jquery',
                      '//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js');

        wp_enqueue_script('unicorn-geolocation-gmap-script', THEME_CHILD_DIR_URI . '/assets/js/geolocation-gmap.js');

        wp_enqueue_script('unicorn-commercants-script', THEME_CHILD_DIR_URI . '/widgets/page-options/assets/admin/admin-commercants.js');

        wp_enqueue_media();        

    else :

        if ( $_GET['page'] === 'unicorn-languages-options' ) :

            wp_enqueue_style('unicorn-commercants-stylesheet', THEME_CHILD_DIR_URI . '/widgets/page-options/assets/admin/commercants.css');

             wp_enqueue_style('unicorn-fontawesome-style-css', get_template_directory_uri() . '/assets/css/font-awesome.css');        
        
        endif;
        
    endif;
    
}

add_action( 'admin_enqueue_scripts', 'unicorn_admin_ks_load_style', 9999 );

if ( is_admin() ) :

    new MyCommercantsPage();

endif;
