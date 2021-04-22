<?php 

    namespace MyCommercantsPage;

    class MyCommercantsImportCategoriesDataUtils {

        public static function import() {

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

    }