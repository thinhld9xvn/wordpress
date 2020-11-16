jQuery(function($) {

	var searchbox = {

		ready: function() {

			$('#btn-hmShowSearchBoxCat').click(this.toggleSearchBoxCat);
			$('#hmclose').click(this.toggleSearchBoxCat);

		},
		toggleSearchBoxCat: function(e) {

			var $body = $('body'),
				$searchBoxCatContent = $('.hmSearchBoxCatContent', '.hm-searchbar');

			$searchBoxCatContent.toggleClass('active');

			$searchBoxCatContent.hasClass('active') ? $body.css('overflow-y', 'hidden') : $body.css('overflow-y', '');

		}

	}

	searchbox.ready();

});
