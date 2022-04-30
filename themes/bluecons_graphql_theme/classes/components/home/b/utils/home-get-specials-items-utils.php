<?php 
    namespace Home;
    use Taxonomies\TaxGetMetaTermsUtils;
    class HomeGetSpecialsItemsUtils {
        public static function get($post_type = 'post', $limit = 2) {
            $results = [];
            $args = [
                'post_type' => $post_type,
                'posts_per_page' => $limit,
                'meta_key' => 'priority',
                'orderby' => 'meta_value_num',
                'meta_type' => 'NUMERIC',
                'meta_query' => array(
                    array(
                        'key' => 'advanced_options',
                        'value' => 'show_on_homepage',
                        'compare' => 'LIKE'
                    )
                ),
                'order' => 'ASC',
                'no_paging' => true
            ];
            query_posts($args);
            while ( have_posts() ) : the_post();                
                $pid = get_the_id();
                $day = get_the_date("d");
                $month = get_the_date("m");
                $year = get_the_date("Y");
                $categories = TaxGetMetaTermsUtils::get(get_the_id(), CATEGORY_TAXONOMY);
                $results[] = [
                    HOME_FIELDS::ID_GQL_FIELD => $pid,
                    HOME_FIELDS::TITLE_GQL_FIELD => get_the_title(),
                    HOME_FIELDS::URL_GQL_FIELD => filter_permalink(get_the_permalink()),
                    HOME_FIELDS::THUMBNAIL_GQL_FIELD => get_the_post_thumbnail_url(get_the_id(), 'medium'),
                    HOME_FIELDS::DATE_CREATED_GQL_FIELD => [
                        [
                            HOME_FIELDS::DAY_GQL_FIELD => $day,
                            HOME_FIELDS::MONTH_GQL_FIELD => $month,
                            HOME_FIELDS::YEAR_GQL_FIELD => $year
                        ]
                    ],
                    HOME_FIELDS::CATEGORIES_GQL_FIELD => $categories
                ];
            endwhile;
            wp_reset_query();
            return $results;
        }
    }
