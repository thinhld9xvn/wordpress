(function ($) {
  "use strict";

	$(document).ready(function () {
 

			$('.plus').on('click', function () {
					if ($("input.qty").val() < 100) {
					$("input.qty").val(+$("input.qty").val() + 1);
					}
			});


			$('.minus').on('click', function () {
					if ($("input.qty").val() > 1) {
					if ($("input.qty").val() > 1) $("input.qty").val(+$("input.qty").val() - 1);
					}
			});
	});

})(jQuery);
