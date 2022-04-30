<?php 
    namespace Products;
    class PrintProductTopTabUtils {
        public static function print($data) {
            if ( count($data) > 0 ) : ?>
                <a href="#" class="see-prds__tags">Xem tất cả</a>
                <ul class="list-prds__tags">
                    <?php foreach($data as $key => $product) :
                            echo $product;
                        endforeach; ?>
                </ul>
            <?php else : ?>
                <ul class="list-prds__tags">
                    <li class="empty-item">
                        Không có sản phẩm nào ở đây ...
                    </li>
                </ul>
            <?php endif;
         }
    }