<?php

    namespace Users;

    class UserPrintSetRolesBodyFormUtils {

        public static function print() { ?>

            <legend>Set role</legend>
            <div class="role-tabs">
                <div class="md-checkbox">
                    <input type="radio" name="mylisting_user_role" id="mylisting_user_role-secondary" value="<?= _ACCOUNT_ROLE_CUSTOMER ?>" checked="checked" class="role-active" /> 
                    <label for="mylisting_user_role-secondary"> Customer</label>
                </div>
                <div class="md-checkbox">
                    <input type="radio" name="mylisting_user_role" id="mylisting_user_role-primary" value="<?= _ACCOUNT_ROLE_PROVIDER ?>" class="role-active" /> 
                    <label for="mylisting_user_role-primary">Provider</label>
                </div>
            </div>

        <?php }

    }