<?php 

    namespace Footer;

    use \Logo\LogoPrintFooterHtmlUtils;
    use \Social_Network\SocialNetworkPrintFbHtmlUtils;
    use \Social_Network\SocialNetworkPrintInstagramHtmlUtils;
    use \Social_Network\SocialNetworkPrintYoutubeHtmlUtils;
    use \Social_Network\SocialNetworkPrintZaloHtmlUtils;

    class FooterPrintColumnLogoHtmlUtils {

        public static function render() {

            ob_start(); ?>

            <div class="logo footer-logo">

                <?php LogoPrintFooterHtmlUtils::render(); ?>
                
            </div>

            <div class="header-social footer-social flex-layout flex-justify-center">

                <?php SocialNetworkPrintFbHtmlUtils::render(); ?>

                <?php SocialNetworkPrintInstagramHtmlUtils::render(); ?>

                <?php SocialNetworkPrintYoutubeHtmlUtils::render('youtube-play'); ?>            

                <?php SocialNetworkPrintZaloHtmlUtils::render(); ?>                                

            </div>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }