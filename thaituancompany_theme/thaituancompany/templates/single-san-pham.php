<?php 

	global $post; 	

	$post_type = get_query_var('post_type');

	$post_type_obj = get_post_type_object( $post_type );

  $product_entries = get_post_meta( get_the_id(), '_pt-field-product-entries-content', true );
  $product_description = get_post_meta( get_the_id(), '_pt-field-product-description', true ); ?> 

<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<!-- main -->
<section id="main">  

    <?php dynamic_sidebar( 'Slider Sidebar' ); ?>

    <!-- breadcumbs -->
    <div id="breadcumbs">



      <div class="container">



        <?php the_breadcrumbs('bread-cumbs', 'bread-cumbs', 'Trang chủ', '<span class="divide"></span>');?>

        

      </div>

    </div>  
    <!-- #breadcumbs -->

    <!-- mainColumns -->
      <div class="mainColumns singleProduct mtop20">

        <!-- container -->
        <div class="container">

          <div class="col-md-3 col-sm-3 col-xs-12">

            <?php dynamic_sidebar( 'ColLeft Sidebar' ); ?>

          </div>

          <div class="col-md-9 col-sm-9 col-xs-12 padleft20-ms mtop20-xs">

            <!-- singlePContent -->
            <div class="singlePContent">

              <h3 class="bold uppercase">
                <?php echo $post->post_title; ?>
              </h3>

              <!-- productCatFils -->
              <div class="productCatFils mtop20">

                <?php $count = 1;
                      foreach ( $product_entries as $p_child ) : 

                        $title = strip_tags( $p_child['accordion-children-product-title'] );

                        $price = strip_tags( $p_child['accordion-children-product-price'] );
                        $price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) : 'Liên hệ';

                        $opcode = strip_tags( $p_child['accordion-children-product-opcode'] );  

                        $excerpt = strip_tags( $p_child['accordion-children-product-excerpt'] ); ?>

                        <!-- productFEntry -->
                        <div class="productFEntry ohidden <?= $count > 1 ? 'mtop20' : '' ?>">

                          <!-- thumbnail -->
                          <div class="thumbnail col-md-4 col-sm-4 col-xs-12">

                            <?php 
                                $attachment_id = pn_get_attachment_id_from_url( $p_child['accordion-children-product-avatar'] );
                                echo wp_get_attachment_image( $attachment_id, 'feature-image-product-four-columns', false, array('class' => 'fixed-vertical') );                              ?>                            
                            
                          </div>
                          <!-- #thumbnail -->

                          <!-- content -->
                          <div class="content col-md-8 col-sm-8 col-xs-12 padleft20-ms mtop20-xs">

                            <h4 class="cred bold"><?php echo $title ?></h4>

                            <div class="price mtop5">
                              <span class="bold">Giá sản phẩm:</span> 
                              <span class="cred bold"><?php echo $price; ?></span>
                            </div>

                            <div class="masp mtop5">
                              <span class="bold">Mã sản phẩm:</span>
                              <span class="bold cred"><?php echo $opcode; ?></span>
                            </div>

                            <div class="excerpt mtop5">
                              <?php echo short_text( $excerpt, 100 ); ?>
                            </div>

                            <div class="order mtop5">

                              <a class="btn btn-primary" href="#">
                                Đặt hàng
                              </a>

                            </div>
                            
                          </div>
                          <!-- #content -->
                          
                        </div>
                        <!-- #productFEntry -->   

                <?php $count++;
                      endforeach; ?>             
                
              </div>
              <!-- #productCatFils -->

              <!-- productDescription -->
              <div class="productDescription mtop20">

                <h4 class="singlePHeadingTitle">
                  <span class="fa fa-chevron-right"></span> 
                  <span class="vmiddle">Mô tả chi tiết</span>
                </h4>

                <div class="content defFormat mtop20">

                  <?php echo $product_description; ?>

                 </div>
                
              </div>
              <!-- #productDescription -->

              <!-- productRelatedBox -->
              <div class="productRelatedBox mtop20">

                <h4 class="singlePHeadingTitle">
                  <span class="fa fa-chevron-right"></span> 
                  <span class="vmiddle">Sản phẩm liên quan</span>
                </h4>

                <!-- productRelatedContent -->
                <div class="productRelatedContent ohidden home-cat-products mtop20">

                  <div class="split-columns three-columns-layout">

                    <?php 
                      $args = array(

                        'post_type' => $post_type,
                        'post__not_in' => array( $post->ID ),
                        'order' => 'desc',
                        'orderby' => 'date',
                        'posts_per_page' => 6,
                        'no_paging' => true

                      );

                      query_posts( $args );

                      if ( have_posts() ) :

                        while ( have_posts() ) : the_post(); ?>

                          <!-- item-layout -->
                          <div class="item-layout product col-md-4 col-sm-6 col-xs-12">

                            <!-- thumbnail -->
                            <div class="thumbnail">

                              <a href="<?php the_permalink(); ?>"></a>

                              <div class="thumbnail-wrap ohidden">                  
                                  <?php the_post_thumbnail( 'feature-image-product-three-columns', array('class' => 'fixed-vertical') ); ?>
                              </div>
                              
                            </div>
                            <!-- #thumbnail -->

                            <!-- title -->
                            <h4 class="title">

                              <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                              </a>
                              
                            </h4>
                            <!-- #title -->

                          </div>
                          <!-- #item-layout --> 

                    <?php 
                        endwhile; 
                        wp_reset_query();

                      endif; ?>

                  </div>
                  
                </div>
                <!-- #productRelatedContent -->
                
              </div>
              <!-- #productRelatedBox -->

              <!-- commentBox -->
              <div class="commentBox fbComments mtop20">

                <h4 class="singlePHeadingTitle">
                  <span class="fa fa-chevron-right"></span> 
                  <span class="vmiddle">Bình luận</span>
                </h4>             

                <div class="fb-comments" data-href="<?php echo get_the_permalink( $post ); ?>" data-numposts="5"></div>
                
              </div>
              <!-- #commentBox -->

            </div>
            <!-- #singlePContent -->
            
          </div>

        </div>
        <!-- #container -->
            
      </div>    
      <!-- #mainColumns -->

</section>  
<!-- #main --> 