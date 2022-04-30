<?php 
	/* Template Name: Tài khoản */ ?>
<?php $current_user = wp_get_current_user();
       global $post;
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
    <section id="account">
        <div class="container">
            <div class="account__group">
                <?php include(locate_template('/templates/account/sidebar.php')) ?>
                <?php include(locate_template('/templates/account/user-info.php')) ?>
                <?php include(locate_template('/templates/account/user-change-pass.php')) ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>