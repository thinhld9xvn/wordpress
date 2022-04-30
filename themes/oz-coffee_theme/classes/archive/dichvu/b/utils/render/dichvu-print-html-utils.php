<?php 

    namespace Archive\Services;

    class SVPrintHtmlUtils  {

        public static function render() { ?>

            <div id="page-main-elements" class="page-main-elements page-services-elements page-main-builders">
                <div class="page-services-contentsp">
                    <div class="service-section fullwidth-section">
                        <div class="section-wrapper">                        
                            <div class="service-body-elem service-contents-elem">
                                
                                <?php SVPrintDescriptionHtmlUtils::render(); ?>

                                <?php SVPrintCatalogEntriesHtmlUtils::render(); ?> 
                                
                            </div>

                        </div>
                
                    </div> 
                        
                </div>

            </div>        

        <?php }

    }