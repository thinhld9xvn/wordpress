export function setupBanksListLogo() {

    jQuery('.logoBanksList > a').click(function(e) {

        e.preventDefault();

        jQuery(this).addClass('active')
                    .siblings()
                    .removeClass('active');

    })
    
}