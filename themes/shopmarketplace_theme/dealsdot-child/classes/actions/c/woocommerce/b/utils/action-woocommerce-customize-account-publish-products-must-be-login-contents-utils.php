<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeAccountPublishProductsMustBeLoginContentsUtils {

        public static function init() {

            $messages = \MessageNotification\MessageGetUtils::get_all(); 
		
            //extract($messages); 	
            
            $url = \Urls\UrlGetMyAccountPageUtils::get();
            
            $you_must_be_login_label = str_replace("{url}", $url, $messages[\Theme_Options\THEME_OPTIONS_FIELDS::YOU_MUST_BE_LOGIN_LABEL_ID]); ?>

            <div class="klb-checkout-page">

                <div class="woocommerce-MyAccount-content">
                
                    <?= $you_must_be_login_label ?>

                </div>
                
            </div>

        <?php }

    }


