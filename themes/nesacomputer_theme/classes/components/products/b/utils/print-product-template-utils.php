<?php 
    namespace Products;
    class PrintProductTemplate {
        public static function get($product, $wrap = '') {
            ob_start();
            if ( !CheckProductValidUtils::valid($product) ) return false;
            list($id, $url, $name, $regular_price, $sale_price, $sale_off, $status, $thumbnail) = GetProductLoopDataUtils::get_simple($product);
            if ( $wrap === 'li' ) : ?>
                <li>
      <?php endif; ?>
                <div class="items-prds__tags">
                    <div class="img-prds__tags">
                        <a href="<?= $url ?>" title="<?= $name ?>">
                            <img src="<?= $thumbnail ?>" alt="thumbnail" />
                        </a>
                    </div>
                    <div class="intros-prds__tags">
                        <h3>
                            <a class="names-prds__tags" href="<?= $url ?>" style="height: 54px;">
                                <?= $name ?>
                            </a>
                        </h3>
                        <div class="price-group">
                            <div class="price-prds__tags">
                                <p class="price-sale__items"><?= $regular_price ?> đ</p>
                                <p class="number-sale__items">-<?= $sale_off ?>%</p>
                            </div>
                            <p class="price-itemss"><?= $sale_price ?> đ</p>
                        </div>
                        <div class="groups-btn__itemss">
                            <p class="status-items__items product__has"><?= $status ?></p>
                            <a href="#">
                                <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__Buy-gray.svg" alt="icon__Buy-gray.svg">
                            </a>
                        </div>
                    </div>
                </div>
        <?php if ( $wrap === 'li' ) : ?>
            </li>
        <?php
            endif;            
            $contents = ob_get_contents();
            ob_end_clean();
            return $contents;
        }
        public static function print($product, $wrap = '') {
            echo self::get($product, $wrap);
        }
    }   
