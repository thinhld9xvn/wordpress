<?php

    namespace Actions\Init;

    class ActionDisableAccessToAdminPanelUtils {

        public static function init() {

            if ( is_admin() ) :

                if ( is_user_logged_in() ) :
    
                    if ( ! wp_doing_ajax() ) :
    
                        if ( ! current_user_can('administrator') ) :
    
                            die('You have not permission to access this.');
    
                        endif;
    
                    endif;
    
                endif;
    
            endif;

        }

    }


