<?php 

    namespace Pages;

    use \YoastSeo\YoastSeoGetPageSeoUtils;
    use \Theme_Options\ThemeOptionGetImageCatUtils;

    class PagesGetAllListsUtils {   

        public static function get() {

           $args = array(
               'post_type' => 'page',               
               'posts_per_page' => -1
           );

           query_posts($args);

           $results = [];

           $default_banner = ThemeOptionGetImageCatUtils::get();

           while ( have_posts() ) : the_post();

                global $post;

                $id = get_the_id();

                $title = get_the_title();
                $content = get_the_content();

                $day = get_the_date("d");
                $month = get_the_date("m");
                $year = get_the_date("Y");

                $seo = YoastSeoGetPageSeoUtils::get($post);

                $result = array(

                    'id' => 'post_' . $id,
                    'url' => filter_permalink(get_the_permalink()), 
                    'title' => htmlspecialchars_decode($title),
                    'text' => htmlspecialchars_decode($title),      
                    'contents' => apply_filters('the_content', $content), 
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

                $results[] = $result;

            endwhile;

           wp_reset_query();

           return $results;

        }

    }