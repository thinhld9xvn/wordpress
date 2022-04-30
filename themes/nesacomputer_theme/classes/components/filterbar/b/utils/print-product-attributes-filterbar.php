<?php
    namespace Filterbar;
    class PrintProductAttFilterbar {
        public static function print($att) {
            $params = explode(',', $_GET[$att]);
            $args = [
                'taxonomy' => $att,
                'hide_empty' => false,
                'order' => 'asc',
                'orderby' => 'id',
                'parent' => 0
            ];
            $terms = get_terms($args); ?>
            <div class="product__sidebar-item">
                <div class="product__sidebar-title">
                   <?= get_taxonomy($att)->labels->singular_name ?>
                </div>
                <div class="product__sidebar-box">
                    <?php foreach( $terms as $term ) : ?>
                        <div class="category__sidebar-item">
                            <label>
                                <input type="checkbox" class="chkFilterItem" 
                                                       id="<?= $term->slug . '-' . $term->term_id ?>"
                                                       value="<?= $term->slug ?>"
                                                       data-obj="<?= $att ?>"
                                                       <?= FALSE !== array_search($term->slug, $params) ? 'checked' : ''  ?>>
                                <p><?= $term->name ?></p>
                                <span>(<?= $term->count ?>)</span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <div class="category__sidebar-item">
                        <button type="submit" class="button button-primary btnFilter">
                            Lọc
                        </button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="<?= $att ?>" value="<?= $_GET[$att] ?>" />
            <script>
                if ( typeof(window.fl_options) === 'undefined' ) {
                    window.fl_options = {};
                }
                window.fl_options['<?= $att ?>'] = [];
                <?php 
                    foreach($params as $pa) : 
                        if ( !empty($pa) ) : ?>
                            window.fl_options['<?= $att ?>'].push('<?= $pa ?>');
                <?php 
                        endif;
                    endforeach;
                ?>
            </script>
        <?php }
    }