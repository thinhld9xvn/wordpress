<?php 

    namespace Slider;

    class SliderGetMetaGalleriesFieldUtils {

        public static function get($pid) {

          $data = [];

          $galleries = get_post_meta($pid, SLIDER_FIELDS::GALLERIES_FIELD, true);

          foreach ( $galleries as $key => $gallery ) :

              $url = $gallery['thumbnail'];

              if ( ! empty($url) ) :

                $data[] = $url;

              endif;

          endforeach;

          return $data;

        }

    }