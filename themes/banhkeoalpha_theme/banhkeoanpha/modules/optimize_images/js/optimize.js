(function( $ ) {

	var optimize = {		

		ready: function() {
			
			$('#btnOptimizeImages').click(this.optimizeImages);

		},
		optimizeImages: function(e){

			var $obj = $(this);

			$obj.prop('disabled', true);
			$obj.next('.optimize-ajax').addClass('active');
			$('#optimizeLog').html( 'Đang nén, xin hãy vui lòng đợi vài phút để hoàn tất ( chú ý không thoát trình duyệt ) ...' );

			var data = {
	            'action': 'sb_optimize_callback_ajax',		          
	            'cmd' : 'optimize'
		    };

		    $.ajax({

		    	'async' : true,
		    	'url' : sb_admin_ajax.url,
		    	'type' : 'post',
		    	'data' : data,		    	
		    	success: function( msg ) {

		    		$obj.prop('disabled', false);
					$obj.next('.optimize-ajax').removeClass('active');
					$('#optimizeLog').html( 'Đã nén xong !' );

		    	},
		    	error: function( msg ) {

		    		$('#optimizeLog').html( 'Có lỗi phát sinh, xin hãy kiểm tra lại !' );

		    	}

		    });	  
		     
		}


	}

	optimize.ready();

})(jQuery);