<?php 

    namespace Actions\Enqueues;

    class EnqueueLocalizePaginationUtils {

        public static function render() {

           wp_localize_script('jquery', '__PAGINATION', array(

             'posts_per_page' => get_option('posts_per_page')

           ));

        }

    }