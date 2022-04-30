<?php 

    namespace Archive\Galleries;

    class GalleriesPrintHtmlUtils {

        public static function render() {  
            
            $description = GalleriesGetDescriptionUtils::get(); ?>

            <div id="page-main-elements" class="page-main-elements page-galleries-elements page-main-builders element-no-mgtop">

                <div class="page-galleries-contents">

                    <div class="container">       
                        
                        <div class="service-body-elem service-contents-elem galleries-cambrid-contents-elem">

                            <figure>
                                <?php echo apply_filters('the_content', $description) ?>
                            </figure>

                            <?php GalleriesPrintBodyHtmlUtils::render() ?>     
                        
                        </div>
                    
                    </div>
                    
                </div>

            </div>

        <?php }
        

    }