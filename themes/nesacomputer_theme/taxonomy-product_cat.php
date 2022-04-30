<?php
    use Taxonomies\Products\GetProductCatDescription;
    use \Taxonomies\Products\GetProductCatBanners;
    use \Products\PrintProductFilterResultsUtils;
    //
    $tax = get_query_var('taxonomy');
    $term = get_queried_object();
    $banners = GetProductCatBanners::get($term);
    get_header(); ?>
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
        <?php include(locate_template('/templates/taxonomy-products/tax-banner.php')) ?>
        <section class="page__product">
            <div class="container">
                <form id="frmFilterProd" method="GET" action="<?= $_SERVER['REQUEST_URI'] ?>">
                    <div class="module__page-product">
                        <div class="page__product-sidebar">                        
                            <?php include(locate_template('/templates/taxonomy-products/tax-terms.php')) ?>
                            <?php include(locate_template('/templates/taxonomy-products/tax-attributes-filterbar.php')) ?>
                        </div>
                        <div class="page__product-content">
                            <div class="list__product-group">                               
                                <?php PrintProductFilterResultsUtils::print(DEFAULT_POSTS_PER_PAGE, get_queried_object()) ?>
                            </div>
                            <div class="page__product-info">
                                <?php echo apply_filters('the_content', GetProductCatDescription::get(get_queried_object())); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
<?php get_footer(); ?>