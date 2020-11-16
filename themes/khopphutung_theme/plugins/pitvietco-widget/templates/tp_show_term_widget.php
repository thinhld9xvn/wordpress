<?php 
    echo $before_widget;        

        $term = get_term_by( 'id', $term_id, $taxonomy_slug );  

        echo $before_title . "<a href='" . get_term_link( $term, $taxonomy_slug ) . "'>" . $title . "</a>" . $after_title;
    
            $args = array(
                
                'post_type' => $custom_post_type,
                'order' => 'desc',
                'orderby' => 'id',
                'posts_per_page' => $posts_per_page,
                'tax_query' => array(

                    array(
                        'taxonomy' => $taxonomy_slug,
                        'field' => 'slug',
                        'terms' => array( $term->slug )
                    )

                )
            ); 
                
            query_posts( $args ); ?>            

            <!-- boxShowCatProdWidg -->
            <div class="boxShowCatProdWidg">

                <?php if ( have_posts() ) : ?>                        

                        <ul class="pboxlist --boxShowCatProd" data-navig="compactcontent" 
                            data-multiple="false" data-object=".product" 
                            data-setcompact=".ptitle > a" data-numCharOnIpad="40" 
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
                                                <?php 
                                                    echo get_the_post_thumbnail( get_the_id(), 
                                                                                 'feature-image-product',
                                                                                 array(
                                                                                    'class' => 'scaleToHeight'
                                                                                 ) 
                                                                                ); 
                                                ?>
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

                                            <a class="block" 
                                               href="<?php the_permalink(); ?>" 
                                               data-originalContent="<?php echo title(40); ?>">
                                                <?php echo title(40); ?>
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
      
    	
<?php echo $after_widget; ?>