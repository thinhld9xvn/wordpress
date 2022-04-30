<?php
/* Template Name: Tuyen dung Template */
get_header();
get_template_part('template-parts/header', 'page');
?>
    <div class="container pt-60 pb-60 pt-lg-100 pb-lg-100">

        <div class="vk-blog__list--style-1 row">
            <?php
            if (!empty(get_field('chuyen_muc'))) :
                echo get_list_post(get_field('chuyen_muc'));
            endif;
            ?>

        </div>
    </div>
</div>
<?php
get_footer();
