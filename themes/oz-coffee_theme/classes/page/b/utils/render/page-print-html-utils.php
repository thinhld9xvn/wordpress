<?php 

    namespace Page;

    class PagePrintHtmlUtils  {

        public static function render($post) { 
            
            $heading = PageGetMetaHeadingFieldUtils::get($post->ID);
            $subtitle = PageGetMetaSubTitleFieldUtils::get($post->ID); ?>

            <div id="page-main-elements" class="page-main-elements page-main-builders">
                <div class="container">
                    <h2 class="sectionTitleHeading sectionPageMainTitle text-center">
                        <div class="maintitle"><?= $heading ?></div>
                        <div class="subtitle"><?= $subtitle ?></div>
                    </h2>
                    <div class="page-contents">

                        <?php echo apply_filters('the_content', $post->post_content) ?>
                        
                    </div>
                </div>
            </div>
            
        </div>

        <?php }

    }