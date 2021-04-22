<?php 

    namespace Stores;

    class StorePrintQueryResultsUtils {

        public static function print() { ?>

            <script type="text/javascript">
                var filtered_product_lists = '';
            </script>

            <div class="page-entries-content"> 

                <?php 
                    \Products\ProductPrintSortbyFilterUtils::print(); ?>

                <div id="results" class="filtered-results mtop20"></div>

            </div>           

        <?php }

    }