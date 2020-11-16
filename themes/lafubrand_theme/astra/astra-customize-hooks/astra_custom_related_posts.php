<?php
    function __astra_push_related_post(&$arrLists, $posts_List, $index) {

        array_push($arrLists, $posts_List[$index]);
    
    }
      
    function astra_custom_related_posts() { 
      
        if ( is_single() ) : 
            
            global $post; 
            
            $categories = get_the_category();
            $parent_cat = $categories[0];
            
            $numShowPosts = 6; ?>


            <!-- postRelatedCat -->			
            <div class="postRelatedCat mtop20">

                <h4>
                    Bài viết liên quan
                </h4>

                <!-- catRelatedContent -->
                <div class="catRelatedContent mtop20">

                    <!-- two-columns-layout -->
                    <div class="split-columns three-columns-layout">

                        <?php 
                            global $wpdb;
                            
                            $tblPosts = "{$wpdb->prefix}posts";

                            $tblTermRelationships = "{$wpdb->prefix}term_relationships";

                            $tblTermTaxonomy = "{$wpdb->prefix}term_taxonomy";

                            $sql = "(SELECT {$tblPosts}.ID, {$tblPosts}.post_title, {$tblPosts}.post_date, {$tblPosts}.post_content, {$tblPosts}.post_excerpt, {$tblPosts}.post_name
                                        FROM {$tblPosts}
                                        LEFT JOIN {$tblTermRelationships} ON ({$tblPosts}.ID = {$tblTermRelationships}.object_id)
                                        LEFT JOIN $tblTermTaxonomy ON ({$tblTermRelationships}.term_taxonomy_id = $tblTermTaxonomy.term_taxonomy_id)
                                        WHERE $tblTermTaxonomy.term_id IN ({$parent_cat->term_id})  AND {$tblPosts}.ID <= {$post->ID} AND {$tblPosts}.post_status='publish' 
                                        ORDER BY {$tblPosts}.ID DESC
                                        LIMIT 7) UNION ALL
                                            
                                            (SELECT {$tblPosts}.ID, {$tblPosts}.post_title, {$tblPosts}.post_date, {$tblPosts}.post_content, {$tblPosts}.post_excerpt, {$tblPosts}.post_name
                                            FROM {$tblPosts}
                                            LEFT JOIN {$tblTermRelationships} ON ({$tblPosts}.ID = {$tblTermRelationships}.object_id)
                                            LEFT JOIN $tblTermTaxonomy ON ({$tblTermRelationships}.term_taxonomy_id = $tblTermTaxonomy.term_taxonomy_id)
                                            WHERE $tblTermTaxonomy.term_id IN ({$parent_cat->term_id})  AND {$tblPosts}.ID > {$post->ID}  AND {$tblPosts}.post_status='publish' 
                                            ORDER BY {$tblPosts}.ID
                                            LIMIT 6)                                
                            ";                                

                            $posts_List = $wpdb->get_results($sql);

                            //echo "<pre>"; print_r( $posts_List ); die();

                            if ( ! empty( $posts_List ) ) : 
                                
                                $arrLists = array();
                                $length = sizeof( $posts_List );

                                //echo $length; die();

                                //echo "<pre>";

                                //print_r( $posts_List ); die();

                                for( $i = 0; $i < $length; $i++) : 

                                    if ( intval( $posts_List[$i]->ID ) === intval( $post->ID ) ) :  
                                        
                                        //echo 'ok'; die();

                                        for ( $extra = 3; $extra > 0; $extra-- ) :

                                            if ( $i-$extra >= 0 ) :

                                                __astra_push_related_post($arrLists, $posts_List, $i-$extra);

                                            endif;

                                        endfor;

                                        $numAddedPosts = sizeof( $arrLists );
                                        $numNeedPosts = $numShowPosts - $numAddedPosts;

                                        for ( $extra = 1; $extra <= $numNeedPosts; $extra++ ) :

                                            if ( $i+$extra < $length ) :

                                                __astra_push_related_post($arrLists, $posts_List, $i+$extra);

                                            endif;

                                        endfor;
                                                                                

                                    endif;

                                endfor;

                                $length = sizeof( $arrLists );

                                for ( $i = 0; $i < $length; $i++ ) : 

                                    $category = get_the_category($arrLists[$i]->ID);
                                    $category = $category[0]; ?>

                                    <!-- article -->
                                    <div class="article item-object">

                                        <!-- thumb -->
                                        <div class="thumbnail tcenter ohidden">

                                            <a href="<?php echo get_the_permalink($arrLists[$i]->ID) ?>">

                                                <?php 
                                                    echo get_the_post_thumbnail($arrLists[$i]->ID, 'full');
                                                ?>
                                            </a>

                                            <a class="cat" href="<?= get_category_link($category) ?>">

                                                <span class="fa fa-tags"></span>

                                                <span>
                                                    <?php echo $category->name ?>
                                                </span>
                                                
                                            </a>

                                            <a class="readmore" 
                                               href="<?php echo get_the_permalink($arrLists[$i]->ID) ?>">

                                               <span>

                                                    Xem thêm 
                                                    <span class="fa fa-angle-double-right"></span>

                                                </span>


                                            </a>

                                        </div>
                                        <!-- #thumb -->

                                        <div class="title mtop10">

                                            <a class="default block uppercase" 
                                                href="<?php echo get_the_permalink($arrLists[$i]->ID) ?>">

                                                <strong>
                                                    <?php 
                                                        echo $arrLists[$i]->post_title; ?>
                                                </strong>

                                            </a>

                                        </div>			

                                        <div class="excerpt mtop10">

                                            <?php                
                                                echo apply_filters('the_excerpt', get_post_field('post_content', $arrLists[$i]->ID )) ?>

                                        </div>									

                                    </div>
                                    <!-- #article -->	

                        <?php   endfor;
                                wp_reset_query(); 

                            endif; ?>

                    </div>
                    <!-- #three-columns-layout -->

                </div>
                <!-- #catRelatedContent -->

            </div>
            <!-- #postRelatedCat -->

        <?php endif; }

    add_action( 'astra_entry_content_after', 'astra_custom_related_posts', 10 );