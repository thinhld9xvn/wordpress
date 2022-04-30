<?php 

    namespace Slider;

    class SliderPrintHtmlUtils {

       public static function render() { 

            ob_start(); 

            $pause = SliderGetPauseSettingUtils::get();

            $results = SliderGetListsUtils::get();

            if ( count( $results ) > 0 ) : ?>            

                <div class="bxslider-cn-wrapper mainslider-cn-wrapper">

                    <div id="slider" 
                        class="bxslider --fademode" 
                        data-pause="<?= $pause ?>">

                        <?php 
                            foreach ( $results as $key => $post ) :
                            
                                SliderPrintItemHtmlUtils::render($post);

                            endforeach; 
                            
                            wp_reset_postdata() ?>

                    </div>

                    <div class="bxslider-custom-controls">
                        <a class="bx-prev" href="#"></a>
                        <a class="bx-next" href="#"></a>
                    </div>

                </div>

            <?php

                endif;

                $contents = ob_get_contents();

                ob_end_clean();

                echo $contents;           
        
           
       }

    }