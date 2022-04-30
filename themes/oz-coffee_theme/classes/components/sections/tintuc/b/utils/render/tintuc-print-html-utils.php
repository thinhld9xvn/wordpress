<?php 

    namespace Home\Sections;

    class NewsSectionPrintHtmlUtils {

        private static function print_grid_left_begin_tag($count) {

            if ( $count === 0 ) : ?>

                <div class="grid-left">

    <?php  endif; 
        }

        private static function print_grid_left_end_tag($count, $length) {

            if ( $count === 0 ) : ?>

                </div>

    <?php  endif; 
        }

        private static function print_grid_right_begin_tag($count) {

            if ( $count === 0 ) : ?>

                <div class="grid-right">

                    <div class="news-normal-articles">

    <?php  endif; 
        }

        private static function print_grid_right_end_tag($count, $length) {
            
            if ( $count === $length - 1 ) : ?>

                    </div>
                    
                </div>

    <?php  endif; 
        }

        public static function render() {

            ob_start();  
            
            $results = NewsSectionGetListsUtils::get(); ?>

                <div class="news-section home-news-section fullwidth-section">

                    <div class="section-wrapper">

                        <div class="container">

                            <?php NewsSectionPrintHeadingHtmlUtils::render(); ?>

                            <?php 

                                if ( count( $results ) > 0 ) : ?>

                                    <div class="sectionMainContent">

                                        <div class="news-elem-section-grid grid-two-columns">

                                            <?php 
                                                $count = 0;
                                                $length = count($results);

                                                foreach ( $results as $key => $post ) : ?>
                                                    
                                                    <?php 
                                                        self::print_grid_left_begin_tag($count);

                                                            if ( $count === 0 ) :
                                                            
                                                                NewsSectionPrintLargeArticleHtmlUtils::render($post); 

                                                            endif;
                                                        
                                                        self::print_grid_left_end_tag($count, $length);

                                                        self::print_grid_right_begin_tag($count);

                                                            if ( $count > 0 ) :

                                                                NewsSectionPrintNormalArticleHtmlUtils::render($post); 

                                                            endif;

                                                        self::print_grid_right_end_tag($count, $length);

                                                    $count++;
                                                        
                                                endforeach; 
                                                
                                                 ?>
                                                
                                        </div>
                                        
                                    </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php 
            
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;

        }

    }