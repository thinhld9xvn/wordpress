jQuery( function($) {

var drawline = {
	ready: function() {
		this.responsiveDrawLineSize();

		$(window).resize(this.responsiveDrawLineSize);
	},
	responsiveDrawLineSize: function(e) {

		$('*[data-navig="drawline"]').each(function() {
			var ctarget = $(this).attr('data-childtarget'),
				ccompare = $(this).attr('data-childcompare'),
				pw = $(this).parent().width(),
				padleft = parseInt( $(this).css('padding-left') ),
				w = $(this).find(ccompare).width(),
				hr_width =  pw - w - 5;
				
			if( padleft > 0 ) {
				hr_width = hr_width - padleft;
			}
			
			$(this).find(ctarget).width( hr_width );

		});

	}
}
drawline.ready();

});