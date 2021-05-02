<?php 
    namespace Actions;

    class ActionUpdateInformationUtils {

        public static function perform() {

            global $current_user;

            $user_id = $current_user->data->ID;
            $user_pass = $current_user->data->user_pass;

            $params = $_POST['params'];

            $params = \Strings\StringExtractParametersUtils::parse($params);	

            extract($params);

            $profile_firstname = $txtAccountFirstName;
            $profile_lastname = $txtAccountLastName;	
            $profile_avatar = $txtProfileAvatar;

            if ( ! current_user_can( 'edit_user', $user_id ) ) :

                echo 'error';
                die();

            endif;

            if ( ! empty( $profile_firstname ) ) :

                update_user_meta( $user_id, 'first_name', esc_attr( $profile_firstname ) );

            endif;

            if ( ! empty( $profile_lastname ) ) :

                update_user_meta( $user_id, 'last_name', esc_attr( $profile_lastname ) );

            endif;

            if ( ! empty( $profile_avatar ) ) :

                update_user_meta( $user_id, 'profile_avatar', esc_attr( $profile_avatar ) );

            endif;		

            //$P$Bj.MiTM2H7cDCvGrnd08CmtYeHL8bh0

            //echo var_dump(wp_check_password($txtAccountCurrentPass, $user_pass, $user_id));

            //echo $txtAccountCurrentPass;

            if ( wp_check_password($txtAccountCurrentPass, $user_pass, $user_id) ) :

                //echo var_dump($txtAccountNewPass === $txtAccountConfirmPass);

                if ( $txtAccountNewPass === $txtAccountConfirmPass ) :	
                    
                    //echo wp_hash_password($txtAccountNewPass);

                    \Users\UserChangePasswordUtils::change($txtAccountNewPass, $user_id);

                else :

                    echo 'error';

                    die();

                endif;

            else :

                echo 'error';

                die();

            endif;
            
            echo 'success';
            die();

        }

    }