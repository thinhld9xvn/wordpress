<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeAccountNavigationUtils {

        public static function init() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            $my_account_link = \Urls\UrlGetMyAccountPageUtils::get();
            $edit_account_link =\Urls\UrlGetAdminEditAccountPageUtils::get(); ?>

            <div class="col-right sidebar col-sm-3 col-sm-push-9 col-xs-12">

                <div class="klb-checkout-page checkout-progress-sidebar">

                    <div class="navigation-bar woocommerce-MyAccount-navigation">

                        <ul>						

                            <?php if ( \Users\UserCheckPermissionUtils::has(\Users\USER_ROLES::VIEW_STORE_PRODUCT_LISTS_PERMISSION) && 
                                        \Users\UserCheckPermissionUtils::has(\Users\USER_ROLES::PUBLISH_PRODUCT_PERMISSION) ) : ?>

                                <li>
                                    <a href="<?= \Urls\UrlGetAdminViewProductListsPageUtils::get() ?>"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MY_PRODUCT_LABEL_ID] ?></a>
                                    
                                    <!--<ul>

                                        <li>
                                            <a href="<?= \Urls\UrlGetAdminViewProductListsPageUtils::get() ?>">View products list</a>
                                        </li>		

                                        <li>
                                            <a href="<?= \Urls\UrlGetAdminPublishProductPageUtils::get() ?>">Add product</a>
                                        </li>

                                    </ul>-->

                                </li>

                            <?php endif; ?>					

                            <?php if ( \Users\UserCheckPermissionUtils::has(\Users\USER_ROLES::UPDATE_STORE_DETAILS_PERMISSION ) ) : ?>		

                                <li>

                                    <a href="<?= \Urls\UrlGetAdminUpdateStorePageUtils::get() ?>"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_ID] ?></a>

                                    <?php //if ( UserMemberShip::get_permission(USER_ROLES::UPDATE_STORE_DETAILS_PERMISSION ) ) : ?>

                                        <!--<ul>

                                            <li>
                                                <a href="<?= \Urls\UrlGetAdminEditAccountPageUtils::get() ?>">Edit account</a>
                                            </li>		

                                            <li>
                                                <a href="<?= \Urls\UrlGetAdminUpdateStorePageUtils::get() ?>">Update store details</a>
                                            </li>

                                        </ul>-->

                                    <?php //endif; ?>

                                </li>	

                            <?php endif; ?>

                            <li>
                                <a href="<?= \Urls\UrlGetAdminEditAccountPageUtils::get() ?>"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_ID] ?></a>
                            </li>				

                            <li>
                                <a href="<?= esc_url( wc_logout_url() ) ?>"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::LOGOUT_LABEL_ID] ?></a>
                            </li>

                        </ul>

                    </div>

                    
                </div>
                
            </div>

<?php }

    }


