<?php 

    namespace Posts;
use Taxonomies\TaxGetMetaTermsUtils;

use function SIRSC\Helper\debug;

class PostsGetAllListsUtils {   

        public static function get($lang = DEFAULT_LANG, $slug = '', $related = true) {

           $args = array(
               'post_type' => 'post',               
               'posts_per_page' => -1,
               'no_paging' => true,
               'lang' => $lang
           );

           if (!empty($slug)) :
                $args['name'] = $slug;
           endif;

           if ($related) :
                $post = get_page_by_path($slug, OBJECT, 'post');                
                $args['post__not_in'] = array($post->ID);
                $args['posts_per_page'] = 4;

                if ( !empty($args['name']) ) :
                    unset($args['name']);
                endif;

            endif;

           query_posts($args);

           $results = [];

           while ( have_posts() ) : the_post();

                $title = get_the_title();

                $excerpt = excerpt(400);
                $content = get_the_content();

                $day = get_the_date("d");
                $month = get_the_date("m");
                $year = get_the_date("Y");

                $categories = TaxGetMetaTermsUtils::get(get_the_id(), CATEGORY_TAXONOMY);

                $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'feature_image_project_thumbnail');
                $thumbnail = $thumbnail ? $thumbnail : '';

                $polylang_post = filter_permalink(get_the_permalink(pll_get_post(get_the_id(), $lang === DEFAULT_LANG ? 'en' : DEFAULT_LANG)));

                $results[] = [

                    POST_FIELDS::ID_GQL_FIELD => get_the_id(),
                    POST_FIELDS::URL_GQL_FIELD => filter_permalink(get_the_permalink()),
                    POST_FIELDS::EXCERPT_GQL_FIELD => apply_filters('the_content', $excerpt),
                    POST_FIELDS::CONTENTS_GQL_FIELD => apply_filters('the_content', $content),
                    POST_FIELDS::TITLE_GQL_FIELD => htmlspecialchars_decode($title),
                    POST_FIELDS::TEXT_GQL_FIELD => htmlspecialchars_decode($title), 
                    POST_FIELDS::NAME_GQL_FIELD => htmlspecialchars_decode($title),                
                    POST_FIELDS::THUMBNAIL_GQL_FIELD => $thumbnail,   
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