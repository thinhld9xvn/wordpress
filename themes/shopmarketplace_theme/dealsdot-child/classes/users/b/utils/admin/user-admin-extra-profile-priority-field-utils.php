<?php 

namespace Users;

class UserAdminExtraProfilePriorityFieldUtils {

    public static function extra($user) {

        $_avatar = get_the_author_meta( 'profile_avatar', $user->ID );
        $avatar = $_avatar ? esc_attr( $_avatar ) : 'https://secure.gravatar.com/avatar/c4c645522f94b3e95a9a7c56e2db48e4?s=96&#038;r=g'; ?>   

    	<h3>Additional Information</h3>    

        <table class="form-table">

            <tr>
                <th><label for="profile_avatar"><?php _e("Profile avatar"); ?></label></th>
                <td>
                  <img alt='avatar' style="cursor: pointer" src='<?php echo $avatar ?>' class='avatar media_upload avatar-96 photo' height='96' width='96' />

                    <input type="hidden" name="profile_avatar" id="profile_avatar" value="<?php echo $_avatar; ?>" class="regular-text" /><br />

                    <span class="description"><?php _e("Please choose your avatar profile."); ?></span>
                </td>
            </tr>

            <tr>
                <th><label for="profile_phone_number"><?php _e("Phone number"); ?></label></th>
                <td>
                    <input type="text" name="profile_phone_number" id="profile_phone_number" value="<?php echo esc_attr( get_the_author_meta( 'profile_phone_number', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e("Please enter your phone number."); ?></span>
                </td>
            </tr>          

            <tr>
                <th><label for="profile_shop_name"><?php _e("Shop name"); ?></label></th>
                <td>
                    <input type="text" name="profile_shop_name" id="profile_shop_name" value="<?php echo esc_attr( get_the_author_meta( 'profile_shop_name', $user->ID ) ); ?>" class="regular-text" readonly="readonly" /><br />
                    <span class="description"><?php _e("Please enter your shop name."); ?></span>
                </td>
            </tr>      

            <tr>
                <th><label for="profile_address"><?php _e("Address"); ?></label></th>
                <td>
                    <input type="text" name="profile_address" id="profile_address" value="<?php echo esc_attr( get_the_author_meta( 'profile_address', $user->ID ) ); ?>" class="regular-text"  readonly="readonly" /><br />
                    <span class="description"><?php _e("Please enter your address."); ?></span>
                </td>
            </tr>            

            <tr>
                <th><label for="profile_city"><?php _e("City"); ?></label></th>
                <td>
                    <input type="text" name="profile_city" id="profile_city" value="<?php echo esc_attr( get_the_author_meta( 'profile_city', $user->ID ) ); ?>" class="regular-text"  readonly="readonly" /><br />
                    <span class="description"><?php _e("Please enter your city."); ?></span>
                </td>
            </tr>      

            <tr>
                <th><label for="profile_country"><?php _e("Country"); ?></label></th>
                <td>
                    <input type="text" name="profile_country" id="profile_country" value="<?php echo esc_attr( get_the_author_meta( 'profile_country', $user->ID ) ); ?>" class="regular-text"  readonly="readonly" /><br />
                    <span class="description"><?php _e("Please enter your country."); ?></span>
                </td>
            </tr>      
      
        </table>
    <?php

    }

}