<?php 

    namespace Archive\News;

    class NewsPrintHtmlUtils  {

        public static function render() {
            
            global $post; ?>

            <div id="page-main-elements" 
                class="page-main-elements page-uudai-elements page-main-builders">

                <div class="page-article-lists page-hamburg-lists page-cambridge-lists page-has-custom-pagination">

                    <div class="wrapper-elements">

                        <div class="container">

                            <?php NewsPrintArticlesListHtmlUtils::render(); ?>

                            <?php NewsPrintArticlesPaginationHtmlUtils::render(); ?>

                            <?php wp_reset_query(); ?>
                            
                        </div>

                    </div>

                </div>

            </div>

        <?php }

    }