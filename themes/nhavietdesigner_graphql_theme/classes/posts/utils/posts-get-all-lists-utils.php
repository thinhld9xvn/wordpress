<?php 

    namespace Posts;

    use \YoastSeo\YoastSeoGetPostSeoUtils;
    use \Theme_Options\ThemeOptionGetImagePostUtils;

    class PostsGetAllListsUtils {   

        public static function get() {

            $args = array(
                'post_type' => 'post',          
                'posts_per_page' => -1
            );
 
            query_posts($args);
            
            $results = [];

            $default_banner = ThemeOptionGetImagePostUtils::get();
 
            while ( have_posts() ) : the_post();
 
                 global $post;
 
                 $seo = YoastSeoGetPostSeoUtils::get($post);
 
                 $title = get_the_title();
 
                 $excerpt = get_the_excerpt();
                 $content = get_the_content();
 
                 $day = get_the_date("d");
                 $month = get_the_date("m");
                 $year = get_the_date("Y");
 
                 $categories = get_the_category(get_the_id());
                 $categories = array_map(function($cat) {
 
                     $name = htmlspecialchars_decode( $cat->name );
                     $url = filter_permalink(get_category_link($cat));
 
                     return [
                         'id' => $cat->term_id,
                         'slug' => $url,
                         'url' => $url,
                         'title' => $name,
                         'name' => $name,
                         'text' => $name
                     ];
 
                 }, $categories);
 
                 $results[] = array(
 
                     'id' => 'post_' . get_the_id(),
                     'url' => filter_permalink(get_the_permalink()),
                     'excerpt' => apply_filters('the_content', $excerpt),                     
                     'contents' => apply_filters('the_content', $content),
                     'title' => htmlspecialchars_decode($title),
                     'text' => htmlspecialchars_decode($title),
                     'categories' => $categories, 
                     'thumbnail' => convertToWebpUri(get_the_post_thumbnail_url(get_the_id(), 'medium')),  
                     'banner' => convertToWebpUri(get_the_post_thumbnail_url(get_the_id(), 'full')),                 
                     'date_created' => [
                         'day' => $day,
                         'month' => $month,
                         'year' => $year
                     ],
                     'extras' => [
                         'default_banner' => $default_banner,
                         'seo' => $seo
                     ]
 
                 );
 
             endwhile;
 
            wp_reset_query();
 
            return $results;

        }

    }