<?php 
	/* Template Name: Giao diện có sidebar */ 
?>

<?php
	global $post;

	if ( $post->post_parent > 0 ) :

		$post_parent_id = $post->post_parent;

	else :

		$post_parent_id = $post->ID;

	endif;

	$post_parent = get_page( $post_parent_id );

	$my_wp_query = new WP_Query();
	$all_wp_pages = $my_wp_query->query( array('post_type' => 'page') );

	$child_pages = get_page_children( $post_parent_id, $all_wp_pages ); 

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

                    </div>
                    <!-- #spColLeft -->

                    <!-- spColRight -->
                    <div class="spColRight col-md-3 col-sm-4 col-xs-12 padleft20-ms mbot20">

                        <!-- widgBoxTitle -->
                        <h2 class="widgBoxTitle">

                            <a href="<?php echo get_page_link( $post_parent ); ?>">
                                <?php echo $post_parent->post_title; ?>
                            </a>

                        </h2>
                        <!-- #widgBoxTitle -->

                        <!-- widgBoxContent -->
                        <div class="widgBoxContent">

                            <ul class="pboxlist --boxCat">

                                <?php                                                                      

                                    foreach ( $child_pages as $child_page ) : ?>

                                        <li>
                                            <a href="<?php echo get_page_link( $child_page ) ?>">
                                                <?php echo $child_page->post_title; ?>
                                            </a>
                                        </li>        

                                <?php endforeach; ?>                                          

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