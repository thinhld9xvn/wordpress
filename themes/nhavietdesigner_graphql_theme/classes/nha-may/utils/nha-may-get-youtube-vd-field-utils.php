<?php 

    namespace NhaMayPage;

    class NhaMayGetYoutubeVDField {

        public static function get() {

            $field = \get_field(NHAMAY_FIELDS::YOUTUBE_VD_FIELD, NHAMAY_PID);

            return [
                'video_id' => $field[NHAMAY_FIELDS::YOUTUBE_VID_FIELD],
                'url' => $field[NHAMAY_FIELDS::YOUTUBE_URL_FIELD],
                'thumbnail' => $field[NHAMAY_FIELDS::YOUTUBE_THUMBNAIL_FIELD]
            ];

        }

    }