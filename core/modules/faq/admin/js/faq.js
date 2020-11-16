jQuery(function($) {

	let faq_questions = {},
		_active_faq = null,
		active_faq = null,
		_usersRegInfo = [];		

	let _ = {

		isUndefined: function(o) {

			return typeof( o ) === 'undefined';

		}

	}

	let dataTable_def_options = {

		"language": {

	            "decimal": ",",

	            "thousands": ".",

	            "lengthMenu": "Hiển thị _MENU_ kết quả",

	            "zeroRecords": "Không có thông tin nào ở đây",

	            "info": "Trang _PAGE_ / _PAGES_",

	            "infoEmpty": "Không có khách hàng nào trong bảng",

	            "infoFiltered": "",

	            "search": "Tìm khách hàng ",

	            "paginate": {

	                "first":        "Trang đầu",

	                "previous":     "Trước",

	                "next":         "Sau",

	                "last":         "Trang cuối"

	            }	           

        },	
        bAutoWidth: false,
		"aoColumns": [
		  null,
		  { "bSortable": true, "bSearchable": true },
		  { "bSortable": true, "bSearchable": true },
		  null, null, null
		],
		"aaSorting": [],
		"iDisplayLength": 25	

	};

	init();

	function init() {

		let html = get_ajax_loading(),
			$container = $('.faq-elements-container'),
			$toolbar = $('.faq-toolbar-container');

		$container.append( html );

		$toolbar.toggleClass('disabled');

		loadData().then(function( data ) {

			if ( data !== 'null' ) faq_questions = data;

			$container.find('.ajax_loading').remove();

			$toolbar.toggleClass('disabled');

			if ( typeof( faq_questions['campaigns'] ) === 'undefined' ) {
				faq_questions['campaigns'] = [];
			}

			if ( typeof( faq_questions['QuestionLists'] ) === 'undefined' ) {
				faq_questions['QuestionLists'] = [];
			}
			

		});				

	}

	function get_ajax_loading() {

		return '<div class="ajax_loading"><span class="ajax_img"></span><span class="ajax_msg">Đang lấy dữ liệu ...</span></div>';

	}

	function addConnectionToNode( treeNode, hidePoint, targetNode, nConnectToTarget = 2, absolute) {

	    absolute = absolute || false;

	    var stacked = treeNode.stackParentId,
	        connLine,
	        parent = ( targetNode ),

	        pathString = "";

	        if ( hidePoint ) pathString = this.getPointPathString(hidePoint);
	        else {

	        	const curveDistance = 15;

	        	let bgPointX = treeNode.X + treeNode.width / 2,
	        		bgPointY = treeNode.Y + treeNode.height,

	        		edPointX = targetNode.X + targetNode.width / 2,
	        		edPointY = targetNode.Y;	        		

	        	if ( nConnectToTarget > 2 ) {

	        		edPointX = targetNode.X;
	        		edPointY = targetNode.Y + targetNode.height / 2;

	        	}

	        	let bgCurvePointX = bgPointX,
	        		bgCurvePointY = bgPointY + curveDistance,

	        		edCurvePointX = edPointX,
	        		edCurvePointY = edPointY - curveDistance;

	        	if ( nConnectToTarget > 2 ) {

	        		if ( treeNode.id % 2 == 0 ) {

		        		// id %2 = 0: M240,1313C240,1328,730,1415,730,1400
		        		// id %2 != 0 : M475,1313C475,1328,730,1350,730,1400
		        		edCurvePointY = edPointY + curveDistance;

		        	}    

	        	}        	

	        	pathString = "M" + bgPointX.toString() + "," +
	        					   bgPointY.toString() + "C" +
	        					   bgCurvePointX.toString() + "," +
	        					   bgCurvePointY.toString() + "," +
	        					   edCurvePointX.toString() + "," +
	        					   edCurvePointY.toString() + "," + 
	        					   edPointX.toString() + "," +
	        					   edPointY.toString();    	

	        }
	 
	    // if ( this.connectionStore[treeNode.id] ) {
	        //connector already exists, update the connector geometry
	        // connLine = this.connectionStore[treeNode.id];
	        // this.animatePath( connLine, pathString );
	    // }
	    {
	        connLine = this._R.path( pathString );
	        this.connectionStore[treeNode.id] = connLine;

	        // don't show connector arrows por pseudo nodes
	        if ( treeNode.pseudo ) {
	            delete parent.connStyle.style['arrow-end'];
	        }
	        if ( parent.pseudo ) {
	            delete parent.connStyle.style['arrow-start'];
	        }

	        connLine.attr( parent.connStyle.style );

	        //console.log( hidePoint );

	        if ( treeNode.drawLineThrough || treeNode.pseudo ) {
	            treeNode.drawLineThroughMe( hidePoint );
	        }
	    }
	    treeNode.connector = connLine;
	    return this;

	}

	/*function LoadFAQElements( questions = null ) {		

		if ( questions === null ) questions = faq_questions['data'];

		let length = questions.length;

		for ( let i = 0; i < length; i++ ) {

			createElement( questions[i] );

		}

	}*/

	/*function reloadFAQElements( questions = null ) {

		$('.faq-elements-container').html('');

		LoadFAQElements( questions );

	}*/
	
	function loadData() {

		return $.ajax({

			method : "POST",
			url : ajaxurl ,
			data : {

				action : 'sb_gig_faq_get_data'

			}

		});

	}

	function updateData() {
		
		return $.ajax({

			method : "POST",
			url : ajaxurl ,
			data : {

				action : 'sb_gig_faq_update_data',
				faq_questions : faq_questions

			}

		});

	}

	/*function createElement( data ) {

		let content = data['content'],
			html = '<div class="faq-element-ui faq-element">' +
				   '	<div class="elem-toolbar">' + 
				   '		<div class="toolbar-container">' + 
				   ' 			<a class="btnFaqEdit" href="#">' + 
				   '				<span class="dashicons-before dashicons-edit"></span>' + 
				   '				Chỉnh sửa' + 
				   '			</a>' + 
				   '			<a class="btnFaqRemove" href="#">' + 
				   '				<span class="dashicons-before dashicons-trash"></span>' + 
				   '				Xóa' + 
				   '			</a>' + 
				   '			<a class="btnFaqTreeView" href="#">' + 
				   '				<span class="dashicons-before dashicons-code-standards"></span>' + 
				   '				 Xem cây' + 
				   '			</a>' + 
				   '		</div>' + 
				   '	</div>' +
			   '		<div class="inside">' +
			   '			' + content +
			   '		</div>' +
			   '	</div>',

			$element = $(html);

		$element.data(data);

		$('.faq-elements-container').append( $element );

	}*/

	function getHTMLAnswerTemp() {

		return '<div class="faq-agroup faq-answ mtop10">' +
				'	<div class="faq-input">' +
				'	    <label>Đáp án <span class="aq_num">{%aq_num}</span></label>' +
				'		<div class="inside padleft20">' +
				'		    <textarea name="txtAnswers[]" class="form-control txtAnswers" rows="3" required></textarea>' +
				'			<div class="faq-options mtop10">' +
				'				<div><span>Câu hỏi kế tiếp khi chọn: </span>' +
				'				<select class="slNextQuestion" name="slNextQuestion">' +
				'					 {%aq_source_questions}' +
				'				</select><a class="preview-ques mleft5" href="#">Xem</a></div>' +
				'				<div></div>' +
				'			</div>' +
				'		</div>' +
				'		<div class="faq-ans-toolbar mtop10">' + 
				'			<button type="button" class="btn btn-danger btnRemoveAnswer"><span class="dashicons-before dashicons-trash"></span> Xóa câu trả lời</button>' +
				'		</div>' +
				'    </div>' +
				'</div>';

	}

	function getHTMLQLists() {

		let html = '<tr><td align="center" colspan="3">Không có bộ câu hỏi nào ...</td></tr>';
			question_lists = faq_questions['QuestionLists'];

			//console.log( faq_questions );

		if ( _.isUndefined( question_lists ) || question_lists.length === 0 ) return html;

		html = '';

		$.each(question_lists, function(i, ques) {

			html += '<tr>' +
				 	'	<td>' + (i+1).toString() + '</td>' +
				 	'	<td align="center">' + ques['name'] + '</td>' +
				 	'	<td align="center">' +
				 	'		<button type="button" class="btn btn-primary btnEditQList" data-qlist-id="' + i.toString() +  '"><span class="dashicons-before dashicons-welcome-edit-page"></span></button>' +
				 	'		<button type="button" class="btn btn-danger btnRemoveQList mleft5" data-qlist-id="' + i.toString() + '"><span class="dashicons-before dashicons-trash"></span></button>' +
				 	'	</td>' +
				 	'</tr>';

		});		

		return html;

		//$tbody.html( html );

	}	

	function getHTMLCampLists() {

		let html = '<tr><td align="center" colspan="6">Chưa có chiến dịch nào ở đây ...</td></tr>';
			campLists = faq_questions['campaigns'];

			//console.log( faq_questions );

		if ( _.isUndefined( campLists ) || campLists.length === 0 ) return html;

		html = '';

		$.each(campLists, function(i, camp) {

			html += '<tr>' +
				 	'	<td>' + (i+1).toString() + '</td>' +
				 	'	<td align="center">' + camp['name'] + '</td>' +
				 	'	<td align="center">' + 
				 	'		<button type="button" class="btn btn-secondary btnViewSCodeCamp" data-camp-id="' + i.toString() +  '"><span class="dashicons-before dashicons-search"></span></button>' +
				 	'	</td>' +
				 	'	<td align="center">' + 
				 	'		<button type="button" class="btn btn-secondary btnEditMessageCamp" data-camp-id="' + i.toString() +  '"><span class="dashicons-before dashicons-welcome-edit-page"></span></button>' +
				 	'	</td>' +
				 	'	<td align="center">' + 
				 	'		<button type="button" class="btn btn-secondary btnViewRegUsersCInfo" data-camp-id="' + i.toString() +  '"><span class="dashicons-before dashicons-search"></span></button>' +
				 	'	</td>' +
				 	'	<td align="center">' +
				 	'		<button type="button" class="btn btn-primary btnEditCamp" data-camp-id="' + i.toString() +  '"><span class="dashicons-before dashicons-welcome-edit-page"></span></button>' +
				 	'		<button type="button" class="btn btn-danger btnRemoveCamp mleft5" data-camp-id="' + i.toString() + '"><span class="dashicons-before dashicons-trash"></span></button>' +
				 	'	</td>' +
				 	'</tr>';

		});		

		return html;

		//$tbody.html( html );

	}	

	function getHTMLQListsOptions() {

		let html = '<option value="-1" selected="selected">--- Xin mời chọn một bộ câu hỏi ---</option>';
			question_lists = faq_questions['QuestionLists'];
		
		$.each(question_lists, function(i, ques) {

			html += '<option value="' + i.toString() + '">' + ques['name'] + '</option>';

		});	

		return html;

	}

	function getLabelAQ( aq ) {

		let num = parseInt( aq ),
			label = 'thứ ',
			number = num + 1,

			n = ~~( number / 10 ),
			du = number % 10;

		switch ( n ) {

			case 1 :

				label += 'mười ';
				break;

			case 2:

				label += 'hai mươi ';
				break;

			case 3 :

				label += 'ba mươi ';
				break;

			case 4 :

				label += 'bốn mươi ';
				break;

			case 5 :

				label += 'năm mươi ';
				break;

			case 6 :

				label += 'sáu mươi ';
				break;

			case 7 :

				label += 'bảy mươi ';
				break;

			case 8 :

				label += 'tám mươi ';
				break;

			case 9 :

				label += 'chín mươi ';
				break;

			default :

				break;

		}

		switch ( du ) {

			case 1 :

				if ( n > 0 ) label += 'một';

				else label += 'nhất';

				break;

			case 2 :

				label += 'hai';
				break;

			case 3 :

				label += 'ba';
				break;

			case 4 :

				label += 'bốn';
				break;

			case 5 :

				label += 'năm';
				break;

			case 6 :

				label += 'sáu';
				break;

			case 7 :

				label += 'bảy';
				break;

			case 8 :

				label += 'tám';
				break;

			case 9 :

				label += 'chín';
				break;

			default:

				break;

		}

		return label;		

	}

	function getOptionQuestions(q, a) {
	 
		let questions = _.isUndefined( q ) ? faq_questions['data'] : q,
			q_active = _.isUndefined( a ) ? active_faq :a,
			length = questions.length,

			html = '<option value="-1">--- Mời chọn một câu hỏi ---</option>';

		if ( length > 0 ) {

			for ( let i = 0; i < length; i++ ) {

				let id = questions[i]['id'],
					content = questions[i]['content'];

				if ( q_active !== null ) {					

					if ( id == q_active['id'] ) continue;

				}

				html += '<option value="' + id + '">' + content + '</option>';

			}

		}

		return html;

	}

	function getFaqAnswers() {

		let faqAnsw = [],
			$faqAnsw = $('.faq-answ');

		$faqAnsw.each(function(i, e) {

			let $textarea = $(this).find('textarea'),
				$select = $(this).find('select'),

				id = i,
				ans = {};

			ans['id'] = id;
			ans['content'] = esc_str( $textarea.val() );
			ans['next'] = $select.val();

			faqAnsw.push( ans );

		});

		return faqAnsw;

	}

	function getQListAnswers( $ui ) {

		let faqAnsw = [],
			$faqAnsw = $ui.find('.faq-answ');

		$faqAnsw.each(function(i, e) {

			let $textarea = $(this).find('textarea'),

				id = i,
				ans = {};

			ans['id'] = id;
			ans['content'] = esc_str( $textarea.val() );

			faqAnsw.push( ans );

		});

		return faqAnsw;

	}	

	function resetDialog() {

		/*$('#TreeInfoDialog').find('.modal-dialog').removeAttr('style');

		$('.txtQuestion').val('');
		$('.faq-answ').remove();*/

	}

	function updateFAQQuestions() {

		faq_questions['data'] = faq_questions['data'].map(function(e) {

			if ( e['id'] === active_faq['id'] ) { return active_faq; }

			return e;

		});

	}

	function AddQUIToPanel( qlist, $ui, disabled = true ) {		
			
		$.each(qlist, function(i, question) {

			let $template = getTemplateQList( question );

			( disabled ? $template.find('textarea, input, a, button').addClass('disabled') : '' );

			$ui.append( $template );

		});

	}

	function onChange_ChooseQListInCampaign(e) {

		//console.log('abc');

		let id = parseInt( $(this).val() ),
			questionList = faq_questions['QuestionLists'][id],

			$inst = $('.FAQCampaignDialog.show').eq(0),

			$ui = $('.QListsPanel > .panel-left', $inst).find('.qlists-sortables'),

			$left_ui = $ui.eq(0),
			$right_ui = $ui.eq(1);

		$left_ui.html('');

		if ( ! _.isUndefined( questionList ) ) {

			AddQUIToPanel( questionList['data'], $left_ui );

			//$left_ui.sortable('refresh');

			//OnTimer_ClearChangeHeightSortables();		

			setOriginalHeightData($left_ui, $left_ui);
			setOriginalHeightData($right_ui, $right_ui);

			OnTimer_SetChangeHeightSortables( $inst );
		}

		$.questionList = questionList;


	}

	function OnTimer_SetChangeHeightSortables( $inst ) {		

		$.activeSortableInst = $inst;

		if ( _.isUndefined( $.changeHeightSTimer ) || 
			 $.changeHeightSTimer === null ) {

			$.changeHeightSTimer = setInterval(function() {

				//console.log( $.activeSortableInst );

				let $ui = $('.QListsPanel > .panel-left', $.activeSortableInst).find('.qlists-sortables'),

					$left_ui = $ui.eq(0),
					$right_ui = $ui.eq(1),

					h1 = $left_ui.height(),
					h2 = $right_ui.height(),

					oh1 = $left_ui.data('originalHeight'),
					oh2 = $right_ui.data('originalHeight');

				if ( oh1 < oh2 ) {

					if ( h1 != oh2 ) {

						$left_ui.height( oh2 );

					}

					if ( h2 != oh2 ) {

						$right_ui.height( oh2 );
						
					}


				}

				else {

					if ( h1 != oh1 ) {

						$left_ui.height( oh1 );

					}

					if ( h2 != oh1 ) {

						$right_ui.height( oh1 );
						
					}					

				}

			}, 10);	

		}

	}

	function OnTimer_ClearChangeHeightSortables() {

		//if ( ! _.isUndefined($.changeHeightSTimer) ) {

			//clearInterval( $.changeHeightSTimer );
			$.changeHeightSTimer = null;

		//}

	}

	function LoadSettingsInCampaign( $inst ) {

		OnTimer_ClearChangeHeightSortables();

		let html_options = getHTMLQListsOptions(),

			$obj = $('.QListsPanel .panel-right', $inst),			
			$ui = $('.QListsPanel .qlists-sortables.sortables-rightpanel', $inst),

			width = $obj.width(),	
			pos = $obj.position();

		console.log(width);

		$inst.find('.slQuestionLists').html( html_options );

		$ui.css({

			'width' : width.toString() + 'px',
			'left' : (pos.left - 21).toString() + 'px'			

		});

		OnTimer_SetChangeHeightSortables( $inst );	

		//$.questionsICampaign = [];

	}

	function setOriginalHeightData($o, $b) {

		$o.css({'height' : ''})
		  .data('originalHeight', $b.height() );

	}

	// lấy question id duy nhất
	function get_unique_qid(questionList) {

		let length = questionList.length,
			id = '',
			uids = [],

			get_id = function() {

				return 'faq_' + Math.random().toString(36).substr(2, 9);

			};

		if ( length === 0 ) return get_id();

		if ( length > 0 ) {

			for ( let i = 0; i < length; i++ ) {

				let question = questionList[i];

				uids.push( question['id'] );

			}

		}

		do {

			id = get_id();

		} while ( -1 != uids.indexOf( id ) );

		return id;

	}	

	function getFAQQuestion( $obj ) {

		let data = $obj.data();

		let results = faq_questions['data'].filter(function(e) {

			return e['id'] == data['id'];

		});

		return results[0];

	}

	function loadFAQQuestion( qlist, fq, $modal = '#EditElementDialog' ) {

		let $parent = $('.btnAddNewAnswer', $modal).parent(),

			html = getHTMLAnswerTemp(),
			fq_answers = fq['answers'],
			length = 0;

		let $answers_obj = $('.faq-answ', $modal);

		if ( $answers_obj.length > 0 ) {

			$answers_obj.remove();

		}

		$('.txtQuestion', $modal).val( fq['content'] );

		length = aq_num = fq_answers.length;		

		for ( let i = 0; i < length; i++ ) {

			let _html = html,
				content = fq_answers[i]['content'],
				q_selected = fq_answers[i]['next'],
				$obj = null;

			_html = _html.replace('{%aq_num}', getLabelAQ( fq_answers[i]['id'] ) );
			_html = _html.replace('{%aq_source_questions}', getOptionQuestions(qlist, active_faq) );

			$obj = $(_html);

			$obj.data('id', i);

			$obj.find('select').val( q_selected );
			$obj.find('.txtAnswers').val( content );

			$parent.append( $obj );

		};	

	}		

	function onKeyUp_changeQTitle(e) {

		let $textbox = $(this),
			content = esc_str( $textbox.val() );

		if ( content === '') {

			content = 'Câu hỏi chưa có nội dung ...';

		}

		//console.log( content );

		$textbox.closest('.sortable-ui')
			    .find('h2')
			    .text( content );
				

	}

	// events

	function onToolbarClick_EditFAQ(e) {

		e.preventDefault();

		$('#EditElementDialog').modal('show');

		let $obj = $(this).closest('.faq-element'),
			fq = getFAQQuestion( $obj );

		console.log( fq );

		active_faq = fq;

		loadFAQQuestion( fq );

	}

	function onToolbarClick_RemoveFAQ(e) {

		e.preventDefault();

		let $obj = $(this).closest('.faq-element'),
			data = $obj.data();

		faq_questions['data'] = faq_questions['data'].filter(function(e) {

			return e['id'] != data['id'];

		});

		//reloadFAQElements();

	}

	function onToolbarClick_ShowTreeFAQInfo(e) {

		e.preventDefault();		

		active_faq = $(this).closest('.faq-element').data();

		onModalClick_ShowTreeFAQInfo(e);

	}

	function OnSortableQuestionEvent() {

		let self = this,			
			OnInit = function() {

				self.questionsICampaign = [];

				self.clone = self.before = self.after = null;
				self.question_data = self.UiPSortableFrom = null;

			},
			makeQuestNotDuplicate = function( question ) {

				let _questions = self.questionsICampaign.filter(e => { 

					let eid = e['id'],
						_eids = eid.split('_');

					eid = _eids[0] + '_' + _eids[1];

					return eid === question['id'];

				}),
					length = _questions.length;

				if ( length > 0  ) {

					question['id'] += '_' + length.toString();	

				}

				return question;

			},
			
			get_unique_campid = function() {				

				let campaignsList = faq_questions['campaigns'],
					length = campaignsList.length,
					id = '',
					uids = [],

					get_id = function() {

						return 'faqcamp_' + Math.random().toString(36).substr(2, 9);

					};

				if ( length === 0 ) return get_id();

				if ( length > 0 ) {

					for ( let i = 0; i < length; i++ ) {

						uids.push( campaignsList[i]['id'] );

					}

				}

				do {

					id = get_id();

				} while ( -1 != uids.indexOf( id ) );

				return id;
		
			}
			OnUpdateHeightSPanel = function($p1, $p2) {

				let $inst = $('.FAQCampaignDialog.show').eq(0);

				//OnTimer_ClearChangeHeightSortables();

				setOriginalHeightData($p1, $p1 );
				setOriginalHeightData($p2, $p2 );

				//console.log( $inst );

				OnTimer_SetChangeHeightSortables( $inst );

			},
			OnCopyAllQuest = function(e) {

				e.preventDefault();

				if ( _.isUndefined( $.questionList ) ) return;

				let qlist = JSON.parse( JSON.stringify( $.questionList['data'] ) ),
					$inst = $('.FAQCampaignDialog.show').eq(0),
					$left_ui = $('.sortables-leftpanel', $inst),
					$ui = $('.sortables-rightpanel', $inst);
					//length = qlist.length;

				if ( _.isUndefined( qlist ) || qlist.length === 0 ) return;

				qlist.map(e => makeQuestNotDuplicate( e ) );

				self.questionsICampaign = self.questionsICampaign.concat( qlist );

				AddQUIToPanel( qlist, $ui, false );

				$ui.find('.hidden').removeClass('hidden');

				OnUpdateNQList( $ui );

				OnUpdateHeightSPanel($left_ui, $ui);	

				//console.log( self.questionsICampaign );

			},
			onTreeViewQuestion = function(e) {

				e.stopImmediatePropagation();

				let $modal = $('.FAQCampaignDialog.show').eq(0),
					qid = '';

				if ( $modal.length > 0 ) {

					qid = $(this).closest('.qlist-sortable-ui').data('qid');
					active_faq = self.questionsICampaign.filter( e => e['id'] === qid )[0];

				}

				showFAQTree( self.questionsICampaign );

			},
			OnChangeNextQuestion = function(e) {

				e.preventDefault();				

				let n_qid = $(this).val(),

					qid = $(this).closest('.qlist-sortable-ui').data('qid'),
					aid = parseInt( $(this).closest('.faq-answ').data('id') ),

					qindex = self.questionsICampaign.findIndex( (e,i) => e['id'] === qid ),

					q = self.questionsICampaign[qindex],
					ans = q['answers'][aid];

				ans['next'] = n_qid;				

				console.log( self.questionsICampaign );

			},
			OnViewQuestion = function(e) {

				e.stopImmediatePropagation();

				let v = $(this).prev().val();

				viewFAQ( self.questionsICampaign, v );

			},		
			OnUpdateNQList = function($ui) {

				$ui.find('.slNextQuestion').each(function(i, e) {

					let $this = $(e),
						q_id = $this.closest('.qlist-sortable-ui').data('qid'),
						q_active = self.questionsICampaign.filter(e => e['id'] === q_id)[0],

						qa_answers = q_active['answers'],
						aid = parseInt( $(this).closest('.faq-answ').data('id') ),

						qa = qa_answers[aid],

						nid = qa['next'];

					options_html = getOptionQuestions( self.questionsICampaign, q_active );					

					$this.html( options_html );

					$this.val( nid );

				});

			},
			OnStart = function (event, ui) {

				let $ui = $(ui.item),
					$parent = $ui.parent(),

					$modal = $('.FAQCampaignDialog.show').eq(0),

					modal_id = $modal.attr('id');

				self.question_data = $ui.data();

				self.UiPSortableFrom = $parent;

				switch (modal_id) {

					case 'CreateCampaignDialog':
					case 'EditCampaignDialog':

						if ( $parent.hasClass('sortables-leftpanel') ) {

							$ui.show();

							self.clone = $ui.clone(true);
					        self.before = $ui.prev();
					        self.parent = $ui.parent();

					    }

						break;

					default:

						break;

				}		

			},

			OnStop = function (event, ui) {

				let $item = $(ui.item),		
					$parent = $item.parent(),
					$_parent = self.UiPSortableFrom,

					$modal = $('.FAQCampaignDialog.show').eq(0),

					modal_id = $modal.attr('id'),

					qid = '', 
					question = null,

					options_html = '';

					boolCheck = false;		

				$item.data(self.question_data);			

				switch (modal_id) {

					case 'CreateCampaignDialog':
					case 'EditCampaignDialog':

						boolCheck = $_parent.hasClass('sortables-leftpanel') && $_parent[0] === $parent[0];		
						boolCheck = ! boolCheck ? $_parent.hasClass('sortables-rightpanel') && $parent.hasClass('sortables-leftpanel') : true;

						if ( boolCheck ) {

							return false;

						}

						// kéo và thả đối tượng phải khác khung
						if ( $_parent[0] !== $parent[0] ) {

							qid = self.question_data['qid'];
							question = $.questionList['data'].filter( e => e['id'] === qid)[0];

							question = JSON.parse( JSON.stringify( question ) );

							question = makeQuestNotDuplicate( question );

							$item.data('qid', question['id']);

							self.questionsICampaign.push( question );

							$item.find('.hidden').removeClass('hidden');
							$item.find('.disabled').removeClass('disabled');

							//console.log( self.question_data );						

							OnUpdateNQList( $parent );

						}						

						OnUpdateHeightSPanel( $_parent, $parent );				

						console.log( self.questionsICampaign );

						break;

					default:

						break;

				}		

			},

			OnReceive = function(event, ui) {

				let $modal = $('.FAQCampaignDialog.show').eq(0),
					modal_id = $modal.attr('id'),
					$_parent = self.UiPSortableFrom;

				switch ( modal_id ) {

					case 'CreateCampaignDialog':
					case 'EditCampaignDialog':

						if ( $_parent.hasClass('sortables-leftpanel') ) {

							if (self.before.length) self.before.after(self.clone);
			        		else self.parent.prepend(self.clone);

			        	}

						break;

					default: 

						break;

				}

			},
			OnRemoveQuestion = function(e) {

				e.preventDefault();

				let $this = $(this),
					$ui = $this.closest('.qlists-sortables'),
					$inst = $('.FAQCampaignDialog.show').eq(0),
					$left_ui = $('.sortables-leftpanel', $inst),
					$parent = $this.closest('.qlist-sortable-ui'),
					qid = $parent.data('qid'),					
					rm_state = '',
					qindex = -1,					
					t = setInterval(function() {

						rm_state = $ui.data('removed');

						if ( ! _.isUndefined(rm_state) && rm_state == 'true' ) {

							qindex = self.questionsICampaign.findIndex(e => e['id'] === qid);

							if ( qindex != -1 ) self.questionsICampaign.splice(qindex, 1);

							// những đáp án của những question trỏ đến câu hỏi này set = -1
							let qas = self.questionsICampaign.filter(e => {

								let q_answers = e['answers'],
									anss = q_answers.filter(ans => ans['next'] === qid);

								return anss.length > 0;

							});

							qas.map(q => {

								let anss = q['answers'].filter(ans => ans['next'] === qid);

								anss.map(ans => ans['next'] = '-1');

								return q;

							});

							console.log( self.questionsICampaign );

							OnUpdateNQList( $ui );

							OnUpdateHeightSPanel( $ui, $left_ui );	

							clearInterval( t );

						}

					}, 100);

			},
			onSubmitForm_CreateNewCampaign = function(e) {

				e.preventDefault();

				let form_id = '#frmNewCampaign',

					txtCampaign = esc_str( $('#txtCampaign', form_id).val() ),
					txtBgMessage = esc_str( $('#txtBgMessage', form_id).val() ),
					txtFinishMessage = esc_str( $('#txtFinishMessage', form_id).val() ),
					txtFinishEMessage = esc_str( $('#txtFinishEMessage', form_id).val() ),

					questionsList = self.questionsICampaign,

					campaign = {};

				if ( _.isUndefined(faq_questions['campaigns']) ) {

					faq_questions['campaigns'] = [];

				}

				campaign['id'] = get_unique_campid();
				campaign['name'] = txtCampaign;
				campaign['bg_message'] = txtBgMessage;
				campaign['fn_message'] = txtFinishMessage;
				campaign['fn_emessage'] = txtFinishEMessage;
				campaign['data'] = questionsList;

				campaign['usersRegInfo'] = [];

				faq_questions['campaigns'].push( campaign );

				$('#CreateCampaignDialog').modal('hide');

				console.log( faq_questions );

			},
			onSubmitForm_UpdateCampaign = function(e) {

				e.preventDefault();

				let modal_id = '#EditCampaignDialog',
					cid = parseInt( $(modal_id).data('cid') ),
					campaign = faq_questions['campaigns'].filter( (e,i) => i === cid )[0],
					questionsList = campaign['data'],
					form_id = '#frmEditCampaign',

					$qlist_uis = $('.sortables-rightpanel > .qlist-sortable-ui', modal_id),

					txtCampaign = esc_str( $('#txtEditCampaign', form_id).val() ),
					txtBgMessage = esc_str( $('#txtEditCpBgMessage', form_id).val() ),
					txtFinishMessage = $('#txtEditCpFinishMessage', form_id).val().replace(/\r\n|\n/gm, '<br/>'),
					txtFinishEMessage = $('#txtEditCpFinishEMessage', form_id).val().replace(/\r\n|\n/gm, '<br/>'),

					_txtCampaign = esc_str( campaign['name'] ),
					_txtBgMessage = esc_str( campaign['bg_message'] ),
					_txtFinishMessage = campaign['fn_message'],
					_txtFinishEMessage = campaign['fn_emessage'];

				if ( txtCampaign !== _txtCampaign ) {

					campaign['name'] = txtCampaign;

				}

				if ( txtBgMessage !== _txtBgMessage ) {

					campaign['bg_message'] = txtBgMessage;

				}

				if ( txtFinishMessage !== _txtFinishMessage ) {

					campaign['fn_message'] = txtFinishMessage;

				}

				if ( txtFinishEMessage !== _txtFinishEMessage ) {

					campaign['fn_emessage'] = txtFinishEMessage;

				}

				$qlist_uis.each(function(i, e) {

					let $ui = $(e),
						qid = $ui.data('qid'),
						question = questionsList.filter(e => e['id'] === qid)[0];

					question = updateQuestionUI( $ui, question );

				});

				$(modal_id).modal('hide');

				console.log( faq_questions );

			},
			onModalClick_EditCampaign = function(e) {

				e.preventDefault();

				let modal_id = '#EditCampaignDialog',
					id = parseInt( $(this).data('camp-id') ),

					campaign = faq_questions['campaigns'][id],

					camp_name = campaign['name'],
					camp_bg_message = campaign['bg_message'],
					camp_fn_message = campaign['fn_message'].replace(/\<br\/\>/g, "\n"),
					camp_fn_emessage = campaign['fn_emessage'].replace(/\<br\/\>/g, "\n"),

					$ui = $('.qlists-sortables', modal_id),
					$left_ui = $ui.eq(0),
					$right_ui = $ui.eq(1);

				self.questionsICampaign = campaign['data'];

				$(modal_id).modal('show')
						   .data('cid', id);

				$('#txtEditCampaign', modal_id).val( camp_name );
				$('#txtEditCpBgMessage', modal_id).val( camp_bg_message );
				$('#txtEditCpFinishMessage', modal_id).val( camp_fn_message );
				$('#txtEditCpFinishEMessage', modal_id).val( camp_fn_emessage );

				AddQUIToPanel( campaign['data'], $right_ui, false );

				$right_ui.find('.hidden').removeClass('hidden');

				OnUpdateNQList( $right_ui );

				OnUpdateHeightSPanel($left_ui, $right_ui);				

			},

			sortables_config = {

				connectWith: ".qlists-sortables",
			    handle: "h2",	   
			    placeholder: "sortable-ui ui-placeholder ui-corner-all",
			    start: OnStart,	   
			    stop: OnStop,
			    receive: OnReceive

			},
			sortables_elem = '.qlists-sortables';

		OnInit();

		$(sortables_elem, '#CreateQListDialog').sortable(sortables_config);
		$(sortables_elem, '#EditQListDialog').sortable(sortables_config);

		sortables_config.helper = 'clone';

		$(sortables_elem, '.FAQCampaignDialog').sortable(sortables_config).disableSelection();

		$(document).on('click', '.FAQCampaignDialog .btnRemoveQuestion', OnRemoveQuestion)
				   .on('click', '.FAQCampaignDialog .preview-ques', OnViewQuestion)

				   .on('click', '.treeinfo', onTreeViewQuestion)
				   .on('click', '.btnCopyAllQuest', OnCopyAllQuest)

				   .on('click', '.btnEditCamp', onModalClick_EditCampaign)

				   .on('change', '.FAQCampaignDialog .slNextQuestion', OnChangeNextQuestion);

		$('#frmNewCampaign').submit( onSubmitForm_CreateNewCampaign );
		$('#frmEditCampaign').submit( onSubmitForm_UpdateCampaign );

	}

	function LoadQLists() {

		let html = getHTMLQLists();

		//console.log( html );

		$('#QListsDialog').find('table tbody').html( html );

	}
	function LoadCampLists() {

		let html = getHTMLCampLists();

		//console.log( html );

		$('#CampaignsListDialog').find('table tbody').html( html );

	}

	function getTemplateQList(question) {

		let $template = $('.qlist-sortable-ui-template').clone(),
			question_id = question['id'],
			txtQuestion = esc_str( question['content'] ),
			q_answers = question['answers'],
			ansHTML = getHTMLAnswerTemp(),
			length = 0
			aq_num = 0;

		$template.removeClass('qlist-sortable-ui-template')
				 .removeClass('hidden');

		$template.find('.txtQuestion').val( txtQuestion );
		$template.find('h2').text( txtQuestion );

		length = aq_num = q_answers.length;

		for ( let j = 0; j < length; j++ ) {

			let _ansHTML = ansHTML,
				content = q_answers[j]['content'],					
				$obj = null;

			_ansHTML = _ansHTML.replace('{%aq_num}', getLabelAQ( q_answers[j]['id'] ) );				

			$obj = $(_ansHTML);

			$obj.data('id', j)
				.find('.txtAnswers').val( content )
				.parent()
				.find('.faq-options')
			    .addClass('hidden');

			$template.find('.btnRemoveQuestion')
				 	 .parent()
				 	 .append( $obj );

		}			

		//$template.find('.txtAnswers').val()

		$template.data({ 'aq_num' : aq_num,
						 'qid' : question_id });

		return $template;

	}

	function onTableClick_EditQuestionList(e) {

		e.preventDefault();

		let qlist_id = parseInt( $(this).data('qlist-id') ),
			form_id = '#frmEditQList',
			questionList = faq_questions['QuestionLists'][qlist_id],
			txtQListName = questionList['name'],
			questions = questionList['data'];	

		$('#txtEQListName').val( txtQListName );

		$.each(questions, function(i, question) {

			let $template = getTemplateQList( question );

			$('.qlists-sortables', form_id).append( $template );


		});

		active_faq = questionList;

		$('#EditQListDialog').modal('show');

	}

	function onTableClick_RemoveQuestionList(e) {

		let qlist_id = parseInt( $(this).data('qlist-id') ),
			index = faq_questions['QuestionLists'].findIndex( (e, i) => i === qlist_id );

		if ( index === -1 ) {

			alert('Danh sách câu hỏi không tồn tại, mời kiểm tra lại !');
			return;

		}

		// found
		faq_questions['QuestionLists'].splice(index, 1);

		LoadQLists();
		

	}

	function onModalClick_CreateFAQ(e) {

		e.preventDefault();

		let txtQuestion = esc_str( $('#createElementDialog .txtQuestion').val() ),	

			faqQues = {},
			faqAnsw = [],

			checkRequiredFields = function() {

				let $slNextQuestion = $('#createElementDialog .slNextQuestion'),
					$txtAnswers = $('#createElementDialog .txtAnswers'),

					length = $txtAnswers.length;

				if ( txtQuestion == '' ) {

					alert('Nội dung câu hỏi không được bỏ trắng !');
					return false;

				}

				if ( length < 2 ) {

					alert('Xin mời tạo ít nhất là hai đáp án !');
					return false;

				}

				return true;


				/*$slNextQuestion.each(function() {

					let $options = $(this).find('option'),
						v_selected = $(this).val();

					if ( $options.length > 1 && v_selected !== '-1'  ) {

						alert('Có đáp án chưa chọn câu hỏi kế tiếp');
						return;

					}

				});*/

			};

		let boolCheck = checkRequiredFields();

		if ( ! boolCheck ) return;

		faqAnsw = getFaqAnswers();	

		faqQues['id'] = get_unique_qid();
		faqQues['content'] = txtQuestion;
		faqQues['answers'] = faqAnsw;

		faq_questions['data'].push( faqQues );

		//$('#createElementDialog').modal('hide');

		//createElement( faqQues );

		resetDialog();

		console.log(faq_questions['data']);


	}

	function onModalClick_CreateAnswer(e) {

		e.preventDefault();

		let html = getHTMLAnswerTemp();

		html = html.replace('{%aq_num}', getLabelAQ( aq_num ) );
		html = html.replace('{%aq_source_questions}', getOptionQuestions() );

		let $obj = $(html);

		$obj.data('id', aq_num);

		$(this).parent().append( $obj );

		aq_num++;

	}

	function onModalClick_CreateAnswerInQList(e) {

		e.preventDefault();

		let html = getHTMLAnswerTemp(),
			$this = $(this),
			$ui = $this.closest('.qlist-sortable-ui'),
			aq_num = $ui.data('aq_num');

		if ( _.isUndefined( aq_num ) ) {

			aq_num = 0;

		}

		html = html.replace('{%aq_num}', getLabelAQ( aq_num ) );				

		$this.parent().append( html )
			   .find('.faq-options')
			   .addClass('hidden');

		$ui.data('aq_num', ++aq_num);
		

	}

	function onToolbarClick_AddNewQuestion(e) {

		e.preventDefault();

		let $parent = $(this).closest('.qlists-container'),
			index = $(this).closest('.qlists-toolbar').index(),
			$template = $('.qlist-sortable-ui-template').clone(),
			$sortables_parent = $parent.find('.qlists-sortables');

		$template.removeClass('hidden')
				 .addClass('show')
				 .removeClass('qlist-sortable-ui-template');

		//console.log( $template );

		if ( index === 0 ) {

			$sortables_parent.prepend( $template );

		}

		else {

			$sortables_parent.append( $template );

		}

		$template.siblings()
				 .removeClass('show');


		$sortables_parent.sortable( "refresh" );

	}

	function onModalClick_RemoveQuestion(e) {

		e.preventDefault();	

		let $button = $(this),			
			$ui = $button.closest('.qlists-sortables'),
			$parent = $button.closest('.qlist-sortable-ui');

		$parent.remove();
		
		$ui.data('removed', 'true');
			

	}

	function onToolbarClick_RemoveAnswer(e) {

		e.preventDefault();

		if ( aq_num < 3 ) {

			alert('Câu hỏi phải có ít nhất là từ 2 đáp án trở lên !');
			return;


		}

		$(this).closest('.faq-answ').remove();

		$('#EditElementDialog .faq-answ').each(function(i, e) {

			let $aq_num = $(e).find('.aq_num');

			$aq_num.text( getLabelAQ(i) );

		});

		aq_num--;	
		

	}

	function onToolbarClick_RemoveAnswerInQList(e) {

		e.preventDefault();

		let $ui = $(this).closest('.sortable-ui'),			
			aq_num = parseInt( $ui.data('aq_num') );

		if ( aq_num < 3 ) {

			alert('Câu hỏi phải có ít nhất là từ 2 đáp án trở lên !');
			return;


		}

		$(this).closest('.faq-answ').remove();

		$ui.find('.faq-answ').each(function(i, e) {

			let $aq_num = $(e).find('.aq_num');

			$aq_num.text( getLabelAQ(i) );

		});

		$ui.data('aq_num', --aq_num);

	}

	function esc_str( string ) {

		return string.replace(/(\r\n|\n|\r)/gm," ").trim();

	}

	function onModalClick_UpdateFAQ(e) {

		e.preventDefault();

		let txtQuestion = esc_str( $('#EditElementDialog .txtQuestion').val() ),
			$txtAnswers = $('#EditElementDialog .txtAnswers'),

			question = active_faq,
			q_content = esc_str( question['content'] ),

			getNewObjAns = function() {

				return {
					content : '',
					next : ''
				};

			};

		let boolUpdate = false;

		if ( q_content != txtQuestion ) {

			question['content'] = txtQuestion;

			boolUpdate = true;

		}

		let length = $txtAnswers.length,
			last_index = 0;

		$txtAnswers.each(function(i, e) {

			let $obj = $(e),

				answer = question['answers'][i],

				txtAnswer = esc_str( $obj.val() ),
				q_next = $obj.parent().find('.slNextQuestion').val();


			if ( _.isUndefined( answer ) ) {

				answer = getNewObjAns();		

			}

			let _txtAnswer = esc_str( answer['content'] ),
				_q_next = answer['next'];

			if ( txtAnswer != _txtAnswer ) {

				answer['content'] = txtAnswer;

				if ( ! boolUpdate ) boolUpdate = true;

			}

			if ( q_next != _q_next ) {

				answer['next'] = q_next;

				if ( ! boolUpdate ) boolUpdate = true;

			}

			question['answers'][i] = answer;
			
			// last element => save last index
			if ( i === ( length - 1 ) ) {				

				last_index = i;

				if ( ! boolUpdate ) boolUpdate = true;

			}

		});

		// last element => remove answers from index (i+1)
		if ( last_index === 0 ) question['answers'] = [];
		else question['answers'] = question['answers'].splice(0, last_index + 1);

		if ( boolUpdate ) {

			active_faq = question;

			updateFAQQuestions();

		}

		$('#EditElementDialog').modal('hide');

		//reloadFAQElements();

		console.log( faq_questions['data'] );
	}

	function viewFAQ( qlist, v ) {

		let $modal = $('#ViewElementDialog');						

		if ( v == '-1' ) return;

		let question = qlist.filter( (e, i) => e['id'] === v )[0];

		_active_faq = active_faq,
		active_faq = question;

		$modal.find('.txtQuestion').val( question['content'] );

		loadFAQQuestion( qlist, question, $modal );

		let $options = $modal.find('.faq-options');

		$options.find('select').addClass('disabled');
		$options.find('a').remove();

		$modal.find('.faq-ans-toolbar ').remove();

		$modal.find('textarea:not(.disabled)').addClass('disabled');

		$modal.modal('show');


	}

	function onModalClick_ViewFAQ(e) {

		e.preventDefault();

		let $slNextQuestion = $(this).prev(),
			v = $slNextQuestion.val().toString();

		viewFAQ( faq_questions['data'], v );

	}

	function draw_tree( trees, tind ) {

		//trees.reverse();

		let length = trees.length,
			chartContainer = 'OrganiseChart' + tind,

			config = {
	        container: "#" + chartContainer,
	        rootOrientation:  'NORTH', // NORTH || EAST || WEST || SOUTH
	        hideRootNode: true,
	        // levelSeparation: 30,
	        siblingSeparation:   40,
	        subTeeSeparation:    30,
	        
	        connectors: {
	            type: 'curve'
	        },
	        node: {
	            HTMLclass: 'nodeExample1'
	        }
	    },
	    root = {},

	    ALTERNATIVE = [
	        config,
	        root
	    ],

	    treePoints = [],

	    num_pushed_ans = 1,

	    html = '<div class="sortable-ui modalTrentBox ' + (tind == 0 ? 'show' : '') + '">' +
	    	   '	<h2>Nhánh cây ' + getLabelAQ(tind) + '</h2>' +
	    	   '	<div class="inside">' +
	    	   '		<div id="' + chartContainer + '"></div>' +
	    	   '	</div>' +
	    	   '</div>';

	    nodes = [];

	    $('#trentCharts').append(html);		

		if ( length > 0 ) {	

			$('#TreeInfoDialog').find('.modal-dialog').css({'width' : '100%', 'max-width' : '100%'});
			$(config['container']).addClass('chart').html('');
			
			for ( let i = 0 ; i < length; i++ ) {

				let jump_count = 1,					
					index = nodes.length;

				nodes[index] = {

					parent : index === 0 ? root : nodes[index - 1],
					
					text : {

						name : trees[i]['content']

					},
					stackChildren: true,
					HTMLid: chartContainer + '_' + trees[i]['id']

				};
				
				if ( index !== 0 ) {					

					if ( num_pushed_ans > 1 ) {

						while ( jump_count < num_pushed_ans ) {

							let point = [index - jump_count, index + 1, num_pushed_ans];

							treePoints.push( point );							

							jump_count++;

						}

					}

				}

				ALTERNATIVE.push(nodes[index]);					

				let next_faq_id = i + 1 < length ? trees[i + 1]['id'] : active_faq['id'],
					ans = trees[i]['answers'].filter( e => e['next'] === next_faq_id ),
					ans_length = ans.length;

				for ( let j = 0; j < ans_length; j++ ) {

					let k = j + 1,
						m = k - 1;

					nodes[index + k] = {

						parent : nodes[index],
						text : {

							name : ans[j]['content']

						},
						stackChildren: true,
						HTMLid: chartContainer + '_' + trees[i]['id'] + '_ans_' + ans[j]['id']

					};

					ALTERNATIVE.push(nodes[index + k]);		

				}

				// save previous length answers
				num_pushed_ans = ans_length;

			}

			length = nodes.length;			

			let index = length;

			nodes[index] = {

				parent : nodes[index - 1],
				
				text : {

					name : active_faq['content']

				},
				stackChildren: true,
				HTMLid: chartContainer + '_' + active_faq['id']

			};			

			if ( num_pushed_ans > 1 ) {

				jump_count = 1;

				while ( jump_count < num_pushed_ans ) {

					treePoints.push( [index - jump_count, index + 1, num_pushed_ans] );							

					jump_count++;

				}

			}

			ALTERNATIVE.push( nodes[index] );

			new Treant(ALTERNATIVE);

			window.tree.addConnectionToNode = addConnectionToNode;

			length = treePoints.length;

			if ( length > 0 ) {

				for ( let i = 0 ; i < length; i++ ) {

					let point = treePoints[i];

					window.tree.addConnectionToNode(window.tree.nodeDB.get(point[0]), false, window.tree.nodeDB.get(point[1]), point[2]);

				}

			}

			//console.log( window.tree.nodeDB );

			//window.tree.addConnectionToNode(window.tree.nodeDB.get(3), false,window.tree.nodeDB.get(1));
 			//window.tree.addConnectionToNode(window.tree.nodeDB.get(3), false,window.tree.nodeDB.get(4));

		}	

	}

	function drawUserAnsChosenTree( trees ) {

		//trees.reverse();

		let length = trees.length,
			chartContainer = 'OrganiseChart1',

			config = {
	        container: "#" + chartContainer,
	        rootOrientation:  'WEST', // NORTH || EAST || WEST || SOUTH
	        hideRootNode: true,
	        // levelSeparation: 30,
	        siblingSeparation:   40,
	        subTeeSeparation:    30,
	        
	        connectors: {
	            type: 'curve'
	        },
	        node: {
	            HTMLclass: 'nodeExample1'
	        }
	    },
	    root = {},

	    ALTERNATIVE = [
	        config,
	        root
	    ],

	    treePoints = [],

	    num_pushed_ans = 1,

	    html = '<div class="sortable-ui modalTrentBox show">' +
	    	   '	<h2>Nhánh cây user đã chọn</h2>' +
	    	   '	<div class="inside">' +
	    	   '		<div id="' + chartContainer + '"></div>' +
	    	   '	</div>' +
	    	   '</div>';

	    nodes = [];

	    $('#trentCharts').html(html);		

		if ( length > 0 ) {	

			$('#TreeInfoDialog').find('.modal-dialog').css({'width' : '100%', 'max-width' : '100%'});
			$(config['container']).addClass('chart').html('');
			
			for ( let i = 0 ; i < length; i++ ) {

				let index = nodes.length;

				nodes[index] = {

					parent : index === 0 ? root : nodes[index - 1],
					
					text : {

						name : trees[i]['content']

					},
					stackChildren: true,
					HTMLid: chartContainer + '_' + trees[i]['id']

				};		

				ALTERNATIVE.push(nodes[index]);					

				let ans_id = 0,

					ans = trees[i]['answers'][ans_id],

					k = 1;

				nodes[index + k] = {

					parent : nodes[index],
					text : {

						name : ans['content']

					},
					stackChildren: true,
					HTMLid: chartContainer + '_' + trees[i]['id'] + '_ans_' + ans['id']

				};

				ALTERNATIVE.push(nodes[index + k]);		

			}			

			new Treant(ALTERNATIVE);
			

			//console.log( window.tree.nodeDB );

			//window.tree.addConnectionToNode(window.tree.nodeDB.get(3), false,window.tree.nodeDB.get(1));
 			//window.tree.addConnectionToNode(window.tree.nodeDB.get(3), false,window.tree.nodeDB.get(4));

		}	

	}

	function showFAQTree(qlist, a) {

		a = _.isUndefined(a) ? active_faq : a;

		$('#TreeInfoDialog').modal('show');

		let faqs = [],
			faq_results = [],					
			trees = [],

			filter_callback = function(e) {

				let answers = e['answers'],
					length = answers.length;

				for ( let i = 0; i < length; i++ ) {

					if ( answers[i]['next'] === faqs[0]['id'] ) {

						return true;

					}

				}		

			};

		faqs = [a];

		faq_results = qlist.filter( filter_callback );

		let length = faq_results.length;

		$('#trentCharts').html('');		

		if ( length === 0 ) {

			html = 'Trước đó chưa có sự liên kết nào với câu hỏi này.';

			$('#trentCharts').html( html );

			return;

		}

		for ( let i = 0; i < length; i++ ) {

			faqs = [faq_results[i]];

			trees = [];

			while ( faqs.length > 0 ) {

				faqs = qlist.filter( filter_callback );

				if ( faqs.length > 0 ) {

					trees.push( faqs[0] );

				}

			}

			trees.reverse();

			trees.push(faq_results[i]);

			//console.log( trees );

			draw_tree( trees, i );

			//return;

		}


	}

	function onModalClick_ShowTreeFAQInfo(e) {

		e.preventDefault();

		//showFAQTree
				

	}

	function onModalClick_ToggleSortableBox(e) {

		let $trentbox = $(this).closest('.sortable-ui'),
			$parent = $trentbox.closest('.ui-sortable');

		$parent.css({'height' : ''});		

		$trentbox.toggleClass('show');

		$trentbox.siblings()
				 .removeClass('show');

		setOriginalHeightData( $parent, $parent );

	}

	function onModalClick_UpdateKSMessage(e) {

		e.preventDefault();

		let msg = $('#txtKSMessage').val().toString().trim();

		if ( msg === '' ) return;

		faq_questions['message_success'] = msg;

		$('#createKSMessageDialog').modal('hide');


	}

	function onModalClick_ShowUserAnsChosen(e) {

		e.preventDefault();

		$('#TreeInfoDialog').modal('show');

		let tree = [],

			index = parseInt( $(this).data('user-index') ),
			cid = parseInt( $(this).data('camp-id') ),

			campaign = faq_questions['campaigns'][cid],
			usersRegInfo = campaign['usersRegInfo'],

			questions = campaign['data'],

			userChosenAnswers = usersRegInfo[index]['faq_answers'],
			length = userChosenAnswers.length,

			qid = 0;

		// duyet qua tung cau tra loi ma user da chon
		for ( let i = 0; i < length; i++ ) {

			let c_question = questions[qid], // cau hoi hien tai bat dau tu thu nhat
				c_question_ans = c_question['answers'],
				c_ans = c_question_ans[ userChosenAnswers[i] ], // cau tra loi hien tai ung voi user da chon
				n_question_id = c_ans['next']; // id cau hoi ke tiep			

			let _c_question = JSON.parse( JSON.stringify( c_question ) );

			_c_question['answers'] = _c_question['answers'].filter(function(e, index) {

				if ( index == userChosenAnswers[i] ) return e;

			});

			tree.push( _c_question );

			qid = questions.findIndex(e => e['id'] === n_question_id);

			if ( qid == -1 ) break;

		}

		active_faq = tree[tree.length - 1];

		drawUserAnsChosenTree(tree);

	}

	function onModalClick_RemoveUserInfo(e) {

		let index = parseInt( $(this).data('user-index') ),
			cid = parseInt( $('#ShowUsersRegInfoDialog').data('camp-id') ),

			campaign = faq_questions['campaigns'][cid],
			usersRegInfo = campaign['usersRegInfo'],

			row = $(this).closest('tr');

		usersRegInfo.splice(index, 1);

		$.usersRegInfoDtInst.row( row )
							.remove()
							.draw();

		console.log( usersRegInfo );

	}

	// dialog
	function onShown_Dialog() {	

		//let length = $('.modal:visible').length;

		//if ( length > 1 ) return;

		let id = $(this).attr('id');

		switch ( id ) {

			case 'createKSMessageDialog' :

				$('#txtKSMessage').val( faq_questions['message_success'] );

				break;

			case 'ShowUsersRegInfoDialog' :				

				break;

			case 'QListsDialog' :

				LoadQLists();

				break;

			case 'CreateCampaignDialog' :			
			case 'EditCampaignDialog' :

				LoadSettingsInCampaign( $('#' + id) );

				break;

			case 'CampaignsListDialog' :

				LoadCampLists();

				break;

			default :

				break;				

		}

		resetDialog();

	}

	function onHidden_Dialog() {

		let $modal = $(this),
			form_id = '',
			id = $modal.attr('id');

		switch ( id ) {

			case 'EditElementDialog':

				if ( active_faq !== null ) {

					active_faq = null;
					_active_faq = null;

				}

				break;

			case 'ViewElementDialog' :

				if ( _active_faq !== null ) {

					active_faq = _active_faq;
					_active_faq = null;

				}

				break;

			case 'ShowUsersRegInfoDialog':

				$.usersRegInfoDtInst.destroy();

				break;

			case 'CreateQListDialog' :

				form_id = '#frmNewQList';

				$(form_id)[0].reset();

				$('.qlist-sortable-ui', form_id).remove();

				break;

			case 'EditQListDialog' :

				form_id = '#frmEditQList';

				$(form_id)[0].reset();

				$('.qlist-sortable-ui', form_id).remove();

				break;

			case 'CreateCampaignDialog' :
			case 'EditCampaignDialog' :

				let $form = $modal.find('form');

				$form[0].reset();

				OnTimer_ClearChangeHeightSortables();

				$modal.find('.qlists-sortables').html('')											   
											   .removeData('originalHeight')
											   .removeAttr('style');

				break;

			case 'CampaignEditMessageDialog' :

				$('input, textarea', '#' + id).val('');

				break;

			default:

				break;

		}

		$modal.css('overflow', '');

		let $faq_modal = $modal.siblings('.FAQElementsDialog.show');

		if ( $faq_modal.length > 0 ) {

			$faq_modal.css('overflow', 'auto');

			$('body').addClass('modal-open');

		}

		// reload data form
		if ( $faq_modal.length === 1  ) {

			let id = $faq_modal.eq(0).attr('id');

			switch ( id ) {

				case 'QListsDialog':

					LoadQLists();

					break;

				case 'CampaignsListDialog':

					LoadCampLists();

					break;

			}

		}

		//console.log( active_faq );

	}

	function onTableClick_RemoveCampaign(e) {

		e.preventDefault();

		let cid = parseInt( $(this).data('camp-id') ),
			index = faq_questions['campaigns'].findIndex( (e,i) => i === cid );

		if ( index !== -1 ) {
			faq_questions['campaigns'].splice(index, 1);
		}

		LoadCampLists();

	}

	function onClick_UpdateToServer() {

		let $button = $(this),
			$container = $('.faq-main-containers'),			
			remove_alert = function() {

				setTimeout(function() {

					$container.find('.alert').remove();

				}, 2000);

			},
			alert_success = function(msg) {

				$container.prepend('<div class="alert alert-success" role="alert">' + msg + '</div>');

				remove_alert();

			},
			alert_error = function(msg) {

				$container.prepend('<div class="alert alert-danger" role="alert">' + msg + '</div>');

				remove_alert();

			}

		$button.toggleClass('updating');
		$container.toggleClass('disabled');

		updateData().then(function(msg) {

			if ( 'success' === msg ) {

				alert_success("Cập nhật thành công ...");

			}

			else {

				alert_error("Có lỗi xảy ra trong quá trình cập nhật ...");

			}


			$button.toggleClass('updating');	
			$container.toggleClass('disabled');

		});

	}

	function onModalClick_UserInfoUnchange(e) {

		let cid = parseInt( $('#ShowUsersRegInfoDialog').data('camp-id') ),
			
			campaign = faq_questions['campaigns'][cid];			

		if ( _usersRegInfo.length > 0 ) {

			campaign['usersRegInfo'] = JSON.parse( JSON.stringify( _usersRegInfo ) );			

			//console.log( campaign );

		}

	}

	function onModalClick_UnserInfoSaveChange(e) {

		let cid = parseInt( $('#ShowUsersRegInfoDialog').data('camp-id') ),
			
			campaign = faq_questions['campaigns'][cid];		

		_usersRegInfo = JSON.parse( JSON.stringify( campaign['usersRegInfo'] ) );

	}

	function onModalClick_ViewSCodeCamp(e) {

		e.preventDefault();

		let id = parseInt( $(this).data('camp-id') ),
			cid = faq_questions['campaigns'][id]['id'],

			modal_id = '#CampaignShortCodeDialog';

		$('#txtFAQShortCode', modal_id).val('[faqks_sc cid="' + cid + '" show_on_sidebar="false"]');
		$('#txtFAQShortCodeSb', modal_id).val('[faqks_sc cid="' + cid + '" show_on_sidebar="true"]');

		$(modal_id).modal('show');

	}

	function onModalClick_EditMessageCamp(e) {

		e.preventDefault();

		let id = parseInt( $(this).data('camp-id') ),
			campaign = faq_questions['campaigns'][id];

			modal_id = '#CampaignEditMessageDialog';

		$('#txtEditBgMessage', modal_id).val( campaign['bg_message'] );
		$('#txtEditFinishMessage', modal_id).val( campaign['fn_message'].replace(/\<br\/\>/ig, "\n") );
		$('#txtEditFinishEMessage', modal_id).val( campaign['fn_emessage'].replace(/\<br\/\>/ig, "\n") );

		$(modal_id).modal('show')
				   .data('campaign_id', id);

	}

	function onModalClick_ViewRegUsersCInfo(e) {

		let $dt = $('#usersRegInfoDt'),
			$dt_body = $dt.find('tbody'),

			cid = parseInt( $(this).data('camp-id') );

		$dt_body.find('tr').remove();

		let campaign = faq_questions['campaigns'][cid],
			usersRegInfo = campaign['usersRegInfo'],
			length = 0;

		if ( _.isUndefined(usersRegInfo) ) usersRegInfo = [];

		length = usersRegInfo.length;

		// nap lan dau tien
		if ( _usersRegInfo.length === 0 ) {

			_usersRegInfo = JSON.parse( JSON.stringify( usersRegInfo ) );

		}

		for ( let i = 0; i < length; i++ ) {

			let row = '<tr>' +
					  '		<td>' + (i + 1).toString() + '</td>' +
					  '		<td>' + usersRegInfo[i]['fullname'] + '</td>' +
					  '		<td>' + usersRegInfo[i]['email'] + '</td>' +
					  '		<td>' + usersRegInfo[i]['phone'] + '</td>' +
					  '		<td><a class="viewUserAnsChosen" data-camp-id="' + cid + '" data-user-index="' + i + '" href="#">Mời xem</a></td>' +
					  '		<td><button class="btn btn-danger btnRemoveUserInfo" data-user-index="' + i + '"><span class="dashicons-before dashicons-trash"></span></button></td>' + 
					  '</tr>';

			$dt_body.append( row );

		}

		$.usersRegInfoDtInst = $dt.DataTable(dataTable_def_options);

		$('#ShowUsersRegInfoDialog').modal('show')
									.data('camp-id', cid);

	}
	
	function onModalClick_SaveCampMessageChanges(e) {

		e.preventDefault();

		let modal_id = '#CampaignEditMessageDialog',
			$modal = $(modal_id),

			id = $modal.data('campaign_id'),
			campaign = faq_questions['campaigns'][id],

			bg_message = esc_str( $('#txtEditBgMessage', modal_id).val() ),
			fn_message = $('#txtEditFinishMessage', modal_id).val().replace(/\r\n|\n/gm, "<br/>"),
			fn_emessage = $('#txtEditFinishEMessage', modal_id).val().replace(/\r\n|\n/gm, "<br/>");

		campaign['bg_message'] = bg_message;
		campaign['fn_message'] = fn_message;
		campaign['fn_emessage'] = fn_emessage;

		$modal.modal('hide');

	}

	function updateQuestionUI( $ui, question ) {

		let q_content = esc_str( $ui.find('.txtQuestion').val() ),
			$txtAnswers = $ui.find('.txtAnswers'),			

			_q_content = esc_str( question['content'] ),				

			length = $txtAnswers.length,
			last_index = 0;

		if ( _q_content != q_content ) {

			question['content'] = q_content;				

		}

		$txtAnswers.each(function(j, ans) {

			let $obj = $(ans),

				answer = question['answers'][j],

				txtAnswer = esc_str( $obj.val() ),
				_txtAnswer = '';
				

			if ( _.isUndefined( answer ) ) {

				answer = {id: j, content : ''};

			}

			_txtAnswer = esc_str( answer['content'] );

			if ( txtAnswer != _txtAnswer ) {

				answer['content'] = txtAnswer;					

			}

			question['answers'][j] = answer;
			
			// last element => save last index
			if ( j === ( length - 1 ) ) {				

				last_index = j;

			}

		});

		// last element => remove answers from index (j+1)
		if ( last_index === 0 ) question['answers'] = [];
		else question['answers'] = question['answers'].splice(0, last_index + 1);

	}

	// submit form
	function onSubmitForm_CreateNewQList(e) {

		e.preventDefault();

		let form_id = '#frmNewQList',
			txtQListName = $('#txtQListName', form_id).val(),				

			// bộ câu hỏi
			faqQues = {
				name : '',
				data : []
			},
			faqAnsw = [],

			questionsList = faqQues['data'], // danh sách những câu hỏi thuộc bộ câu hỏi

			checkRequiredFields = function() {

				let boolCheck = true;

				$('.qlist-sortable-ui', form_id).each(function(i, e) {

					let $txtAnswers = $('.txtAnswers', e),

						length = $txtAnswers.length;				

					if ( length < 2 ) {

						alert('Câu hỏi phải có ít nhất là 2 đáp án !');
						
						boolCheck = false;

						return;

					}					

				});

				return boolCheck;			

			};

		let boolCheck = checkRequiredFields();

		if ( ! boolCheck ) return;

		if ( _.isUndefined( faq_questions['QuestionLists'] ) ) {

			faq_questions['QuestionLists'] = [];
			
		}

		faqQues['name'] = txtQListName;

		$('.qlist-sortable-ui', form_id).each(function(i, e) {

			let $ui = $(e),
				txtQuestion = esc_str( $ui.find('.txtQuestion').val() ),
				ques = {};

			faqAnsw = getQListAnswers( $ui );

			ques['id'] = get_unique_qid( questionsList );
			ques['content'] = txtQuestion;
			ques['answers'] = faqAnsw;
			
			questionsList.push( ques );

		});		

		faq_questions['QuestionLists'].push( faqQues );

		//console.log(faq_questions['QuestionLists']);		

		$('#CreateQListDialog').modal('hide');


	}

	function onSubmitForm_SaveQList(e) {

		e.preventDefault();

		let form_id = '#frmEditQList',			
			txtQListName = $('#txtEQListName', form_id).val(),

			questionList = active_faq;

			checkRequiredFields = function() {

				let boolCheck = true;

				$('.qlist-sortable-ui', form_id).each(function(i, e) {

					let $txtAnswers = $('.txtAnswers', e),

						length = $txtAnswers.length;				

					if ( length < 2 ) {

						alert('Câu hỏi phải có ít nhất là 2 đáp án !');
						
						boolCheck = false;

						return;

					}					

				});

				return boolCheck;			

			};

		let boolCheck = checkRequiredFields();

		if ( ! boolCheck ) return;

		if ( questionList['name'] != txtQListName ) {

			questionList['name'] = txtQListName;

		}

		$('.qlist-sortable-ui', form_id).each(function(i, e) {

			let $ui = $(e),
				question = questionList['data'][i];

			question = updateQuestionUI( $ui, question );

		});

		$('#EditQListDialog').modal('hide');

	}

	OnSortableQuestionEvent();

	$('#frmNewQList').submit( onSubmitForm_CreateNewQList );
	$('#frmEditQList').submit( onSubmitForm_SaveQList );	

	//$('.btnCreateNewFAQ').click( onModalClick_CreateFAQ );	
	//$('.btnUpdateFAQ').click( onModalClick_UpdateFAQ );

	$('.btnUpdate').click( onClick_UpdateToServer );

	$('.btnCloseUserRegDialog').click( onModalClick_UserInfoUnchange );
	$('.btnSaveUserInfoChanges').click( onModalClick_UnserInfoSaveChange );

	//$('.txtSearch').keyup( onKeyUp_searchQuestion );

	$('.FAQElementsDialog').on("hidden.bs.modal", onHidden_Dialog)
						   .on("shown.bs.modal", onShown_Dialog);	

	$(document)
			   // .on('click', '.btnFaqEdit', onToolbarClick_EditFAQ)
			   //.on('click', '.btnFaqRemove', onToolbarClick_RemoveFAQ)
			   //.on('click', '.btnRemoveAnswer', onToolbarClick_RemoveAnswer)
			   .on('click', '.qlists-toolbar .btnAddNewQuestion', onToolbarClick_AddNewQuestion)
			   .on('click', '.qlist-sortable-ui .btnRemoveQuestion', onModalClick_RemoveQuestion)

			   .on('keyup', '.txtQuestion', onKeyUp_changeQTitle)

			   .on('click', '.qlist-sortable-ui .btnRemoveAnswer', onToolbarClick_RemoveAnswerInQList)

			   .on('click', '.qlist-sortable-ui .btnAddNewAnswer', onModalClick_CreateAnswerInQList )

			   //.on('click', '.preview-ques', onModalClick_ViewFAQ)
			   //.on('click', '.treeinfo', onModalClick_ShowTreeFAQInfo)
			   .on('click', '.btnFaqTreeView', onToolbarClick_ShowTreeFAQInfo)

			   .on('change', '.slQuestionLists', onChange_ChooseQListInCampaign)

			   .on('click', '.btnEditQList', onTableClick_EditQuestionList)
			   .on('click', '.btnRemoveQList', onTableClick_RemoveQuestionList)

			   //.on('click', '.btnUpdateKSMessage', onModalClick_UpdateKSMessage)

			   .on('click', '.sortable-ui > h2', onModalClick_ToggleSortableBox)

			   .on('click', '.viewUserAnsChosen', onModalClick_ShowUserAnsChosen)
			   .on('click', '.btnRemoveUserInfo', onModalClick_RemoveUserInfo)

			   .on('click', '.btnViewSCodeCamp', onModalClick_ViewSCodeCamp)
			   .on('click', '.btnEditMessageCamp', onModalClick_EditMessageCamp)
			   .on('click', '.btnViewRegUsersCInfo', onModalClick_ViewRegUsersCInfo)

			   .on('click', '.btnRemoveCamp', onTableClick_RemoveCampaign)

			   .on('click', '.btnSaveCampMessageChanges', onModalClick_SaveCampMessageChanges);

	$(document).on('show.bs.modal', '.modal', function (event) {

        var zIndex = 99999 + (10 * $('.modal:visible').length),
            $this = $(this);

        $this.css( {'z-index' : zIndex, 'overflow' : 'auto'} );

        $this.siblings('.FAQElementsDialog')
        	   .css('overflow', '');

        setTimeout(function() {

        	$this.css('padding-right', '');

            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');

        }, 100);       

    });


});