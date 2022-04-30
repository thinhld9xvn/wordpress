<?php 

    namespace Footer;

    class FooterPrintContactAddressHtmlUtils {

        public static function render() {

            ob_start();  ?>

            <div class="footerCatalogAddrItem flex-layout">

                <div class="icon">
                    <span class="fa fa-map-marker"></span>
                </div>

                <div class="content">

                    <?php echo apply_filters('the_content', FooterGetContactAddressHtmlUtils::get()) ?>

                </div>

            </div>

            
                      
        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }