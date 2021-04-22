<?php 

    namespace MyCommercantsPage;

    class MyCommercantsLanguagesOptionsEnqueueUtils {

        public static function render() {

            wp_enqueue_style('unicorn-commercants-stylesheet', PAGE_COMMERCANTS_FRONTEND_DIR_URI . '/commercants.css');

            wp_enqueue_style('unicorn-fontawesome-style-css', get_template_directory_uri() . '/assets/css/font-awesome.css');        

           
        }

    }