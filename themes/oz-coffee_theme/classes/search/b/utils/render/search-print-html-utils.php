<?php 

    namespace Search;

    class SearchPrintHtmlUtils  {

        public static function render() {  ?>

            <div id="page-main-elements" 
                class="page-main-elements page-uudai-elements page-main-builders">

                <div class="page-article-lists page-hamburg-lists page-cambridge-lists page-has-custom-pagination">

                    <div class="wrapper-elements">

                        <div class="container">

                            <?php SearchPrintResultsFoundHtmlUtils::render(); ?>

                            <?php SearchPrintPaginationHtmlUtils::render(); ?>

                            <?php wp_reset_query(); ?>
                            
                        </div>

                    </div>

                </div>

            </div>

        <?php }

    }