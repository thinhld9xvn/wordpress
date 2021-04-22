<?php 

    namespace Stores;

    class StorePrintAdminFormUtils {

        public static function print($options) {

            do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_NAVIGATION_ACTION); ?>

            <div class="col-sm-9 col-sm-pull-3 col-xs-12">

                <div class="klb-checkout-page">

                    <div class="woocommerce-MyAccount-content">

                        <div class="woo-contents-publish-products woo-contents-admin-new-store">

                            <div class="woo-heading">

                                <h2 class="admin-panel-heading">   

                                    <?= $options[\Stores\STORE_OPTIONS_FIELDS::FORM_HEADING] ?>

                                </h2>

                            </div>

                            <div class="woo-main-contents mtop20">

                                <form id="<?= $options[\Stores\STORE_OPTIONS_FIELDS::FORM_ID] ?>" 
                                        class="frmAdminStore" 
                                        method="post">

                                    <?php StorePrintAdminHtmlFieldsUtils::print($options) ?>

                                </form>                        
                            
                            </div>                    
                        </div>

                    </div>

                </div>

            </div> 

        <?php }

    }