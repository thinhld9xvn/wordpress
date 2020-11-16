<?php

    $category = get_category( get_query_var('cat') );

    get_header(); ?>    

    <!-- main -->
    <section id="main">

        <?php dynamic_sidebar('Slider Sidebar');
              the_breadcrumbs( 'breadcumbs', 'container', 
                               'Trang chủ', '<span class="fa fa-angle-double-right"></span>' ); ?>             

        <!-- category-section -->
        <div class="fullwidth-section category-section mtop20">

            <!-- container -->
            <div class="container">

                <!-- categoryColumnSection -->
                <div class="categoryColumnSection ohidden">

                    <!-- spColLeft -->
                    <div class="spColLeft col-md-9 col-sm-8 col-xs-12">

                        <!-- categoryTitle -->
                        <h2 class="mySectionHeadTitle categoryTitle vcenter">
                            <div class="title">
                                <?php 
                                    $uconvert = new UConvert( $category->name, UConvert::UNICODE );
                                    echo $uconvert->transform( UConvert::VNI ); ?>
                            </div>
                            <div class="line">
                                <span class="headline lleft"></span>
                                <span class="licon fa fa-gg"></span>
                                <span class="headline lright"></span>
                            </div>
                        </h2>
                        <!-- #categoryTitle -->                      

                         <?php 
                            $args = array(
                                'post_type' => 'post',
                                'category__in' => $category->term_id,                               
                                'paged' => $paged
                            );                            

                            query_posts( $args );  

                            if ( have_posts() ) : ?>         

                                <!-- categoryBoxLists -->
                                <div class="categoryBoxLists ohidden padbot20">

                                        <!-- split-columns -->
                                        <div class="split-columns two-columns-layout"
                                             data-navig="compactcontent" 
                                             data-multiple="true" 
                                             data-object=".itemCNews" 
                                             data-setcompact=".news-title > a, .news-excerpt" 
                                             data-numCharOnIpad="50, 50" 
                                             data-numCharOnMobile="30, 50" 
                                             data-endShortContent="..., ..." 
                                             data-delimiter-css-property="clear" 
                                             data-delimiter-css-value="both">

                                            <?php while ( have_posts() ) : the_post(); ?>

                                                <!-- item-layout -->
                                                <div class="item-layout itemCNews col-md-6 col-sm-6 col-xs-6">
                                                  
                                                    <!-- news-thumb -->
                                                    <div class="news-thumb tcenter ohidden">

                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php 
                                                                the_post_thumbnail( 'feature-image-news', 

                                                                                     array(
                                                                                        'class' => 'fixed-vertical'
                                                                                     ) 

                                                                                   ); ?>
                                                        </a>

                                                    </div>
                                                    <!-- #news-thumb -->

                                                    <!-- news-title -->
                                                    <h3 class="news-title mtop10">

                                                        <a href="<?php the_permalink(); ?>" 
                                                            class="block"
                                                            data-originalContent="<?php echo title(100) ?>">

                                                            <?php echo title(100); ?>

                                                        </a>

                                                    </h3>
                                                    <!-- #news-title -->   

                                                     <!-- news-excerpt -->
                                                    <div class="news-excerpt mtop10"
                                                         data-originalContent="<?php echo excerpt(200) ?>"> 

                                                        <?php echo excerpt(200); ?>

                                                    </div>
                                                    <!-- #news-excerpt -->   

                                                </div>       
                                                <!-- #item-layout -->                                     

                                            <?php endwhile; ?>                    

                                        </div>
                                        <!-- #split-columns -->                                

                                </div>
                                <!-- #categoryBoxLists -->

                        <?php endif;                                
                              the_page_navigation(); 
                              wp_reset_query(); ?>

                    </div>
                    <!-- #spColLeft -->

                    <!-- spColRight -->
                    <div class="spColRight col-md-3 col-sm-4 col-xs-12 padleft20-ms mbot20">

                        <!-- widgBoxTitle -->
                        <h2 class="widgBoxTitle">
                            <a href="<?php echo get_category_link( get_query_var('cat') ); ?>">
                                <?php echo $category->name; ?>
                            </a>
                        </h2>
                        <!-- #widgBoxTitle -->

                        <!-- widgBoxContent -->
                        <div class="widgBoxContent">

                            <ul class="pboxlist --boxCat">

                                <?php 

                                    $args = array(
                                        'post_type' => 'post',
                                        'category__in' => $category->term_id,
                                        'posts_per_page' => 5
                                    );                            

                                    query_posts( $args );                                   

                                    while ( have_posts() ) : the_post(); ?>

                                        <li>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </li>        

                                <?php endwhile;
                                      wp_reset_query(); ?>                                          

                            </ul>

                        </div>
                        <!-- #widgBoxContent -->

                    </div>
                    <!-- #spColRight -->

                </div>
                <!-- #categoryColumnSection -->

            </div>
            <!-- #container -->

        </div>  
        <!-- #intro-company --> 
        
    </section>
    <!-- #main -->

<?php get_footer(); ?>