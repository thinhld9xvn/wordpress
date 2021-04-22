<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeAccountContentsUtils {

        public static function init() {

            global $current_user; 
		
            $messages = \MessageNotification\MessageGetUtils::get_all();
            
            //extract($messages); 
            
            $url = \Urls\UrlGetAdminPublishProductPageUtils::get();
            
            if ( \Users\UserCheckPermissionUtils::has(\Users\USER_ROLES::PUBLISH_PRODUCT_PERMISSION) ) :

                $please_add_product_now_label = str_replace("{url}", 
                                                                $url, 
                                                                $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_ID]);

            else :

                $please_add_product_now_label = str_replace("{url}", 
                                                                "#", 
                                                                $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PLEASE_ADD_PRODUCT_NOW_LABEL_ID]);
                                                                
            endif; ?>

            <div class="woo-contents-dashboard">

                <div class="woo-heading">

                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::WELCOME_LABEL_ID] ?> <strong><?php echo esc_html( $current_user->display_name ) ?></strong>
                    (<a href="<?php echo esc_url( wc_logout_url() ) ?>"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_ID] ?></a>)

                </div>

                <div class="woo-main-contents mtop20">
                    <div>
                        <?= $please_add_product_now_label ?>			    	
                    </div>
                </div>

            </div>
            

	<?php }

    }


