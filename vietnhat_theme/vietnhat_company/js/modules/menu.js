jQuery( function($) {

var menu = {
    ready: function() {
        $(document).mouseup(this.onToggleNavMenu);       
    },
    onToggleNavMenu: function(e) {
        var $container = $('.m-mainmenu'),
            $target = $(e.target);        

        if ( $target.hasClass('m-menuicon')
              || $target.parent().hasClass('m-menuicon' ) ) {

            $container.toggleClass('active');
        }       

        else {

            if (!$container.is(e.target) // if the target of the click isn't the container...
            && $container.has(e.target).length === 0) // ... nor a descendant of the container
            {
              if ( $container.hasClass('active') ) {
                $container.removeClass('active');
              }

            }   
        }
    }
}

menu.ready();

});