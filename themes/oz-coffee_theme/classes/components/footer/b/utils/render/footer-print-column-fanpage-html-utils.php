<?php 

    namespace Footer;

    class FooterPrintColumnFanpageHtmlUtils {

        public static function render() {

            ob_start(); 
            
            $title = FooterGetFanpageColumnTitleUtils::get();
            $url = \Social_Network\SocialNetworkGetFanpageUrlUtils::get(); ?>

            <h4><?= $title ?></h4>

            <div class="footerContent">
                <div class="fb-page"
                    data-href="<?= $url ?>" 
                    data-width="340"
                    data-hide-cover="false"
                    data-show-facepile="true"
                    data-lazy="true"></div>
            </div>            

        <?php 
             $contents = ob_get_contents();

             ob_end_clean();
 
             echo $contents;
        }

    }