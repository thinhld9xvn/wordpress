<?php 

    namespace Archive\Galleries\PageLayout;

    class GalleriesPrintBreadcrumbHtmlUtils {

        public static function render($home_text, $parent, $current_text) {             
           
            $post_type = \Archive\Galleries\GalleriesGetPostTypeUtils::get();
            $post_type = get_post_type_object($post_type); 

            $slug = $post_type->rewrite; ?>
            
            <div class="page-breadcrumb">
                <a href="<?= get_bloginfo('url') ?>">
                    <?= $home_text ?>
                </a>
                <span class="fa fa-angle-right"></span>
                <a href="<?= $slug['slug'] ?>"><?= $post_type->label ?></a>
                <span class="fa fa-angle-right"></span>
                <a href="<?= $parent['slug'] ?>"><?= $parent['title'] ?></a>
                <span class="fa fa-angle-right"></span>
                <span class="current"><?= $current_text ?></span>
            </div>

        <?php }
        

    }