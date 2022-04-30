<?php 
    $args = [
        'taxonomy' => PRODUCTS_TAXONOMY,
        'parent' => !empty($term) ? $term->term_id : 0,
        'hide_empty' => false
    ];
    $terms = get_terms($args);
?>
<div class="product__sidebar-item category__sidebar">
    <div class="product__sidebar-title">
        Danh mục
    </div>
    <div class="product__sidebar-box">
        <?php 
            if ( $terms ) :
                foreach( $terms as $term) : ?>
                    <a href="<?= get_term_link($term) ?>" 
                        class="category__sidebar-item">
                        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__double-arrow.png" 
                            alt="icon__double-arrow.png">
                        <p>
                            <?= $term->name ?>
                        </p>
                    </a>
        <?php   endforeach; 
            else :
                echo '<p class="empty-list __sidebar">Không có danh mục con nào.</p>';
            endif; ?>
    </div>
</div>