 var orderForm = {
    ready: function() {
    	$('#numQty').keydown(this.quantityKeyDown)
    				  .blur(this.quantityUnFocus);
        $('#btnOrderProd').click(this.orderFormShow);
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

        var quantity = $('#numQty').val(),
            pname = $(this).attr('data-pname'),
            $orderModalForm = $('#orderFormModal'),
            $nd = $orderModalForm.find('.pvcf_field_input[name="txtNoiDungDatHang"]');

        if ( quantity !== '' ) {  

            $nd.val( pname.toString() + ' (' + quantity.toString() + ')' );

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