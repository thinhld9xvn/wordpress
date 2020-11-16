<?php get_header(); ?>
    
    <!-- main -->
    <section id="main">

        <!-- container -->
        <div class="container">

            <!-- mainColLeft -->
            <div class="mainColLeft col-md-3 col-sm-4 col-xs-12">

                <?php dynamic_sidebar( 'ColLeft Sidebar' ); ?>

            </div>
            <!-- #mainColLeft -->

            <!-- mainColRight -->
            <div class="mainColRight col-md-9 col-sm-8 col-xs-12 mtop20-xs">

               <!-- menu -->
                <div id="menu" class="lapmenu padleft20 shown-lap">

                    <?php                             
                        $args = array(
                            'theme_location' => 'primary'
                        );
                    
                        wp_nav_menu( $args ); ?>

                </div>
                <!-- #menu -->

                <!-- m-menu -->
                <div class="lapmenu m-menu shown-mb cushidden-xs">                                  

                    <div class="m-menuicon tcenter">
                        <span class="fa fa-navicon"></span>
                        Main Menu
                    </div>

                    <?php                             
                        $args = array(
                            'theme_location' => 'primary',                                  
                            'menu_class' => 'm-mainmenu'
                        );
                    
                        wp_nav_menu( $args ); ?>

                </div>
                <!-- #m-menu -->


                <!-- mColumnContent -->
                <div class="mColumnContent padleft20-ms">

                    <?php dynamic_sidebar( 'Slider Sidebar' ); ?>

                    <!-- boxCatListItems -->
                    <div class="boxCatListItems mtop20">

                        <!-- widgTitleBox -->
                        <h3 class="widgTitleBox" data-navig="compactWidgTitleBox">
                            <span><?php echo single_cat_title(); ?></span>
                        </h3>
                        <!-- #widgTitleBox -->

                        <?php 
                            $args = array(
                                'post_type' => 'post',
                                'category__id' => get_query_var('cat'),
                                'order' => 'desc',
                                'orderby' => 'id',
                                'paged' => $paged
                            );

                            query_posts( $args ); ?>

                        <!-- boxShowCatProdWidg -->
                        <div class="boxShowCatProdWidg">

                            <?php if ( have_posts() ) :?>

                                <ul class="pboxlist --boxShowCatProd --boxShowCatNews" 
                                    data-navig="compactcontent" data-multiple="true" 
                                    data-object=".article" data-setcompact=".article_title > a, .article_excerpt" 
                                    data-numCharOnIpad="50, 50" data-numCharOnMobile="30, 30" 
                                    data-endShortContent="..., [...]" 
                                    data-delimiter-css-property="clear" data-delimiter-css-value="both">

                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <!-- article -->
                                        <li class="article ohidden">

                                            <!-- article_thumb -->
                                            <div class="article_thumb pthumb p_relative tcenter col-md-4 col-sm-4 col-xs-4">

                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail( 'feature-image-news' ); ?>
                                                </a>                                            

                                            </div>
                                            <!-- #article_thumb -->

                                            <!-- article_content -->
                                            <div class="article_content col-md-8 col-sm-8 col-xs-8 padleft20">

                                                <!-- article_title -->
                                                <h4 class="article_title">

                                                    <a href="<?php the_permalink(); ?>" class="block bold" data-originalContent="<?php echo title(100); ?>">   
                                                        <?php echo title(100); ?>
                                                    </a>                                        

                                                </h4>
                                                <!-- #article_title --> 

                                                <!-- article_excerpt -->
                                                <div class="article_excerpt mtop20" data-originalContent="<?php echo excerpt(200); ?>">
                                                    
                                                    <?php echo excerpt(200); ?>

                                                </div>
                                                <!-- #article_excerpt -->   

                                                <div class="article_details mtop20">

                                                    <a class="details" href="<?php the_permalink(); ?>">
                                                        Xem thêm
                                                        <span class="fa fa-chevron-right"></span>
                                                    </a>

                                                </div>  

                                            </div>  
                                            <!-- #article_content -->       

                                        </li>   
                                        <!-- #article -->

                                    <?php endwhile; ?>

                                </ul>                                

                            <?php endif; 

                                  wp_page_navigation();
                                  wp_reset_query(); ?>

                        </div>
                        <!-- #boxShowCatProdWidg -->

                    </div>
                    <!-- #boxCatListItems -->                       

                </div>
                <!-- #mColumnContent -->

            </div>
            <!-- #mainColRight -->

        </div>
        <!-- #container -->
        
    </section>
    <!-- #main -->

<?php get_footer(); ?>