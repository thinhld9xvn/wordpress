var jshoppingcart = {}; /* đối tượng này lưu trữ thông tin tất cả 
						   sản phẩm mà khách hàng đã thêm vào 
						   trong giỏ hàng hiện tại */

jshoppingcart.data = [];

jshoppingcart.bindMethod = function() {

	var obj = this.data;	

	obj.getTotal = function() {
	
		var total = 0,
			_obj = this;

		if ( _obj.length > 0 ) {

			for ( var i = 0; i < _obj.length; i++ ) {
				
				total += _obj[i].getTotal();
					
			}

		}
		
		return total;	
	}	

	for ( var i = 0; i < obj.length; i++ ) {

		obj[i].getTotal = function() {
			return parseInt( this.price ) * parseInt( this.quantity );
		};    			

	}

}

jQuery( function($) {
    
   var  jscart_instance = [], // lưu instance của datatable ở trang giỏ hàng

		jsccart_flag = { // flag xác định thêm, sửa, xóa row trong bảng giỏ hàng
						// ở góc trên cùng bên phải màn hình khi hover chuột vào chữ "Giỏ hàng" sẽ xuất hiện

			'updateCart' : false, // update row				

		},		

		jscart_defOptions = { // option mặc định cho bảng dữ liệu dataTable ở trang giỏ hàng

	        "language": {

	            "decimal": ",",
	            "thousands": ".",
	            "lengthMenu": "Hiển thị _MENU_ kết quả",
	            "zeroRecords": "Chưa có sản phẩm nào trong giỏ hàng.",
	            "info": "Trang _PAGE_ / _PAGES_",
	            "infoEmpty": "Không có sản phẩm nào",
	            "infoFiltered": "",
	            "search": "Tìm sản phẩm ",
	            "paginate": {

	                "first":        "Trang đầu",
	                "previous":     "Trước",
	                "next":         "Sau",
	                "last":         "Trang cuối"

	            }

	        },

	        "pageLength" : 25

	    }; 
    
	
	var shoppingcart = {

		updateSCartRTime: {					

			updateNumSTCart : function() {
								
				$('.jshoppingcart').find('.numcart')
								 	 .text( jshoppingcart.data.length );

			},

			updateRowsSTCart : function( _carts ) {

				var SCartRTime = shoppingcart.updateSCartRTime,
					$tableCart = $('.jshoppingcart').find('table');

				$tableCart.find('tbody')
						  .find('tr:not(.empty)')
						  .remove();

				if ( _carts.length > 0 ) {

					SCartRTime.setSCartNotEmpty();					

					$.each( _carts, function(index, cart) {

						var html_newRow = '<tr class="p' + cart.id + '">'
										+  '   <td class="name">' + cart.name + '</td>'
										+  '   <td class="quantity">' + cart.quantity + '</td>'
										+  '</tr>';						
						
						$tableCart.find('tbody').append( html_newRow );

					});

				}

				else {

					SCartRTime.setSCartEmpty();

				}

				SCartRTime.updateNumSTCart();
				SCartRTime.updateSubTotalCarts();

			},			

			setSCartNotEmpty : function () {

				var $tableCart = $('.jshoppingcart').find('table');

				if ( ! $tableCart.hasClass('-hasCart') ) {
					$tableCart.addClass('-hasCart');
				}

			},

			setSCartEmpty : function() {

				var $tableCart = $('.jshoppingcart').find('table');

				if ( $tableCart.hasClass('-hasCart') ) {
					$tableCart.removeClass('-hasCart');
				}

			},

			updateSubTotalCarts : function() {

				var $totalPriceCarts = $('.totalPriceCarts'),
					subTotal = 0;

				if ( $totalPriceCarts.length > 0 ) {

					if ( jshoppingcart.data.length > 0 ) {
						subTotal = currency.formatMoney( jshoppingcart.data.getTotal(), 0, '.', ',' );
					}

					$totalPriceCarts.text( subTotal );

				}	

			},

			updateOrderCartsFormContent: function() {

				var t = setInterval(function() {

					var carts = jshoppingcart.data,
						carts_length = carts.length;

					if ( carts_length > 0 ) {

						var $txtNoiDungDH = $('input[type=hidden][name=txtNoiDungDatHang]'),
							txtNoiDungDH = '';

							for ( var i = 0; i < carts_length; i++ ) {

								txtNoiDungDH += "\t- Sản phẩm " + (i+1) + ":\r\n";
								txtNoiDungDH += "\t\t+ Tên sản phẩm: " + carts[i]['name'] + "\r\n" 
											 +  "\t\t+ Mã sản phẩm: " + carts[i]['opcode'] + "\r\n" 									 
											 +  "\t\t+ Số lượng: " + carts[i]['quantity'] + "\r\n" 									 
											 +  "\t\t+ Đơn giá: " + currency.formatMoney( carts[i]['price'], 0, '.', ',' ) + " VNĐ\r\n"
											 +  "\t\t+ Thành tiền: " + currency.formatMoney( carts[i].getTotal(), 0, '.', ',' ) + " VNĐ\r\n";

							}

							txtNoiDungDH += "\t- Tổng tiền phải thanh toán: " + currency.formatMoney( carts.getTotal(), 0, '.', ',' ) + " VNĐ\r\n";

							$txtNoiDungDH.val( txtNoiDungDH );

					}

				}, 200);			

			}
				
		},
	    
	    // cập nhật giỏ hàng lên server
	    updateScToServer: function( callback ) {
	        
	        var data = {
			    'action': 'sb_shoppingcart_ajax',
                'cmd' : 'update_carts',
                'carts' : JSON.stringify( jshoppingcart.data )
			};		

			shoppingcart.updateSCartRTime.updateRowsSTCart( jshoppingcart.data );

			$.ajax({

				type : 'POST',
				async: true,
				cache : false,
				url : sb_admin_ajax.url,
				data : data

			}).done(function() {

				$.modal.close();

				if ( $.isFunction( callback ) ) {

					callback();
				}

			});

	    },

	    // lấy giỏ hàng từ server
	    getScFromServer: function() {	    	
	        
	        var data = {
				    'action': 'sb_shoppingcart_ajax',
	                'cmd' : 'get_carts'
				};				
			
			return $.ajax({
							
				type : 'POST',
				async: true,
				cache : false,				
				url : sb_admin_ajax.url,
				data : data

			});	

	    },		

		// xác định row chứa field .quantity trong datatable
		determineRowHasQty: function( $obj ) {

			var $row = $obj,

				$qty = null,

				is_found = false;

			while ( ! is_found ) {

				$qty = $row.find('.quantity');

				// tìm thấy

				if ( $qty.length > 0 ) {

					is_found = true;

				}

				

				else {

					// nhảy về row cha của nó rồi tiến hành tìm lại

					if ( $row.hasClass('child') ) {

						$row = $row.prev();

					}

					// hiện đang ở hàng cha, trả về false báo hiệu không tìm được

					else {

						return false;

					}

				}

			}

			return $row;

		},

		// event
		addToCartEvent: function(e) {

			e.preventDefault();

			$('#orderScModal').modal({

				escapeClose: false,
				clickClose: false,
				showClose: false

			});					

			var cart = {

				'id' : parseInt( $(this).attr('data-pid') ),
				'name' : $(this).attr('data-pname'),
				'price' : parseFloat( $(this).attr('data-pprice') ),
				'opcode' : $(this).attr('data-popcode'),
				'quantity' : $(this).attr('data-pqty') !== undefined && 
							 $(this).attr('data-pqty') !== '' ? parseInt( $(this).attr('data-pqty') ) : parseInt( $('#txtQty').val() )

			},

			addToCartSuccessCallback = function() {

				$('#addToCartSuccessModal').modal({

					escapeClose: false,
					clickClose: false,
					showClose: false

				});

			};

			shoppingcart.getScFromServer()
						.then( function(carts) {

				jshoppingcart.data = carts;

				if ( jshoppingcart.data.length > 0 ) {
					jshoppingcart.bindMethod();
				}

				var filter_carts = jshoppingcart.data.filter( function( jcart ) {
					return jcart.id === cart.id;
				});

				// đã tồn tại sản phẩm này trong giỏ  hàng => update
				if ( filter_carts.length > 0 ) {

					var _jcart = filter_carts[0],
						index = jshoppingcart.data.findIndex( function(jcart) { return jcart.id === _jcart.id  } );

					if ( index !== -1 ) {						

						jshoppingcart.data[index].quantity += cart.quantity;									

					}

				}

				else {
					
					jshoppingcart.data.push( cart );		

				}					

				shoppingcart.updateScToServer( addToCartSuccessCallback );	

			});			

		},

		// event	
		updateCart: function(e) {			

			var	$row = $(this).closest('tr'),

				row_index = 0,	

				$qty = null,			

				qty = '',

				updateCallback = function(r_index, q) {	

					$('#orderScModal').modal({

						escapeClose: false,
						clickClose: false,
						showClose: false

					});		

					shoppingcart.getScFromServer()
								.then( function(carts) {	

						jshoppingcart.data = carts;

						if ( jshoppingcart.data.length > 0 ) {
							jshoppingcart.bindMethod();
						}

						jshoppingcart.data[r_index].quantity = q;					

						jscart_instance[0].cell(r_index, 4).data( currency.formatMoney( jshoppingcart.data[r_index].getTotal(), 0, '.', ','  ) ).draw();												

						shoppingcart.updateScToServer();

					});

				};

			$row = shoppingcart.determineRowHasQty( $row );

			row_index = $row.index('tbody tr[role="row"]');
			
			switch ( e.type ) {				

				case 'keyup':

					// enter key press

					if ( e.which === 13 ) {

						qty = $(this).val();

						if ( qty !== '' && parseInt( qty ) > 0 ) {

							updateCallback( row_index, qty );

						}

						else {

							alert('Mời nhập số lượng sản phẩm !');

							$(this).val( jshoppingcart.data[index].quantity );					

						}

						$(this).blur();	 // exit edit mode

					}

					break;

				default:

					$qty = $row.find('.quantity')

					qty = $qty.val();

					if ( qty !== '' && parseInt( qty ) > 0 ) {

						updateCallback(row_index, qty);

					}

					else {

						alert('Mời nhập số lượng sản phẩm !');

						$qty.val( jshoppingcart.data[row_index].quantity );

					}					

					break;
			}

		},

		// event
		removeCart: function(e) {

			$('#orderScModal').modal({

				escapeClose: false,
				clickClose: false,
				showClose: false

			});

			var $row = $(this).closest('tr'),
				row_index = 0,
				table_index = $(this).closest('table').index('.dataTable');

			shoppingcart.getScFromServer()
						.then( function(carts) {

				jshoppingcart.data = carts;

				if ( jshoppingcart.data.length > 0 ) {
					jshoppingcart.bindMethod();
				}				

				$row = shoppingcart.determineRowHasQty( $row );

				row_index = $row.index('tbody tr[role="row"]');				

				jscart_instance[ table_index ].row( row_index ).remove().draw();

				jshoppingcart.data.splice(row_index, 1);

				shoppingcart.updateScToServer();

				if ( jshoppingcart.data.length === 0 ) {

					$('.shoppingcart-customdisplay').addClass('hidden');

				}

			});	

		}
		
	}	

	$(document).on('click', '.addToScButton', shoppingcart.addToCartEvent)
			   .on('keyup', '.dataTable.listCarts .quantity', shoppingcart.updateCart)
			   .on('click', '.dataTable .btnUpdateCart', shoppingcart.updateCart)
			   .on('click', '.dataTable .btnRemoveCart', shoppingcart.removeCart);

	var $jscart_elem = $('*[data-navig="jmyscart"]');

	if ( $jscart_elem.length > 0 ) {

		// bảng giỏ hàng của khách ở trang giỏ hàng
		$jscart_elem.each(function(k, obj) {

			if ( jshoppingcart.data.length > 0 ) {

				jscart_instance[k] = $(this).DataTable(jscart_defOptions);

				shoppingcart.updateSCartRTime.updateOrderCartsFormContent();				

			}

		});

	}

});