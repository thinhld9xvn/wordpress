<?php 
    namespace Ratingstars;
    class GetAvgRatingStar {
        public static function get($data) {
            $n = 0;
            for($i = 5; $i >=0 ; $i--) :
                if ( $data[$i] > 0 ) :
                    $n++;
                endif;
            endfor;
            if ($n === 0) return 0;
            $five_stars = 5 * $data[5];
            $four_stars = 4 * $data[4];
            $three_stars = 3 * $data[3];
            $two_stars = 2 * $data[2];
            $one_stars = 1 * $data[1];         
            return round(($five_stars + $four_stars + $three_stars + $two_stars + $one_stars) / $n, 0);
        }
    }