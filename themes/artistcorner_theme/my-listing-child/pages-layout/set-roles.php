

<?php 
    /* Template Name: Set Roles */

    if ( ! is_user_logged_in() || UserMemberShip::is_user_has_profile() ) :

        wp_redirect( home_url() );
        die();

    endif;
    
    if ( isset( $_POST['set_account_role'] ) ) :

        global $current_user;

        $role_name = $_POST['mylisting_user_role'];

        UserMemberShip::set_account_role($current_user->ID, $role_name);      

        wp_redirect(_EDIT_PROFILE_URL); 
        
        die();

    endif;

    get_header(); ?>

<div class="woocommerce-account">

    <div class="woocommerce">

        <div class="setPassForm setRoleForm col-xs-9 col-xs-12 pull-right">
            <div class="element">
                <div class="pf-head round-icon">
                    <div class="title-style-1">
                        <i class="fa fa-users"></i>
                        <h5>Set account role</h5>
                    </div>
                </div>

                <div class="pf-body">
                    <form class="woocommerce-EditAccountForm set-role sign-in-form" 
                            action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                        <fieldset>
                            <?php print_set_roles_body_form(); ?>
                        </fieldset>

                        <div>                            
                            <button type="submit" class="buttons button-2 full-width" name="set_account_role" value="Set role">
                                Set role
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