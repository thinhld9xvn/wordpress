jQuery(function($) {	

	let faq_questions = {data : []},
		faq_userAnsChosen = [],
		faq_usersinfo = [];

	init();

	function init() {

		let $objs = $('.gig-khaosat');

		if ( $objs.length > 0 ) {

			loadData().then(function( data ) {

				if ( data !== 'null' ) faq_questions = data;

				$objs.each(function(i, e) {

					let $ui = $(e),

						cid = $ui.data('cid'),
						is_sidebar = $ui.data('is-sidebar'),

						campaign = faq_questions['campaigns'].filter(e => e['id'] === cid)[0],
						questions = campaign['data'],

						length = questions.length;

					if ( length > 0 ) {

						displayQuestion( $ui, questions, 0);

					}

				});

			});	

		}

	}


	function loadData() {

		return $.ajax({

			method : "POST",
			url : ajaxurl ,
			data : {

				action : 'sb_gig_faq_get_data'

			}

		});

	}

	function displayQuestion( $ui, questions, index ) {

		let html = getQuestionHTML( $ui, questions[index] );

		$ui.html( html );

	}

	function getQuestionHTML( $ui, question ) {

		let cid = $ui.data('cid'),
			campaign = faq_questions['campaigns'].filter(e => e['id'] === cid)[0],

			question_text = question['content'],

			answers = question['answers'],			

			html = '<h2 class="text-center">{%welcome_text}</h2>' + 
				   '<div class="gig-question">' +            
	               '	<div class="question-text">{%question_text}</div>' +
				   '	<ul class="question-answers">' + 
				   '		{%question_answers}' +
				   '	</ul>' + 
				   '</div>';

			return html.replace("{%welcome_text}", campaign['bg_message'])
					   .replace("{%question_text}", question_text)
					   .replace("{%question_answers}", getQAnswersHTML( answers ) );	

	}

	function getQAnswersHTML( answers ) {

		let length = answers.length,
			html = '';

		for ( let i = 0; i < length; i++ ) {

			html += '<li data-next-qid="' + answers[i]['next'] + '">' + answers[i]['content'] + '</li>';

		}

		return html;

	}

	function finishKS( $ui ) {

		let cid = $ui.data('cid'),

			campaign = faq_questions['campaigns'].filter(e => e['id'] === cid)[0];

		let fn_message = campaign['fn_message'].replace(/\r\n|\n/gm,'<br/>');

		let html = '<div class="gig-ks-success">' + fn_message + '</div>' +
				   '<div class="gig-ks-form">' +
    					'	<form class="frmGigKSForm" method="post" action="' + window.location.href + '">' +
    					'		<div class="input-control">' +
    					'	        <input type="text" name="txtGigKSFullName" placeholder="Họ tên" class="txtGigKSFullName form-control" value="" required="">' +
    					'		</div>' +
						'		<div class="input-control">' + 
    					'		      <input type="email" name="txtGigKSEmail" placeholder="Email" class="txtGigKSEmail form-control" value="" required="">' +
    					' 		</div>' +
    					' 		<div class="input-control">' +
    					'	        <input type="text" name="txtGigKSPhone" placeholder="Số điện thoại" class="txtGigKSPhone form-control" value="" required="" pattern="[0-9]{10,11}">' +
    					'		</div>' +
    					'		<div class="input-control">' +
    					'			<button type="submit" name="btnGigKSSubmit" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-primary">Gửi đi</button>' +
    					'		</div>' + 
    					'	</form>' +
    					'</div>';

		$ui.html( html );

	}

	function onClick_ChooseAnswer(e) {

		e.preventDefault();

		let next_qid = $(this).data('next-qid'),

			$ui = $(this).closest('.gig-khaosat'),

			cid = $ui.data('cid'),

			campaign = faq_questions['campaigns'].filter(e => e['id'] === cid)[0],
			questionsList = campaign['data'],			

			faq_userAnsChosen = $ui.data('userAnsChosen'),

			q_index = questionsList.findIndex( e => e['id'] == next_qid );

		if ( typeof( faq_userAnsChosen ) === 'undefined' ) faq_userAnsChosen = [];

		faq_userAnsChosen.push( $(this).index() );

		if ( q_index !== -1 ) {			

			displayQuestion( $ui, questionsList, q_index );

		}

		else {

			finishKS( $ui );

		}

		$ui.data('userAnsChosen', faq_userAnsChosen);

		/*$(this).addClass('active')
			   .siblings()
			   .removeClass('active');*/

	}

	function submitForm() {

		return $.ajax({

			method : "POST",
			url : ajaxurl,
			data : {

				action : 'sb_gig_faq_update_data',
				faq_questions : faq_questions

			}

		});

	}

	function onFormSubmit_SaveUserInfo(e) {

		e.preventDefault();

		let $ui = $(this).closest('.gig-khaosat'),
			cid = $ui.data('cid'),

			campaign = faq_questions['campaigns'].filter(e => e['id'] === cid)[0],
			faq_userAnsChosen = $ui.data('userAnsChosen'),

			userinfo = {};

		userinfo['fullname'] = $('.txtGigKSFullName', $ui).val().toString().trim();
		userinfo['email'] = $('.txtGigKSEmail', $ui).val().toString().trim();
		userinfo['phone'] = $('.txtGigKSPhone', $ui).val().toString().trim();
		userinfo['faq_answers'] = faq_userAnsChosen;		

		campaign['usersRegInfo'].push( userinfo );	

		console.log( faq_questions );

		submitForm().then(function(msg) {

			if ( msg === 'success' ) {

				let fn_emessage = campaign['fn_emessage'].replace(/\r\n|\n/gm,'<br/>');

				$ui.html('<div class="gig-ks-success">' + fn_emessage + '</div>');

			}

			else {

				$ui.html('<div class="gig-ks-success">Có lỗi xảy ra, chúng tôi không nhận được thông tin của quý vị !</div>');		

			}

		});		

	}

	$(document).on('click', '.question-answers > li', onClick_ChooseAnswer)
			   .on('submit', '.frmGigKSForm', onFormSubmit_SaveUserInfo);

	//$('#gig-khao-sat')

});