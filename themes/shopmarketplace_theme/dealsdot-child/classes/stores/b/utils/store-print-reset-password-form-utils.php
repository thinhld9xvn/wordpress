<?php 

    namespace Stores;

    class StorePrintResetPasswordFormUtils {

        public static function print() {

            $messages = \MessageNotification\MessageGetUtils::get_all(); ?>

            <form method="post" 
                id="woocommerce-store-resetPassword"
                    class="woocommerce-ResetPassword lost_reset_password woocommerce-store-resetPassword"
                    action="">                            
                
                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                    <label for="user_new_password"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::NEW_PASSWORD_LABEL_ID] ?> <span class="required">(*)</span></label>
                    <input class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" 
                            type="password" 
                            name="user_new_password" 
                            id="user_new_password"
                            required="" 
                            autocomplete="off">
                </p>

                <div class="clear"></div>

                <p class="woocommerce-form-row woocommerce-form-row--two form-row form-row-two">
                    <label for="user_confirm_password"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CONFIRM_PASSWORD_LABEL_ID] ?> <span class="required">(*)</span></label>
                    <input class="form-control unicase-form-control woocommerce-Input woocommerce-Input--text input-text" 
                            type="password" 
                            name="user_confirm_password" 
                            id="user_confirm_password" 
                            required=""
                            autocomplete="off">
                </p>

                <div class="clear"></div>

                <p class="woocommerce-form-row form-row">                             
                    <button type="submit" 
                            class="btn-upper btn btn-primary woocommerce-Button button" 
                            name="submit"
                            value="<?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID] ?>">
                        
                        <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_CHANGES_LABEL_ID] ?>
                    
                    </button>

                </p> 

                <input type="hidden" name="uid" value="<?= $_GET['uid'] ?>" /> 
                
            </form>         

        <?php }

    }