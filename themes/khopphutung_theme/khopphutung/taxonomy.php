<?php 
    $taxonomy = get_query_var('taxonomy');
    $term = get_term_by( 'slug', get_query_var('term'), $taxonomy );

    $post_type = $taxonomy->object_type[0];

    get_header(); ?>
    
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
                            <span><?php echo $term->name; ?></span>
                        </h3>
                        <!-- #widgTitleBox -->

                        <!-- boxShowCatProdWidg -->
                        <div class="boxShowCatProdWidg">

                            <?php 

                                $args = array(
                    
                                    'post_type' => $post_type,                
                                    'order' => 'desc',
                                    'orderby' => 'id',
                                    'posts_per_page' => 20,
                                    'tax_query' => array(

                                        array(
                                            'taxonomy' => $taxonomy,
                                            'field' => 'slug',
                                            'terms' => array( $term->slug )
                                        )

                                    )
                                ); 

                                query_posts( $args );

                                if ( have_posts() ) : ?>                        

                                    <ul class="pboxlist --boxShowCatProd" data-navig="compactcontent" 
                                        data-multiple="false" data-object=".product" 
                                        data-setcompact=".ptitle > a" data-numCharOnIpad="60" 
                                        data-numCharOnMobile="30" data-endShortContent="..." 
                                        data-delimiter-css-property="clear" data-delimiter-css-value="both">

                                        <?php 
                                            while ( have_posts() ) : the_post(); 

                                                $masp = get_post_meta( get_the_id(), '_pt-field-san-pham-opcode', true ); ?>

                                                <!-- product -->
                                                <li class="product col-md-3 col-sm-6 col-xs-6">

                                                    <!-- pthumb -->
                                                    <div class="pthumb p_relative tcenter">

                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail( 'feature-image-product' ); ?>
                                                        </a>

                                                        <!-- pordersp -->
                                                        <div class="pordersp">

                                                            <a class="btnOrderProd"
                                                               href="#"
                                                               target-href="#orderFormModal"
                                                               data-pname="<?php the_title() ?>"
                                                               data-popcode="<?php echo $masp ?>">

                                                                <span class="fa fa-shopping-basket"></span>
                                                                Đặt hàng
                                                            </a>

                                                        </div>
                                                        <!-- #pordersp -->

                                                    </div>
                                                    <!-- #pthumb -->

                                                    <!-- ptitle -->
                                                    <div class="ptitle tcenter mtop10">

                                                        <a class="block" href="#" data-originalContent="<?php echo title(100); ?>">
                                                            <?php echo title(100); ?>
                                                        </a>

                                                    </div>
                                                    <!-- #ptitle -->

                                                    <!-- pspcode -->
                                                    <div class="pspcode tcenter mtop10">

                                                        Mã sản phẩm: 
                                                        <strong class="cprimary">
                                                            <?= isset( $masp ) && ! empty( $masp )
                                                                ?
                                                                $masp
                                                                :
                                                                'Đang cập nhật' ?>
                                                        </strong>

                                                    </div>
                                                    <!-- #pspcode -->

                                                </li>   
                                                <!-- #product --> 

                                        <?php endwhile;    
                                              wp_page_navigation();
                                              wp_reset_query(); ?>

                                    </ul>

                            <?php else: ?>

                                    <div class="catempty pad20 tcenter">

                                        <strong>
                                            Không có sản phẩm nào trong mục này.
                                        </strong>
                                        
                                    </div>

                            <?php endif; ?>

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