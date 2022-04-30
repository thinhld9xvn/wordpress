<?php 

    namespace Archive\Galleries\Single;

    class GalleriesPrintListsHtmlUtils {

        public static function render($post) {  
            
            $results = GalleriesGetSingleListsUtils::get($post); ?>

            <?php if ( count( $results ) > 0 ) : ?>
        
                <div class="service-catalog-entries-layout galleries-helena-entries-layout grid-fours-columns grid-no-pad">

                    <?php foreach( $results as $key => $data ) :

                           $data['id'] = $key + 1;

                            GalleriesPrintItemHtmlUtils::render($data);
                    
                          endforeach; ?>                

                </div>  

            <?php endif; ?>

        <?php }
        

    }