jQuery(function($) {

	$('a[modal-type="master-modal"]').click(function(e) {

		e.preventDefault();

		var modal_target = $(this).attr('modal-target'),

			_pricedata = $(this).attr('data-sp-price'),
			price = parseInt( currency.toPrice( _pricedata, '[.,]', '' ) ),

			opcode = $(this).attr('data-sp-opcode'),
			name = $(this).attr('data-sp-name'),

			qty = 1,

			$txtQty = $('#txtQty'),

			$modal = $( modal_target );

		$modal.find('input[name=txtGiaTienSP]')
			  .val( _pricedata );

		$modal.find('input[name=txtMaSanPham]')
			  .val( opcode );

		if ( $txtQty.length > 0 ) {

			qty = parseInt( $txtQty.val().toString() );

		}		

		$modal.find('input[name=txtSoLuong]')
			  .val( qty );

		$modal.find('input[name=txtThanhTienSP]')
		  	  .val( currency.formatMoney( price * qty, 0, '.', ',' ) );

		$modal.find('.modal-header > span')
			  .text( name );

		$modal.modal({

		  escapeClose: false,
		  clickClose: false,
		  showClose: true

		});

	});

	$('.pvcf_field_input[type=number][name=txtSoLuong]').change(function(e) {

		e.preventDefault();

		var quantity = parseInt( $(this).val().toString() );

		if ( quantity > 0 ) {

			var _pricedata = $('.pvcf_field_input[name=txtGiaTienSP]').val().toString(),
				price = parseInt( currency.toPrice( _pricedata, '[.,]', '' ) );

			if ( ! isNaN( price ) ) {

				var	totalPrice = currency.formatMoney( price * quantity, 0, '.', ',' );

				$('.pvcf_field_input[name=txtThanhTienSP]').val( totalPrice );

			}

		}


	});

})