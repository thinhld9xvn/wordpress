<?php

    namespace Actions\Woocommerce;

    class ActionWoocommerceCustomizeEditAccountContentsUtils {

        public static function init() {

            global $current_user;

            $messages = \MessageNotification\MessageGetUtils::get_all();
    
            $data_commercants_list = \Commercants\CommercantGetListUtils::get();
    
            //print_r( $current_user->data );
    
            $user_name = $current_user->data->user_name; 
            $user_email = $current_user->data->user_email;
            $user_website = $current_user->data->user_url;		
    
            $_user_avatar = get_user_meta( $current_user->data->ID, 'profile_avatar', true );
    
            $first_name = get_user_meta( $current_user->data->ID, 'first_name', true ) ;
            $last_name = get_user_meta( $current_user->data->ID, 'last_name', true );
            $user_shop_name = get_user_meta( $current_user->data->ID, 'profile_shop_name', true );
            $user_address = get_user_meta( $current_user->data->ID, 'profile_address', true );
            $user_city = get_user_meta( $current_user->data->ID, 'profile_city', true );
            $user_country = get_user_meta( $current_user->data->ID, 'profile_country', true );
    
            $first_name = empty($first_name) ? '' : $first_name;
            $last_name = empty($last_name) ? '' : $last_name;
            $user_shop_name = empty($user_shop_name) ? '' : $user_shop_name;
            $user_address = empty($user_address) ? '' : $user_address;
            $user_city = empty($user_city) ? '' : $user_city;
            $user_country = empty($user_country) ? '' : $user_country;
    
            $user_phone = get_user_meta($current_user->data->ID, 'profile_phone_number', true);
    
            $user_avatar = empty( $_user_avatar ) ? 'https://secure.gravatar.com/avatar/c4c645522f94b3e95a9a7c56e2db48e4?s=96&#038;r=g' : $_user_avatar;
    
            do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_NAVIGATION_ACTION); ?>
    
            <div class="col-sm-9 col-sm-pull-3 col-xs-12">
    
                <div class="klb-checkout-page">
    
                    <div class="woocommerce-MyAccount-content">
    
                        <div class="woo-contents-publish-products woo-contents-edit-account">
    
                            <div class="woo-heading">
                                <h2 class="admin-panel-heading"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::EDIT_MY_ACCOUNT_LABEL_ID] ?></h2>
                                <!--<p>Please input/enter the information below:</p>-->
                            </div>
    
                            <div class="woo-main-contents mtop20">
    
                                <form id="frmPersonalInfo" method="post" action="/wp-admin/admin-ajax.php">
    
                                    <div class="form-contents">
    
                                        <div class="personal-info __simple none">
                                            <div class="woo-input-box flex-layout">
                                                <label>Profile avatar <span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <div class="profile-avatar">
                                                        <img id="imgProfileAvatar" src="<?php echo $user_avatar ?>" alt="avatar" />
                                                    </div>
                                                    <div class="profile-navigation">
                                                        <a id="btnChooseAvatarImage" 
                                                            class="btn btn-primary btnChooseAvatarImage" 
                                                            name="btnChooseAvatarImage"
                                                            href="#">Choose a image</a>
                                                        <figure class="mtop10">
                                                            <div>Acceptable format: jpg, jpeg, png only.</div>
                                                            <div>Max file upload size: 2 MB</div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="admin-panel-heading __left __medium none" ><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ACCOUNT_INFORMATION_LABEL_ID] ?></h2>
    
                                        <div class="personal-info __simple mtop20 none">
                                            <div class="woo-input-box flex-layout">
                                                <label>First name<span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <input id="txtAccountFirstName" type="text" class="form-control account-form-field" name="txtAccountFirstName" value="<?php echo $first_name ?>" required="true" />
                                                </div>
                                            </div>
    
                                            <div class="woo-input-box flex-layout">
                                                <label>Last name<span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <input id="txtAccountLastName" type="text" class="form-control account-form-field" name="txtAccountLastName" value="<?php echo $last_name ?>"  required="true" />
                                                </div>
                                            </div>
                                            <div class="woo-input-box flex-layout">
                                                <label>Email<span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <input id="txtAccountEmail" type="email" class="form-control account-form-field disabled" name="txtAccountEmail" value="<?php echo $user_email ?>"  />
                                                </div>
                                            </div>	
                                        </div>
                                        <h2 class="admin-panel-heading __left __medium"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_LABEL_ID] ?></h2>
                                        <div class="personal-info __simple mtop20">
                                            <div class="woo-input-box flex-layout">
                                                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CURRENT_PASSWORD_LABEL_ID] ?> <span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <input id="txtAccountCurrentPass" type="password" class="form-control account-form-field" name="txtAccountCurrentPass" value="" required />
                                                </div>
                                            </div>
    
                                            <div class="woo-input-box flex-layout">
                                                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_ID] ?> <span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <input id="txtAccountNewPass" type="password" class="form-control account-form-field" name="txtAccountNewPass" value="" required />
                                                </div>
                                            </div>
                                            <div class="woo-input-box flex-layout">
                                                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_ID] ?> <span class="required">(*)</span></label>
    
                                                <div class="field-input">
                                                    <input id="txtAccountConfirmPass" type="password" class="form-control account-form-field" name="txtAccountConfirmPass" value="" required />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="edit-account-foot mtop20">
                                            <button type="submit" id="btnAccountUpdate" class="btn btn-primary btnAccountUpdate" name="btnAccountUpdate"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_INFORMATION_LABEL_ID] ?></button>
                                        </div>
    
                                        <input type="hidden" id="txtHidProfileAvatar" name="txtProfileAvatar" value="<?php echo $_user_avatar ?>" />
    
                                        <input type="hidden" id="txtHidProfileShopName" name="txtProfileShopName" value="<?php echo empty( $user_shop_name ) ? '-1' : $user_shop_name  ?>" />
    
                                        <input type="hidden" id="txtHidProfileCountry" name="txtProfileCountry" value="<?php echo empty( $user_country ) ? '-1' : $user_country ?>" />
                                        
    
                                    </div>
    
                                </form>
    
                            </div>
    
                        </div>
    
    
                    </div>
    
                </div>
    
            </div>

        <?php }

    }


