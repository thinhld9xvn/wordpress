<?php 
    /* Template Name: Set account settings */

    global $current_user;

    if ( ! is_user_logged_in() || UserMemberShip::is_user_has_profile() ) :

        wp_redirect( home_url() );
        die();

    endif;

    $userdata = UserMemberShip::get_userdata($current_user->ID);

    $user_password = $userdata->data->user_pass;
    $user_email = $userdata->data->user_email;

    get_header(); ?>

<div class="woocommerce-account">

    <div class="woocommerce">

        <div class="setPassForm setAccountFirstTime col-xs-9 col-xs-12 pull-right">
            <div class="element">
                <div class="pf-head round-icon">
                    <div class="title-style-1">
                        <i class="mi person user-area-icon"></i>
                        <h5>Set account settings</h5>
                    </div>
                </div>

                <div class="pf-body">
                    <form class="woocommerce-EditAccountForm edit-account set-password sign-in-form" 
                            action="<?= _EDIT_PROFILE_URL ?>" method="post">
                        <fieldset>
                            <legend>Set password</legend>

                            <div class="form-group">
                                <input type="password" name="password_1" id="password_1" autocomplete="off" placeholder=" " />
                                <label for="password_1">New account password <span class="required">(*)</span></label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_2" id="password_2" autocomplete="off" placeholder=" " />
                                <label for="password_2">Confirm account password <span class="required">(*)</span></label>
                            </div>
                            <?php print_set_roles_body_form(); ?>
                        </fieldset>
                        <div>
                            <input type="hidden" name="account_email" id="reg_email" value="<?= $user_email ?>" />
                            <input type="hidden" name="password_current" id="password_current" value="<?= $user_password ?>" />
                            <button type="submit" class="buttons button-2 full-width" name="set_account_settings" value="Save settings">
                                Save settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

    </div>

</div>

<?php

    get_footer();