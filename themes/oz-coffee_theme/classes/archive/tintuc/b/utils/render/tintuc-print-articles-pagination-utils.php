<?php 

    namespace Archive\News;

    class NewsPrintArticlesPaginationHtmlUtils  {

        public static function render() {

            the_page_navigation('articlePagination');

         }

    }