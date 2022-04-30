<?php 

    namespace Archive\UuDai;

    class UDPrintArticlesListHtmlUtils  {

        public static function render() {  
            
            $results = UDGetArticlesListUtils::get(); 
            
            if ( count($results) > 0 ) : ?>

                <div class="articles-elements-grid grid-two-columns grid-no-pad">

                    <?php foreach ( $results as $key => $post ) :

                            UDPrintArticleHtmlUtils::render($post);

                         endforeach; ?>
                    
                </div>

        <?php 
            endif;
        }

    }