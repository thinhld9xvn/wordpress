<?php
use Ratingstars\GetAvgRatingStar;
use Ratingstars\PrintSmallUserRatingStarUtils; ?>
<?php 
    $avg_rating = GetAvgRatingStar::get($explored_ratings);
    $count = count($commentsList); ?>
<div class="sves-group">
    <div class="sves-status">
        <p>Tình trạng: <strong><?= $status ?></strong></p>
    </div>
    <div class="sves-view">
        <p>Lượt xem: <strong> <?= $view_count ?></strong></p>
    </div>
    <?php PrintSmallUserRatingStarUtils::print($avg_rating, $count) ?>
    <button type="button" class="btn btn__share">Chia sẻ</button>
</div>