<?php 

    namespace Logo;

    class LogoPrintMobileHtmlUtils {

        public static function render() {

           ob_start();

           $mobile_logo_image_url = LogoGetMobileUrlUtils::get(); ?>

                <a href="<?php echo bloginfo('url') ?>">
                    
                    <img src="<?php echo $mobile_logo_image_url ?>" 
                            alt="logo" />
                            
                </a> 

    <?php $contents = ob_get_contents();

           ob_end_clean();

           echo $contents;

        }

    }