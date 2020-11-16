jQuery( function($) {

  var validate = {

      ready: function() {

        $('input[type=number][arial-required="true"]').keydown(this.inputNumberKeyDown)
                                                      .blur(this.inputNumberUnFocus);

      },
      handle: function($obj) { 

        var self = $obj,              
            $controls = $('*[arial-control="ratingstar"], input, textarea, select', self),
            $ce = null,
            ret = true;

        $controls.each(function() {

            var $c1 = $(this),
                type = $c1.prop('type'),
                cret = true;

            if ( $c1.attr('arial-control') === 'ratingstar' ) {             

                cret = validate.validateSRating( $c1 );

            }

            else {

              switch ( type ) {

                case 'text':
                case 'textarea':

                  cret = validate.validateTBox( $c1 );                 

                  break;

                case 'select-one':

                  cret = validate.validateSlBox( $c1 );                  

                  break;

                case 'radio':

                  cret = validate.validateRBox( $c1 );                 

                  break;                 
              
                case 'checkbox':
                  
                  cret = validate.validateCBox( $c1 );                 

                  break;

                default:                    
                  break;

              }

            }

            if ( ! cret ) {   

              // nhảy đến phần tử bị lỗi đầu tiên trong form
              if ( $ce === null ) {

                  // nếu không là checkbox và radiobox thì nhảy đến chính nó
                  if ( type !== 'radio' && type !== 'checkbox' ) {
                     $ce = $c1;
                  }

                  // nếu là checkbox và radiobox thì nhảy đến phần tử cạnh nó do nó đang bị ẩn vì dùng custom control
                  else {

                     $ce = $c1.next('.tvlInputBox');

                  }
              }

              if ( ret ) ret = false;

            }

        });          

        if ( $ce !== null ) validate.jumpToObjectErr( $ce );
        return ret;

      },      
      validateSRating: function($obj) {

        var ret = true,
             msg = "",             
             value = $obj.find(' > .ratingStarPoint').attr('vpoint'),              
             required = $obj.attr('arial-required'),
             required_err = $obj.attr('arial-required-err');

        // check required
        if ( required === 'true' ) {

            // required error occurred
            if ( value === '' || value === undefined ) {

               if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( required_err );

               if ( ret ) ret = false;

            }

            else { validate.error_removal( $obj ); }

        }

        if ( ! ret ) validate.err_generate( $obj, msg );

        return ret;

      },
      validateTBox: function($obj) {

         var ret = true,
             msg = "",
             regex = "",
             value = $obj.val(),
             required = $obj.attr('arial-required'),
             required_err = $obj.attr('arial-required-err'),
             minlength = parseInt( $obj.attr('arial-min-tlength') ),
             maxlength = parseInt( $obj.attr('arial-max-tlength') ),
             tlength_err = $obj.attr('arial-tlength-err'),
             numberonly = $obj.attr('arial-numberonly'),
             numberonly_err = $obj.attr('arial-numberonly-err'),
             email = $obj.attr('arial-email'),
             email_err = $obj.attr('arial-email-err');

         // check required
         if ( required === 'true' ) {

            // required error occurred
            if ( value === '' ) {

               if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( required_err );

               if ( ret ) ret = false;

            }

            else { validate.error_removal( $obj ); }

         }

         // check minlength and maxlength
         if ( minlength > 0 && maxlength > 0 && minlength < maxlength) {

            var len = value.length;

            // minlength, maxlength error occurs
            if ( len < minlength || len > maxlength ) {

               if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( tlength_err );

               if ( ret ) ret = false;

            }

            else { validate.error_removal( $obj ); }

         }

         // check number only
         if ( numberonly === 'true' ) {

            regex = /^[0-9]+$/;

            if ( ! regex.test( value ) ) {

               if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( numberonly_err );

               if ( ret ) ret = false;

            }

            else { validate.error_removal( $obj ); }

         }

         // check email only
          if ( email === 'true' ) {

            regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if ( ! regex.test( value ) ) {

              if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( email_err );

               if ( ret ) ret = false;

           }

           else { validate.error_removal( $obj ); }


         }

         if ( ! ret ) validate.err_generate( $obj, msg );

         return ret;

      },
      validateCBox: function($obj) {

        var ret = true,
             msg = "",           
             value = $obj.is(':checked'),
             required = $obj.attr('arial-required'),
             required_err = $obj.attr('arial-required-err');          

        // check required
        if ( required === 'true' ) {

            // required error occurred
            if ( ! value ) {

               if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( required_err );

               if ( ret ) ret = false;

            }

            else { validate.error_removal( $obj ); }

        }

        if ( ! ret ) validate.err_generate( $obj, msg );

        return ret;

      },  
      validateSlBox: function($obj) {

        var ret = true,
             msg = "",             
             value = $obj.val(),
             evalue = $obj.find('option[arial-option-empty]').val(),
             required = $obj.attr('arial-required'),
             required_err = $obj.attr('arial-required-err');          

        // check required
        if ( required === 'true' ) {

            // required error occurred
            if ( value === evalue ) {

               if ( msg !== '' ) msg += " <br/> ";

               msg += validate.msg_err_generate( required_err );

               if ( ret ) ret = false;

            }

            else { validate.error_removal( $obj ); }

        }

        if ( ! ret ) validate.err_generate( $obj, msg );

        return ret;

      },
      validateRBox: function($obj) {

        var ret = true,
            msg = "",                     
            $r = $('input[type=radio][name=' + $obj.attr('name') + ']'),  
            value = $r.is(':checked'),
            index = $r.index( $obj ),
            $groupbox = $obj.closest('*[arial-groupbox="true"]'),
            required = $groupbox.attr('arial-required'),
            required_err = $groupbox.attr('arial-required-err');

        // only check first radio option
        if ( index === 0 ) {

          // check required
          if ( required === 'true' ) {

              // required error occurred
              if ( ! value ) {

                if ( msg !== '' ) msg += " <br/> ";

                msg += validate.msg_err_generate( required_err );

                if ( ret ) ret = false;

              }

              else { validate.error_removal( $obj ); }

          }

          if ( ! ret ) validate.err_generate( $obj, msg );

        }

        return ret;

      },
      msg_err_generate: function(msg) {

        return '<span class="fa fa-exclamation-circle"></span> ' + msg;

      },  
      err_generate: function($obj, msg) {

        var $p = $obj.closest('*[arial-groupbox="true"]'),
            $err = $p.find('div.jvalidate_err');        

        if ( $err.length === 0 ) {

                $('<div/>', {
                      class: 'jvalidate_err'
                }).html( msg )
                  .attr('style', 'font-size: 14px !important; color: red !important; padding-left: 5px !important; margin: 5px 0 0 0 !important')
                  .appendTo( $p );
        }

        else {

            $err.html(msg);

        }

     },
     error_removal: function($obj) {

        var $p = $obj.closest('*[arial-groupbox="true"]'),
            $err = $p.find('div.jvalidate_err');   

        if ( $err.length > 0 ) {
              $err.remove();  
        }

     },       
     jumpToObjectErr: function($obj) {

        $('html, body').animate({
          scrollTop: $obj.offset().top - 50
        }, 200);

     },
     inputNumberKeyDown: function(e) {

        if ( e.keyCode < 48 || e.keyCode > 57 ) {

          if ( e.keyCode === 8 || e.keyCode === 46 ) {            
          }

          else {
            e.preventDefault();
          }

        }

     },
     inputNumberUnFocus: function(e) {

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

  validate.ready();

  $.fn.jvalidate = function() {

    return validate.handle( $(this) );    

  }

});

