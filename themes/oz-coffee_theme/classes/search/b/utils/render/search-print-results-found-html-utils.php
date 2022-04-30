<?php 

    namespace Search;

    class SearchPrintResultsFoundHtmlUtils  {

        public static function render() {  
            
            $results = SearchGetListsQueryUtils::get(); 
            
            if ( count($results) > 0 ) : ?>

                <div class="articles-elements-grid grid-three-columns grid-no-pad">

                    <?php foreach ( $results as $key => $post ) :

                            SearchPrintItemHtmlUtils::render($post);

                         endforeach; ?>
                    
                </div>

        <?php 

            else : ?>

                <p class="no-results">Không tìm thấy kết quả ...</p>
        
            <?php endif;
        }
    }