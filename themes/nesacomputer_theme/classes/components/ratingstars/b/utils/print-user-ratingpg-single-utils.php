<?php 
    namespace Ratingstars;
    class PrintUserRatingPgSingleUtils {
        public static function print($rating = 0, $count = 0) { ?>
            <p class="big-number__evalued"><?= $rating ?>/5</p>
            <?php PrintUserRatingStarUtils::print($rating); ?>
            <p class="number-turn__evalued">(<?= $count ?> nhận xét)</p>
        <?php }
    }