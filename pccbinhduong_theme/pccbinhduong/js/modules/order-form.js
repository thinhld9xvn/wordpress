 jQuery(function($) {

 var orderForm = {
    ready: function() {
    	$('#quantity').keydown(this.quantityKeyDown)
    				  .blur(this.quantityUnFocus);
        $('#requestOrder').click(this.orderFormShow);
    },
    quantityUnFocus: function(e) {
    	var quantity = $(this).val();

    	if ( quantity === '' ) {
    		alert('Mời nhập số lượng sản phẩm');
    		$(this).val( $(this).data('previous-value') );
    	}
    	
    },
    quantityKeyDown: function(e) {

    	if ( e.keyCode < 48 || e.keyCode > 57 ) {

    		if ( e.keyCode === 8 || e.keyCode === 46 ) {
    			$(this).data('previous-value', $(this).val() );
    		}

    		else {
    			e.preventDefault();
    		}
    	}

    },
    orderFormShow: function() {

        var quantity = $('#quantity').val(),
            pname = $(this).attr('data-pname'),
            popcode = $(this).attr('data-popcode'),
            $orderModalForm = $('#orderFormModal'),
            $name = $orderModalForm.find('.pvcf_field_input[name="txtTenSPDatHang"]'),
            $opcode = $orderModalForm.find('.pvcf_field_input[name="txtMaSanPham"]'),
            $quantity = $orderModalForm.find('.pvcf_field_input[name="txtSoLuong"]');

        if ( quantity !== '' ) {     

            $quantity.val( quantity );
            $opcode.val( popcode );
            $name.val( pname );

        	$orderModalForm.modal({
        		'backdrop' : 'static',
        		'keyboard' : false,
        		'show' : true
        	});

        }

        else {
        	alert('Mời nhập số lượng sản phẩm !');
        }

    }
    
}
orderForm.ready();

});