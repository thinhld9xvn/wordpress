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
                        'id' => 'category_' . $cat->term_id,
                        'slug' => $url,
                        'url' => $url,
                        'title' => $name,                       
                        'text' => $name
                    ];

                }, $categories);
                
                $featured_image = [];

                $featured_image_full = get_the_post_thumbnail_url(get_the_id(), 'full');
                
                $featured_image_210x250 = get_the_post_thumbnail_url(get_the_id(), 
                                                                        \Attachment\ATTACHMENT_SPECIFICS::ARTICLE_210x250_FEATURED_IMAGE);
                
                $featured_image_thumbnail = get_the_post_thumbnail_url(get_the_id(), 'thumbnail');

                if ( ! empty($featured_image_full) ) :

                    $featured_image['full'] = $featured_image_full;

                endif;

                if ( ! empty($featured_image_210x250) ) :

                    $featured_image['210x250'] = $featured_image_210x250;

                endif;

                if ( ! empty($featured_image_thumbnail) ) :

                    $featured_image['thumbnail'] = $featured_image_thumbnail;

                endif;                

                $result = array(

                    'id' => 'post_' . get_the_id(),
                    'url' => filter_permalink(get_the_permalink()),
                    'excerpt' => apply_filters('the_content', $excerpt),
                    'contents' => apply_filters('the_content', $content),
                    'title' => htmlspecialchars_decode($title),
                    'text' => htmlspecialchars_decode($title),
                    'categories' => $categories,                       
                    'datecreated' => [
                        'day' => $day,
                        'month' => $month,
                        'year' => $year
                    ]

                );

                if ( ! empty( $featured_image ) ) :

                    $result['featured_image'] = $featured_image;

                endif;

                if ( ! empty( $featured_image_210x250 ) ) :

                    $result['thumbnail'] = $featured_image_210x250;

                endif;

                $results[] = $result;

            endwhile;

           wp_reset_query();

           return $results;

        }

    }