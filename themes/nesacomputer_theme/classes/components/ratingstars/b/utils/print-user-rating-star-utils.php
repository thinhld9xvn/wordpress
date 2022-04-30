<?php 
    namespace Ratingstars;
    class PrintUserRatingStarUtils {
        public static function print($v) { ?>
            <div class="rating-item rating-voted-5">
                <p class="rating">
                    <span class="rating-box">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>
                            <?php for($i = 0; $i < $v; $i++) : ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php endfor; ?>
                        </span>
                    </span>
                </p>
            </div>
        <?php }
    }