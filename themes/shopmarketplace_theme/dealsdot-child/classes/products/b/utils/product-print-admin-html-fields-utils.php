<?php 

    namespace Products;

    class ProductPrintAdminHtmlFieldsUtils {

        public static function print($options) {

            global $current_user;           
    
            $data_commercants_list = \Commercants\CommercantGetListUtils::get(); 
    
            $messages = \MessageNotification\MessageGetUtils::get_all();
    
            //extract($messages);
    
            $args = array(
    
                'taxonomy' => PRODUCT_TAXONOMY,
                'hide_empty' => 0				
    
            );
    
            $data_product_categories_list = get_terms($args); 
            
            $store_shop_name = \Stores\StoreGetMetaShopNameUtils::get($current_user->ID);
            $store_main_category = \Stores\StoreGetMetaMainCategoryUtils::get($current_user->ID);   
    
            $product_data = '';
            $product = null;
            $product_post_data = null;
            
            if ( ProductCheckActionUtils::has(PRODUCT_DATA::FORM_UPDATE_ACTION, $options) ) :
            
                $pid = (int) $_GET['pid'];
                
                $product = wc_get_product($pid);
    
                $product_post_data = $product->get_post_data();
                
                $product_data = ProductGetDataUtils::get($product);          
            
            endif; 
            
            $product_name = $product_data ? $product_data[PRODUCT_DATA_FIELDS::PRODUCT_NAME] : '';
            $product_description = $product_post_data ? $product_post_data->post_content : '';
            $product_price = $product_data ? $product_data[PRODUCT_DATA_FIELDS::PRODUCT_PRICE] : '';
            $is_price_from = $product_data ? $product_data[PRODUCT_DATA_FIELDS::IS_PRICE_FROM] : false; 
            $galleries_id = $product_data ? explode(',', $product_data[PRODUCT_DATA_FIELDS::GALLERIES_ID]) : [];
    
            $galleries_thumbnail = array(); 
    
            if ( $galleries_id ) :
            
                foreach( $galleries_id as $key => $id ) :             
    
                    $thumbnail_url = wp_get_attachment_url( $id );
    
                    $galleries_thumbnail[] = $thumbnail_url;
                
                endforeach; 
                
            endif; ?>
    
            <div class="woo-input-box">
    
                <label>
                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_ID] ?>  
                    <strong class="required">(*)</strong>                
                </label>
    
                <div class="field-input">

                    <input id="txtProductName" 
                            type="text" 
                            class="form-control" 
                            name="txtProductName" 
                            value="<?= $product_name ?>" />
                            
                </div>
    
            </div>
    
            <div class="woo-input-box">
    
                <label>
                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_ID] ?>
                    <strong class="required">(*)</strong>
                </label>
    
                <div class="field-input">
    
                    <select id="slShopListsName"
                            name="slShopListsName" 
                            class="form-control js-select2-dropdown-simple"
                            data-field-id-binding="txtHidShopName"
                            data-chk-id-binding="chkNotInShopListsName">
    
                        <option value="-1">
                            --- <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_CHOOSE_SHOP_NAME_LABEL_ID] ?> ---
                        </option>
    
                        <?php 
                            foreach ($data_commercants_list as $key => $shop) : 
    
                                $shop_name = mb_strtolower( trim( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE] ), 'UTF-8' ); ?>
    
                                <option value="<?php echo $shop_name ?>"
                                        <?php selected($store_shop_name, $shop_name) ?>>
    
                                    <?php echo trim( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE] ); ?>
    
                                </option>
                                
                        <?php 
                            endforeach;
                        ?>
    
                    </select>   
                 
    
                </div>
    
            </div>
    
            <div class="woo-input-box">
    
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_ID] ?> <strong class="required">(*)</strong></label>
    
                <div class="field-input">
    
                    <select id="slShopCategories"
                            name="slShopCategories" 
                            class="form-control js-select2-dropdown-simple"
                            data-field-id-binding="txtHidProductCat"
                            data-chk-id-binding="chkNotInShopCategories">
    
                        <option value="-1">--- <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CHOOSE_A_PRODUCT_CATEGORY_MSG_ID] ?> ---</option>
    
                        <?php 
                            foreach ($data_product_categories_list as $key => $category) : ?>
    
                                <option value="<?php echo $category->term_id ?>"
                                        <?php selected($store_main_category, $category->term_id) ?>>
    
                                    <?php echo $category->name ?>
                                    
                                </option>
                            
                        <?php endforeach; ?>   
                        
    
                    </select>
    
                    <div class="notInLists mtop10">
    
                        <label class="flex flex-algn-center w-max-content" style=""> 
    
                            <input type="checkbox" 
                                    id="chkNotInShopCategories"
                                    class="form-control" 
                                    data-field-id-binding="slShopCategories"
                                    name="chkNotInShopCategories" 
                                    value="0" />
    
                            <span class="caption padLeft5"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CATEGORY_NOT_IN_LIST_LABEL_ID] ?></span> 
    
                        </label>
    
                        <div class="custom-shopname input-field groupCustField hidden mtop10">
    
                            <input id="txtCustomCategoryName"
                                    type="text" 
                                    class="form-control" 
                                    name="txtCustomCategoryName"
                                    data-custom-field-id="txtHidProductCat" 
                                    placeholder="<?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ENTER_MY_CATEGORY_NAME_LABEL_ID] ?> ..." value="" />
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
            <div class="woo-input-box">
    
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_PRODUCT_LABEL_ID] ?> <strong class="required">(*)</strong></label>
    
                <div class="field-input">
    
                        <?php
                        $settings = array('wpautop' => true, 
                                            'media_buttons' => true, 
                                            'quicktags' => false, 
                                            'textarea_rows' => '10', 
                                            'textarea_id' => 'txtProductDescription',
                                            'textarea_name' => 'txtProductDescription' );
    
                        wp_editor( wp_kses_post($product_description , ENT_QUOTES, 'UTF-8'), 
                                    'product_description', $settings); ?>
    
                </div>
            </div>
    
            <div class="woo-input-box">
    
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_ID] ?> (€) <strong class="required">(*)</strong></label>
    
                <div class="field-input field-pricebox flex flex-algn-center">
    
                    <input type="text" 
                            id="txtSalesPrice"
                            class="form-control" 
                            name="txtSalesPrice"
                            value="<?= $product_price ?>" />
    
                    <div class="fromBox">
    
                        <label class="flex flex-algn-center w-max-content">
                        
                            <input type="checkbox" 
                                    id="chkFromPrice"
                                    class="form-control" 
                                    name="chkFromPrice" 
                                    value="0"
                                    <?php if ($is_price_from) : ?>
                                    checked                                
                                    <?php endif; ?> />
    
                            <span class="caption padLeft5"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_ID] ?></span>
    
                        </label>
    
                    </div>
    
                </div>
    
            </div>
    
            <div class="woo-input-box">
    
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_ID] ?> <strong class="required">(*)</strong></label>
    
                <div class="field-input">
    
                    <div class="galleries flex flex-wrap flex-algn-center flex-just-space">
    
                        <?php for ( $i = 0; $i < 5; $i++ ) : 
                                
                                $thumbnail = $galleries_thumbnail && $galleries_thumbnail[$i] ? $galleries_thumbnail[$i] : ''; ?>
    
                            <div class="item">
    
                                <div class="image-thumbnail flex flex-algn-center">
                                    <img src="<?= $thumbnail ?>" alt="" />
                                </div>
    
                                <div class="add-image">
                                    <span class="fa fa-plus"></span>
                                </div>
    
                                <div class="overlay"></div>
    
                                <input class="txtHidProductGalleries"  type="hidden" name="txtProductGalleries[]" value="<?= $thumbnail ?>" />     
    
                            </div>         
    
                        <?php endfor; ?>          
    
    
                    </div>
    
                </div>
    
            </div>
    
            <div class="woo-input-box">
                <button type="submit" name="btnPublisSm" class="btn btn-primary"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PUBLISH_PRODUCT_LABEL_ID] ?></button>
                <a id="btnResetPPForm" class="btn btn-danger mleft20" href="#"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::RESET_FORM_LABEL_ID] ?></a>
            </div>
    
            <input id="txtHidShopName" type="hidden" name="txtShopName" value="<?= $store_shop_name ? $store_shop_name : -1 ?>" />
            <input id="txtHidProductCat" type="hidden" name="txtProductCat" value="<?= $store_main_category ? $store_main_category : -1 ?>" />
            <input id="txtHidProductDes" type="hidden" name="txtProductDes" value="" />
    
            <input id="txtAuthorId" class="txtAuthorId" type="hidden" name="txtAuthorId" value="<?= $current_user->ID ?>" />
    
            <?php if ( ProductCheckActionUtils::has(PRODUCT_DATA::FORM_UPDATE_ACTION, $options) && $pid ) : ?>
    
                <input type="hidden" name="txtProductId" value="<?= $pid ?>" />
    
            <?php endif; ?>
    
            <input type="hidden" name="action" value="<?= $options[PRODUCT_OPTIONS_FIELDS::FORM_ACTION] ?>" />            
    
        <?php }

    }