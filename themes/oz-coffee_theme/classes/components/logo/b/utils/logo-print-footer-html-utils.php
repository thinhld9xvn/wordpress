<?php 

    namespace Logo;

    class LogoPrintFooterHtmlUtils {

        public static function render() {

           ob_start();

           $logo_image_url = LogoGetFooterUrlUtils::get(); ?>

                <a href="<?php echo bloginfo('url') ?>">
                    
                    <img src="<?php echo $logo_image_url ?>" 
                            alt="logo" />
                            
                </a> 

    <?php $contents = ob_get_contents();

           ob_end_clean();

           echo $contents;

        }

    }