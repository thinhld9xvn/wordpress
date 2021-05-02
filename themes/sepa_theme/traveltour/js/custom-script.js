jQuery(function($) {

    function parse_query_string(query) {
        var vars = query.split("&");
        var query_string = {};
        for (var i = 0; i < vars.length; i++) {
          var pair = vars[i].split("=");
          var key = decodeURIComponent(pair[0]);
          var value = decodeURIComponent(pair[1]);
          // If first entry with this name
          if (typeof query_string[key] === "undefined") {
            query_string[key] = decodeURIComponent(value);
            // If second entry with this name
          } else if (typeof query_string[key] === "string") {
            var arr = [query_string[key], decodeURIComponent(value)];
            query_string[key] = arr;
            // If third or later entry with this name
          } else {
            query_string[key].push(decodeURIComponent(value));
          }
        }
        return query_string;
      }

    $('.tourmaster-register-form').submit(function(e) {

        /*e.preventDefault();

        console.log($(this));*/

        const getUserName = function($form) {

            return $form.find('input[type=text][name=username]').val();

        }

        const getCode = function($form) {

            return $form.find('input[type=text][name=numero]').val();

        }

        const getPassword = function($form) {

            return $form.find('input[type=password][name=password]').val();

        }

        const getConfirmPassword = function($form) {

            return $form.find('input[type=password][name=confirm-password]').val();

        }

        const getFirstName = function($form) {

            return $form.find('input[type=text][name=first_name]').val();

        }

        const getLastName = function($form) {

            return $form.find('input[type=text][name=last_name]').val();

        }

        const getEmail = function($form) {

            return $form.find('input[type=email][name=email]').val();

        }

        const getPhone = function($form) {

            return $form.find('input[type=text][name=phone]').val();

        }

        const getBoolTerms = function($form) {

            return $form.find('input[type=checkbox][name=tourmaster-require-acceptance]').prop('checked');

        }

        const checkValidateForm = function($form) {    

            username = getUserName($form),
            code = getCode($form),
            password = getPassword($form),
            confirm_password = getConfirmPassword($form),
            first_name = getFirstName($form),
            last_name = getLastName($form),    
            email = getEmail($form),
            phone = getPhone($form),
            chkTerms = getBoolTerms($form);

            if ( chkTerms && username && code && password && confirm_password && first_name && last_name && email && phone ) {

                if ( password === confirm_password ) {

                    return true;

                }

            }

            return false;

        }

        const $form = $(this),
              boolValidate = checkValidateForm($form);

        if ( ! boolValidate ) return;

        if ( boolValidate ) {

            e.preventDefault();

            $.ajax({

                type : "POST",
                url : "/wp-admin/admin-ajax.php",
                async : true,
                data : {

                    action : "sb_validate_username_action",
                    params : {

                        email : getEmail($form),
                        username : getUserName($form),
                        code : getCode($form)

                    }
                    
                }

            }).done(function(data) {

                $form[0].submit();

            });


        }

    });

    $('#wpsd-donation-form-id .wpsd-donate-button').click(function(e) {

        //e.preventDefault();

        const $form = $('#wpsd-donation-form-id');

        const getNomField = function() {

            return $('#nom', $form).val().toString().trim();

        }

        const getNomBreField = function() {

            return $('#nombre', $form).val().toString().trim();

        }

        const getCompanyAddrField = function() {

            return $('#company_address', $form).val().toString().trim();

        }

        const getSpField = function() {

            return $('#sp', $form).val().toString().trim();

        }

        const getVilleField = function() {

            return $('#ville', $form).val().toString().trim();

        }

        const getPrenomField = function() {

            return $('#prenom', $form).val().toString().trim();

        }

        const getTelField = function() {

            return $('#tel', $form).val().toString().trim();

        }

        const getEmailField = function() {

            return $('#email', $form).val().toString().trim();

        }

        const getVotreRadioField = function() {

            const $field = $("input[type=radio][name=votre]:checked", $form);

            if ( $field.length ) {

                return $field.val().toString().trim();    

            }

            return null;

        }

        const isNewsletterChecked = function() {

            return $("input[type=checkbox][name=checkbox_newsletter]").prop('checked');

        }

        const isConditionsChecked = function() {

            return $("input[type=checkbox][name=conditions]").prop('checked');

        }

        const nom = getNomField(),
              nomBre = getNomBreField(),
              companyAddr = getCompanyAddrField(),
              sp = getSpField(),
              ville = getVilleField(),
              prenom = getPrenomField(),
              tel = getTelField(),
              email = getEmailField(),
              votre = getVotreRadioField(),
              boolNewsletterChecked = isNewsletterChecked(),
              boolConditionsChecked = isConditionsChecked();

        if ( nom && nomBre && 
             companyAddr && sp && 
             ville && prenom && 
             tel && email &&
             votre && boolNewsletterChecked && true === boolNewsletterChecked && 
             boolConditionsChecked && true === boolConditionsChecked ) {

            //e.preventDefault();

            console.log('abc');

            //$form[0].submit();

        }

    })

    function setActiveDashboardStaffMenuItem() {

        const myUrl = new URL(window.location.href);

        const query = myUrl.search.substr(1);

        const parameters = parse_query_string(query);

        if ( parameters.page_type === 'my-booking' && parameters.role === 'staff' ) {

            $('.tourmaster-user-navigation-item').removeClass('tourmaster-active')
                                                 .find('.user-staff-menu-item').addClass('tourmaster-active');

        }

    }

    setActiveDashboardStaffMenuItem();

});