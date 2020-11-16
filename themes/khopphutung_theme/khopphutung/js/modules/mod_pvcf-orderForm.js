 jQuery(function($) {

   var orderForm = {

      ready: function() {    	

          $('#numQty').keydown( this.quantityKeyDown )
                      .blur( this.quantityUnFocus );
          $('.btnOrderProd').click(this.orderFormShow);        

      },    
      orderFormShow: function(e) {

          e.preventDefault();

          var quantity = 1,
              pname = $(this).attr('data-pname'),
              popcode = $(this).attr('data-popcode'),
              form_target = $(this).attr('target-href'),
              $qty = $('#numQty'),
              $orderModalForm = $( form_target ),
              $pvcf_productName = $orderModalForm.find('.pvcf_field_input[name="txtTenSPDatHang"]'),
              $pvcf_productOpcode = $orderModalForm.find('.pvcf_field_input[name="txtMaSanPham"]'),
              $pvcf_productQty = $orderModalForm.find('.pvcf_field_input[name="txtSoLuong"]');

          if ( $qty.length > 0 ) {
              quantity = $qty.val();
          } 

          $pvcf_productName.val( pname );
          $pvcf_productOpcode.val( popcode );
          $pvcf_productQty.val( quantity );       

          $orderModalForm.find('.modal-title')
                         .find('span')
                         .html( pname );

      	$orderModalForm.modal({
      		'backdrop' : 'static',
      		'keyboard' : false,
      		'show' : true
      	});

      },
      quantityKeyDown: function(e) {

          if ( e.keyCode < 48 || e.keyCode > 57 ) {

            if ( e.keyCode === 8 || e.keyCode === 46 ) {            
            }

            else {
              e.preventDefault();
            }

          }

      },
      quantityUnFocus: function(e) {

          var value = $(this).val(),
              min_value = parseInt( $(this).attr('min') );

          if ( value === '' ) {

            alert('Mời nhập giá trị cho trường !');          
            $(this).val( min_value );

            return false;

          }

          value = parseInt( value );

          if ( value < min_value ) {

            alert('Giá trị nhập vào không được nhỏ hơn ' + min_value + ' !');
            $(this).val( min_value );

            return false;

          }

      }
      
  }
  orderForm.ready();

});