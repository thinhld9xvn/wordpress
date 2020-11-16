<?php 
	/* Template Name: Giao diện đầy màn hình ( không sidebar ) */
?>

<?php
	global $post;
	
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
            <!-- #container -->

        </div>  
        <!-- #intro-company --> 
        
    </section>
    <!-- #main -->

<?php get_footer(); ?>