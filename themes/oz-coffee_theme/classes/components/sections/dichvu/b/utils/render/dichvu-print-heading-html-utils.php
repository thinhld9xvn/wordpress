<?php 

    namespace Home\Sections;

    class SVSectionPrintHeadingHtmlUtils {

       
        public static function render() { 
            
            ob_start(); 
            
            $heading = SVSectionGetHeadingTextUtils::get();
            $banner_url = SVSectionGetBannerUtils::get(); ?>

            <div class="service-opening-elem service-banner-elem backgroundi-lazy" 
                data-src="<?= $banner_url ?>">

                <h2 class="sectionTitleHeading serviceElemTitleHeading">
                    <?= $heading ?>
                </h2>

            </div>            

        <?php           

            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }