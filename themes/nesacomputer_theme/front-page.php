<?php get_header(); ?>
    <main id="main">
        <section class="banner">
            <div class="container">
                <div class="banner__group">
                    <?php include(locate_template('/templates/categories-widget-box.php')); ?>    
                    <div class="banner__product-group">
                        <?php dynamic_sidebar('Banners Sidebar'); ?>
                    </div>
                </div>
            </div>
        </section>  
        <?php dynamic_sidebar('Home Sidebar') ?>  
    </main>
<?php get_footer();  ?>