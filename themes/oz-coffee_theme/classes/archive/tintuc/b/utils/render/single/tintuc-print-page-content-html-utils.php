<?php 

    namespace Archive\News\Single;

    class NewsPrintPageContentHtmlUtils  {        

        public static function render($post) { ?>
            
            <div class="page-contents">

                <?php echo apply_filters('the_content', $post->post_content) ?>

            </div>        
            
        <?php }

    }