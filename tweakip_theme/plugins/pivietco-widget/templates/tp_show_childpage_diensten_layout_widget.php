<div id="<?php echo $p_id; ?>" 
     class="<?php echo $p_class; ?>"
     name="<?php echo "#$p_id"; ?>">

    <!-- container -->
    <div class="container">

        <!-- mainHomeSectionTitle -->
        <h2 class="mainHomeSectionTitle wow fadeIn"
            data-wow-duration="1s">
            <?php echo $title; ?>
        </h2>
        <!-- #mainHomeSectionTitle -->

        <!-- sectionContent -->
        <div class="sectionContent ohidden mtop60-ms mtop20-xs wow fadeIn"
             data-wow-duration="1s">

            <!-- four-columns-layout -->
            <div class="split-columns four-columns-layout">

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

                        $page_icon = get_post_meta( $c_page->ID, '_pt-field-diensten-item-icon', true );
                        $page_background = get_post_meta( $c_page->ID, '_pt-field-diensten-item-background', true );
                        $page_description = get_post_meta( $c_page->ID, '_pt-field-diensten-item-description', true );
                        $page_readmore = get_post_meta( $c_page->ID, '_pt-field-diensten-item-readmore', true );  ?>

                        <!-- item-diensten -->
                        <div class="item-layout item-diensten col-md-3 col-sm-6 col-xs-6">

                            <a class="padtb40-ms padtb20-xs" 
                               href="<?php echo get_page_link( $c_page ); ?>"
                               style="background-image: url('<?php echo $page_background; ?>') ">

                                <!-- content-box -->
                                <div class="content-box">

                                    <div class="diensten-icon" 
                                         style="background-image: url('<?php echo $page_icon; ?>') ">
                                    </div>

                                    <div class="caption mtop20">
                                        <?php echo $c_page->post_title; ?>
                                    </div>

                                </div>
                                <!-- #content-box -->

                                <!-- title-box -->
                                <div class="title-box mtop10">
                                    <?php echo $page_description; ?>
                                </div>
                                <!-- #title-box -->

                            </a>

                            <h3 class="dienstenBoxTitle mtop10">

                                <a href="<?php echo get_page_link( $c_page ); ?>">
                                     <?php echo $page_readmore; ?>
                                </a>

                            </h3>

                        </div>
                        <!-- #item-diensten --> 

                <?php endforeach; ?>            

            </div>                  
            <!-- #four-columns-layout -->

        </div>              
        <!-- #sectionContent -->

    </div>
    <!-- #container -->

</div>