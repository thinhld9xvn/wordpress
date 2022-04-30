<?php 

    namespace Home\Sections;

    class SVSectionPrintCatalogEntriesHtmlUtils {

        public static function render() {

            ob_start(); 
            
            $results = SVSectionGetCatalogEntriesListUtils::get(); 
            
            if ( count($results) ) : ?>

                <div class="service-catalog-entries-layout grid-fours-columns grid-no-pad">

                    <?php foreach ($results as $key => $post) :
                                
                            SVSectionPrintCatalogEntryHtmlUtils::render($post);

                        endforeach; 
                        
                         ?>             

                </div>  

            <?php 

            endif;

                $contents = ob_get_contents();

                ob_end_clean();

                echo $contents;

        }

    }