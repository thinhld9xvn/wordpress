<?php 
    namespace Posts;
use Taxonomies\TaxGetMetaTermsUtils;
class PostsGetAllListsUtils {   
        public static function get($lang = DEFAULT_LANG, $limit = -1, $slug = '', $related = true) {
           $args = array(
               'post_type' => 'post',               
               'posts_per_page' => $limit,
               'no_paging' => true,
               'lang' => $lang
           );
           if (!empty($slug)) :
                $args['name'] = $slug;
           endif;
           if ($related) :
                $post = get_page_by_path($slug, OBJECT, 'post');                
                $args['post__not_in'] = array($post->ID);
                $args['posts_per_page'] = $limit;
                if ( !empty($args['name']) ) :
                    unset($args['name']);
                endif;
            endif;
           query_posts($args);
           $results = [];
           while ( have_posts() ) : the_post();
                global $post;       
                $id = get_the_id();    
                $title = get_the_title();
                $excerpt = excerpt(400);
                $content = get_the_content();
                $day = get_the_date("d");
                $month = get_the_date("m");
                $year = get_the_date("Y");
                $categories = TaxGetMetaTermsUtils::get(get_the_id(), CATEGORY_TAXONOMY);
                $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'medium');
                $banner_id = get_post_meta(get_the_id(), 'anh_banner', true);
                $banner_image = $banner_id ? wp_get_attachment_image_url($banner_id, 'featured_bg_banner') : '';
                $thumbnail = $thumbnail ? $thumbnail : '';
                $pll_id = pll_get_post(get_the_id(), $lang === DEFAULT_LANG ? 'en' : DEFAULT_LANG);
                $polylang_post = !empty($pll_id) && $pll_id !== $id ? filter_permalink(get_the_permalink($pll_id)) : '';
                $results[] = [
                    POST_FIELDS::ID_GQL_FIELD => get_the_id(),
                    POST_FIELDS::URL_GQL_FIELD => filter_permalink(get_the_permalink()),
                    POST_FIELDS::SLUG_GQL_FIELD => $post->post_name,
                    POST_FIELDS::EXCERPT_GQL_FIELD => apply_filters('the_content', $excerpt),
                    POST_FIELDS::CONTENTS_GQL_FIELD => apply_filters('the_content', $content),
                    POST_FIELDS::TITLE_GQL_FIELD => htmlspecialchars_decode($title),
                    POST_FIELDS::TEXT_GQL_FIELD => htmlspecialchars_decode($title), 
                    POST_FIELDS::NAME_GQL_FIELD => htmlspecialchars_decode($title),                
                    POST_FIELDS::THUMBNAIL_GQL_FIELD => $thumbnail,   
                    POST_FIELDS::BANNER_IMAGE_GQL_FIELD => $banner_image,
                    POST_FIELDS::POLYLANG_POST_GQL_FIELD => $polylang_post,                 
                    POST_FIELDS::DATE_CREATED_GQL_FIELD => [
                        [
                            POST_FIELDS::DAY_GQL_FIELD => $day,
                            POST_FIELDS::MONTH_GQL_FIELD => $month,
                            POST_FIELDS::YEAR_GQL_FIELD => $year
                        ]
                    ],
                    POST_FIELDS::CATEGORIES_GQL_FIELD => $categories
                ];
            endwhile;
           wp_reset_query();
           return $results;
        }
    }