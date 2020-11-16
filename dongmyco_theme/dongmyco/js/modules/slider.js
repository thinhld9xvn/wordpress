jQuery(function($) {

var slider = {

	ready: function() {

		this.flexSliderInit();
	},
	flexSliderInit: function() {
	 
	  $('.flexslider').flexslider({
	  	
	   		animation: "fade",
		    animationLoop: true,
		    pauseOnHover: false,
		    controlNav: false,
		    after: function(slider) {

			  /* auto-restart player if paused after action */
			  if ( ! slider.playing ) {
			    slider.play();
			  }

			}

	  });

		
	}

}

slider.ready();

});