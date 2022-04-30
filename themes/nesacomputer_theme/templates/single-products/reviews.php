<?php
    use Ratingstars\GetAvgRatingStar;
    use Ratingstars\PrintRatePgBarSingleUtils;
    use Ratingstars\PrintUserRatingPgSingleUtils;
    //
    $totals = count($commentsList);
    $avg_rating = GetAvgRatingStar::get($explored_ratings);
 ?>
<div class="evaluate__customer">
    <div class="box-evaluate__products mt-30s">
        <div class="tops-evaluate__products">
            <h3 class="titles-evaluate__products">Đánh giá nhận xét</h3>
        </div>
        <div class="content-evaluate__products">
            <div class="statistical-evalued">
                <div class="number-statistical__evalued">
                    <?php PrintUserRatingPgSingleUtils::print($avg_rating, $totals) ?>
                </div>
                <div class="ranger-evalueed__star">
                    <ul>
                        <?php PrintRatePgBarSingleUtils::print(5, $totals, $explored_ratings[5]) ?>
                        <?php PrintRatePgBarSingleUtils::print(4, $totals, $explored_ratings[4]) ?>
                        <?php PrintRatePgBarSingleUtils::print(3, $totals, $explored_ratings[3]) ?>
                        <?php PrintRatePgBarSingleUtils::print(2, $totals, $explored_ratings[2]) ?>
                        <?php PrintRatePgBarSingleUtils::print(1, $totals, $explored_ratings[1]) ?>
                    </ul>
                </div>
                <?php if ( !$is_admin_role ) : ?>
                    <div class="share-ranger__evalueed">
                        <p>Chia sẻ nhận xét về sản phẩm</p>
                        <a href="#" title="" class="btn-share__evaluate">Gửi nhận xét</a>
                    </div>
                <?php endif; ?>
            </div>
            <?php include(dirname(__FILE__) . '/reviews/form.php') ?>
            <?php include(dirname(__FILE__) . '/reviews/comments.php') ?>
        </div>
    </div>
</div>