<?php 

    namespace Products;

    class ProductPrintEmptyListsUtils {

        public static function print($msg) {

            echo '<div class="empty-lists-box">' . $msg . '</div>';           

        }

    }