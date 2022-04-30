<?php 

    namespace Posts;

    class PostsGetAllListsUtils {   

        public static function get() {

           $args = array(
               'post_type' => 'post',               
               'posts_per_page' => -1,
               'no_paging' => true
           );

           query_posts($args);

           $results = [];

           while ( have_posts() ) : the_post();

                $title = get_the_title();

                $excerpt = excerpt(400);
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
                    'thumbnail' => convertToWebpUri(get_the_post_thumbnail_url(get_the_id(), 'full')),                 
                    'date_created' => [
                        'day' => $day,
                        'month' => $month,
                        'year' => $year
                    ]

                );

            endwhile;

           wp_reset_query();

           return $results;

        }

    }