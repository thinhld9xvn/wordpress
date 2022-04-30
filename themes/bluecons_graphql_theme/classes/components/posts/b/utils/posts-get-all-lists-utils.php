<?php 
    namespace Posts;
    use Taxonomies\TaxGetMetaTermsUtils;
    class PostsGetAllListsUtils {   
        public static function get($post_type = 'post', $tax = null, $term = null, $limit = -1, $slug = '', $s = '', $related = true) {
           $args = array(
               'post_type' => $post_type,
               'posts_per_page' => $limit,
               /*'meta_key' => 'priority',
                'orderby' => 'meta_value_num',
                'meta_type' => 'NUMERIC',*/
                'order' => 'ASC',
               'no_paging' => true
           );
           if ( !empty($tax) && !empty($term) ) :
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => $tax,
                        'field'    => 'slug',
                        'terms'    => $term,
                    )
                );
           endif;
           if (!empty($slug)) :
                $args['name'] = $slug;
           endif;
           if (!empty($s)) :
                $args['s'] = $s;
            endif;
           if ($related) :
                $post = get_page_by_path($slug, OBJECT, 'post');                
                $args['post__not_in'] = array($post->ID);
                $args['posts_per_page'] = $limit;
                if ( !empty($args['name']) ) :
                    unset($args['name']);
                endif;
            endif;
           $postsList = query_posts($args);
           $results = [];           
           while ( have_posts() ) : the_post();
                global $post;
                $title = get_the_title();
                if ( !empty($s) ) :
                    if ( FALSE === strpos(strtolower($title), strtolower($s)) ) continue;
                endif;
                $excerpt = excerpt(400);
                $content = get_the_content();
                $day = get_the_date("d");
                $month = get_the_date("m");
                $year = get_the_date("Y");
                $taxonomy = 'category';
                if ( $post_type !== 'post' ) :
                    $args=array(
                        'object_type' => array($post->post_type) 
                    ); 
                    $output = 'objects'; // or objects
                    $operator = 'and'; // 'and' or 'or'                
                    $taxonomies = get_taxonomies($args,$output,$operator);                
                    $taxonomy = array_keys($taxonomies)[0];             
                endif;   
                $categories = TaxGetMetaTermsUtils::get(get_the_id(), !empty($tax) ? $tax : $taxonomy);
                $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'large');
                $thumbnail = $thumbnail ? $thumbnail : '';                
                $r = [
                    POST_FIELDS::ID_GQL_FIELD => get_the_id(),
                    POST_FIELDS::URL_GQL_FIELD => filter_permalink(get_the_permalink()),
                    POST_FIELDS::SLUG_GQL_FIELD => $post->post_name,
                    POST_FIELDS::EXCERPT_GQL_FIELD => apply_filters('the_content', $excerpt),
                    POST_FIELDS::CONTENTS_GQL_FIELD => apply_filters('the_content', $content),
                    POST_FIELDS::TITLE_GQL_FIELD => htmlspecialchars_decode($title),
                    POST_FIELDS::TEXT_GQL_FIELD => htmlspecialchars_decode($title), 
                    POST_FIELDS::NAME_GQL_FIELD => htmlspecialchars_decode($title),                
                    POST_FIELDS::THUMBNAIL_GQL_FIELD => $thumbnail,          
                    POST_FIELDS::DATE_CREATED_GQL_FIELD => [
                        [
                            POST_FIELDS::DAY_GQL_FIELD => $day,
                            POST_FIELDS::MONTH_GQL_FIELD => $month,
                            POST_FIELDS::YEAR_GQL_FIELD => $year
                        ]
                    ],
                    POST_FIELDS::CATEGORIES_GQL_FIELD => $categories
                ];
                if ( $post->ID === 11883 ) :
                    $t = get_the_terms($post->ID, $taxonomy);
                endif;
                $results[] = $r;
            endwhile;
           wp_reset_query();
           return $results;
        }
    }