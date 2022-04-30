<?php 

    namespace Archive\News\Single;

    class NewsPrintRelatedBoxHtmlUtils  {        

        public static function render($post) {  ?>

            <div class="relatedPostsBox relatedChildPosts">

                <?php NewsPrintRelatedHeadingHtmlUtils::render() ?>

                <?php NewsPrintRelatedArticlesListHtmlUtils::render($post) ?>

            </div>

        <?php }

    }