<?php 

    namespace Footer;

    class FooterPrintContactEmailHtmlUtils {

        public static function render() {

            ob_start();  
            
            $email = FooterGetContactEmailUtils::get(); ?>

            <div class="footerCatalogAddrItem flex-layout">
                <div class="icon">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="content">
                    <p>
                        <a href="mailto:<?= $email ?>">
                            <?= $email ?>
                        </a>
                    </p>
                </div>
            </div>
                      
        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }