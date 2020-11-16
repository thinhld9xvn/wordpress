<?php 
     function astra_add_subject_information_post() { 

        global $post;
 
        $prevPost = null;
        $nextPost = null;
 
        $key = '_astra_subject_tags_list';
 
         $posttags = json_decode( get_post_meta($post->ID, $key, true), true );
 
         //print_r($posttags);
 
         if ( ! empty( $posttags ) ) :
 
             $posttag = $posttags[0];

             //echo get_post_meta($post->ID, $key, true);
             
             $args = array(
 
                 'order' => 'desc',
                 'orderby' => 'date',
                 'meta_key' => $key,
                 'meta_value' => '"value":"' . $posttag['value'] . '"',
                 'meta_compare' => 'LIKE'
 
             );
 
             $postsList = query_posts( $args );
 
             $length = sizeof( $postsList );            
 
             for ( $i = 0; $i < $length; $i++ ) :
 
                 if ( $postsList[$i]->ID === $post->ID ) :
 
                     if ( $i - 1 >=0 ) :
 
                         $prevPost = $postsList[$i-1];
 
                     endif;
 
                     if ( $i + 1 < $length ) :
 
                         $nextPost = $postsList[$i+1];
 
                     endif;
 
                 endif;
 
             endfor;
             
             ?>
 
             <div class="meta-subject">
 
                 <div class="meta-heading">
                     <span class="meta-label"><strong>Cùng chủ đề:</strong></span> 
                     <span class="meta-name">
                         <a href="<?= get_tag_link($posttag['id']) ?>"><?= $posttag['value'] ?></a>
                     </span>
                 </div>
 
                 <ul>
                     <?php if ( $prevPost !== null ) : ?>
                         <li>
                             <a href="<?php get_the_permalink($prevPost) ?>"><?= get_the_title($prevPost) ?></a>
                         </li>
                     <?php endif; ?>
 
                     <?php if ( $nextPost !== null ) : ?>
                         <li>
                             <a href="<?php get_the_permalink($nextPost) ?>"><?= get_the_title($nextPost) ?></a>
                         </li>
                     <?php endif; ?>
                 </ul>
 
             </div>       
 
 
     <?php 
         endif;
     
         wp_reset_query();
     }
 
   add_action( 'astra_single_header_after', 'astra_add_subject_information_post', 5 );