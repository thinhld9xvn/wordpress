<?php 

    namespace Home\Sections;

    class GalleriesSectionPrintEntriesElementUtils {

        public static function render() {

            ob_start(); 
            
            $results = GalleriesSectionGetListsUtils::get();
            
            if ( count($results) ) :  ?>

                <div class="galleries-elem-grid grid-three-columns grid-no-pad">

                    <?php
                        $count = 1;

                        foreach ( $results as $key => $post ) :                        

                            GalleriesSectionPrintEntryElementUtils::render($post, $count);

                            $count++;
                            
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