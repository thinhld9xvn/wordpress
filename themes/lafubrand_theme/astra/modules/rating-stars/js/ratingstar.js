jQuery(function($) {

	const ajaxurl = window.location.origin + '/wp-admin/admin-ajax.php',

		  $metaRatingBox = $('.lafuratingbox'),
		  $ratingbox = $metaRatingBox.find('.ratingbox'),
		  $stars = $ratingbox.find('.star'),
		  $ratedMessage = $metaRatingBox.find('.ratedMessage'),
		  $thankYouMessage = $metaRatingBox.find('.thankyouMessage');

	var isChooseRating = false,
		ratePoint = 0;

	function onMouseOver_ChangeStarIcon(e) {	

		if ( ! isChooseRating ) {	

			const currentPosId = $(this).index();
			
			resetAllDefaultIcons();

			setChooseRateItems(currentPosId);

		}

	}
	function resetAllDefaultIcons() {

		$stars.removeClass('fa-star hover')
			  .addClass('fa-star-o');

	}

	function setChooseRateItems(currentPosId) {

		for (let i = 0; i <= currentPosId; i++) {

			const $star = $stars.eq(i);

			if ( $star.hasClass('fa-star-o') ) {

				$star.removeClass('fa-star-o')
				 	 .addClass('fa-star hover');

			}

		}

	}

	function showRatedMessage() {

		$ratedMessage.html(`Bạn đã đánh giá ${ratePoint} <span class="fa fa-star"></span>`);		

	}

	function showThankYouMessage() {
		
		$thankYouMessage.html(`Cảm ơn bạn về sự đánh giá quý báu này !!!`);
	}

	function showAjax() {

		$ratingbox.addClass('ratingBoxDisabled');

		$metaRatingBox.append(`<span class="lafuratingbox_ajaxloading"><span class="fa fa-circle-o-notch fa-spin"></span></span>`);

	}

	function hideAjax() {

		$ratingbox.removeClass('ratingBoxDisabled');

		$metaRatingBox.find('.lafuratingbox_ajaxloading').remove();

	}

	function onMouseOut_ResetStarIcon(e) {

		if ( ! isChooseRating ) {

			resetAllDefaultIcons();

		}

	}	

	function onMouseClick_ChooseRating(e) {

		e.preventDefault();

		if ( ! isChooseRating ) {

			const currentPosId = $(this).index();

			ratePoint = currentPosId + 1;			

			updateRatingToServer();

		}

	}

	function getRatingDataFromServer() {

		const isDataHasIpAddress = (data, ip) => {

			return Object.keys(data).find(i => i === ip);

		};

		showAjax();

		$.ajax({

			method : "POST",
			url : ajaxurl,
			data : {

				action : 'sb_get_rating_post',
				post_id : __current_post_data.post_id	

			},

			success : function(data) {

				if ( data !== 'null' ) {

					let ip = __current_post_data.ip_address;					

					// load rate point from saved ip address					
					if ( isDataHasIpAddress(data, ip) ) {						

						ratePoint = data[ip].rate_point;

						setChooseRateItems(ratePoint - 1);

						showRatedMessage();

						isChooseRating = true;

					}

				}

				hideAjax();

			},

			error : function() {

				hideAjax();

			}

		});


	}

	function updateRatingToServer() {

		const performUpdate = function() {

			  	return $.ajax({

					method : "POST",
					url : ajaxurl,
					data : {

						action : 'sb_update_rating_post',
						post_id : __current_post_data.post_id,
						data : {

							rate_point : ratePoint

						}

					}

				});

			};

		showAjax();	

		performUpdate().then(function(data) {

			if ( data === 'success' ) {

				showRatedMessage();
				showThankYouMessage();

				setChooseRateItems(ratePoint - 1);

				isChooseRating = true;

			}

			else {}

			hideAjax();

		})	

	}

	$ratingbox.mouseout(onMouseOut_ResetStarIcon);

	$stars.mouseover(onMouseOver_ChangeStarIcon);

	$stars.click(onMouseClick_ChooseRating);

	getRatingDataFromServer();

});