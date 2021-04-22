<?php 

    namespace Stores;

    class StorePrintAfterSubmitResetPasswordUtils {

        public static function print() {

            $url = \Urls\UrlGetMyAccountPageUtils::get(); ?>
        
            <script type="text/javascript">
    
                jQuery(function($) {
    
                    $(window).load(function() {
    
                        setTimeout(function() {
    
                            window.location.href = '<?= $url ?>';
    
                        }, 2000);
    
                    });
    
                });
                
    
            </script>
    
            <?php $messages = \MessageNotification\MessageGetUtils::get_all();
    
            //extract($messages);
    
            $new_password = $_POST['user_new_password'];
            $uid = $_POST['uid'];

            //echo $new_password;
    
            \Users\UserChangePasswordUtils::change($new_password, $uid);       
    
            $change_password_and_redirect_msg = str_replace("{url}", 
                                                                $url, 
                                                                $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CHANGE_PASSWORD_AND_REDIRECT_MSG_ID]);
    
            echo "<div>{$change_password_and_redirect_msg}</div>";        

         }

    }