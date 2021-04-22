<?php 
    require_once dirname(__FILE__) . '/a/shortcodes-class.php';  

    require_once dirname(__FILE__) . '/b/utils/shortcode-customize-home-categories-utils.php';

    require_once dirname(__FILE__) . '/b/utils/shortcode-customize-products-slider-utils.php';

    add_shortcode(\Shortcodes\SHORTCODES::CUSTOMIZE_HOME_CATEGORIES_SHORTCODE, 
                    array('\Shortcodes\ShortcodeCustomizeHomeCategoriesUtils', 'render'));

    add_shortcode(\Shortcodes\SHORTCODES::CUSTOMIZE_PRODUCTS_SLIDER_SHORTCODE, 
                    array('\Shortcodes\ShortcodeCustomizeProductsSliderUtils', 'render'));