<?php
    namespace Filterbar;
    class PrintProductPriceFilterbar {
        public static function print() { 
            $params = explode(',', $_GET['pa_price']);
            $options = ProductGetFilterPriceOptions::get(); ?>
            <div class="product__sidebar-item">
                <div class="product__sidebar-title">
                    khoảng giá
                </div>
                <div class="product__sidebar-box">
                    <?php foreach( $options as $key => $option ) : ?>
                        <div class="category__sidebar-item">
                            <label>
                                <input type="checkbox" class="chkFilterItem" 
                                                        value="<?= $option['value'] ?>" 
                                                        data-obj="pa_price"
                                                        <?= FALSE !== array_search($option['value'], $params) ? 'checked' : ''  ?>>
                                <p><?= $option['text'] ?></p>
                                <span></span>
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
            <input type="hidden" name="pa_price" value="<?= $_GET['pa_price'] ?>" />
            <script>
                if ( typeof(window.fl_options) === 'undefined' ) {
                    window.fl_options = {};
                }
                window.fl_options['pa_price'] = [];
                <?php 
                    foreach($params as $pa) : 
                        if ( !empty($pa) ) : ?>
                            window.fl_options['pa_price'].push('<?= $pa ?>');
                <?php 
                        endif;
                    endforeach;
                ?>
            </script>
        <?php }
    }