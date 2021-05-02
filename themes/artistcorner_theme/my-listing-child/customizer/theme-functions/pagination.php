<?php
    function __get_ajax_jobs_listing_pagination_html($id, $current_page, $num_per_page, $total_items) {

        $total_num_pages = $total_items / $num_per_page;

        $html = "<div id='{$id}' class='pagination js-simple-pagination'>";

        for( $i = 0; $i < $total_num_pages; $i++ ) :

            $index = $i + 1;

            $cln_active = '';

            if ( $current_page === $index ) $cln_active = 'active';

            $html .= "<a href='#' class='buttons {$cln_active}' data-page='{$index}'>{$index}</a>";

        endfor;

        $html .= "</div>";

        return $html;

    }