jQuery(function($) {

	function bodauTiengViet(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        return str;
	}

	$('*[data-navig="autocomplete"]').each(function() {

		var $inputBox = $(this).find( $(this).attr('data-input') ),
			$dropdownBox = $(this).find( $(this).attr('data-dropdown') ),
			$dropdownList = $dropdownBox.find('ul');

		$inputBox.keyup(function(e) {	

			var value = $(this).val();

			$dropdownList.html('');

			if ( value !== '' ) {

				var elements = jcomplete_filter.filter(function(v) { 

					var valueMatch = bodauTiengViet( v ).trim(),
						valueCompare = bodauTiengViet( value ).trim();

					return valueMatch.indexOf( valueCompare ) !== -1; 

				}),
					length = elements.length;

				if ( length > 0 ) {

					for( var i = 0; i < length; i++ ) {

						$dropdownList.append('<li><a href="#">' + elements[i] + '</a></li>');						

					}

					if ( ! $dropdownBox.hasClass('active') ) {
						$dropdownBox.addClass('active');
					}

				}

				else {

					if ( $dropdownBox.hasClass('active') ) {
						$dropdownBox.removeClass('active');
					}

				}

			}

			else {

				if ( $dropdownBox.hasClass('active') ) {
					$dropdownBox.removeClass('active');
				}

			}

		});

	});

})