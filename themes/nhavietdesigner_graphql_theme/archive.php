<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header();

?>
    <div class="vk-blog">

        <div class="vk-blog__banner"
             style="background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2019/02/banner-2.jpg);">

            <div class="container">
                <div class="_content">
                    <div class="_box">
                        <h1 class="vk-blog__title"><?php echo get_the_archive_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div> <!--./banner-->

    </div>
    <div class="container pt-60 pb-60 pt-lg-100 pb-lg-100">
        <?php
        if (have_posts()) : ?>
            <div class="vk-blog__list--style-1 row">
                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();
                    ?>

                    <?php
                    get_template_part('template-parts/content', get_post_format());
                endwhile;

                wp_pagenavi();
                ?>
            </div>
        <?php endif; ?>

    </div>

<?php
get_footer();
