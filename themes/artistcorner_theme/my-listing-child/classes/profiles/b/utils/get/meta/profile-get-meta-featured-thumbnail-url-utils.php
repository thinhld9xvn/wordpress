<?php 

    namespace Profiles;

    class ProfileGetMetaFeaturedThumbnailUrlUtils {

        public static function get($post) {

            return get_the_post_thumbnail_url($post, 'post-thumbnail');


        }

    }