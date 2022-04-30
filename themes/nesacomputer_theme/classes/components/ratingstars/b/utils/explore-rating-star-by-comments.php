<?php 
    namespace Ratingstars;
    class ExploreRatingStarByComments {
        public static function perform($comments) {
            $data = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
            foreach($comments as $key => $comment) :
                $meta = $comment['meta'];
                $rating = $meta['user_rating'];
                $data[$rating]++;
            endforeach;
            return $data;
        }
    }