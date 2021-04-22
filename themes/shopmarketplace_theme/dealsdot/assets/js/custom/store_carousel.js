jQuery(document).ready(function( $ ) {
 "use strict";
 
	$('.homepage-owl-carousel').each(function(){

		var owl = $(this);
		var  itemPerLine = owl.data('item');
		if(!itemPerLine){
			itemPerLine = storecarousel.itemperline;
		}
		owl.owlCarousel({
			items : itemPerLine,
			itemsTablet:[768,3],
		  itemsDesktop : [1300,7],
		   itemsDesktopSmall :[1180,5],
			itemsMobile : [479,2],
			navigation : true,
			pagination : false,

			navigationText: ["", ""]
		});
	});
		
}); 