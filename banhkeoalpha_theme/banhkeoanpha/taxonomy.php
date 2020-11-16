<?php
    
    $taxonomy_slug = get_query_var('taxonomy');
    $taxonomy = get_taxonomy( $taxonomy_slug );

    $term = get_term_by( 'slug', get_query_var('term'), $taxonomy_slug );

    $post_type = $taxonomy->object_type[0];    
    $post_type_obj = get_post_type_object( $post_type );

    get_header(); ?>    

    <!-- main -->
    <section id="main">

        <?php dynamic_sidebar('Slider Sidebar');
              the_breadcrumbs( 'breadcumbs', 'container', 
                               'Trang chủ', '<span class="fa fa-angle-double-right"></span>' ); ?>             

        <!-- sanpham-section -->
        <div class="fullwidth-section sanpham-section mtop20">

            <!-- container -->
            <div class="container">

                <!-- sanphamColumnSection -->
                <div class="sanphamColumnSection ohidden">

                    <!-- spColLeft -->
                    <div class="spColLeft col-md-9 col-sm-8 col-xs-12">

                        <!-- sanphamTitle -->
                        <h2 class="mySectionHeadTitle sanphamTitle vcenter">
                            <div class="title">
                                <?php 
                                    $uconvert = new UConvert( $term->name, UConvert::UNICODE );
                                    echo $uconvert->transform( UConvert::VNI ); ?>
                            </div>
                            <div class="line">
                                <span class="headline lleft"></span>
                                <span class="licon fa fa-gg"></span>
                                <span class="headline lright"></span>
                            </div>
                        </h2>
                        <!-- #sanphamTitle -->  

                        <!-- sanphamDescription -->
                        <div class="sanphamDescription padtb20">
                            <?php echo term_description(); ?>
                        </div>  
                        <!-- #sanphamDescription -->

                         <?php 
                            $args = array(
                                'post_type' => $post_type,
                                'tax_query' => array(

                                        array(
                                            'taxonomy' => $taxonomy_slug,
                                            'field' => 'id',
                                            'terms' => array( $term->term_id )
                                        )

                                    ),
                                'paged' => $paged
                            );                            

                            query_posts( $args );  

                            if ( have_posts() ) : ?>         

                                <!-- sanphamBoxLists -->
                                <div class="sanphamBoxLists ohidden padbot20">

                                        <!-- split-columns -->
                                        <div class="split-columns three-columns-layout carouselProduct"
                                             data-navig="compactcontent" 
                                             data-multiple="false" 
                                             data-object=".itemCProd" 
                                             data-setcompact=".CProdTitle > a" 
                                             data-numCharOnIpad="50" 
                                             data-numCharOnMobile="30" 
                                             data-endShortContent="..." 
                                             data-delimiter-css-property="clear" 
                                             data-delimiter-css-value="both">

                                            <?php while ( have_posts() ) : the_post(); ?>

                                                <!-- item-layout -->
                                                <div class="item-layout itemCProd col-md-4 col-sm-6 col-xs-6">

                                                    <!-- itemCProdWrap -->
                                                    <div class="itemCProdWrap">

                                                        <!-- CProdThumb -->
                                                        <div class="CProdThumb CProdSPThumb">

                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php 
                                                                    the_post_thumbnail( 'feature-image-product', 

                                                                                         array(
                                                                                            'class' => 'fixed-vertical'
                                                                                         ) 

                                                                                       ); ?>
                                                            </a>

                                                        </div>
                                                        <!-- #CProdThumb -->

                                                    </div>
                                                    <!-- #itemCProdWrap -->

                                                    <!-- CProdTitle -->
                                                    <div class="CProdTitle mtop20">

                                                        <a href="<?php the_permalink(); ?>"
                                                            class="block" 
                                                            data-originalContent="<?php the_title(); ?>">
                                                            <?php echo title(100); ?>
                                                        </a>

                                                    </div>
                                                    <!-- #CProdTitle -->


                                                </div>
                                                <!-- #item-layout -->

                                            <?php endwhile; ?>                    

                                        </div>
                                        <!-- #split-columns -->                                

                                </div>
                                <!-- #sanphamBoxLists -->

                        <?php endif;                                
                              the_page_navigation(); 
                              wp_reset_query(); ?>

                    </div>
                    <!-- #spColLeft -->

                    <!-- spColRight -->
                    <div class="spColRight col-md-3 col-sm-4 col-xs-12 padleft20-ms mbot20">

                        <!-- widgBoxTitle -->
                        <h2 class="widgBoxTitle">
                            <a href="<?php echo get_post_type_archive_link( $post_type ); ?>">
                                <?php echo $post_type_obj->label ?>
                            </a>
                        </h2>
                        <!-- #widgBoxTitle -->

                        <!-- widgBoxContent -->
                        <div class="widgBoxContent">

                            <ul class="pboxlist --boxCat">

                                <?php 

                                    $args = array(
                                        'taxonomy' => $taxonomy_slug,
                                        'hide_empty' => false,
                                        'number' => 20                                      
                                    );

                                    $terms = get_terms( $args ); 

                                    foreach ( $terms as $t ) :?>

                                        <li>
                                            <a href="<?php echo get_term_link( $t ); ?>">
                                                <?php echo $t->name; ?>
                                            </a>
                                        </li>        

                                <?php endforeach; ?>                                          

                            </ul>

                        </div>
                        <!-- #widgBoxContent -->

                    </div>
                    <!-- #spColRight -->

                </div>
                <!-- #sanphamColumnSection -->

            </div>
            <!-- #container -->

        </div>  
        <!-- #intro-company --> 
        
    </section>
    <!-- #main -->

<?php get_footer(); ?>