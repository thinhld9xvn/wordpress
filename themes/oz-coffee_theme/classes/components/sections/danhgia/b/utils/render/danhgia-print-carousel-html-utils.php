<?php 

    namespace Home\Sections;

    class ReviewsSectionPrintCarouselHtmlUtils {

        public static function render() { 
            
            ob_start(); 
            
            $results = ReviewsSectionGetListsUtils::get(); 
            
            if ( count($results) > 0 ) : ?>

                <div class="reviews-elem-grid bxslider-cn-wrapper bxslider-reviews-carousel">

                    <div class="bxslider --carousel" 
                        data-numShow="3" 
                        data-pause="10000">

                        <?php 
                            foreach ( $results as $key => $post ) :
                                
                                ReviewsSectionPrintCarouselItemHtmlUtils::render($post);

                            endforeach; 
                            
                             ?>

                    </div>

                </div>

        <?php       
        
            endif;

            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;
        }

    }