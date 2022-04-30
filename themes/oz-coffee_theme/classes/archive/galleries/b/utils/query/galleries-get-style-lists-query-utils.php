<?php 

    namespace Archive\Galleries\PageLayout;

    use \Archive\Galleries\GALLERIES_FIELDS;
    use Archive\Galleries\GalleriesGetMetaGalleriesListFieldUtils;

    class GalleriesGetStyleListsQueryUtils {

        public static function get($data) { 

            $galleries_list = array();
         
            $post_type = \Archive\Galleries\GalleriesGetPostTypeUtils::get();
            //$posts_per_page = \Archive\Galleries\GalleriesGetPostsPerPageUtils::get();
            
            $style_slug = $_GET['style']; 
            $tax_slug = $_GET['slug'];
            $author = $data['author'];
            
            $args = array(

                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => -1,
                'tax_query' => array(

                    array(
                        array(
                            'taxonomy' => GALLERIES_FIELDS::GALLERIES_TAXONOMY,
                            'field'    => 'slug',
                            'terms'    => $style_slug,
                        ),
                        array(
                            'taxonomy' => GALLERIES_FIELDS::GALLERIES_TAXONOMY,
                            'field'    => 'slug',
                            'terms'    => $tax_slug
                        ),    
                        array(
                            'taxonomy' => GALLERIES_FIELDS::GALLERIES_TAXONOMY,
                            'field'    => 'slug',
                            'terms'    => $author
                        ),  
                    )
                ),
                'no_paging' => true                
                
            );                     
                
            $results = query_posts($args);
            
            wp_reset_query();

            if ( $results ) :

                $post = $results[0];

                $galleries_list = GalleriesGetMetaGalleriesListFieldUtils::get($post->ID);

            endif;
            

            return $galleries_list;

        }        

    }