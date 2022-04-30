<?php

    $args = array(
        'taxonomy' => PRODUCTS_TAXONOMY,
        'hide_empty' => false,
        'parent' => 0
    );
    $taxonomies = get_terms($args);
?>
<div class="category__product">
    <?php foreach( $taxonomies as $key => $tax ) : 
        $icon = get_field("icon_danh_mục", $tax);
        $image = !empty($icon) ? $icon['url'] : \Taxonomies\GetTaxDefIconUtils::get(); ?>
        <a href="<?php echo get_term_link($tax, PRODUCTS_TAXONOMY) ?>" class="category__product-item">
            <img src="<?= $image ?>" alt="icon">
            <p><?= $tax->name ?></p>
        </a>
    <?php endforeach; ?>
</div>