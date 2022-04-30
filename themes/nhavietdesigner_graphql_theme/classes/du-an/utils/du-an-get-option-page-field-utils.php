<?php 
    namespace DUANPAGE;
    use DuAnPage\DUAN_FIELDS;
    class DUGetOptionPageFieldUtils {
        private static function get_background($value) {            
            return [
                'title' => $value['title'],
                'url' => $value['url'],
                'icon' => $value['icon'],
                'width' => $value['width'],
                'height' => $value['height'],
                'sizes' => $value['sizes'],
            ];
        }
        public static function get_page_option($pid) {
            $banners_list = \get_field(DUAN_FIELDS::PAGE_BANNER_SLIDER_FIELD, $pid);
            $data_banners_list = [];
            foreach ($banners_list as $key => $banner) :
                if ( ! empty($banner[DUAN_FIELDS::IMAGE_FIELD]) ) :
                    $data_banners_list[] =self::get_background($banner[DUAN_FIELDS::IMAGE_FIELD]);
                endif;
            endforeach;
            return [
                'banners_list' => $data_banners_list,
                'title' => \get_field(DUAN_FIELDS::PAGE_TITLE_FIELD, $pid),
                'description' => \get_field(DUAN_FIELDS::PAGE_DESCRIPTION_FIELD, $pid)
            ];
        }
        public static function get() {
            $options = [];
            $data = \get_field(DUAN_FIELDS::OPTION_PAGE_FIELD, DUAN_PID);
            foreach( $data as $key => $value ) :
                $url = $value[DUAN_FIELDS::LINK_FIELD];
                $post = get_page_by_path( $url, OBJECT, 'page' );
                $extra = self::get_page_option($post->ID);
                $options[] = [
                    'title' => $value[DUAN_FIELDS::NAME_FIELD],
                    'description' => $value[DUAN_FIELDS::DESCRIPTION_FIELD],
                    'url' => $url,
                    'extras' => $extra,
                    'background' => self::get_background($value[DUAN_FIELDS::BACKGROUND_FIELD])
                ];
            endforeach;
            return $options;
        }
    }
