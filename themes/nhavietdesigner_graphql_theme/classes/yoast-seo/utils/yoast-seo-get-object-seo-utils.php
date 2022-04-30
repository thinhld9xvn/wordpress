<?php 

    namespace YoastSeo;   

    class YoastSeoGetObjectSeoUtils {

      const YOAST_SEO_TITLE_META = '_yoast_wpseo_title';

      const YOAST_SEO_META_DESCRIPTION_META = '_yoast_wpseo_metadesc';
  
      const YOAST_SEO_OPENGRAPH_TITLE_META = '_yoast_wpseo_opengraph-title';
  
      const YOAST_SEO_OPENGRAPH_DESCRIPTION_META = '_yoast_wpseo_opengraph-description';        
  
      const YOAST_SEO_OPENGRAPH_IMAGE_ID_META = '_yoast_wpseo_opengraph-image-id';
  
      const YOAST_SEO_OPENGRAPH_IMAGE_META = '_yoast_wpseo_opengraph-image';
  
      const YOAST_SEO_TWITTER_TITLE_META = '_yoast_wpseo_twitter-title';
  
      const YOAST_SEO_TWITTER_DESCRIPTION_META = '_yoast_wpseo_twitter-description';
  
      const YOAST_SEO_TWITTER_IMAGE_ID_META = '_yoast_wpseo_twitter-image-id';
  
      const YOAST_SEO_TWITTER_IMAGE_META = '_yoast_wpseo_twitter-image';

      public static function get($post, $type = 'article') {

          $name = htmlspecialchars_decode($post->post_title);

          $id = $post->ID;

          $arrInfos = [

              'title' => $name,

              'description' => '',            

              'og:title' => $name,

              'og:description' => '',

              'og:image' => '',

              'og:locale' => 'vi',

              'og:type' => $type,

              'twitter:title' => $name,

              'twitter:description' => '',

              'twitter:image' => ''

          ];

          $yoastseo_title = get_post_meta( $id, self::YOAST_SEO_TITLE_META, true );

          $yoastseo_description = get_post_meta( $id, self::YOAST_SEO_META_DESCRIPTION_META, true );

          $yoastseo_og_title = get_post_meta( $id, self::YOAST_SEO_OPENGRAPH_TITLE_META, true );

          $yoastseo_og_description = get_post_meta( $id, self::YOAST_SEO_OPENGRAPH_DESCRIPTION_META, true );

          $yoastseo_og_image = get_post_meta( $id, self::YOAST_SEO_OPENGRAPH_IMAGE_META, true );

          $yoastseo_twitter_title = get_post_meta( $id, self::YOAST_SEO_TWITTER_TITLE_META, true );

          $yoastseo_twitter_description = get_post_meta( $id, self::YOAST_SEO_TWITTER_DESCRIPTION_META, true );

          $yoastseo_twitter_image = get_post_meta( $id, self::YOAST_SEO_TWITTER_IMAGE_META, true );  

          if ( $yoastseo_title ) :

              $arrInfos['title'] = htmlspecialchars_decode($yoastseo_title);

          endif;

          if ( $yoastseo_description ) :

              $arrInfos['description'] = $yoastseo_description;

          endif;

          if ( $yoastseo_og_title ) :

              $arrInfos['og:title'] = htmlspecialchars_decode($yoastseo_og_title);

          endif;

          if ( $yoastseo_og_description ) :

              $arrInfos['og:description'] = $yoastseo_og_description;

          endif;

          if ( $yoastseo_og_image ) :

              $arrInfos['og:image'] = $yoastseo_og_image;

          endif;

          if ( $yoastseo_twitter_title ) :

              $arrInfos['twitter:image'] = htmlspecialchars_decode($yoastseo_twitter_title);

          endif;

          if ( $yoastseo_twitter_description ) :

              $arrInfos['twitter:description'] = $yoastseo_twitter_description;

          endif;

          if ( $yoastseo_twitter_image ) :

              $arrInfos['twitter:image'] = $yoastseo_twitter_image;

          endif;

          return $arrInfos;

      }

    }