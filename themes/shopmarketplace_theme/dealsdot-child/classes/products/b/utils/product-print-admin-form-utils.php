<?php 

    namespace Products;

    class ProductPrintAdminFormUtils {

        public static function print($options) {

            do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_NAVIGATION_ACTION); ?>
    
            <div class="col-sm-9 col-sm-pull-3 col-xs-12">
    
                <div class="klb-checkout-page">
    
                    <div class="woocommerce-MyAccount-content">
    
                        <div class="woo-contents-publish-products">
    
                            <form id="<?= $options['form_id'] ?>" 
                                  class="frmAdminUpdateProduct"
                                    method="post" 
                                    action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    
                                <div class="woo-heading">
    
                                    <?php echo $options[PRODUCT_OPTIONS_FIELDS::FORM_HEADING] ?>							    
    
                                </div>
    
                                <div class="woo-main-contents mtop20">
    
                                    <?php ProductPrintAdminHtmlFieldsUtils::print($options); ?>
    
                                </div>							
    
                            </form>
    
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
        <?php }

    }