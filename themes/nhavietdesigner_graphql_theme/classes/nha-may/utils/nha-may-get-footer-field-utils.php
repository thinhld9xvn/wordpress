<?php 

    namespace NhaMayPage;

    class NhaMayGetFooterField {

        public static function get() {

            $field = \get_field(NHAMAY_FIELDS::SECTION_FOOTER_FIELD, NHAMAY_PID);

            $button = $field[NHAMAY_FIELDS::FOOTER_BUTTON_FIELD];

            return [
                'title' => $field[NHAMAY_FIELDS::FOOTER_TITLE_FIELD],
                'button' => [
                    'text' => $button[NHAMAY_FIELDS::FOOTER_BUTTON_TITLE_FIELD],
                    'url' => filter_permalink($button[NHAMAY_FIELDS::FOOTER_BUTTON_URL_FIELD])
                ]
            ];

        }

    }