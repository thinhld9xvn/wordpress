<?php
	global $post;
    
    $category = get_the_category();
    $category = $category[0];

    get_header(); ?>    

    <!-- main -->
    <section id="main">

        <?php dynamic_sidebar('Slider Sidebar');
              the_breadcrumbs( 'breadcumbs', 'container', 
                               'Trang chủ', '<span class="fa fa-angle-double-right"></span>' ); ?>             

        <!-- page-section -->
        <div class="fullwidth-section page-section mtop20">

            <!-- container -->
            <div class="container">

                <!-- pageColumnSection -->
                <div class="pageColumnSection ohidden">

                    <!-- spColLeft -->
                    <div class="spColLeft col-md-9 col-sm-8 col-xs-12">

                        <!-- pageTitle -->
                        <h2 class="mySectionHeadTitle pageTitle vcenter">
                            <div class="title">
                                <?php 
                                    $uconvert = new UConvert( $post->post_title, UConvert::UNICODE );
                                    echo $uconvert->transform( UConvert::VNI ); ?>
                            </div>
                            <div class="line">
                                <span class="headline lleft"></span>
                                <span class="licon fa fa-gg"></span>
                                <span class="headline lright"></span>
                            </div>
                        </h2>
                        <!-- #pageTitle --> 

                        <!-- pageContent -->
                        <div class="pageContent mtop20 padbot20">

                        	<?php echo apply_filters('the_content', $post->post_content); ?>

                        </div>
                        <!-- #pageContent -->

                        <div class="relatedPosts mbot20">

                        	<!-- pageTitle -->
	                        <h2 class="mySectionHeadTitle pageTitle vcenter">
	                            <div class="title">Baøi lieân quan</div>
	                            <div class="line">
	                                <span class="headline lleft"></span>
	                                <span class="licon fa fa-gg"></span>
	                                <span class="headline lright"></span>
	                            </div>
	                        </h2>
	                        <!-- #pageTitle -->

	                        <ul class="pboxlist --boxCat">

                                <?php 

                                    $args = array(
                                        'post_type' => 'post',
                                        'category__in' => $category->term_id,
                                        'post__not_in' => array( $post->ID ),
                                        'posts_per_page' => 10
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

                    </div>
                    <!-- #spColLeft -->

                    <!-- spColRight -->
                    <div class="spColRight col-md-3 col-sm-4 col-xs-12 padleft20-ms mbot20">

                        <!-- widgBoxTitle -->
                        <h2 class="widgBoxTitle">
                            <a href="<?php echo get_category_link( $category ); ?>">
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
                                        'posts_per_page' => 10
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
                <!-- #pageColumnSection -->

            </div>
            <!-- #container -->

        </div>  
        <!-- #intro-company --> 
        
    </section>
    <!-- #main -->

<?php get_footer(); ?>