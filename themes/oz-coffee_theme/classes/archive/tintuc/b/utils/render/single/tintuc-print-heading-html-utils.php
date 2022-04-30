<?php 

    namespace Archive\News\Single;

    class NewsPrintHeadingHtmlUtils  {        

        public static function render($post) {  ?>
            
            <h2 class="sectionTitleHeading uudaichildTitleHeading jnewscambridgeTitleHeading text-center">
                <?= $post->post_title ?>
            </h2>
            
        <?php }

    }