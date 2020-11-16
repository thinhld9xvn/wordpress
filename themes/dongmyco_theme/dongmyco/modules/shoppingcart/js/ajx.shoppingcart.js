(function($){   
    
   var  jtcart_instance = [], // lưu instance của datatable ở trang sản phẩm chi tiết
        
		jscart_instance = [], // lưu instance của datatable ở trang giỏ hàng

		jsccart_flag = { // flag xác định thêm, sửa, xóa row trong bảng giỏ hàng
						// ở góc trên cùng bên phải màn hình khi hover chuột vào chữ "Giỏ hàng" sẽ xuất hiện
			'updateCart' : false, // update row
			'newCart' : false, // new row
			'removeCart': false, // remove row
			'updateSalesContentCarts': false, // cập nhật nội dung sản phẩm mua hàng dựa theo sự thay đổi của giỏ hàng
			disableAllFlags: function() {
				this.updateCart = false;
				this.newCart = false;
				this.removeCart = false;
				this.updateSalesContentCarts = false;
			},
			setEnableFlag: function(f) {
				this.disableAllFlags();
				jsccart_flag[f] = true;
			},
			setDisableFlag: function(f) {
				jsccart_flag[f] = false;
			}
		},

		jsccart = {}, // đối tượng giỏ hàng sẽ tương tác ở trong bảng giỏ hàng 
					 // ở góc trên cùng bên phải màn hình

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
	    },
	    
	    defOptions = { // option mặc định cho bảng dữ liệu dataTable

	        "language": {
	            "decimal": ",",
	            "thousands": ".",
	            "lengthMenu": "Hiển thị _MENU_ kết quả",
	            "zeroRecords": "Không tìm thấy kết quả nào",
	            "info": "Trang _PAGE_ / _PAGES_",
	            "infoEmpty": "Không có bản ghi nào",
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
	    },
        jcart_objects = []; // đối tượng này lưu trữ thông tin sản phẩm của từng row 
        					// trong bảng dữ liệu datatable ở trên trang sản phẩm chi tiết
        					
    $.each(jshoppingcart, function(k, obj) {
    	
    	obj.getTotal = function() {
    		return parseInt( this.price ) * parseInt( this.quantity );
    	}
    	
    });
    
    jshoppingcart.getTotal = function() {
    	
    	var total = 0;
    	
    	$.each(this, function() {
    		
    		total += this.getTotal();
    			
    	});
    	
    	return total;
    	
    }
	
	var shoppingcart = {
	    
	    // cập nhật giỏ hàng lên server
	    updateScToServer: function( callback ) {

	    	$('#UpdatingCartToServerModal').modal({
				'show' : true,
				'keyboard' : false,
				'backdrop' : 'static'
			});
	        
	        var data = {
			    'action': 'sb_shoppingcart_ajax',
                'cmd' : 'update_carts',
                'carts' : JSON.stringify( jshoppingcart )
			}
			
			$.post(sb_admin_ajax.url, data)
		     .done(function(results) {

		     	if ( results === 'success' ) {

		     		$('#UpdatingCartToServerModal').modal('hide');

			    	callback();
			        
			    }

		     })
		     .fail(function() {

		     	alert('Lỗi phát sinh trong quá trình gửi, xin hãy thử lại sau !');

		     });
	    },
		updateSCartRTime: function() {

			var $tableCart = $('.jshopcartlist').find('table'),				

				updateNumSTCart = function() {
					var $numCart = $('.shoppingcart').find('.numcart');					
					$numCart.text( jshoppingcart.length );
				},
				addNewRowSTCart = function(cart) {

					var html_newRow = '<tr class="p' + cart.index + '">'
									+  '   <td class="name">' + cart.name + '</td>'
									+  '   <td class="quantity">' + cart.quantity + '</td>'
									+  '</tr>';

					setSCartNotEmpty();
					
					$tableCart.find('tbody').append( html_newRow );
					updateNumSTCart();
				},
				updateRowSTCart = function(cart) {
					$tableCart.find('tbody').find('tr.p' + cart.index).find('td.quantity').text( cart.quantity );
				},
				removeRowSTCart = function(cart) {
					var $tbody = $tableCart.find('tbody');

					$tbody.find('tr.p' + cart.index).remove();

					if ( $tbody.find('tr:not(.empty)').length === 0 ) {
						setSCartEmpty();
					}

					updateNumSTCart();
				},
				setSCartNotEmpty = function () {
					if ( ! $tableCart.hasClass('--hasCart') ) {
						$tableCart.addClass('--hasCart');
					}
				},
				setSCartEmpty = function() {
					if ( $tableCart.hasClass('--hasCart') ) {
						$tableCart.removeClass('--hasCart');
					}
				},
				updateSubTotalCarts = function() {
					$('.totalPriceCarts').text( currency.formatMoney( jshoppingcart.getTotal(), 0, '.', ',' ) );
				},
				updateSalesContentCarts = function( cart ) {					

					var $nd = $('.pvcf-field[name="txtNoiDungDatHang"]');

					if ( jshoppingcart.length > 0 ) {

						if ( $nd.length > 0 ) {						

							var noidung_dh = $nd.val();

							if ( noidung_dh === '' ) {

								$.each(jshoppingcart, function(k, obj) {

									noidung_dh += obj.name + ' (' + obj.quantity + ')' + '\n'

								});

								$nd.val( noidung_dh );

							}

							else {

								if ( cart !== undefined ) {

									var pos = noidung_dh.indexOf( cart.name );

									if ( pos !== -1 ) {									
										noidung_dh = noidung_dh.replace( new RegExp(cart.name + ' \\(\\d+\\)', 'g'), cart.name + ' (' + cart.quantity + ')');
										$nd.val( noidung_dh );
									}

								}

							}		

						}				

					}

					else {

						var $sc_customdp = $('.shoppingcart-customdisplay');

						if ( $sc_customdp.length > 0 ) {
							$nd.val('');
							$sc_customdp.addClass('hidden');
						}

					}

				},
				updateSCartCallback = function() {

					if ( jsccart_flag.newCart ) {	
						addNewRowSTCart(jsccart);
						jsccart_flag.setDisableFlag('newCart');

						updateSubTotalCarts();
						updateSalesContentCarts(jsccart);
					}

					else if ( jsccart_flag.updateCart ) {

						updateRowSTCart(jsccart);
						jsccart_flag.setDisableFlag('updateCart');

						updateSubTotalCarts();
						updateSalesContentCarts(jsccart);

					}

					else if ( jsccart_flag.removeCart) {
						removeRowSTCart(jsccart);
						jsccart_flag.setDisableFlag('removeCart');

						updateSubTotalCarts();
						updateSalesContentCarts(jsccart);
					}

					else if ( jsccart_flag.updateSalesContentCarts ) {
						updateSalesContentCarts(jsccart);
						jsccart_flag.setDisableFlag('updateSalesContentCarts');
					}

				};

			setInterval(updateSCartCallback, 200);
		},	
		
		// xác định row có chứa field .quantity trong datatable 
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
		
		// function thêm giỏ hàng chính
		doAddCart: function(cart, callback) {

			var exist = false; // biến kiểm tra xem giỏ hàng trong jshoppingcart đã tồn tại hay chưa

			jsccart = cart;
			$.each(jshoppingcart, function( k, obj ) {

				// đã tồn tại => update số lượng 
				if ( obj.name === cart.name ) {
					obj.quantity = cart.quantity;
					jsccart_flag.setEnableFlag('updateCart');
					exist = true;
				}

			});

			if ( ! exist ) {				
				jshoppingcart.push( cart );
				jsccart_flag.setEnableFlag('newCart');
			}
			
			shoppingcart.updateScToServer( callback );

		},
		
		// event
		addToCart: function(e) {

			var index = 0,
				cart = null,
				$rowHasQty = $(this).closest('tr'),
				quantity = '';

			$rowHasQty = shoppingcart.determineRowHasQty( $rowHasQty );			
			quantity = $rowHasQty.find('.quantity').val();			

			// nếu hiện là row con ẩn thì nhảy lại một hàng về hàng cha đang chứa nó
			if ( $rowHasQty.hasClass('child') ) {
				$rowHasQty = $rowHasQty.prev();
			}

			index = $rowHasQty.index('tbody tr[role="row"]');

			cart = jcart_objects[index];			
			
			if ( quantity !== '' && parseInt( quantity ) > 0 ) {

				cart.quantity += parseInt( quantity );
				shoppingcart.doAddCart( cart, function() {

					$('#AddToCartSuccessModal').modal({
						'show' : true,
						'keyboard' : false,
						'backdrop' : 'static'
					});

				});				

			}

			else {
				alert('Mời nhập số lượng sản phẩm !');
			}
			
		},	
		
		// event	
		updateCart: function(e) {

			var	$row = $(this).closest('tr'),
				row_index = 0,	
				$qty = null,			
				qty = '',
				updateCallback = function(r_index, q) {
					
					jshoppingcart[r_index].quantity = q;
					jscart_instance[0].cell(r_index, 5).data( currency.formatMoney( jshoppingcart[r_index].getTotal(), 0, '.', ','  ) ).draw();
					
					jsccart = jshoppingcart[r_index];
					jsccart_flag.setEnableFlag('updateCart');
					
					shoppingcart.updateScToServer( function() {} );
				}	

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
							$(this).val( jshoppingcart[index].quantity );					
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
						$qty.val( jshoppingcart[row_index].quantity );
					}
					
					break;
			}

		},
		
		// event
		removeCart: function(e) {

			var $row = $(this).closest('tr'),
				row_index = 0,
				table_index = $(this).closest('table').index('.dataTable');

			$row = shoppingcart.determineRowHasQty( $row );
			row_index = $row.index('tbody tr[role="row"]');

			console.log(row_index);

			jsccart = jshoppingcart[row_index];

			jscart_instance[ table_index ].row( row_index ).remove().draw();
			jshoppingcart.splice(row_index, 1);	

			jsccart_flag.setEnableFlag('removeCart');
			shoppingcart.updateScToServer( function() {} );	
			
			
		}
	}

	shoppingcart.updateSCartRTime();

	$(document).on('click', '.dataTable .btnAddToCart', shoppingcart.addToCart);	
	$(document).on('keyup', '.dataTable.shoppingcart .quantity', shoppingcart.updateCart);
	$(document).on('click', '.dataTable .btnUpdateCart', shoppingcart.updateCart);
	$(document).on('click', '.dataTable .btnRemoveCart', shoppingcart.removeCart);

	// bảng list sản phẩm ở sản phẩm chi tiết
	$('*[data-navig="jtablecart"]').each(function() {

		var $table = $(this).find('table');

		$table.each(function(k, obj) {

			var $tbody = $(this).find('tbody'),
				$firstRow = $tbody.find('tr:first-child'),			
				$firstRowColumns = null,
				$eachNextRow = null,
				$thead = null;
			
			$(this).removeAttr('width')
				   .removeAttr('style')
				   .prepend('<thead></thead>');
				   
			$(this).find('colgroup').remove();
				   
			$(this).find('tr').removeAttr('class').removeAttr('style');
			$(this).find('td').removeAttr('class').removeAttr('width').removeAttr('height').removeAttr('style');
			$(this).find('th').removeAttr('class').removeAttr('width').removeAttr('height').removeAttr('style');

			$thead = $(this).find('thead');

			$firstRow.append('<td>Số lượng</td>')
					 .append('<td>Chức năng</td>');

			$firstRowColumns = $firstRow.find('td');
			$firstRowColumns.each(function() {

				$('<th>' + $(this).html() + '</th>').replaceAll( $(this) );

			});			
			
			$firstRow.appendTo($thead);

			$eachNextRow = $tbody.find('tr');

			// đọc từng row sản phẩm rồi ghi vào biến jcart_objects
			$eachNextRow.each(function() { 

				var index = $(this).index(),
					cart = {
					'index' : index,
					'name' : $(this).find('td:first-child').text().trim(),
					'spec' : 'Chiều dầy: ' + $(this).find('td:nth-child(4)').text().trim() + ' (' + $(this).find('td:nth-child(5)').text().trim() + ')',
					'price' : currency.toPrice( $(this).find('td:last-child').text().trim(), '\\.', '' ),
					'quantity' : 0,
					 getTotal : function() {
					 	return parseInt( this.price ) * parseInt( this.quantity );
					}
				}		
				jcart_objects[index] = cart;

				$(this).append('<td><input style="width: 60px" class="form-control quantity" type="number" min="1" name="quantity" value="1" /></td>')
					   .append('<td><input class="btn btn-success btnAddToCart" type="button" data-index="' + index + '" value="Thêm giỏ hàng" /></td>');

			});

			if ( ! $(this).hasClass('display responsive nowrap') ) {
				$(this).addClass('display responsive nowrap');
			}		
			
			jtcart_instance[k] = $(this).DataTable(defOptions);

			$(this).removeAttr('style')			
				   .closest('.sp-table')
				   .addClass('active');

		});

	});
	
	// bảng giỏ hàng của khách ở trang giỏ hàng
	$('*[data-navig="jmyscart"]').each(function(k, obj) {

		jscart_instance[k] = $(this).DataTable(jscart_defOptions);
		jsccart_flag.setEnableFlag( 'updateSalesContentCarts' );

	});

})(jQuery);