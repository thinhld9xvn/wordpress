<?php 

    namespace Archive\UuDai\Single;

    class UDPrintRelatedBoxHtmlUtils  { 
        
        public static function render($post) { ?>
        
            <div class="relatedPostsBox relatedChildPosts">

                <?php UDPrintRelatedHeadingHtmlUtils::render() ?>

                <?php UDPrintRelatedArticlesListHtmlUtils::render($post) ?>

            </div>
       

    <?php
        }
    }