<?php 

    namespace Archive\UuDai\Single;    

    class UDPrintRelatedArticlesListHtmlUtils  { 
        
        public static function render($post) {  
            
            $results = UDGetRelatedArticlesListUtils::get($post->ID); 
            
            if ( count($results) ) : ?>
            
                <div class="relatedPostBoxContent">
                        
                        <div class="related-box-elems-grid grid-three-columns grid-no-pad">
                            
                            <?php 
                                foreach ( $results as $key => $post ) : 
                                    
                                    UDPrintRelatedArticleHtmlUtils::render($post);

                                endforeach; ?>

                        </div>


                </div>

        <?php endif; ?>
            
        <?php }

        
    }