
jQuery(function($) {

	var bannerOptions = {

		banner : {

			name : '',
			url : '',
			target : '_blank',
			src : ''

		},
		categories : []


	},
		bannerListsOptions = [];

	var items_selected = {

		cat : -1,
		subject : -1

	};

	function showAjaxLoading() {

		$('#loader-overlay').addClass('active');

	}

	function hideAjaxLoading() {

		$('#loader-overlay').removeClass('active');
		
	}

	function getCat_SjHasTwoBanners() {

		const catShownLists = [],
			  sjShownLists = [],

		  	addCatDataToList = (category, banner) => {

			  	let index = catShownLists.findIndex(cat => cat.id === category.id);

				if ( index === -1 ) {

					catShownLists.push({

						name : category.name,
						id : category.id,
						banners : [
							{
								name : banner.name,
								src : banner.src
							}
						]

					});

				}

				else {

					let ban = catShownLists[index].banners.filter(bn => bn.name.toLowerCase() === banner.name.toLowerCase());

					// {banner} chưa đc thêm
					if ( ban.length === 0 ) {

						catShownLists[index].banners.push({

							name : banner.name,
							src : banner.src

						});

					}

				}

		  	},

		  	addSjDataToList = (subject, banner) => {

				let index = sjShownLists.findIndex(sj => sj.id === subject.id);

				if ( index === -1 ) {

					sjShownLists.push({

						name : subject.name,
						id : subject.id,
						banners : [
							{
								name : banner.name,
								src : banner.src
							}
						]

					});

				}

				else {

					let ban = sjShownLists[index].banners.filter(bn => bn.name.toLowerCase() === banner.name.toLowerCase());

					// {banner} chưa đc thêm
					if ( ban.length === 0 ) {

						sjShownLists[index].banners.push({

							name : banner.name,
							src : banner.src

						});

					}

				}

		  	};

		bannerListsOptions.map(banner => {

			banner.categories.map(category => {

				if ( category.settings.show === 1 ) {

					addCatDataToList(category, banner);

					category.subjects.map(subject => {

						if ( subject.settings.show === 1 ) {

							addSjDataToList(subject, banner);

						}

					});

				}

			});

		});

		return {
			
			catShownLists,
			sjShownLists

		};

	}

	function renderSubjects(cat, sj_lists, isSjGenerate) {

		let html = '',
			sj_item = {};			

		sj_lists.forEach(sj => {

			let sj_id = sj.term_id ? sj.term_id : sj.id;

			html += `<li value="${sj_id}">${sj.name}</li>`;

			if ( isSjGenerate ) {

				sj_item = {

					name : sj.name,
			   	  	id : sj_id,
			   	  	settings : {

				   	  	show : 0,
				   	  	showOnPosts : 0

			   	  	}

				};

				if ( window.bannerDoAction === 'edit' ) {

					bannerListsOptions.map((banner, bannid) => {

						if ( bannid === window.bannerActiveId ) {

							banner.categories.map(c1 => {

								if ( c1.id === cat.id ) {

									c1.subjects.map(sj1 => {

										if ( sj1.id === sj_id ) {

											sj_item.settings.show = sj1.settings.show;
											sj_item.settings.showOnPosts = sj1.settings.showOnPosts;

										}

									})

								}

							});

						}

					});

				}

				cat.subjects.push(sj_item);

			}

		});

		$('#lafu-sj-lists').html(html);

	}

	function setSubjectsLists(cat, cid) {

		showAjaxLoading();

		$.ajax({

			method : "POST",
			url : ajaxurl,
			data : {

				action : 'sb_get_subjects',
				cid

			},

			success: function(tags) {					

				if ( tags.length === 0 ) {

					$('#lafu-sj-lists').html(`<li class="no-choice">--- Không có chủ đề nào ---</li>`);

				}

				else {					

					renderSubjects(cat, tags, true);

				}				

				hideAjaxLoading();

			},

			error: function() {

				hideAjaxLoading();	

				alert('Có lỗi xảy ra, vui lòng thử lại !!!');

			}

		});

	}

	function initializeCatListsOptions() {

		$('#lafu-c-lists > li:not(.no-choice)').each((i, e) => {

			const $e = $(e),
				  data = getItemData($e);

			bannerOptions.categories
				   .push({

				   	  name : data.name,
				   	  id : data.id,
				   	  settings : {

				   	  	show : 0,
				   	  	showOnAllPosts : 0

				   	  },

				   	  subjects : []

				   });

		});

		//console.log( options );

	}

	function setActiveItem($item) {

		$item.siblings().removeClass('active');

		if ( ! $item.hasClass('active') ) {

			$item.addClass('active');

		}

	}

	function setEnabledCheckboxes(type) {

		const $checkboxes_wrapper = $('.lafu-checkboxes-wrapper.-' + type);

		if ( $checkboxes_wrapper.hasClass('-disabled') ) {

			$checkboxes_wrapper.removeClass('-disabled');

		}

	}

	function setDisableCheckboxes(type) {

		const $checkboxes_wrapper = $('.lafu-checkboxes-wrapper.-' + type);

		if ( ! $checkboxes_wrapper.hasClass('-disabled') ) {

			$checkboxes_wrapper.addClass('-disabled');

		}

	}

	function setUnCheckboxes(type) {

		if ( type === 'sj' ) {

			$('.lafu-checkboxes-settings[data-obj-type="subject"][data-obj-setting="show"]').prop('checked', false);
			$('.lafu-checkboxes-settings[data-obj-type="subject"][data-obj-setting="showOnPosts"]').prop('checked', false);

		}

	}

	function setChooseCatItem($item, ipos, item_data) {

		setActiveItem($item);	

		setEnabledCheckboxes('cat');	

		const cat = bannerOptions.categories.filter(e => e.id === item_data.id)[0];

		if ( cat.subjects.length === 0 ) {

			setSubjectsLists(cat, item_data.id);

		}

		else {

			renderSubjects(cat, cat.subjects, false);

		}

	}

	function setChooseSubjItem($item, ipos, item_data) {		

		setActiveItem($item);

		setEnabledCheckboxes('sj');	

		//setEnabledCheckboxes();		

	}

	function getItemData($item) {

		return {
			name : $item.text().trim(),
			id : parseInt( $item.attr('value') )
		};

	}

	function setChkboxStFromCatSelected() {

		const cid_selected = items_selected.cat;

		if ( cid_selected !== -1 ) {

			const cat = bannerOptions.categories.filter(e => e.id === cid_selected)[0],

				  showSt = cat.settings.show === 1 ? true : false,
				  showOnAllPostsSt = cat.settings.showOnAllPosts === 1 ? true : false;

			//console.log(showSt);

			$('.lafu-checkboxes-settings[data-obj-type="cat"][data-obj-setting="show"]').prop('checked', showSt);
			$('.lafu-checkboxes-settings[data-obj-type="cat"][data-obj-setting="showOnAllPosts"]').prop('checked', showOnAllPostsSt);

		}

	}

	function setChkboxStFromSjSelected() {

		const cid_selected = items_selected.cat,
			  sj_selected = items_selected.subject;

		//console.log( bannerOptions );

		if ( cid_selected !== -1 && 
			 sj_selected !== -1 ) {

			const cat = bannerOptions.categories.filter(e => e.id === cid_selected)[0],
				  subject = cat.subjects.filter(e => e.id === sj_selected)[0],

				  showSt = subject.settings.show === 1 ? true : false,
				  showOnPostsSt = subject.settings.showOnPosts === 1 ? true : false;

			//console.log(showSt);

			$('.lafu-checkboxes-settings[data-obj-type="subject"][data-obj-setting="show"]').prop('checked', showSt);
			$('.lafu-checkboxes-settings[data-obj-type="subject"][data-obj-setting="showOnPosts"]').prop('checked', showOnPostsSt);

		}


	}

	function chooseCat(e) {

		e.preventDefault();

		const $this = $(this),
			  cat_data = getItemData($this),
			  ipos = $this.index();

		items_selected.cat = window.catIdSelectedHasTwoBanners = cat_data.id;		

		setDisableCheckboxes('sj');
		setUnCheckboxes('sj');

		setChkboxStFromCatSelected();		

		setChooseCatItem($this, ipos, cat_data);

		//console.log(v);

	}

	function chooseSubject(e) {

		e.preventDefault();

		const $this = $(this),
			  subj_data = getItemData($this),
			  ipos = $this.index();

		items_selected.subject = window.sjIdSelectedHasTwoBanners = subj_data.id;		 

		//console.log( bannerOptions );

		setChkboxStFromSjSelected();

		setChooseSubjItem($this, ipos, subj_data);

	}

	function setCheckboxSt(e) {

		const $item = $(this),
		      obj_type = $item.data('obj-type'),
			  obj_setting = $item.data('obj-setting'),
			  checked = $item.prop('checked'),

			  isCatObj = obj_type === 'cat';

		const cid_selected = items_selected.cat,
			  cat = bannerOptions.categories.filter(e => e.id === cid_selected)[0];

		if ( isCatObj ) {

			cat.settings[obj_setting] = checked ? 1 : 0;

		}

		else {

			const sj_id_selected = items_selected.subject,
				  sj = cat.subjects.filter(e => e.id === sj_id_selected)[0];

			sj.settings[obj_setting] = checked ? 1 : 0;

		}	

		//console.log(options);

	}

	function chooseBannerImage(e) {

		let custom_uploader = wp.media({

	            title: 'Select Image',

	            button: {

	                text: 'Upload Image'

	            },

	            multiple: false  // Set this to true to allow multiple files to be selected

	        }).on('select', function() {	            

	            var attachment = custom_uploader.state().get('selection').first().toJSON(),
	            	url = attachment['url'];

	            $('.imgBanner').attr('src', url);

	            bannerOptions.banner.src = url;

	            $('body').css('overflow', '')
	            		 .addClass('modal-open');

	            $('#bannerDialog').css('overflow', 'auto');
	           

	        }).open();

	}

	function validateFormInput() {

		if ( bannerOptions.banner.name === '' ) {			

			alert('Mời nhập tên banner !!!');

			return false;

		}

		else {

			const bannerId = bannerListsOptions.findIndex(e => e.name.toLowerCase() === bannerOptions.banner.name.toLowerCase());

			if ( bannerId !== -1 ) {

				if ( window.bannerDoAction === 'new' ) {

					alert('Tên banner đã tồn tại, mời nhập một tên khác !!!');

					return false;

				}

				else {

					// banner trùng lặp tên không phải là banner đang xét
					if ( bannerId !== window.bannerActiveId ) {

						alert('Tên banner đã tồn tại, mời nhập một tên khác !!!');

						return false;

					}

				}

			}

		}

		if ( bannerOptions.banner.src === '' ) {

			alert('Mời chọn một ảnh banner !!!');

			return false;

		}

		if ( bannerOptions.categories.length > 0 ) {

			const categories = bannerOptions.categories,
				  items = categories.filter(e => e.settings.show === 1 || e.settings.showOnAllPosts === 1);

			if ( items.length === 0 ) {

				alert('Chưa có danh mục nào được thiết lập hiển thị !!!');

				return false;

			}

		}

		return true;



	}

	function getCategoriesListsCTrue() {

		let categories = bannerOptions.categories,
			categoriesListsOfSet = JSON.parse( JSON.stringify( categories.filter(e => e.settings.show === 1 || e.settings.showOnAllPosts === 1) ) );

		categoriesListsOfSet.map(item => {

			item.subjects = JSON.parse( JSON.stringify( item.subjects.filter(c_sj => c_sj.settings.show === 1 || c_sj.settings.showOnPosts === 1) ) );

			return item;

		});

		return categoriesListsOfSet;

	}

	function performCreateBanner(e) {

		e.preventDefault();		

		const isValidateForm = validateFormInput();

		//console.log( isValidateForm );

		if ( ! isValidateForm ) return;

		const categoriesListsOfSet = getCategoriesListsCTrue();

		bannerListsOptions.push({

			name : bannerOptions.banner.name,
			url : bannerOptions.banner.url,
			target : bannerOptions.banner.target,
			src : bannerOptions.banner.src,

			categories : JSON.parse( JSON.stringify( categoriesListsOfSet ) )


		});

		$('#bannerDialog').modal('hide');

		window.isReloadBannerLists = true;

		console.log( bannerListsOptions );
		
	}

	function performUpdateBanner(e) {

		e.preventDefault();		

		const isValidateForm = validateFormInput();

		//console.log( isValidateForm );

		if ( ! isValidateForm ) return;		

		updateDataActiveBanner();	  

		$('#bannerDialog').modal('hide');

		window.isReloadBannerLists = true;

		console.log( bannerListsOptions );

	}

	function changeNameBanner(e) {

		bannerOptions.banner.name = $(this).val();

	}

	function changeUrlBanner(e) {

		bannerOptions.banner.url = $(this).val();

	}

	function changeUrlTargetMethod(e) {

		bannerOptions.banner.target = $(this).val();

	}

	function renderBannerLists() {

		let html = '';

		html += `<tr>
					<th>
						STT
					</th>

					<th>
						Tên banner
					</th>

					<th>
						Ảnh banner
					</th>

					<th>
					</th>
				</tr>`;

		if ( bannerListsOptions.length === 0 ) {

			html += `<tr>
						<td colspan="4" align="center">Không có banner nào ở đây.</td>
					</tr>`;

		}

		else {

			bannerListsOptions.forEach((item, i) => {

				html += `<tr>
							<td>
								${i + 1}
							</td>

							<td>
								${item.name}
							</td>

							<td>
								<img src="${item.src}" alt="${item.name}" height="50" />
							</td>

							<td>

								<a href="#" class="btnShowBannerDialog -editbanner" 
											data-id=${i} 
											data-banner-action="edit">
									<span class="dashicons dashicons-welcome-write-blog"></span>
								</a>

								<a href="#" class="btnActionBanner -removebanner" data-id=${i}>
									<span class="dashicons dashicons-welcome-comments"></span>
								</a>

							</td>

						</tr>`;

			});

		}

		$('#lafu-tbl-banner-lists').html(html);

	}

	function loadBannerListsTimer() {

		const t = setInterval(function() {

			if ( window.isReloadBannerLists ) {
				
				renderBannerLists();

				window.isReloadBannerLists = false;
			}

		}, 100);

	}

	function resetBannerForm() {

		$('.txtBannerName').val('');
		$('.txtBannerURL').val('');
		$('.slUrlTargetMethod').val('_blank');
		$('.imgBanner').attr('src', '');

		const $table = $('.lafu-table-layout.-setbanner');

		$table.find('ul.select-list-box li.active')
			  .removeClass('active');

		$table.find('ul.select-list-box.lafu-sj-lists').html('<li class="no-choice">--- Không có chủ đề nào ---</li>');

		$table.find('input[type=checkbox]').prop('checked', false);

		$('.lafu-checkboxes-wrapper').addClass('-disabled')

	}

	function resetBannerOptions() {

		bannerOptions.banner.name = '';
		bannerOptions.banner.url = '';
		bannerOptions.banner.target = '';
		bannerOptions.banner.src = '';

		bannerOptions.categories.map((category, index) => {

			category.settings.show = 0;
			category.settings.showOnAllPosts = 0;

			category.subjects = [];

		})

	}

	function showBannerDialog(e) {

		e.preventDefault();

		const $this = $(this);

		window.bannerDoAction = $this.data('banner-action');
		window.bannerActiveId = $this.data('id');

		$('#bannerDialog').modal('show');

	}

	function loadDataExistBanner() {

		if ( ! isNaN( parseInt( window.bannerActiveId ) ) ) {

			const activeBanner = bannerListsOptions.filter((banner, index) => index === parseInt( window.bannerActiveId ) )[0];

			bannerOptions.banner.name = activeBanner.name;
			bannerOptions.banner.url = activeBanner.url;
			bannerOptions.banner.target = activeBanner.target ? activeBanner.target : '_blank';
			bannerOptions.banner.src = activeBanner.src;

			activeBanner.categories.map(cat => {

				bannerOptions.categories.map(cat1 => {

					if ( cat1.id === cat.id ) {

						cat1.settings.show = cat.settings.show;
						cat1.settings.showOnAllPosts = cat.settings.showOnAllPosts;

						cat1.subjects = [];

						return cat1;

					}

				});


			});

			//console.log( activeBanner );
			//console.log( bannerOptions );

		}

	}

	function updateDataActiveBanner() {

		const activeBanner = bannerListsOptions.filter((e, i) => i === parseInt( window.bannerActiveId ) )[0];

		activeBanner.name = bannerOptions.banner.name;
		activeBanner.url = bannerOptions.banner.url;
		activeBanner.target = bannerOptions.banner.target;
		activeBanner.src = bannerOptions.banner.src;

		let categories = bannerOptions.categories,
			categoriesListsOfSet = JSON.parse( JSON.stringify( categories.filter(e => e.settings.show === 1 || e.settings.showOnAllPosts === 1) ) );

		categoriesListsOfSet.map(item => {

			const id = item.id;

			if ( item.subjects.length === 0 ) {

				const category = activeBanner.categories.find(cat => cat.id === id);

				if ( category ) {

					item.subjects = JSON.parse( JSON.stringify( category.subjects ) );

				}

			}

			else {

				item.subjects = JSON.parse( JSON.stringify( item.subjects.filter(c_sj => c_sj.settings.show === 1 || c_sj.settings.showOnPosts === 1) ) );

			}



			return item;

		});

		activeBanner.categories = categoriesListsOfSet;

		//console.log(activeBanner);

	}

	function displayBannerOptions() {

		$('#txtEditBannerName').val(bannerOptions.banner.name);
		$('#txtEditBannerURL').val(bannerOptions.banner.url);
		$('#slEditUrlTargetMethod').val(bannerOptions.banner.target);
		$('#imgEditBanner').attr('src', bannerOptions.banner.src);

	}

	function bannerDialogShownEvent(e) {

		const $modal = $(this),
			  modal_id = $modal.attr('id'),

			resetStateBoxInNewDialog = () => {

				$('#bannerDialog .modal-title.-newbanner ').removeClass('hidden');
				$('#bannerDialog .modal-title.-editbanner ').addClass('hidden');

			  	$('#txtBannerName').removeClass('hidden');
				$('#txtEditBannerName').addClass('hidden');

				$('#txtBannerURL').removeClass('hidden');
				$('#txtEditBannerURL').addClass('hidden');

				$('#slUrlTargetMethod').removeClass('hidden');
				$('#slEditUrlTargetMethod').addClass('hidden');

				$('#imgBanner').removeClass('hidden');
				$('#imgEditBanner').addClass('hidden');

				$('.btnCreateBanner', '#bannerDialog').removeClass('hidden');
				$('.btnUpdateBanner', '#bannerDialog').addClass('hidden');

			},

			resetStateBoxInEditDialog = () => {

				$('#bannerDialog .modal-title.-newbanner ').addClass('hidden');
				$('#bannerDialog .modal-title.-editbanner ').removeClass('hidden');

			  	$('#txtBannerName').addClass('hidden');
				$('#txtEditBannerName').removeClass('hidden');

				$('#txtBannerURL').addClass('hidden');
				$('#txtEditBannerURL').removeClass('hidden');

				$('#slUrlTargetMethod').addClass('hidden');
				$('#slEditUrlTargetMethod').removeClass('hidden');

				$('#imgBanner').addClass('hidden');
				$('#imgEditBanner').removeClass('hidden');

				$('.btnCreateBanner', '#bannerDialog').addClass('hidden');
				$('.btnUpdateBanner', '#bannerDialog').removeClass('hidden');

			};

		$('body').addClass('ohidden');

		if ( modal_id === 'bannerDialog') {

			resetBannerForm();
			resetBannerOptions();

			if ( window.bannerDoAction === 'new' ) {

				resetStateBoxInNewDialog();

			}

			else {

				resetStateBoxInEditDialog();				

				loadDataExistBanner();
				displayBannerOptions();

			}

		}

	}


	function bannerDialogHiddenEvent(e) {

		$('body').removeClass('ohidden');

	}

	function performGetDataFromServer() {

		showAjaxLoading();

		$.ajax({

			method : "POST",
			url : ajaxurl,
			data : {

				action : "sb_get_options_data"

			},

			success: function(data) {

				if ( data !== 'null' ) {

					bannerListsOptions = data;

					bannerListsOptions.map(banner => {

						banner.categories.map(cat => {

							cat.id = parseInt(cat.id);

							cat.settings.show = parseInt(cat.settings.show);
							cat.settings.showOnAllPosts = parseInt(cat.settings.showOnAllPosts);

							if ( cat.subjects === undefined ) cat.subjects = [];

							cat.subjects.length > 0 && (cat.subjects.map(sj => {

								sj.id = parseInt(sj.id);

								sj.settings.show = parseInt(sj.settings.show);
								sj.settings.showOnPosts = parseInt(sj.settings.showOnPosts);

								return sj;

							}));

							return cat;

						});

						return banner;

					});

					console.log(bannerListsOptions);

				}				

				hideAjaxLoading();

				initializeCatListsOptions();
				loadBannerListsTimer();

				setDisableCat_SjOfTwoBannersTimer();

				window.isReloadBannerLists = true;

			},

			error: function(req) {				

				hideAjaxLoading();

				alert('Có lỗi xảy ra, mời thử lại sau !!!');

			}

		});
	}

	function performUpdateToServer(e) {

		e.preventDefault();

		//console.log( bannerListsOptions ); return;

		showAjaxLoading();

		$.ajax({

			method : "POST",
			url : ajaxurl,			
			data : {

				action : "sb_update_all",
				options : bannerListsOptions

			},

			success: function(msg) {

				if ( msg === 'success' ) {

				}

				else {

					alert('Có lỗi xảy ra, mời thử lại sau !!!');


				}

				hideAjaxLoading();

			},

			error: function(req) {				

				hideAjaxLoading();

				alert('Có lỗi xảy ra, mời thử lại sau !!!');

			}

		});

	}

	function performRemoveBanner(e) {

		e.preventDefault();

		const id = parseInt( $(this).data('id') );

		if ( bannerListsOptions.findIndex((e, i) => i === id ) !== -1 ) {

			bannerListsOptions.splice(id, 1);

			window.isReloadBannerLists = true;

		}

	}

	function findActiveBanner() {

		return bannerListsOptions.find((ban1, index) => index === parseInt(window.bannerActiveId));

	}

	function findCategoryInBanner(banner, cat_id) {

		return banner.categories.find(cat1 => cat1.id === cat_id);

	}


	function setDisableCat_SjOfTwoBannersTimer() {

		const $checkboxes_wrapper = $('.lafu-checkboxes-wrapper'),

			  $cat_checkboxes_wrapper = $checkboxes_wrapper.filter('.-cat'),
			  $sj_checkboxes_wrapper = $checkboxes_wrapper.filter('.-sj'),

			  $chkCatShow = $cat_checkboxes_wrapper.find('.cat-obj-setting-show'),

			  $chkSjShow = $sj_checkboxes_wrapper.find('.subject-obj-setting-show'),

			  $catListsBox = $('#lafu-c-lists'),

			traveselCatShownLists = (catShownLists) => {

				const active_cid = parseInt( window.catIdSelectedHasTwoBanners );

				catShownLists.forEach(cat => {

					const cat_id = cat.id;						 

					// 2 banner => làm mờ danh mục
					if ( cat.banners.length === 2 ) {

						/* đang ở hộp thoại sửa danh mục => {

							chỉ làm mờ danh mục có ().settings.show = 0

						} */					

						if ( window.bannerDoAction === 'edit' ) {					

							const category = findCatInActBanner(cat_id);						

							// danh mục này chưa set trong banner hiện tại
							if ( active_cid === cat_id && category.settings.show === 0 ) {

								setStateItem($chkCatShow, 'disable');

							}

							else {

								//console.log('enable');

								setStateItem($chkCatShow, 'enable');

							}


						}

						// hộp thoại tạo mới danh mục
						else {

							if ( active_cid === cat_id ) {

								setStateItem($chkCatShow, 'disable');

							}

							else {

								setStateItem($chkCatShow, 'enable');

							}

						}							

					}

					// khôi mục danh mục về mặc định
					else {

						setStateItem($chkCatShow, 'enable');

					}


				});

			},

			traveselSjShownLists = (sjShownLists, cat_id) => {

				const active_sjid = parseInt( window.sjIdSelectedHasTwoBanners );

				sjShownLists.forEach(subject => {

					const sj_id = subject.id;

					if ( subject.banners.length === 2 ) {

						if ( window.bannerDoAction === 'edit' ) {					

							const subj = findSjInActBanner(cat_id, sj_id);						

							// danh mục này chưa set trong banner hiện tại
							if ( active_sjid === sj_id && subj && subj.settings.show === 0 ) {

								setStateItem($chkSjShow, 'disable');

							}

							else {

								//console.log('enable');

								setStateItem($chkSjShow, 'enable');

							}


						}

						// hộp thoại tạo mới danh mục
						else {

							if ( active_sjid === sj_id ) {

								setStateItem($chkSjShow, 'disable');

							}

							else {

								setStateItem($chkSjShow, 'enable');

							}

						}			


					}

				});

			},

			findCatInActBanner = (cat_id) => {

			  	const activeBann = findActiveBanner(),
			  		  cat = findCategoryInBanner(activeBann, cat_id);

			  	return cat;

			},

			findSjInActBanner = (cat_id, sj_id) => {

				const activeBann = findActiveBanner(),
			  		  cat = findCategoryInBanner(activeBann, cat_id);

			  	if ( cat.subjects.length > 0 ) {

			  		return cat.subjects.filter(sj => sj.id === sj_id)[0];

			  	}

			  	return null;

			},

			setStateItem = ($item, state) => {

				if ( $item.length > 0 ) {

					if ( state === 'disable' ) {

						if ( ! $item.hasClass('-disabled') ) {
						
							$item.addClass('-disabled');

						}

					}

					else {

						if ( $item.hasClass('-disabled') ) {
						
							$item.removeClass('-disabled');

						}

					}

				}

			};

		let _catIdSelected = -1;

		const t = setInterval(function() {

			const data_lists = getCat_SjHasTwoBanners();			

			if ( window.catIdSelectedHasTwoBanners ) {

				// Tất cả danh mục đã set 2 banner			
				
				traveselCatShownLists(data_lists['catShownLists']);

				_catIdSelected = window.catIdSelectedHasTwoBanners;

				delete window.catIdSelectedHasTwoBanners;

			}		

			if ( window.sjIdSelectedHasTwoBanners && _catIdSelected !== -1 ) {

				//console.log( data_lists['sjShownLists'] );

				traveselSjShownLists(data_lists['sjShownLists'], _catIdSelected);

				//_catIdSelected = -1;

				delete window.sjIdSelectedHasTwoBanners;

			}				

			//data_lists['sjShownLists']

		}, 10);

	}

	//

	$('#lafu-c-lists > li:not(.no-choice)').click(chooseCat);

	$(document).on('click', '#lafu-sj-lists > li:not(.no-choice)', chooseSubject);

	$('input[type=checkbox].lafu-checkboxes-settings').click(setCheckboxSt);

	$('.media_upload').click(chooseBannerImage);

	$('.btnCreateBanner').click(performCreateBanner);
	$('.btnUpdateBanner').click(performUpdateBanner);

	$('.btnUpdateToServer').click(performUpdateToServer);

	$('.txtBannerName').change(changeNameBanner);
	$('.txtBannerURL').change(changeUrlBanner);

	$('.slUrlTargetMethod').change(changeUrlTargetMethod);

	$(document).on('click', '.btnShowBannerDialog', showBannerDialog)
			   .on('click', '.btnActionBanner.-removebanner', performRemoveBanner);

	$('.bannerDialog').on('shown.bs.modal', bannerDialogShownEvent)
					  .on('hidden.bs.modal', bannerDialogHiddenEvent);

	performGetDataFromServer();	

	//initializeTimer();

})
