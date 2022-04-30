<?php 

    namespace Archive\UuDai\Single;

    class UDPrintFacebookCommentsUtils {        

        public static function render($post) {  ?>
            
            <div class="fb-element">

                <div class="fb-comments" 
                    data-href="<?= get_the_permalink($post) ?>" 
                    data-width="100%" 
                    data-colorscheme="light"
                    data-numposts="5"></div>          
                

            </div>
            
        <?php }

    }