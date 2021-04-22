<?php 

    namespace Paginations;

    class PaginationPrintCustomLayoutUtils {

        public static function print( $class='' ) {

            if( is_singular() ) :
                return;
              endif;
          
              global $wp_query;
          
              /** Stop execution if there's only 1 page */    
              if( $wp_query->max_num_pages <= 1 ) :
                 return;
              endif;
          
              $paged_param = is_search() || is_product_category() ? $_GET['page'] : get_query_var('paged');
          
              $paged = $paged_param ? absint( $paged_param ) : 1;
              $max = intval( $wp_query->max_num_pages );
          
              /** Add current page to the array */
              if ( $paged >= 1 ) :
          
                $links[] = $paged;
          
              endif;
          
              /** Add the pages around the current page to the array */
                if ( $paged >= 3 ) :
          
                  $links[] = $paged - 1;
                  $links[] = $paged - 2;
          
                endif;
          
              if ( ( $paged + 2 ) <= $max ) :
          
                    $links[] = $paged + 2;
                    $links[] = $paged + 1;
          
              endif;
          
                  echo "<div class='$class'><ul class='pagination'>";
          
                  /** Previous Post Link */
                  if ( $paged > 1 ) :
          
                    printf( '<li><a href="%s">Précédent</a></li>', PaginationGetPageLinkUtils::get($paged - 1) );
          
                  endif;
          
                  /** Link to first page, plus ellipses if necessary */
                  if ( ! in_array( 1, $links ) ) :
          
                    $class = 1 == $paged ? ' class="active"' : '';
          
                    printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( PaginationGetPageLinkUtils::get( 1 ) ), '1' );
          
                    if ( ! in_array( 2, $links ) ) :
                      echo '<li class="page-dot">...</li>';
                    endif;
          
                  endif;
          
                  /** Link to current page, plus 2 pages in either direction if necessary */
                  sort( $links );
          
                  foreach ( (array) $links as $link ) :
          
                    $class = $paged == $link ? ' class="active"' : '';
                    printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( PaginationGetPageLinkUtils::get( $link ) ), $link );
          
                  endforeach;
          
                  /** Link to last page, plus ellipses if necessary */
                  if ( ! in_array( $max, $links ) ) :
          
                    if ( ! in_array( $max - 1, $links ) ) :
                      echo '<li class="page-dot">...</li>';
                    endif;
          
                    $class = $paged == $max ? ' class="active"' : '';
                    printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( PaginationGetPageLinkUtils::get( $max ) ), $max );
          
                  endif;
          
                  /** Next Post Link */
                  if ( $paged < $max) :
          
                    printf( '<li><a href="%s">Suivant</a></li>', PaginationGetPageLinkUtils::get($paged + 1) );
                    echo '</ul></div>';
          
                  endif;
            
        }

    }