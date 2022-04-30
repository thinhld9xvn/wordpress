<?php
    use Membership\CheckRoleAdminUser;
    use Products\CheckProductValidUtils;
    use Products\GetProductLoopDataUtils;
    use Products\ProductViewCountsUtils;    
    global $post;
    $product = wc_get_product($post->ID);
    if ( !CheckProductValidUtils::valid($product) ) :
        wp_die('Sản phẩm này thông tin không hợp lệ !!!');
    endif;
    list($id, $url, $name, $view_count, $user_rating, $commentsList, $explored_ratings, $short_description, $description, $regular_price,
            $sale_price, $sale_off, $status, $thumbnail, $galleries,
            $prod_tssp, $prod_ttbh, $prod_qtud, $prod_tskt, $prod_dgsp, $prod_khct, $prod_hotline, $prod_opts) = GetProductLoopDataUtils::get($product);
    ProductViewCountsUtils::inc_count($id);
    $is_admin_role = CheckRoleAdminUser::get_current(); ?>
<?php get_header(); ?>
    <main id="main">
        <div class="container">
            <div class="breadcrumb">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<div>','</div>' );
                    }
                ?>
            </div>
        </div>
        <section class="detail__product">
            <div class="container">
                <div class="module__detail-product">
                    <?php include(locate_template('/templates/single-products/title.php')) ?>
                    <?php include(locate_template('/templates/single-products/slider.php')) ?>
                    <div class="info__choose">
                        <?php include(locate_template('/templates/single-products/info-header.php')) ?>
                        <?php include(locate_template('/templates/single-products/opts.php')) ?>
                        <?php include(locate_template('/templates/single-products/info-ts.php')) ?>
                        <?php include(locate_template('/templates/single-products/info-policy.php')) ?>
                        <?php include(locate_template('/templates/single-products/info-price.php')) ?>
                        <?php include(locate_template('/templates/single-products/info-gift.php')) ?>
                        <?php include(locate_template('/templates/single-products/carts.php')) ?>
                    </div>                    
                    <?php include(locate_template('/templates/single-products/info-contact.php')) ?>
                </div>
            </div>
        </section>
        <section class="evaluate__specifications">
            <div class="container">
                <div class="module__evaluate-specifications">
                    <div class="evaluate">                    
                        <?php include(locate_template('/templates/single-products/evaluate.php')) ?>
                        <?php include(locate_template('/templates/single-products/reviews.php')) ?>
                    </div>
                    <?php include(locate_template('/templates/single-products/sidebar.php')) ?>
                </div>
            </div>
        </section>
        <?php include(locate_template('/templates/single-products/modal.php')) ?>
     </main>
<?php get_footer(); ?>