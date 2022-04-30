<?php 
    namespace Ratingstars;
    class PrintRatePgBarSingleUtils {
        public static function print($value = 1, $totals = 0, $num = 0, $wrap = 'li') { 
            $percentage = 0;
            if ($num > 0 && $totals > 0) :
                $percentage = floor($num / $totals * 100);
            endif; ?>
            <li>
                <p class="label-progress__prds"> <?= $value ?> <i class="fa fa-star" aria-hidden="true"></i></p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" style="width:<?= $percentage ?>%" aria-valuemax="100"></div>
                </div>
                <ul class="percent-evalue__prds">
                    <li>
                        <p><?= $percentage ?>%</p>
                    </li>
                    <li>
                        <p><?= $num ?> đánh giá</p>
                    </li>
                </ul>
            </li>
        <?php }
    }