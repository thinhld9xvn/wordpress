export function setupToggleWidgetOnMobile() {

    if (jQuery(window).width() < 768) {

        const $widgetToggle = jQuery('.widget-filter-price, .widget-filter-distance');

        $widgetToggle.addClass('__minimize');

        $widgetToggle.find('h4.widget-title').click(function(e) {

            jQuery(this).parent().toggleClass('__minimize');

        });

    }

}