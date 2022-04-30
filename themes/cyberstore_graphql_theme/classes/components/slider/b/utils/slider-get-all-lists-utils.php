<?php 

    namespace Slider;

    class SliderGetAllListsUtils {

        public static function get() {

            $args = array(

                'post_type' => SLIDERS_POST_TYPE,
                'posts_per_page' => -1                

            );

            query_posts($args);

            $data = [];

            $id = 0;

            while ( have_posts() ) : the_post();

               $data[] = [
                   'id' => 'slider' . $id,
                   'image' => convertToWebpUri(get_the_post_thumbnail_url(get_the_id(), \Attachment\ATTACHMENT_SPECIFICS::SLIDER_FEATURE_IMAGE)),
                   'heading' => SliderGetMetaHeadingFieldUtils::get(get_the_id()),
                   'subText' => SliderGetMetaSubTextFieldUtils::get(get_the_id()),
                   'buttonUrl' => SliderGetMetaButtonUrlFieldUtils::get(get_the_id()),
                   'buttonText' => SliderGetMetaButtonTextFieldUtils::get(get_the_id()),
                   
               ];

               $id++;

            endwhile;

            wp_reset_query();

            return $data;

        }

    }