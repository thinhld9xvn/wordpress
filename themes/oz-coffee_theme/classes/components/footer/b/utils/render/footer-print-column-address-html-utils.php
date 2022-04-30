<?php 

    namespace Footer;

    class FooterPrintColumnAddressHtmlUtils {

        public static function render() {

            ob_start();  ?>

            <?php FooterPrintHeadingColumnAddressHtmlUtils::render() ?>

            <div class="footerContent">

                <div class="footerCatalogAddr">

                    <?php FooterPrintContactAddressHtmlUtils::render() ?>

                    <?php FooterPrintContactPhoneHtmlUtils::render() ?>

                    <?php FooterPrintContactEmailHtmlUtils::render() ?>

                </div>
            </div>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }