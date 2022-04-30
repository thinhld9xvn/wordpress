<?php 

    namespace Clients;

    class ClientGetAllListsUtils {

        public static function get() {

            $args = array(

                'post_type' => CLIENTS_POST_TYPE,

                'order' => 'asc',

                'orderby' => 'id',

                'posts_per_page' => -1

            );

            query_posts($args);

            $data = [];

            while ( have_posts() ) : the_post();
            
                $id = get_the_id();

                $thumbnail = convertToWebpUri(get_the_post_thumbnail_url($id, 'full'));

                $item = [

                    'id' => 'client_' . $id

                ];

                if ( ! empty($thumbnail) ) :

                    $item['thumbnail'] = $thumbnail;

                endif;

               $data[] = $item;

               $id++;

            endwhile;

            wp_reset_query();

            return $data;

        }



    }