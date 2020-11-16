jQuery(function($) {

var rbg = {
	ready: function() {

		this.setElemOriginalPropery();
		this.responsiveBannerSlider();

		$(window).resize(this.responsiveBannerSlider);

	},

	setElemOriginalPropery: function() {	

		var img = null,				
			ratio = 0,
			main_bg = '',
			img_src = '',				
			w = $(window).width();

		$('*[data-navig="responsivebg"]').each(function() {
						
			$(this).data('original-height', $(this).height() )
			       .data('original-width', $(this).width() );

			/*console.log('width: ' + img.width);
			console.log('height: ' + img.height);*/

			$( "*", this ).each(function() {									

				/*console.log('width: ' + img.width);
				console.log('height: ' + img.height);*/

				$(this).data('original-width', $(this).width() )
					   .data('original-height', $(this).height() )
					   .data('original-top', parseInt( $(this).css('top') ) )
					   .data('original-left', parseInt( $(this).css('left') ) );
												
			 	
			});	
				

		});


	},
	responsiveBannerSlider: function(e) {    
	    
	    var w = $(window).width(),		    
	    	slider_orig_w = 0,
	    	slider_w = 0,
	    	slider_h = 0,
	    	obj_w = 0,
	    	obj_h = 0,
	    	new_obj_w = 0,
	    	new_obj_h = 0,
	    	obj_top = 0,
	    	obj_left = 0,
	    	new_obj_top = 0,
	    	new_obj_left = 0,	    	
	    	ratio = 0;

	    $('*[data-navig="responsivebg"]').each(function() {

	    	slider_orig_w = $(this).data('original-width');
	    	slider_orig_h = $(this).data('original-height');		    	

	    	ratio = slider_orig_h / slider_orig_w;

	    	slider_w = w;
	    	slider_h = ratio * slider_w;

	    	$(this).width( slider_w )
	    		   .height( slider_h );

	    	$('*', this).each(function() {

	    		obj_w = $(this).data('original-width');
	    		obj_h = $(this).data('original-height');		    		

	    		new_obj_w = w * obj_w / slider_orig_w;
	    		new_obj_h = new_obj_w * obj_h / obj_w;

	    		obj_top = $(this).data('original-top');
	    		obj_left = $(this).data('original-left');	

	    		// chieu cao slider hien tai * vi tri top ban dau cua doi tuong / chieu cao slider nguyen ban dau
	    		new_obj_top = slider_h * obj_top / slider_orig_h;

	    		// chieu rong slider hien tai * vi tri left ban dau cua doi tuong / chieu rong slider nguyen ban dau
	    		new_obj_left = slider_w * obj_left / slider_orig_w;

	    		$(this).width( new_obj_w )
	    			   .height( new_obj_h )		    			   
	    			   .css({
	    			   	  'background-size' : new_obj_w + 'px ' + new_obj_h + 'px',
	    			   	  'top' : new_obj_top + 'px',
	    			   	  'left' : new_obj_left + 'px'
	    			   	});
	    	});

	    });
	    
	}		

}

rbg.ready();

});