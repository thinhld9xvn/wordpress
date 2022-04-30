<?php 

    namespace Archive\UuDai;

    class UDPrintHtmlUtils  {

        public static function render() {  ?>

            <div id="page-main-elements" class="page-main-elements page-uudai-elements page-main-builders">

                <div class="page-article-lists page-hamburg-lists page-cambridge-lists page-has-custom-pagination">

                    <div class="container">

                        <?php UDPrintArticlesListHtmlUtils::render(); ?>

                        <?php UDPrintArticlesPaginationHtmlUtils::render(); ?>

                        <?php wp_reset_query(); ?>

                    </div>

                </div>

            </div>            

        <?php }

    }