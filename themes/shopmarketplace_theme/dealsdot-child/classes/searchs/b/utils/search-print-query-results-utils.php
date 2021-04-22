<?php 

    namespace Searchs;

    class SearchPrintQueryResultsUtils {

        public static function print() { ?>

            <script type="text/javascript">
                var filtered_product_lists = '';
            </script>

            <div class="page-entries-content">

                <?php 
                    \Products\ProductPrintSortbyFilterUtils::print();
                    //\Products\ProductPrintListsInLoopUtils::print_with_filter($args, $filter_args); ?>

                <div id="results" class="filtered-results mtop20"></div>

            </div>

           
        <?php }

    }