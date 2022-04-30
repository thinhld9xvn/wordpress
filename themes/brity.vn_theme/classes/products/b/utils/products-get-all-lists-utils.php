<?php

    namespace Products;

    class ProductsGetAllListsUtils {

        public static function get() {

            $args = array(

                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true

            );

            query_posts($args);

            $results = [];            

            while ( have_posts() ) : the_post();

                global $product, $post;            

                $product_attrs = [];
                $product_terms = [];

                $name = $product->get_name();
                $permalink = filter_permalink($product->get_permalink());
                $old_price = $product->regular_price;
                $sale_price = $product->sale_price;
                $short_description = $product->short_description;
                $description = $product->description;
                $galleries_id = $product->get_gallery_image_ids();
                $attributes = $product->get_attributes();
                $categories_ids = $product->get_category_ids();
                $galleries = [];
                $featured_image = [
                    'full' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(),'full')),
                    '210x250' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_210x250_FEATURED_IMAGE)),
                    '670x800' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_670x800_FEATURED_IMAGE)),
                    'thumbnail' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(),'thumbnail'))
                ];

                foreach( $galleries_id as $key => $id ) :

                    $gallery = [];

                    $gallery['full'] = convertToWebpUri(wp_get_attachment_image_url($id, 'full'));
                    $gallery['210x250'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_210x250_FEATURED_IMAGE));
                    $gallery['670x800'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_670x800_FEATURED_IMAGE));
                    $gallery['268x319'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_268x319_FEATURED_IMAGE));
                    $gallery['70x88'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_70x88_FEATURED_IMAGE));
                    $gallery['thumbnail'] = convertToWebpUri(wp_get_attachment_image_url($id, 'thumbnail'));

                    $galleries[$id] = $gallery;

                endforeach;

                foreach ( $attributes as $key => $attr ) :                   

                    //echo $product->get_attribute( 'kich-thuoc' ); die();

                    $product_attrs['sizes'] = array_map('trim',explode(',', $product->get_attribute( 'kich-thuoc' )));
                    //$product_attrs['brands'] = array_map('trim',explode(',', $product->get_attribute( 'thuong-hieu' )));
                    $product_attrs['colors'] = array_map('trim',explode(',', $product->get_attribute( 'mau-sac' )));

                    $product_attrs['sizes'] = array_map(function($size) {

                        $term = get_term_by('name', $size, PA_KICHTHUOC_TAXONOMY);
                        
                        return $term->slug;


                    }, $product_attrs['sizes']);

                    /*$product_attrs['brands'] = array_map(function($brand) {

                        $term = get_term_by('name', $brand, PA_THUONGHIEU_TAXONOMY);
                        
                        return $term->slug;


                    }, $product_attrs['brands']);*/

                    $product_attrs['colors'] = array_map(function($color) {

                        $term = get_term_by('name', $color, PA_MAUSAC_TAXONOMY);
                        
                        return $term->slug;


                    }, $product_attrs['colors']);

                endforeach;

                foreach ( $categories_ids as $key => $id ) :

                    $term = get_term_by('id', $id, PRODUCTS_TAXONOMY);

                    $product_terms[] = [
                        "id" => $term->term_id,
                        "name" => $term->name,
                        "title" => $term->name,
                        "text" => $term->name,
                        "url" => filter_permalink(get_term_link($term))
                    ];

                endforeach;

                $results[] = [
                    'id' => 'product_' . $product->get_id(),
                    'name' => $name,
                    'title' => $name,
                    'text' => $name,
                    'url' => $permalink,
                    'old_price' => $old_price,
                    'sale_price' => $sale_price,
                    'format' => [
                        'old_price' => number_format($old_price, 0, ',', '.') . ' vnđ',
                        'sale_price' => number_format($sale_price, 0, ',', '.') . ' vnđ'
                    ],
                    'image_src' => $featured_image['670x800'],
                    'short_description' => apply_filters('the_content', $short_description),
                    'description' => apply_filters('the_content', $description),
                    'featured_image' => $featured_image,                    
                    'thumbnails' => $galleries,
                    'attributes' => $product_attrs,
                    'terms' => $product_terms
                ];

            endwhile;

            wp_reset_query();

            return $results;

        }

    }