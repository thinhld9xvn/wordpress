<?php 

    namespace Logo;

    class LogoPrintPrimaryHtmlUtils {

        public static function render() {

           ob_start();

           $primary_logo_image_url = LogoGetPrimaryUrlUtils::get(); ?>

                <a href="<?php echo bloginfo('url') ?>">
                    
                    <img src="<?php echo $primary_logo_image_url ?>" 
                            alt="logo" />
                            
                </a> 

    <?php $contents = ob_get_contents();

           ob_end_clean();

           echo $contents;

        }

    }