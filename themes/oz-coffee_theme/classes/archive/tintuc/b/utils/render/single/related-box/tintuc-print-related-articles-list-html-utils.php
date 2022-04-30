<?php 

    namespace Archive\News\Single;

    class NewsPrintRelatedArticlesListHtmlUtils  {        

        public static function render($post) {  
            
            $results = NewsGetRelatedArticlesListUtils::get($post->ID); 
            
            if ( count($results) ) : ?>
            
                <div class="relatedPostBoxContent">
                        
                        <div class="related-box-elems-grid grid-three-columns grid-no-pad">
                            
                            <?php 
                                foreach ( $results as $key => $post ) : 
                                    
                                    NewsPrintRelatedArticleHtmlUtils::render($post);

                                endforeach; ?>

                        </div>


                </div>

        <?php endif; ?>
            
        <?php }

    }