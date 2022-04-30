export function setupFaqs() {

    jQuery('.grid-faqs-layout .faq-element').click(function(e) {

        e.preventDefault();

        jQuery(this).closest('figure').toggleClass('expand');

    })

}