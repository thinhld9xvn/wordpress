<?php 
    namespace MyCommercantsPage;

    class MyCommercantsAdminRemoveStoresAccountUtils {

        public static function remove() {         

            $params = $_POST['params'];

            //print_r($params);

            $ids = $params['ids'];

            $delimiter = \Stores\STORE_DATA::STORE_DELIMITER;

            $lists_options = \Commercants\CommercantGetListsOptionUtils::get();
            $coords_options = \Commercants\CommercantGetCoordsOptionUtils::get();

            $lists = \Commercants\CommercantGetListUtils::get();

            $coords_lists = \Commercants\CommercantGetCoordsListUtils::get();

            //$arr_lists_options = explode($delimiter, $lists_options);
            //$arr_coords_options = explode($delimiter, $coords_options);

            foreach ( $ids as $key => $id ) :

                //$pos = $id - 1;

                $row = $lists[$id - 1];

                //print_r($row); die();

                if ( $row ) :

                    $email = $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE];                   
                    
                    //$arr_lists_options[$id] = null;
                    //$arr_coords_options[$id] = null;

                    /*array_splice($arr_lists_options, $pos, 1);
                    array_splice($arr_coords_options, $pos, 1);*/

                    if ( ! empty($email) ) :

                        $user = get_user_by_email($email);

                        $result = wp_delete_user($user->ID); 

                    endif;

                    $lists[$id - 1] = null;
                    $coords_lists[$id - 1] = null;

                endif;

            endforeach;

            $lists = array_filter($lists, function($v) {

                return $v !== null;

            });
         

            $coords_lists = array_filter($coords_lists, function($v) {

                return $v !== null;

            });

            $lists_options = \Commercants\CommercantParseListsToOptionsUtils::parse($lists);
            $coords_options = \Commercants\CommercantParseCoordsListsToOptionsUtils::parse($coords_lists);

            //echo $coords_options; die();

            //$lists_options = implode($delimiter, $arr_lists_options);
            //$coords_options = implode($delimiter, $arr_coords_options);

            \Commercants\CommercantUpdateListsOptionUtils::update($lists_options);
            \Commercants\CommercantUpdateCoordsOptionUtils::update($coords_options);

            \Commercants\CommercantSetMapCategoriesUtils::map();

            echo 'success';

            die();

      
        }

    }