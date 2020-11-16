<div id="<?php echo $p_id; ?>" 
     class="<?php echo $p_class; ?>"
     name="<?php echo "#$p_id"; ?>">

    <!-- container -->
    <div class="container"> 

        <?php 
            $my_wp_query = new WP_Query();
            $all_wp_pages = $my_wp_query->query( 

                                array(
                                    'post_type' => 'page',
                                    'order' => 'asc',
                                    'orderby' => 'date'
                                ) 

                            );

            $pages_children = get_page_children( $page_id, $all_wp_pages ); 

            foreach( $pages_children as $c_page ) : 

                $page_description = get_post_meta( $c_page->ID, '_pt-field-portfolio-case-description', true ); ?>

                <!-- onze-item-working -->
                <div class="onze-item-working col-md-4 col-sm-6 col-xs-6">

                    <!-- item-thumb -->
                    <div class="item-thumb">
                        <?php echo get_the_post_thumbnail( $c_page->ID, 
                                                           'feature-image-case-thumbnail',                                                            
                                                           array( 'class' => 'mwidth-none' ) ); ?>
                    </div>
                    <!-- #item-thumb -->

                    <!-- overlay -->
                    <a class="overlay" 
                       href="<?php echo get_page_link( $c_page ); ?>">

                        <!-- overlay-wrap -->
                        <div class="overlay-wrap hidden-xs">

                            <!-- overlay-title -->
                            <h2 class="overlay-title">
                                <?php echo $c_page->post_title; ?>
                            </h2>
                            <!-- #overlay-title -->

                            <!-- overlay-desc -->
                            <div class="smallDesc overlay-desc mtop10">
                                <?php echo $page_description; ?>
                            </div>
                            <!-- #overlay-desc -->

                        </div>
                        <!-- #overlay-wrap -->

                    </a>
                    <!-- #overlay -->

                </div>
                <!-- #onze-item-working -->

        <?php endforeach; ?>

    </div>
    <!-- #container -->

</div>