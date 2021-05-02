<?php 
    namespace Actions;

    class ActionUpdateProductUtils {

        public static function perform() {

            global $current_user;

            $params = $_POST['params'];

            $params = \Strings\StringExtractParametersUtils::parse($params);	

            extract($params);

            $shop_name = '';
            $term_id = -1;

            if ( ! empty( $txtProductName ) && 
                ! empty( $txtProductDes ) && 
                ! empty( $txtSalesPrice ) ) :

                if ( (int) $chkNotInShopListsName === 1 ) :

                    $shop_name = $txtCustomShopName;

                    /*if ( empty( $txtCustomShopName ) ) :

                        echo 'error'; 

                        die();

                    endif;*/

                    /*$shop_info = "enseigne: " . $txtCustomShopName . "\n" .
                                "numero: \n" .
                                "address: \n" .
                                "ville: \n" .
                                "phone: \n" .
                                "secteur: \n";

                    add_new_commercants_shop_info($shop_info);*/

                else :

                    $shop_name = $txtShopName;

                endif;

                if ( (int) $chkNotInShopCategories === 1 ) :

                    /*if ( empty( $txtCustomCategoryName ) ) :

                        echo 'error'; 

                        die();

                    endif;*/

                    /*$new_term = wp_create_term($txtCustomCategoryName, 'product_cat');

                    if ( is_wp_error($new_term) ) :

                        echo 'error';

                        die();

                    endif;*/

                else :

                    $term_id = (int) $txtProductCat;

                endif;	
                
                if ( $action === 'new' ) :

                    $my_product = array(
                        'post_status'   => 'publish',
                        'post_title'    => wp_strip_all_tags( $txtProductName ),
                        'post_content'  => $txtProductDes,		  
                        'post_author'   => intval( $txtAuthorId ),		 
                        'post_type' => \Products\PRODUCT_FIELDS::PRODUCT_POST_TYPE
                    );		
                
                    $pid = wp_insert_post( $my_product );
                    
                    if ( 0 === $pid || is_wp_error( $pid ) ) :

                        echo 'error';

                        die();

                    endif;

                    if ( $term_id !== -1 ) :

                        wp_set_object_terms( $pid, array($term_id), \Products\PRODUCT_FIELDS::PRODUCT_TAXONOMY );
        
                    endif;

                    wp_set_object_terms( $pid, \Products\PRODUCT_FIELDS::PRODUCT_EXTERNAL_TYPE, 
                                                    \Products\PRODUCT_FIELDS::PRODUCT_TYPE_TAXONOMY);	

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_VISIBILITY_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_VISIBILITY_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_STOCK_STATUS_FIELD, 
                                                    \Products\PRODUCT_FIELDS::PRODUCT_STOCK_STATUS_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_TOTAL_SALES_FIELD, 
                                                    \Products\PRODUCT_FIELDS::PRODUCT_TOTAL_SALES_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOADABLE_FIELD, 
                                                    \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOADABLE_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_VIRTUAL_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_VIRTUAL_DEFAULT_VALUE);		

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_PURCHASE_NOTE_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_PURCHASE_NOTE_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_FEATURED_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_FEATURED_DEFAULT_VALUE );			

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_WEIGHT_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_WEIGHT_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_LENGTH_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_LENGTH_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_WIDTH_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_WIDTH_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_HEIGHT_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_HEIGHT_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_SKU_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_SKU_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_ATTRIBUTES_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_ATTRIBUTES_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_SALE_PRICE_DATES_FROM_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_SALE_PRICE_DATES_FROM_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_SALE_PRICE_DATES_TO_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_SALE_PRICE_DATES_TO_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_SOLD_INDIVIDUALLY_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_SOLD_INDIVIDUALLY_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_MANAGE_STOCK_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_MANAGE_STOCK_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_BACKORDERS_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_BACKORDERS_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_STOCK_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_STOCK_DEFAULT_VALUE );

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOADABLE_FILES_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOADABLE_FILES_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOAD_LIMIT_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOAD_LIMIT_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOAD_EXPIRY_FIELD,
                                                \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOAD_EXPIRY_DEFAULT_VALUE);

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOAD_TYPE_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_DOWNLOAD_TYPE_DEFAULT_VALUE);

                    if ( ! empty( $shop_name ) && $shop_name !== '-1' ) :

                        update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_SHOP_NAME_FIELD, $shop_name );
        
                        if ( $term_id !== -1 ) :
        
                            \Products\ProductSetMapShopNameUtils::map_by_category_id($shop_name, $term_id);
        
                        endif;
        
                    endif;

                else :

                    $pid = $txtProductId;

                    $my_product = array(

                        'ID' => $pid,
                        'post_title' => wp_strip_all_tags( $txtProductName ),
                        'post_content'  => $txtProductDes,
                        'post_type' => \Products\PRODUCT_FIELDS::PRODUCT_POST_TYPE

                    );

                    wp_update_post($my_product);

                endif;

                update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_REGULAR_PRICE_FIELD, $txtSalesPrice );
                update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_SALE_PRICE_FIELD, $txtSalesPrice );
                update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_PRICE_FIELD, $txtSalesPrice );

                $gallery_ids = array();
                $html_galleries = '';
                $is_set_thumbnail = false;

                foreach ($txtProductGalleries as $key => $gallery_url) :

                    if ( ! empty( $gallery_url ) ) :

                        $attachment_id = \Attachments\AttachmentGetIdFromUrlUtils::get( $gallery_url );

                        $html_galleries .= "<p><img height='120' src='{$gallery_url}' /></p>";

                        if ( ! $is_set_thumbnail ) :				

                            set_post_thumbnail( $pid, $attachment_id );

                            $is_set_thumbnail = true;

                        endif;			

                        $gallery_ids[] = $attachment_id;

                    endif;
                    
                endforeach;			

                update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_GALLERIES_FIELD, 
                                        implode(',', $gallery_ids) );

                if ( (int) $chkFromPrice === 1 ) :

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_BOOL_FROM_PRICE_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_BOOL_FROM_PRICE_YES_VALUE );

                else :

                    update_post_meta( $pid, \Products\PRODUCT_FIELDS::PRODUCT_BOOL_FROM_PRICE_FIELD, 
                                                \Products\PRODUCT_FIELDS::PRODUCT_BOOL_FROM_PRICE_NO_VALUE );				

                endif;			

                /*if ( (int) $chkNotInShopListsName === 1 || 
                    (int) $chkNotInShopCategories === 1 ) :

                    $body = "Hello, here is a new product information:<br /><br />";

                    $body .= sprintf("

                                Nom du produit : %s<br />
                                Enseigne %s<br/>
                                Categories %s<br/>
                                Description du produit : %s<br/>
                                Prix TTC : %s (€)<br/>

                            ", $txtProductName,
                            (int) $chkNotInShopListsName === 1 ? '(Je ne suis pas dans la liste): ' . $shop_name : ': ' . $shop_name,
                            (int) $chkNotInShopCategories === 1 ? "(La catégorie de mon produit n'est pas dans la liste): " . $txtCustomCategoryName : get_term_by('term_id', $term_id, 'product_cat')->name,
                            $txtProductDes,
                            $txtSalesPrice );

                    $body .= "Regards !!!";

                    $pvcf_smtp_options = get_option( 'section-contact-form_option_name' );

                    $to = $pvcf_smtp_options['contactform-email-address-id'];
                    $subject = 'Notice about shop manager publish product';
    
                    $attachments = __unicorn_mail_create_attachment('attachments.zip', $txtProductGalleries);

                    \Mails\MailSendUtils::send($to, $subject, $body, $attachments);

                    

                endif;*/			

                /*\Users\UserSendEmailUtils::send(array(
                    
                    'store_shop_name' => $shop_name,
                    'store_last_name' => $current_user->data->last_name,
                    'store_civility' => \Stores\StoreGetMetaCivilityUtils::get($current_user->ID),                  
                    'action' => 'store',
                    'type' => 'product',
                    'product_url' => get_the_permalink($pid)                    

                ));*/

                echo 'success';

                die();

            endif;

            echo 'error';

            die();	

        }

    }