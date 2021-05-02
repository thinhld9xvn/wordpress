<?php 

    namespace Filters;

    class FilterPrintSalaryBoxUtils  {

        public static function print($filter, $location = '', $onchange = 'filterChanged') { ?>

            <script type="text/javascript">

                const MAX_PRICE_PLUS = <?= _FILTER_PRICE_MAX_PLUS ?>;

                jQuery(function($) {

                    function onPriceChangedTimer() {

                        const range_width = $('.range-filter.__price .slider-range.ui-slider').width(); 
                        const $amount = $('.range-filter.__price .amount');                         

                        const t = setInterval(function() {

                            let v = $('.range-filter.__price .ui-slider-handle.ui-corner-all.ui-state-default:last-child').css('left');

                            if ( v ) {

                                v = parseInt(v); 
                            
                                if ( v === range_width ) {                                
                                    
                                    if ( ! $amount.hasClass('__plus') ) {

                                        $amount.addClass('__plus');

                                    }

                                }

                                else {

                                    if ( $amount.hasClass('__plus') ) {

                                        $amount.removeClass('__plus');

                                    }

                                }

                            }

                        }, 10);

                    }

                    onPriceChangedTimer();

                });

        </script>     

        <range-filter
            listing-type="<?php echo esc_attr( $filter->listing_type->get_slug() ) ?>"
            filter-key="<?php echo esc_attr( $filter->get_form_key() ) ?>"
            location="<?php echo esc_attr( $location ) ?>"
            label="Price"
            value="<?= _FILTER_PRICE_DEFAULT ?>"
            type="range"
            prefix="<?php echo esc_attr( $filter->get_prop('prefix') ) ?>"
            suffix="<?php echo esc_attr( $filter->get_prop('suffix') ) ?>"
            behavior="<?php echo esc_attr( $filter->get_prop('behavior') ) ?>"
            :min="<?= _FILTER_PRICE_MIN ?>"
            :max="<?= _FILTER_PRICE_MAX_PLUS ?>"
            :step="<?= _FILTER_PRICE_STEP ?>"
            :format-value="false"
            @input="<?php echo esc_attr( $onchange ) ?>"
            inline-template
        >          
            <div class="form-group radius radius1 range-slider explore-filter range-filter __price">
                <label>{{label}}</label>
                <div class="mylisting-range-slider">
                    <div class="amount">{{displayValue}}</div>                   
                    <div class="slider-range" ref="slider"></div>
                </div>
            </div>
        </range-filter> 

        <?php }

    }