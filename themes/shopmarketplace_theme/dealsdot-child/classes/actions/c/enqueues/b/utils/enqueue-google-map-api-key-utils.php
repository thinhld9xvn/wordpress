<?php 

    namespace Actions\Enqueues;

    class EnqueueGoogleMapApiKeyUtils {

        public static function render() {

           wp_localize_script('jquery', 'gmap_api_key', GMAP_API_KEY);

        }

    }