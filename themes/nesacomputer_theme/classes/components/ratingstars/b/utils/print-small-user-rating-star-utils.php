<?php 
    namespace Ratingstars;
    class PrintSmallUserRatingStarUtils {
        public static function print($v = 0, $count = 0) { 
            $white_stars = 5 - $v; ?>
            <div class="sves-evaluate">
                <div class="star__group">
                    <?php for($i = 0; $i < $v; $i++) : ?>
                        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__star-1.png" alt="icon__star-1.png">
                    <?php endfor; ?>
                    <?php for($i = 0; $i < $white_stars; $i++) : ?>
                        <img src="<?= THEME_IMAGES_DIR_URI ?>/icons/icon__star-2.png" alt="icon__star-1.png">
                    <?php endfor; ?>
                </div>
                <p>(<?= $count ?> đánh giá)</p>
            </div>
        <?php }
    }