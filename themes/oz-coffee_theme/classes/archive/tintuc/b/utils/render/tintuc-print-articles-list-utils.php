<?php 

    namespace Archive\News;

    class NewsPrintArticlesListHtmlUtils  {

        public static function render() {  
            
            $results = NewsGetArticlesListUtils::get(); 
            
            if ( count($results) > 0 ) : ?>

                <div class="articles-elements-grid grid-three-columns grid-no-pad">

                    <?php foreach ( $results as $key => $post ) :

                            NewsPrintArticleHtmlUtils::render($post);

                         endforeach; ?>
                    
                </div>

        <?php 
            endif;
        }

    }