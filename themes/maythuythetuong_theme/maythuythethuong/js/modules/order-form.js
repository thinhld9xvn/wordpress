 jQuery(function($) {

   var orderForm = {

      ready: function() { 
          $('.orderButton').click(this.orderFormShow);
      },    

      orderFormShow: function(e) {

          e.preventDefault();

          var quantity = 1,

              pname = $(this).attr('data-pname'),

              popcode = $(this).attr('data-popcode'),

              form_target = $(this).attr('modal-target'),              

              $orderModalForm = $( form_target ),

              $pvcf_productName = $orderModalForm.find('.pvcf_field_input[name="txtTenSPDatHang"]'),
              $pvcf_productOpcode = $orderModalForm.find('.pvcf_field_input[name="txtMaSanPham"]'),
              $pvcf_productQty = $orderModalForm.find('.pvcf_field_input[name="txtSoLuong"]');
              
          $pvcf_productName.val( pname );
          $pvcf_productOpcode.val( popcode );
          $pvcf_productQty.val( quantity );

          $orderModalForm.find('.modal-header')
                         .find('span')
                         .html( pname );

        $orderModalForm.modal({
          escapeClose: false,
          clickClose: false,
          showClose: true
        });

      }    

  }

  orderForm.ready();

});