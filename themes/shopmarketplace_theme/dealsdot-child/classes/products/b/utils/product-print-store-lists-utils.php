<?php 

    namespace Products;

    class ProductPrintStoreListsUtils {

        public static function print() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);
    
            do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_NAVIGATION_ACTION);
            
            global $current_user;
            
            $products_list = \Products\ProductGetListsUtils::get_by_uid($current_user->ID, 8); ?>
    
            <div class="col-sm-9 col-sm-pull-3 col-xs-12">
    
                <div class="klb-checkout-page">
    
                    <div class="woocommerce-MyAccount-content">
    
                        <div class="woo-contents-publish-products woo-contents-admin-new-store">
    
                            <div class="woo-heading">
    
                                <h2 class="admin-panel-heading">
    
                                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCTS_LIST_LABEL_ID] ?>
    
                                </h2>
    
                                <div class="toolbar">
    
                                    <a class="btn btn-primary" href="<?= \Urls\UrlGetAdminPublishProductPageUtils::get() ?>">
    
                                        <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ADD_PRODUCT_LIST_LABEL_ID] ?>
    
                                    </a>
    
                                </div>
    
                            </div>
    
                            <div class="woo-main-contents mtop20">
    
                                <table class="tbl-products-list">
    
                                    <thead>
    
                                        <tr>
    
                                            <th>ID</th>
                                            <th><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_NAME_LABEL_ID] ?></th>
                                            <th><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PRICE_LABEL_ID] ?> (€)</th>
                                            <th></th>
    
                                        </tr>
    
                                    </thead>
    
                                    <tbody>  
    
                                        <?php if ( $products_list ) : 
                                                foreach ( $products_list as $key => $product ) : ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $product['id'] ?>
                                                        </td>
    
                                                        <td>
                                                            <?php echo $product['name'] ?>
                                                        </td>
    
                                                        <td>
                                                            <?php echo $product['price'] ?>
                                                        </td>
                                                        <td>
                                                            <a class="btnNavigProduct" 
                                                                target="_blank" 
                                                                href="<?= \Urls\UrlGetAdminUpdateProductPageUtils::get() ?>?pid=<?= $product['id'] ?>">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
    
                                                            <a class="btnNavigProduct __remove" href="#">
                                                                <span class="fa fa-trash"></span>
                                                            </a>
                                                        </td>
                                                    </tr>       
                                        <?php
                                                endforeach;
    
                                                else : ?>
    
                                                    <tr>
                                                        <td colspan="4">
                                                            <div style="padding: 20px 0;"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::EMPTY_PRODUCTS_LIST_LABEL_ID] ?></div>
                                                        </td>
                                                    </tr>
    
                                        <?php endif; ?>  
    
                                    </tbody>
    
                                </table>
                            
                            </div>                    
                        </div>
    
                    </div>
    
                </div>
    
            </div>

        <?php }

    }