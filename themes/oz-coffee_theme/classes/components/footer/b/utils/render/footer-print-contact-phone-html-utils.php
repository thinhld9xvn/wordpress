<?php 

    namespace Footer;

    class FooterPrintContactPhoneHtmlUtils {

        public static function render() {

            ob_start();  
            
            $phone = FooterGetContactPhoneUtils::get();  ?>

                <div class="footerCatalogAddrItem flex-layout">
                    <div class="icon">
                        <span class="fa fa-phone"></span>
                    </div>
                    <div class="content">
                        <p>
                            <a href="tel:<?= $phone ?>">
                                <?= $phone ?>
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