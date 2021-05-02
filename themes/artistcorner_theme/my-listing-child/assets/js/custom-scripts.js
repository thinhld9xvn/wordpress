jQuery(function($) {

    const INVALID_EVENTS_FORM_ERROR = 'Please enter all required fields',
        SAVE_CHANGES_SUCCESS = 'You save changes successfully',
        INVALID_PERIOD_ERROR = 'The period has existed, please choose again';

    const CALENDAR_TYPE = {
        EVENT: 'event',
        EVENT_LABEL: 'Event',
        APPOINTMENT_SLOTS: 'appointment_slots',
        APPOINTMENT_SLOTS_LABEL: 'Appointment Slots'
    };

    const CALENDAR_ACTION = {

        EDIT : 'edit',
        NEW : 'new'

    };

    const CALENDAR_DIALOG_TITLE = {

        NEW : 'Create Events',
        EDIT : 'Edit Event'

    }

    //#region global

    function pushMessageValidate(icon, msg, layout = 'topRight', timeout = 5000) {

        new Noty({
            type: icon,
            layout: layout,
            text: msg,
            timeout: timeout
        }).show();

    };

    if (ajaxurl) {

    } else {

        var ajaxurl = '/wp-admin/admin-ajax.php';

    }

    const $homeFilterCategory = $('.js-select2-dropdown-simple.slCategories');

    $homeFilterCategory.select2({

            placeholder: $homeFilterCategory.data('placeholder'),
            allowClear: true

        }).on('select2:open', function() {

            //$(this).data("open", 'true');
            $('.select2-search--dropdown').css('display', 'none');

        }).on('select2:close', function() {

            //$(this).data("open", 'false');
            $('.select2-search--dropdown').css('display', 'block');

        })
        .on('select2:select', function(e) {

            var data = e.params.data,
                selected_value = data.id,
                selected_text = data.text.trim(),
                $form_group = $('#form-group-category-filter');

            $form_group.find('label').css('top', '9px');

        }).on('select2:unselect', function(e) {

            var $form_group = $('#form-group-category-filter');

            $form_group.find('label').css('top', '');

        });

    function hideJobFormSubmitAjaxLoading() {

        $('.loader-bg.main-loader.add-listing-loader').addClass('loader-hidden')
            .hide('fast');

    }

    $('#submit-job-form').submit(function(e) {

        e.preventDefault();

        const $form = $(this),
            validateAvatarProfile = function() {

                let boolValidate = false;

                const $fieldbox = $('#form-section-avatar-profile'),
                    $uploaded_images = $fieldbox.find('.job-manager-uploaded-files > .uploaded-image'),
                    $field_rq = $fieldbox.find('.field.required-field'),
                    error_msg = $field_rq.data('required-error');

                if ($uploaded_images.length) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $field_rq,
                    error_msg
                };

            },
            validateCoverProfile = function() {

                let boolValidate = false;

                const $fieldbox = $('#form-section-avatar-profile .fieldset-bg-cover-profile'),
                    $uploaded_images = $fieldbox.find('.job-manager-uploaded-files > .uploaded-image'),
                    $field_rq = $fieldbox.find('.field.required-field'),
                    error_msg = $field_rq.data('required-error');

                if ($uploaded_images.length) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $field_rq,
                    error_msg
                };

            },
            validateJobDescriptionProfile = function() {

                let boolValidate = false,
                    $field_rq = $('#form-section-general .fieldset-job_description .field.required-field'),
                    error_msg = $field_rq.data('required-error');

                tinymce.get('job_description').save();

                const contents = tinymce.get('job_description').getContent().replace(/\<p\>|\<\/p\>|\s/ig, '');

                if (contents.length > 100) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $field_rq,
                    error_msg
                };

            },
            validateJobsDetailsProfile = function() {

                let boolValidate = {
                    job_category: false,
                    //job_salary: false,
                    job_qualification: false,
                    job_vacancy_type: false
                };

                const $fieldbox = $('#form-section-job-details'),
                    $fieldbox_category = $fieldbox.find('.fieldset-job_category'),
                    $category_field_rq = $fieldbox_category.find('.field.required-field'),
                    job_category_error_msg = $category_field_rq.data('required-error'),

                    /*$fieldbox_salary = $fieldbox.find('.fieldset-job-salary'),
                    $salary_field_rq = $fieldbox_salary.find('.field.required-field'),
                    job_salary_error_msg = $salary_field_rq.data('required-error'),*/

                    $fieldbox_qualification = $fieldbox.find('.fieldset-job-qualification'),
                    $qualificaton_field_rq = $fieldbox_qualification.find('.field.required-field'),
                    job_qualification_error_msg = $qualificaton_field_rq.data('required-error'),

                    $fieldbox_vacancy_type = $fieldbox.find('.fieldset-job-vacancy-type'),
                    $vacancy_type_field_rq = $fieldbox_vacancy_type.find('.field.required-field'),
                    job_vacancy_type_error_msg = $vacancy_type_field_rq.data('required-error'),

                    job_category = $('#job_category').val(),
                    //job_salary = $('#job-salary').val(),
                    job_qualification = $('#job-qualification').val(),
                    job_vacancy_type = $('#job-vacancy-type').val();

                if (job_category && job_category.length) {

                    boolValidate.job_category = true;

                }

                /*if (job_salary && job_salary.length) {

                    boolValidate.job_salary = true;

                }*/

                if (job_qualification && job_qualification.length) {

                    boolValidate.job_qualification = true;

                }

                if (job_vacancy_type && job_vacancy_type.length) {

                    boolValidate.job_vacancy_type = true;

                }

                return {

                    validate: boolValidate,
                    error_msg: {
                        job_category: job_category_error_msg,
                        //job_salary: job_salary_error_msg,
                        job_qualification: job_qualification_error_msg,
                        job_vacancy_type: job_vacancy_type_error_msg
                    },
                    obj: {
                        job_category: $category_field_rq,
                        //job_salary: $salary_field_rq,
                        job_qualification: $qualificaton_field_rq,
                        job_vacancy_type: $vacancy_type_field_rq
                    }

                };

            },
            validateJobRegionProfile = function() {

                let boolValidate = false;

                const $fieldbox = $('#form-section-job-location .fieldset-region'),
                    $fieldbox_rq = $fieldbox.find('.field.required-field'),
                    error_msg = $fieldbox_rq.data('required-error'),

                    region = $('#region').val();

                if (region && region.length) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $fieldbox_rq,
                    error_msg
                };

            },
            validateJobAccountTypeProfile = function() {

                let boolValidate = false;

                const $fieldbox = $('#form-section-account-type .fieldset-account_type'),
                    $fieldbox_rq = $fieldbox.find('.field.required-field'),
                    error_msg = $fieldbox_rq.data('required-error'),

                    account_types = $('#job_account_type').val();

                if (account_types && account_types.length) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $fieldbox_rq,
                    error_msg
                };

            },
            validateJobCategoryOfServiceProfile = function() {

                let boolValidate = false;

                const $fieldbox = $('#form-section-category-of-service .fieldset-job_category_of_service'),
                    $fieldbox_rq = $fieldbox.find('.field.required-field'),
                    error_msg = $fieldbox_rq.data('required-error'),

                    category_of_service = $('#job_category_of_service').val();

                if (category_of_service && category_of_service.length) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $fieldbox_rq,
                    error_msg
                };

            },
            validateJobLangProfile = function() {

                let boolValidate = false;

                const $fieldbox = $('#form-section-job-languages .fieldset-job_languages'),
                    $fieldbox_rq = $fieldbox.find('.field.required-field'),
                    error_msg = $fieldbox_rq.data('required-error'),

                    languages = $('#job_languages').val();

                if (languages && languages.length) {

                    boolValidate = true;

                }

                return {
                    validate: boolValidate,
                    obj: $fieldbox_rq,
                    error_msg
                };

            },
            showErrorMsgInElem = function($elem, msg) {

                //console.log(msg);

                let $elem_error = $elem.find("> .error-validation-msg");

                if ($elem_error.length === 0) {

                    $elem.prepend(`<div class='error-validation-msg'></div>`);
                    $elem_error = $elem.find('> .error-validation-msg');

                }

                $elem_error.text(msg);

            },
            removeErrorMsgInElem = function($elem) {

                let $elem_error = $elem.find("> .error-validation-msg");

                if ($elem_error.length) {
                    $elem_error.remove();
                }

            },
            mapResultsObj = function(obj, callback) {

                const keys = Object.keys(obj.validate),
                    length = keys.length;

                for (let i = 0; i < length; i++) {

                    const key = keys[i];

                    callback(key);

                }


            },
            scrollToElemError = function(o) {

                $('html, body').animate({

                    scrollTop: o.offset().top - 200

                }, 200);

            },
            scrollToBoxFirstError = function() {

                const $error_box = $('.error-validation-msg:eq(0)');

                if ($error_box && $error_box.length) {

                    scrollToElemError($error_box);

                }

            },
            showSaveProfileSuccess = function() {

                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: 'You perform to save profile successfully.',
                    timeout: 3000
                }).show();

            };

        setTimeout(function() {

            const boolAvatarProfile = validateAvatarProfile(),
                boolCoverProfile = validateCoverProfile(),
                boolJobDescriptionProfile = validateJobDescriptionProfile(),
                boolJobsDetailsProfile = validateJobsDetailsProfile(),
                boolJobRegionProfile = validateJobRegionProfile(),
                boolJobAccountType = validateJobAccountTypeProfile(),
                boolCategoryOfService = validateJobCategoryOfServiceProfile(),
                boolJobLang = validateJobLangProfile();

            let boolValidate = true;

            if (!boolAvatarProfile.validate) {

                showErrorMsgInElem(boolAvatarProfile.obj, boolAvatarProfile.error_msg);

                boolValidate = false;

            } else {

                removeErrorMsgInElem(boolAvatarProfile.obj);

                boolValidate = true;
            }

            if (!boolCoverProfile.validate) {

                showErrorMsgInElem(boolCoverProfile.obj, boolCoverProfile.error_msg);

                boolValidate = false;

            } else {

                removeErrorMsgInElem(boolCoverProfile.obj);

                boolValidate = true;
            }

            if (!boolJobDescriptionProfile.validate) {

                showErrorMsgInElem(boolJobDescriptionProfile.obj, boolJobDescriptionProfile.error_msg);

                if (boolValidate) {

                    boolValidate = false;

                }

            } else {

                removeErrorMsgInElem(boolJobDescriptionProfile.obj);

            }

            if (!boolJobRegionProfile.validate) {

                showErrorMsgInElem(boolJobRegionProfile.obj, boolJobRegionProfile.error_msg);

                if (boolValidate) {

                    boolValidate = false;

                }

            } else {
                removeErrorMsgInElem(boolJobRegionProfile.obj);
            }

            if (!boolJobAccountType.validate) {

                showErrorMsgInElem(boolJobAccountType.obj, boolJobAccountType.error_msg);

                if (boolValidate) {

                    boolValidate = false;

                }


            } else {

                removeErrorMsgInElem(boolJobAccountType.obj);

            }


            if (!boolJobLang.validate) {

                showErrorMsgInElem(boolJobLang.obj, boolJobLang.error_msg);

                if (boolValidate) {

                    boolValidate = false;

                }


            } else {

                removeErrorMsgInElem(boolJobLang.obj);

            }

            if (!boolCategoryOfService.validate) {

                showErrorMsgInElem(boolCategoryOfService.obj, boolCategoryOfService.error_msg);

                if (boolValidate) {

                    boolValidate = false;

                }


            } else {

                removeErrorMsgInElem(boolCategoryOfService.obj);

            }

            mapResultsObj(boolJobsDetailsProfile, function(key) {

                const $obj = boolJobsDetailsProfile.obj[key],
                    error_msg = boolJobsDetailsProfile.error_msg[key];

                if (!boolJobsDetailsProfile.validate[key]) {

                    showErrorMsgInElem($obj, error_msg);

                    if (boolValidate) {

                        boolValidate = false;

                    }

                } else {

                    removeErrorMsgInElem($obj);

                }

            });

            if (!boolValidate) {

                hideJobFormSubmitAjaxLoading();

                scrollToBoxFirstError();

                return;

            }

            const fd = new FormData(),
                paramsSerialize = $form.serialize();

            fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_SAVE_PROFILE_ACTION);
            fd.append('params', paramsSerialize);

            $.ajax({
                type: "POST",
                async: true,
                url: ajaxurl,
                contentType: false,
                processData: false,
                data: fd
            }).done(function(data) {

                hideJobFormSubmitAjaxLoading();

                if (data === 'success') {
                    showSaveProfileSuccess();
                }

            });

        }, 1000);


    });

    if (_LOGOUT_ACTION_URL) {

        $('.menu-logout > a').attr('href', decodeURIComponent(_LOGOUT_ACTION_URL).replace(/&amp;/ig, '&'));

    }

    function setActiveAccountDetailsMenu() {

        const url = window.location.href,
            urlMatch = window.location.origin + '/my-account/edit-account';

        if (url.startsWith(urlMatch)) {

            const $li = $('.mlduo-account-menu').find('li');

            $li.removeClass('current-menu-item');

            $li.filter('.menu-item-account-details')
                .addClass('current-menu-item');


        }

    }

    function setSkillsRequiredSelect2() {

        const $slSkillsRequired = $('#slSkillsRequired');

        $slSkillsRequired.select2({

            placeholder: $slSkillsRequired.data('placeholder'),
            allowClear: true

        });

        setTimeout(function() {

            $('.dropdown-js-wrapper.__skills-required').find('.select2.select2-container').css('width', '100%');

        }, 200);

    }

    $('#btnProposalSubmit').click(function(e) {

        e.preventDefault();

        const $form = $('#frmProposal');

        const validateSkillsRequired = function() {

                const v = $('#slSkillsRequired').val();

                let boolValidate = false;

                if (v && v.length) {

                    boolValidate = true;

                }

                if (!boolValidate) {

                    pushMessageValidate('error', 'Please choose at least one skill');

                }

                return boolValidate;

            },
            validateKindOfOffer = function() {

                const v = $('#slKindOfOffer').val();

                let boolValidate = false;

                if (v && v.length) {

                    boolValidate = true;

                }

                if (!boolValidate) {

                    pushMessageValidate('error', 'Please choose kind of offer');

                }

                return boolValidate;

            },
            validateBookings = function() {

                const v = $('#date_booking1').val();

                let boolValidate = false;

                if (v) {

                    boolValidate = true;

                }

                if (!boolValidate) {

                    pushMessageValidate('error', 'Please choose at least one date booking');

                }

                return boolValidate;

            },
            validateMissionSj = function() {

                const v = $('#txtMissionSubject').val();

                let boolValidate = false;

                if (v) {

                    boolValidate = true;

                }

                if (!boolValidate) {

                    pushMessageValidate('error', 'Please enter mission subject');

                }

                return boolValidate;



            },
            validatePrjDes = function() {

                const v = $('#txtProjectDescription').val();

                let boolValidate = false;

                if (v) {

                    boolValidate = true;

                }

                if (!boolValidate) {

                    pushMessageValidate('error', 'Please enter project description');

                }

                return boolValidate;

            },
            showListingAjaxLoader = function() {

                $('.add-listing-loader').removeClass('loader-hidden')
                    .show('slow');

            },
            hideListingAjaxLoader = function() {

                $('.add-listing-loader').addClass('loader-hidden')
                    .hide('slow');

            },
            resetForm = function() {

                $form[0].reset();

                $('#slSkillsRequired').val([]).trigger('change');

                $('.uploaded-file.job-manager-uploaded-file').remove();

            },
            serializeForm = function() {

                let txtMissionSjSerialized = $('#txtMissionSubject').serialize(),
                    rdBeginningMissionName = "rdBeginningMission",
                    rdBeginningMissionSerialized = $(`input[type=radio][name="${rdBeginningMissionName}"]`).serialize(),
                    rdLengthMissionName = "rdLengthMission",
                    rdLengthMissionSerialized = $(`input[type=radio][name="${rdLengthMissionName}"]`).serialize(),
                    chkMissionLocationName = "chkMissionLocation",
                    chkMissionLocationSerialized = $(`input[type=checkbox][name="${chkMissionLocationName}"]`).serialize(),
                    txtProjectDescriptionSerialized = $('#txtProjectDescription').serialize(),
                    date_booking1Name = "date_booking1",
                    date_booking1Serialized = $(`textarea[name="${date_booking1Name}"]`).serialize(),
                    slSkillsRequiredSerialized = $('#slSkillsRequired').serialize(),
                    slKindOfOfferSerialized = $('#slKindOfOffer').serialize(),
                    proposal_attachments_name = "current_proposal_attachments",
                    proposal_attachmentsSerialized = $(`input[type="hidden"][name="${proposal_attachments_name}[]"]`).serialize(),
                    user_receive = $('input[type="hidden"][name="txtUserReceive"]').serialize();

                return `${txtMissionSjSerialized}&${rdBeginningMissionSerialized}&${rdLengthMissionSerialized}&${chkMissionLocationSerialized}&${txtProjectDescriptionSerialized}&${date_booking1Serialized}&${slSkillsRequiredSerialized}&${slKindOfOfferSerialized}&${proposal_attachmentsSerialized}&${user_receive}`;

            };

        showListingAjaxLoader();

        let boolValidate = false;

        boolValidate = validateMissionSj() || validatePrjDes() || validateSkillsRequired() || validateKindOfOffer() || validateBookings();

        if (!boolValidate) {

            hideListingAjaxLoader();
            return;

        }

        const fd = new FormData();

        fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_PUBLISH_PROPOSAL_ACTION);
        fd.append('params', serializeForm());

        $.ajax({
            type: "POST",
            async: true,
            processData: false,
            contentType: false,
            url: ajaxurl,
            data: fd
        }).done(function(data) {

            if (data === 'success') {

                pushMessageValidate('success', 'You have published a proposal successfully');

                resetForm();

            } else {

                pushMessageValidate('error', 'There is an error in the proposal creation process');


            }

            hideListingAjaxLoader();

        });

    });

    const user_geolocation = {

        coord: {
            lat: 0,
            lng: 0
        }

    };

    function ucFirstEachWord(str) {

        var strs = str.split(' ');

        strs = strs.map(s => {

            const chars = s.split('');

            chars[0] = chars[0].toUpperCase();

            return chars.join('');

        });

        return strs.join(' ');
    }

    function getUserPosition(position) {

        user_geolocation.coord.lat = position.coords.latitude;
        user_geolocation.coord.lng = position.coords.longitude;

    }

    function failGetUserPosition() {

        user_geolocation.coord.lat = 43.5785489;
        user_geolocation.coord.lng = 7.1175527;

    }

    function setUserLocationCoords() {

        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(getUserPosition, failGetUserPosition);

        }

    }

    function setSettingsMainFilterBar() {

        const setFieldCoordsLocation = function(lat, lng) {
            const $parent = $(el).parent();

            let $txtHidFieldLat = $('#txtHidFieldLat'),
                $txtHidFieldLng = $('#txtHidFieldLng');

            if ($txtHidFieldLat && $txtHidFieldLat.length && $txtHidFieldLng && $txtHidFieldLng.length) {} else {

                $parent.append(`<input id="txtHidFieldLat" type="hidden" name="lat" value="" />
                                    <input id="txtHidFieldLng" type="hidden" name="lng" value="" />
                                    <input id="txtHidFieldProximity" type="hidden" name="proximity" value="20" />
                                    <input id="txtHidFieldSort" type="hidden" name="sort" value="latest" />`);

                $txtHidFieldLat = $('#txtHidFieldLat');
                $txtHidFieldLng = $('#txtHidFieldLng');

            }

            $txtHidFieldLat.val(lat);
            $txtHidFieldLng.val(lng);
        };

        const el = document.querySelector('.artist-main-searchbox input[name="search_location"]');

        if (el) {

            new MyListing.Maps.Autocomplete(el);

        }

        $('.artist-main-searchbox .geocode-location').click(function(e) {

            setUserLocationCoords();

            setTimeout(function() {

                const lat = user_geolocation.coord.lat,
                    lng = user_geolocation.coord.lng,
                    params = {
                        access_token: MyListing.MapConfig.AccessToken,
                        limit: 1,
                        language: MyListing.MapConfig.Language
                    };

                let url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/{json}',
                    json = encodeURIComponent(`${lng},${lat}.json`);

                url = url.replace('{json}', json);

                $.get({
                    url: url,
                    data: params,
                    dataType: "json",
                    success: function(data) {

                        const placeObj = data.features[0],
                            place_name = placeObj.place_name_en,
                            coords = placeObj.center,
                            lng = coords[1],
                            lat = coords[0];

                        el.value = place_name;

                        setFieldCoordsLocation(lat, lng);

                    },
                    complete: function() {

                    }
                })

            }, 100);

        });

        $(document).on('click', '.cts-autocomplete-dropdown .suggestions-list .suggestion', function(e) {

            const data = $(this).data(),
                $searchbox = $('.artist-main-searchbox');

            if ($searchbox && $searchbox.length && data && data.place) {

                place = data.place;

                setFieldCoordsLocation(place.latitude, place.longitude);

            }

        });

    }

    function is_in_proposal_inbox() {

        const $elem = $('.tab-lists-content > div.active');

        return $elem.attr('id').toString().trim() === 'inbox';

    }

    function setProposalListings() {

        $('.proposal-ilistings.__menu > li > a').click(function(e) {

            e.preventDefault();

            const $main = $('.tab-lists-content > div.active .proposal-ilistings.__main-contents'),
                $profile = $('.tab-lists-content > div.active .proposal-ilistings.__main-profile'),
                $empty = $main.find('.proposal-empty-info'),
                $obj = $(this),
                is_inbox = is_in_proposal_inbox(),
                get_box_type = function() {

                    return is_inbox ? 'inbox' : 'outbox';

                },
                showProposalLoader = function() {

                    $main.html(proposal_loader);
                    $profile.html(proposal_loader);

                    $('.proposal-loader').removeClass('loader-hidden')
                        .show();


                },
                hideProposalLoader = function() {

                    $main.find('.proposal-loader').remove();

                },
                getDatePickInst = function(box_type = 'inbox') {

                    return box_type === 'inbox' ? $('#dp_inbox') : $('#dp_outbox');

                },
                removeDatePickInst = function(box_type = 'inbox') {

                    const $dp = getDatePickInst(box_type);

                    if ($dp && $dp.length) {

                        $dp.datepick('destroy');

                    }
                },
                createDatePickInst = function(box_type = 'inbox') {

                    const $dp = getDatePickInst(box_type),
                        $parent = $dp.closest('.__proposal-form');

                    $dp.datepick({
                        prevText: '«',
                        nextText: '»',
                        multiSelect: 999,
                        yearRange: '+0:+0',
                        minDate: +1,
                    });

                    if ($(window).width() > 992) {
                        $dp.css('width', $parent.outerWidth() / 2 + 'px');
                    } else {
                        $dp.css('width', $parent.outerWidth() + 'px');
                    }
                };

            showProposalLoader();

            $obj.parent().addClass('active')
                .siblings()
                .removeClass('active');

            setTimeout(function() {

                const proposal_data = $obj.data('proposal-item'),
                    {
                        host_uids,
                        proposal_id,
                        user_receive,
                        mission_subject,
                        beginning_mission,
                        length_mission,
                        mission_location,
                        project_description,
                        booking,
                        uploaded_files,
                        profile_name,
                        profile_status,
                        profile_url,
                        profile_tel,
                        profile_tel_url,
                        profile_email,
                        profile_email_url,
                        profile_website_url,
                        profile_socials,
                        profile_location_url,
                        proposal_status,
                        proposal_kind_of_offer
                    } = proposal_data,
                    opening_body = $main.data('opening-body'),
                    profile_templates = $profile.data('templates'),
                    booking_dates = booking.split(',');

                let //html_skills_required = '',
                    html_uploaded_files = '',
                    html_profile_socials = '',
                    html_kind_of_offer = '',
                    html_booking = '<div class="__booking-calendar-lists">',
                    selectBookingDate = function(date, box_type = 'inbox') {

                        const d = new Date(date),
                            id = `#dp_${box_type}`;

                        $.datepick._selectDay(this, id, d.getTime());

                    },
                    box_type = get_box_type();

                window.host_uids = [...host_uids];

                /*skills_required.forEach(term => {

                    html_skills_required += `<a>${term.name}</a>`;

                });*/

                html_kind_of_offer = `<a>${proposal_kind_of_offer.name}</a>`;

                uploaded_files && (uploaded_files.forEach(url => {

                    const name = url.split('/').pop();

                    html_uploaded_files += `<a href="#">${name}</a>`;

                }));

                booking_dates.forEach(date => {

                    html_booking += `<a>${date}</a>`;

                });

                html_booking += '</div>';

                let html_opening_body = opening_body.replace(/\{user_receive\}/ig, user_receive.toUpperCase())
                    .replace(/\{mission_subject\}/ig, mission_subject)
                    .replace(/\{beginning_mission\}/ig, beginning_mission)
                    .replace(/\{length_mission\}/ig, length_mission)
                    .replace(/\{mission_location\}/ig, mission_location)
                    .replace(/\{project_description\}/ig, project_description)
                    .replace(/\{booking\}/ig, html_booking)
                    //.replace(/\{skills_required\}/ig, html_skills_required)
                    .replace(/\{uploaded_files\}/ig, html_uploaded_files)
                    .replace(/\{kind_of_offer\}/ig, html_kind_of_offer);

                if (is_inbox && proposal_status === _PROPOSAL_STATUS.status.pending) {

                    html_opening_body += `
                        <div class="__proposal-censor mtop40">
                            <div class="censor-head">
                                <strong>
                                    <span class="far fa-comments"></span>
                                    <span class="padLeft5">What do you feel about this proposal?</span>
                                </strong>
                            </div>
                            <div class="__skills-required-list-items __user-rating-censor mtop20">
                                <a class="__approve" data-pid="${proposal_id}" data-status="${_PROPOSAL_STATUS.status.approved}" href="#">
                                    <span class="fa fa-check"></span>
                                    <span class="padLeft5">Approve</span>
                                </a>
                                <a class="__reject" data-pid="${proposal_id}" data-status="${_PROPOSAL_STATUS.status.rejected}" href="#">
                                    <span class="fa fa-window-close"></span>
                                    <span class="padLeft5">Reject</span>
                                </a>
                            </div>
                        </div>
                    `;

                }

                if (is_inbox) {
                    html_opening_body = html_opening_body.replace(/\{dp\}/ig, `<div id="dp_${box_type}" class="datepick __disable-chosen"></div>`);
                } else {
                    html_opening_body = html_opening_body.replace(/\{dp\}/ig, `<div id="dp_${box_type}" class="datepick __disable-chosen"></div>`);
                }
                removeDatePickInst(box_type);

                $main.html(html_opening_body);

                profile_socials && (profile_socials.forEach(social => {

                    let { network, url } = social;

                    network = network.toLowerCase();

                    if (network === 'facebook') {

                        html_profile_socials += `<a class="fb" target="_blank" href="${url}"><span class="fa fa-facebook"></span> `;

                    } else if (network === 'twitter') {

                        html_profile_socials += `<a class="tw" target="_blank" href="${url}"><span class="fa fa-twitter"></span> `;

                    } else if (network === 'youtube') {

                        html_profile_socials += `<a class="yt" target="_blank" href="${url}"><span class="fa fa-youtube"></span> `;

                    } else if (network === 'instagram') {

                        html_profile_socials += `<a class="inst" target="_blank" href="${url}"><span class="fa fa-instagram"></span> `;

                    }

                    html_profile_socials += '</a>';


                }));

                let html_profile_templates = profile_templates.replace(/\{profile_url\}/ig, profile_url)
                    .replace(/\{profile_name\}/ig, profile_name)
                    .replace(/\{profile_status\}/ig, profile_status)
                    .replace(/\{profile_tel\}/ig, profile_tel)
                    .replace(/\{profile_tel_url\}/ig, profile_tel_url)
                    .replace(/\{profile_email\}/ig, profile_email)
                    .replace(/\{profile_email_url\}/ig, profile_email_url)
                    .replace(/\{profile_website_url\}/ig, profile_website_url)
                    .replace(/\{profile_socials\}/ig, html_profile_socials)
                    .replace(/\{profile_location_url\}/ig, profile_location_url);

                $profile.html(html_profile_templates);

                if (!is_inbox) {

                    $('.tab-lists-content > div.active .profile-info-entry.__username .entry-head span:last-child').text('Receiver');

                }

                if (profile_website_url) {

                } else {

                    $('.profile-info-entry.__contact-website').remove();

                }

                if (html_profile_socials) {

                } else {

                    $('.profile-info-entry.__contact-socials').remove();

                }

                /*old_booking_dates && old_booking_dates.length && (old_booking_dates.forEach(date => {

                    selectBookingDate(date);

                }));*/

                createDatePickInst(box_type);

                booking_dates && booking_dates.length && (booking_dates.forEach(date => {

                    selectBookingDate(date, box_type);

                }));

                if (html_uploaded_files.length === 0) {

                    $main.find('.__form-field-item.__uploaded_files').remove();

                }

                hideProposalLoader();

            }, 500);

        });

        $(document).on('click', '.__proposal-censor .__user-rating-censor > a', function(e) {

            e.preventDefault();

            const $censor_box = $('.__proposal-censor'),
                disableCensorBox = function() {

                    $censor_box.addClass('disabled');

                },
                showLoader = function() {

                    $censor_box.parent().append(proposal_set_status_loader);

                },
                removeLoader = function() {

                    $('.set-proposal-loader').remove();

                },
                removeCensorBox = function() {

                    $censor_box.remove();

                },
                addProposalStatus = function(render) {
                    $('.proposal-ilistings.__menu > li.active > a > .ilisting-subjects').append(render);
                }

            disableCensorBox();
            showLoader();

            const pid = $(this).data('pid'),
                status = $(this).data('status'),
                fd = new FormData(),
                params = {
                    pid,
                    status
                };

            fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_SET_STATUS_PROPOSAL_ACTION);
            fd.append('params', JSON.stringify(params));

            $.ajax({

                type: "POST",
                async: true,
                url: ajaxurl,
                processData: false,
                contentType: false,
                data: fd

            }).done(function(data) {

                if (data.status == 'success') {

                    removeCensorBox();
                    removeLoader();

                    addProposalStatus(data.render);

                }

            });


        });

        $(document).on('click', '.tab-lists a', function(e) {

            e.preventDefault();

            const $tab = $(this),
                target = $tab.data('target');

            $tab.closest('.tab-lists')
                .find('a')
                .removeClass('active');

            $tab.addClass('active');

            $(target).addClass('active')
                .siblings()
                .removeClass('active');

        });

    }

    function publishAjaxComments() {

        function onSubmitUpdateComment(e) {

            e.preventDefault();

            const $form = $(this);

            const updateComment = function(data) {

                const $comment = $(data['render']);

                $('#comment-' + data['comment_id']).html($comment.html());


            };

            addSubmittingLoader($form);

            let boolCheck = validateMessageRequired();

            if (!boolCheck) {
                removeSubmittingLoader($form);
                return;
            }

            const fd = new FormData();

            fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_UPDATE_COMMENT_ACTION);
            fd.append('params', $(this).serialize());

            $.ajax({
                type: "POST",
                url: ajaxurl,
                contentType: false,
                processData: false,
                data: fd
            }).done(function(data) {

                if (data !== 'error') {

                    updateComment(data);

                }

                removeSubmittingLoader($form);

            });

        }

        function validateMessageRequired() {

            const v = $('textarea[name="comment"]').val();

            let boolCheck = v.length >= 200;

            if (!boolCheck) {

                pushMessageValidate("error", "You must be input/enter some review contents and minimum length of characters is 200");

            }

            return boolCheck;

        }

        function addSubmittingLoader($form) {

            $('.sidebar-comment-form').append(`<div class="submitting-comment-loader"><span class="fa fa-circle-o-notch fa-spin"></span>
                                    <span class="caption padLeft5">Submitting comment, please wait ....</span></div>`);

            $form.addClass('disabled');

        }

        function removeSubmittingLoader($form) {

            $('.submitting-comment-loader').remove();
            $form.removeClass('disabled');

        }

        $('#commentform').submit(function(e) {

            e.preventDefault();

            const $form = $(this),
                params = $form.serialize(),
                comment_text = $('textarea[name="comment"]').val().trim(),
                comment_post_id = $('#comment_post_ID').val();

            const validateStarRequired = function() {

                    const v = parseInt($('input[type="radio"][name="rating"]:checked').val());

                    let boolCheck = v > 0;

                    if (!boolCheck) {

                        pushMessageValidate("error", "You must be chosen a rating");

                    }

                    return boolCheck;

                },
                appendCommentToLists = function(comment_html) {

                    const $comments_wrapper = $('.comments-list-wrapper'),
                        $comment_list = $comments_wrapper.find('.comments-list');

                    if ($comment_list.length) {

                        $comment_list.append(comment_html);

                    } else {

                        $comments_wrapper.find('.no-results-wrapper').remove();

                        $comments_wrapper.append(`<ul class="comments-list">${comment_html}</ul>`);

                    }


                },
                removeCommentForm = function() {

                    $('#commentform').remove();

                },
                addUpdateCommentForm = function(comment_text, comment_post_id) {

                    let html = update_comments_form_template;

                    html = html.replace(/\{form_action\}/ig, ajaxurl)
                        .replace(/\{your_message\}/ig, comment_text)
                        .replace(/\{listing_id\}/ig, comment_post_id);

                    $('#respond').append(html)
                        .find('form')
                        .submit(onSubmitUpdateComment);

                };


            const boolCheck = validateStarRequired() || validateMessageRequired();

            if (!boolCheck) {
                removeSubmittingLoader($form);
                return;
            }

            addSubmittingLoader($form);

            const fd = new FormData();

            fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_SUBMITTING_COMMENT_ACTION);
            fd.append('params', params + '&action=ajaxcomments');

            $.ajax({
                type: "POST",
                url: ajaxurl,
                async: true,
                contentType: false,
                processData: false,
                data: fd
            }).done(function(data) {

                if (data !== 'error') {

                    appendCommentToLists(data);
                    removeCommentForm();
                    addUpdateCommentForm(comment_text, comment_post_id);


                } else {

                    pushMessageValidate('error', 'Unknown Error');

                }

                removeSubmittingLoader($form);

            });

        });

        const $sbCommentForm = $('.sidebar-comment-form');

        if ($sbCommentForm.find('input[type="hidden"][name="action"][value="update_review"]').length) {

            $sbCommentForm.find('form')
                .submit(onSubmitUpdateComment);

        }

    }

    function saveFormAccountDetails() {

        const PASSWORD_STRENGTH = {

            STRONG: 1,
            MEDIUM: 2,
            WEAK: 3

        };

        const checkStrengthPassword = function(password) {
                var strength = 0,
                    strength_value = 0;
                if (password.match(/[a-z]+/)) {
                    strength += 1;
                }
                if (password.match(/[A-Z]+/)) {
                    strength += 1;
                }
                if (password.match(/[0-9]+/)) {
                    strength += 1;
                }
                if (password.match(/[$@#&!]+/)) {
                    strength += 1;

                }

                switch (strength) {
                    case 0:
                        strength_value = 0;
                        break;

                    case 1:
                        strength_value = 25;
                        break;

                    case 2:
                        strength_value = 50;
                        break;

                    case 3:
                        strength_value = 75;
                        break;

                    case 4:
                        strength_value = 100;
                        break;
                }

                if (strength_value < 50) {
                    return PASSWORD_STRENGTH.WEAK;
                } else if (strength_value >= 50 && strength_value <= 60) {
                    return PASSWORD_STRENGTH.MEDIUM;
                }

                return PASSWORD_STRENGTH.STRONG;

            },
            showStrengthStatusPass = function($input, strengthValue) {

                const $parent = $input.parent(),
                    v = $input.val(),
                    $pass_status = $parent.find('.validate-pass-error-msg');

                if ($pass_status.length) {

                    $pass_status.remove();

                }

                if (v.length === 0) return;

                if (strengthValue === PASSWORD_STRENGTH.WEAK) {

                    $parent.append('<div class="validate-pass-error-msg __weak">Strength password: Weak</div>');

                } else if (strengthValue === PASSWORD_STRENGTH.MEDIUM) {

                    $parent.append('<div class="validate-pass-error-msg __medium">Strength password: Medium</div>');

                } else {

                    $parent.append('<div class="validate-pass-error-msg __strong">Strength password: Strong</div>');

                }

            },
            isStrengthPassValidate = function(v) {

                return v === PASSWORD_STRENGTH.MEDIUM ||
                    v === PASSWORD_STRENGTH.STRONG;

            },
            disableForm = function() {

                $form.addClass('disabled');

            },
            addLoader = function() {

                $form.parent().append(`<div class="submitting-comment-loader submitting-account-form"><span class="fa fa-circle-o-notch fa-spin"></span>
                                    <span class="caption padLeft5">Submitting form, please wait ....</span></div>`);

            },
            removeLoader = function() {

                $('.submitting-account-form').remove();

            },
            enableForm = function() {

                $form.removeClass('disabled');

            },
            $form = $('form.woocommerce-EditAccountForm.edit-account');

        $form.submit(function(e) {

            e.preventDefault();

            const action = $(this).attr('action');

            const validatePassword = function() {

                const current_pass = $('#password_current').val(),
                    new_pass = $('#password_1').val(),
                    retype_pass = $('#password_2').val(),
                    strength_newpass = checkStrengthPassword(new_pass),
                    strength_retypepass = checkStrengthPassword(retype_pass);

                return current_pass.length > 0 &&
                    new_pass.length > 0 && isStrengthPassValidate(strength_newpass) &&
                    retype_pass.length > 0 && isStrengthPassValidate(strength_retypepass) &&
                    new_pass === retype_pass;

            };

            if (!validatePassword()) {
                pushMessageValidate('error', 'Please type all fields in form, password strength at least medium, new password and confirm password must be duplicated.');
                return;
            }

            disableForm();
            addLoader();

            const fd = new FormData();

            fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_SAVE_PASSWORD_ACTION);
            fd.append('params', $form.serialize());

            $.ajax({

                type: "POST",
                url: ajaxurl,
                async: true,
                data: fd,
                processData: false,
                contentType: false

            }).done(function(data) {

                if (data === 'success') {

                    pushMessageValidate('success', 'Change password successfully.');

                    $form[0].reset();

                    $('.validate-pass-error-msg').remove();

                    if (action) {
                        window.location.href = action;
                    }

                } else {

                    pushMessageValidate('error', 'Unkown error.');

                }

                enableForm();
                removeLoader();

            });

        });

        $form.find('input[type="password"]')
            .keyup(function(e) {

                const $input = $(this);

                if ($input.attr('id') === 'password_current') return;

                const v = $input.val(),
                    strengthValue = checkStrengthPassword(v);

                showStrengthStatusPass($input, strengthValue);

            });

    }

    function toggleShowMoresSection() {

        $(document).on('click', '.btnToggleSection', function(e) {

            e.preventDefault();

            const $this = $(this);
            const $items = $('.__toggle-show-mores');

            if ($this.hasClass('__minimize')) {

                $this.removeClass('__minimize')
                    .addClass('__expand');

                $items.show('fast');

                $this.text('Collapse');

            } else {

                $this.removeClass('__expand')
                    .addClass('__minimize');

                $items.hide('fast');

                $this.text('Show mores');

            }

        });

        $('.btnToggleSection').trigger('click');

    }

    setActiveAccountDetailsMenu();
    setSkillsRequiredSelect2();

    setSettingsMainFilterBar();

    setProposalListings();

    publishAjaxComments();

    saveFormAccountDetails();

    toggleShowMoresSection();

    function changeAccountAvatarTimer() {

        var _avatar_src = '';

        const href = window.location.href;

        if (href.indexOf('my-account/edit-account/?a=account') !== -1) {

            const $field = $('input[type="hidden"][name="current_avatar-profile"]');

            if ($field.length) {

                _avatar_src = $field.val();

            }

            const t = setInterval(function() {

                    const $avatar_field = $('input[type="hidden"][name="current_avatar-profile"]');

                    if ($avatar_field.length) {

                        let avatar_src = $avatar_field.val();

                        if (avatar_src !== _avatar_src) {

                            _avatar_src = avatar_src;

                            const fd = new FormData();

                            fd.append('action', _CHILD_HOOK_ACTIONS.actions._AJAX_CHANGE_ACCOUNT_AVATAR_ACTION);
                            fd.append('avatar', avatar_src);

                            $.ajax({

                                type: "POST",
                                async: true,
                                data: fd,
                                url: ajaxurl,
                                processData: false,
                                contentType: false

                            }).done(function(data) {

                                if (data === 'success') {

                                    window.location.reload();

                                }

                            });

                        }

                    }

                },
                200);

        }

    }

    changeAccountAvatarTimer();

    $(document).on('click', '.btnVideoCall', function(e) {

        e.preventDefault();

        if (window.host_uids) {

            $('#modalVideoCallOneByOne').modal({
                show: true,
                backdrop: 'static'
            });

        }

    });

    $('#modalVideoCallOneByOne').on('hidden.bs.modal', function(e) {

        $('#agoraVideoCallOneByOne').html('');

        $('body').css('overflow', '');

    }).on('shown.bs.modal', function(e) {

        const uids = window.host_uids,
            url = $('#agoraVideoCallOneByOne').data('url') + '?uids=' + uids[0] + ',' + uids[1];

        $('#agoraVideoCallOneByOne').html(`<iframe id = "ifrAgoraVideoCallOneByOne"                                                                                           
                                                    src = "${url}"></iframe>`);

        $(this).css('overflow', 'hidden');

        $('body').css('overflow', 'hidden');

    });

    function toggleMainNavMenu() {

        const $top_menu = $('.top-menu.header-center'),
            top_menu_node = $top_menu[0],
            $btnNavMenuClose = $('.btnNavMenuClose');

        $('.btnNavMenu').click(function(e) {

            e.preventDefault();

            $top_menu.addClass('__open-nav-menu');

        });

        $btnNavMenuClose.click(function(e) {

            e.preventDefault();

            $top_menu.removeClass('__open-nav-menu');

        });

        $(document).on('mouseup', function(e) {

            const target = e.target;

            if (target.contains(top_menu_node)) {

                $btnNavMenuClose.trigger('click');

            }

        });

    }

    toggleMainNavMenu();

    //#endregion

    async function setupCalendarSchedules() {

        const DEFAULT_APPOINTMENT_TIME = {

            START: '09:00',
            END: '11:00',
            MIN: '09:00',
            MAX: '18:00'

        };

        //#region Declares init variables

        var dpDateChosen = [],
            usersList = [],
            schAppointmentsList = {}, // biến này lưu trữ các appointments đã tạo trong hộp thoại setup schedules
            /* cấu trúc: */

            /* schAppointmentsList = {

                {legend_day} : {
                    type: CALENDAR_TYPE,                         
                    day : {legend_day} // ngày tạo,
                    name : ... // tên event,
                    description : ... // mô tả giới thiệu,
                    userId : ... // user id tạo,
                    guests : [] // user ids khách mời chỉ với "event",
                    start: ...,
                    end: ...,
                    slot_durations: ... // chỉ với "appointment_slots"
                },

            }*/

            _schEventsList = {},
            schEventsList = {}, // biến này lưu trữ những ngày đã tạo bởi user (bao gồm cả events và schedules)
            /* 
                Cấu trúc:
                schEventsList = {

                    {legend_day} : [{
                        type : 'event',
                        day : {legend_day} // ngày tạo,
                        name : ... // tên event,
                        description : ... // mô tả giới thiệu,
                        userId : ... // user id tạo,
                        guests : [] // user ids khách mời
                    }, ...]

                }
             */

            calendarFieldSetTemp = `
            <fieldset>
                <legend class="legend-toggle {legend_status_classname}">Day: {legend_day}</legend>

                <div class="legend-body">

                    <!--<ul class="appointment-toolbar flex-layout flex-just-start padLeft10">
                        <li>
                            <a class="btnNewAppointment" data-legend-day="{legend_day}" href="#">
                                <span class="far fa-clock"></span>
                                <span class="padLeft5">New period</span>
                            </a>
                        </li>

                        <li>
                            <a class="btnSetApptDayDefault" data-legend-day="{legend_day}" href="#">
                                <span class="fa fa-check-circle"></span>
                                <span class="padLeft5">Set default</span>
                            </a>
                        </li>
                    </ul>-->

                    <div class="appointments" data-legend-day="{legend_day}">

                        {appointment_box}

                    </div>

                </div>

            </fieldset>
            `,
            appointmentBoxTemp = `
            <div class="appointment-heading padLeft10">
                <input type="text" id="txtEventName_{legend_day}" data-legend-day={legend_day} class="txtEventName" placeholder="Event name ..." />
            </div>
            <div class="appointment-box" data-legend-day="{legend_day}"> 
                        
                {appointment_action_toolbar}

                <div class="woocommerce-MyAccount-navigation tab-lists calendar-tabslist __appointment">

                    <ul>

                        <li>

                            <a class="active" 
                                data-calendar-type="${CALENDAR_TYPE.EVENT}" 
                                data-legend-day="{legend_day}"
                                data-target="#dp-normal-events-{legend_day}_{index}" 
                                href="#">

                                <i class="mi event"></i>
                                <span>Event</span>

                            </a>

                        </li>

                        <li>

                            <a class="" 
                                data-calendar-type="${CALENDAR_TYPE.APPOINTMENT_SLOTS}" 
                                data-target="#dp-appointment-slots-{legend_day}_{index}"
                                data-legend-day="{legend_day}" 
                                href="#">

                                <i class="mi date_range"></i>
                                <span>Appointment slots</span>

                            </a>

                        </li>

                    </ul>

                </div>

                <div class="tab-lists-content calendar-tab-lists-content __appointment">

                    <div id="dp-normal-events-{legend_day}_{index}" class="active">

                        <div class="padLeft10">
                            <label for="appt-begin-normal-events-{legend_day}_{index}">Choose a start time:</label>

                            <div class="padLeft10">
                                <input type="time" data-legend-day="{legend_day}" data-sch-field="start" id="appt-begin-normal-events-{legend_day}_{index}" name="appt-begin-normal-events-{legend_day}[]" value="{period_start}" min="${DEFAULT_APPOINTMENT_TIME.MIN}"  max="${DEFAULT_APPOINTMENT_TIME.MAX}"  />
                            </div>
                        </div>
                        <div class="padLeft10 mtop20">
                            <label for="appt-end-normal-events-{legend_day}_{index}">Choose a end time:</label>

                            <div class="padLeft10">
                                <input type="time" data-legend-day="{legend_day}" data-sch-field="end" id="appt-end-normal-events-{legend_day}_{index}" name="appt-begin-normal-events-{legend_day}[]" value="{period_end}" min="${DEFAULT_APPOINTMENT_TIME.MIN}" max="${DEFAULT_APPOINTMENT_TIME.MAX}"  />
                            </div>
                        </div>
                        <div class="padLeft10 mtop20">
                            <label for="appt-guests-normal-events-{legend_day}_{index}">Guests: <span class="required padLeft5">(*)</span></label>
                            <div class="appt-guests padLeft10">                                
                                <select id="appt-guests-normal-events-{legend_day}_{index}"
                                        class="appt-guests-normal-events js-select-simple form-control"
                                        data-legend-day="{legend_day}"
                                        multiple
                                        data-placeholder="Invite guests ...">
                                    <option></option>
                                    {appt_guests_normal_events_options}
                                </select> 
                            </div>                       
                        </div>
                        <div class="padLeft10 mtop20">
                            <label for="appt-description-normal-events-{legend_day}_{index}">Description: <span class="required padLeft5">(*)</span></label>
                            <div class="appt-description padLeft10">
                                <textarea id="appt-description-normal-events-{legend_day}_{index}" 
                                        data-legend-day="{legend_day}"
                                        class="appt-description"
                                        rows="5"
                                        placeholder="Description ..."></textarea> 
                            </div>                       
                        </div>

                    </div>

                    <div id="dp-appointment-slots-{legend_day}_{index}">

                        <div class="padLeft10">
                            <label for="appt-begin-appointment-slots-{legend_day}_{index}">Choose a start time:</label>

                            <div class="padLeft10">
                                <input type="time" data-legend-day="{legend_day}" data-sch-field="start" id="appt-begin-appointment-slots-{legend_day}_{index}" name="appt-begin-appointment-slots-{legend_day}[]" value="{period_start}" min="${DEFAULT_APPOINTMENT_TIME.MIN}"  max="${DEFAULT_APPOINTMENT_TIME.MAX}"  />
                            </div>
                        </div>

                        <div class="padLeft10 mtop20">
                            <label for="appt-end-appointment-slots-{legend_day}_{index}">Choose a end time:</label>

                            <div class="padLeft10">
                                <input type="time" data-legend-day="{legend_day}" data-sch-field="end" id="appt-end-appointment-slots-{legend_day}_{index}" name="appt-begin-appointment-slots-{legend_day}[]" value="{period_end}" min="${DEFAULT_APPOINTMENT_TIME.MIN}" max="${DEFAULT_APPOINTMENT_TIME.MAX}"  />
                            </div>
                        </div>

                        <div class="padLeft10 mtop20">
                            <label for="appt-appointment-slots-duration-{legend_day}_{index}">Slots with durations:</label>

                            <div class="padLeft10">
                                 <input type="number" id="appt-appointment-slots-duration-{legend_day}_{index}" min="10" max="180" value="30" step="1">                           
                            </div>
                        </div>

                    </div>

                </div>

            </div>`,
            appointmentActionToolTemp = `
            <div class="action flex-layout flex-just-end" style="">
                <a class="btnRemoveAppointment" data-legend-day="{legend_day}" href="#">
                    <span class="fa fa-trash"></span>
                </a>
            </div>`,
            dayTimeLineTemp = `                
                <li data-index="{index}">
                    <span class="milestones"></span>
                    <span class="times">
                        <span class="begin">{milestones_begintime}</span>
                        <span class="end">{milestones_endtime}</span>
                    </span>
                    <div class="event-item">                        
                        <div class="title">
                            <span class="fa fa-calendar"></span> 
                            <span class="padLeft5">{event_name}</span>
                        </div>
                        <div class="hours mtop5">
                            <span class="far fa-clock"></span>
                            <span class="padLeft5">{begin_time} - {end_time}</span>
                        </div>
                        {duration_timeline}
                    </div>
                    <div class="toolbar">
                        <a class="btnEditEvent" data-index="{index}">
                            <span class="fa fa-edit"></span>
                        </a>
                        <a class="btnRemoveEvent" data-index="{index}">
                            <span class="fa fa-trash"></span>
                        </a>
                    </div>
                    
                </li>                
            `,
            dayTimeLineDurationTemp = `
                <div class="duration mtop5">
                    <span class="fa fa-history"></span>
                    <span class="padLeft5">{duration} minutes</span>
                </div>
            `,
            eventDetailModalTemp = `
                <div class="eventDetailsBox">
                    <div class="modal-body">
                        <button class="close eventDetailsModalClose">
                            <span class="fa fa-close"></span>
                        </button>
                        <div class="mainDetails">
                            <div class="title">
                                <span class="fa fa-calendar"></span>
                                <span class="padLeft5">Event name: {event_name}</span>
                            </div>
                            <div class="event-type mtop5">
                                <span class="fa fa-calendar-plus"></span>
                                <span class="padLeft5">Event type:</span>
                                <div class="mtop5 padLeft20">
                                    <div class="event-guests-list flex-layout flex-just-start">                                    
                                        <a class="btnViewLocation btnEventType {event_type}">Event</a>
                                        <a class="btnViewLocation btnEventType {appointment_slots_type}">Appointment Slots</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hours mtop5">
                                <span class="far fa-clock"></span>
                                <span class="padLeft5">Time: {start} - {end}</span>
                            </div>

                            {guests_template}

                            {description_template}

                            {duration_template}

                            <div class="user-created mtop5">
                                <span class="fa fa-user"></span>
                                <span class="padLeft5">Created by: {author}</span>
                            </div>
                        </div>
                    </div>
                </div>       

            `,
            timeLineGuestsTemp = `
                <div class="guests mtop5">
                    <span class="fa fa-user-friends"></span>
                    <span class="padLeft5">Guests:</span>
                    <div class="mtop5 padLeft20">
                        <div class="event-guests-list flex-layout flex-just-start">
                           {guests_list}
                        </div>
                    </div>
                </div>
            `,
            timeLineDescriptionTemp = `
            <div class="description mtop5">
                <span class="fa fa-bars"></span>
                <span class="padLeft5">Description:</span>
                <div class="padLeft20 mtop5">
                    {description}
                </div>
            </div>
            `,
            timeLineEmptyEvents = `
                <div class="empty flex-layout flex-just-center">There are no events here.</div>
            `,
            tmrValidatePeriodsInSchSetupModal = null,
            tmrCalendarToolbarStatus = null,
            tmrRenderTimeLineEvents = null;

        //#endregion 

        function getUser(uid) {

            uid = parseInt(uid);

            let myUser = null;

            usersList.forEach((user, i) => {

                if (user.ID === uid) {

                    myUser = user;

                    return;

                }

            });

            if (myUser === null) {

                if (parseInt(_CURRENT_USER.ID) === uid) {

                    return _CURRENT_USER;

                }

            }

            return myUser;

        }

        function getFullDayFormat(legend_day) {

            return legend_day.getFullYear() + '-' + (legend_day.getMonth() + 1) + '-' + legend_day.getDate();

        }

        function createUsersListOptions() {

            var optionsHTML = '';

            usersList.forEach(user => {

                const display_name = user.data.display_name,
                    userId = user.ID;

                optionsHTML += `<option value="${userId}">${display_name}</option>`;

            });

            return optionsHTML;

        }

        function createCalendarFieldSetInSchModal(legend_day, isLgExpand) {

            let _fieldsetTmp = calendarFieldSetTemp,
                appointmentBoxHTML = appointmentBoxTemp,
                usersListsOptions = createUsersListOptions;

            if (isLgExpand) {

                _fieldsetTmp = _fieldsetTmp.replace(/\{legend_status_classname\}/ig, "__expand");

            } else {

                _fieldsetTmp = _fieldsetTmp.replace(/\{legend_status_classname\}/ig, "");

            }

            appointmentBoxHTML = appointmentBoxHTML.replace(/\{appointment_action_toolbar\}/ig, "");

            _fieldsetTmp = _fieldsetTmp.replace(/\{appointment_box\}/ig, appointmentBoxHTML)
                .replace(/\{legend_day\}/ig, legend_day)
                .replace(/\{index\}/ig, "0")
                .replace(/\{period_start\}/ig, DEFAULT_APPOINTMENT_TIME.START)
                .replace(/\{period_end\}/ig, DEFAULT_APPOINTMENT_TIME.END)
                .replace(/\{appt_guests_normal_events_options\}/ig, usersListsOptions);

            return _fieldsetTmp;

        }

        function createNewAppointmentBox($parent, legend_day, period) {

            const $apptbox = $parent.find('.appointment-box'),
                { start, end } = period;

            let index = 0;

            if ($apptbox.length) {

                index = $apptbox.index() + 1;

            }

            let appointmentBoxHTML = appointmentBoxTemp;

            if (index === 0) {

                appointmentBoxHTML = appointmentBoxHTML.replace(/\{appointment_action_toolbar\}/ig, '');

            } else {

                appointmentBoxHTML = appointmentBoxHTML.replace(/\{appointment_action_toolbar\}/ig, appointmentActionToolTemp);

            }

            appointmentBoxHTML = appointmentBoxHTML.replace(/\{legend_day\}/ig, legend_day)
                .replace(/\{index\}/ig, index)
                .replace(/\{period_start\}/ig, start)
                .replace(/\{period_end\}/ig, end);

            $parent.append(appointmentBoxHTML);

            if (schAppointmentsList[legend_day]) {

            } else {

                schAppointmentsList[legend_day] = [];

            }

            schAppointmentsList[legend_day].push({
                start,
                end
            });

        }

        function initSchApptLegendDayValue(legend_day, data) {

            schAppointmentsList[legend_day] = data;

        }

        function initializeEditCalendarModal() {

            const d = new Date(window.localDayTimeLine),
                  lg_day = getFullDayFormat(d),
                  id = window.localCalendarActiveId,
                  {name, type, slot_durations, start, end, guests, description} = schEventsList[lg_day][id];                

            $(`#txtEventName_${lg_day}`).val(name);   

            if ( type === CALENDAR_TYPE.EVENT ) {

                $(`a[data-calendar-type="${CALENDAR_TYPE.EVENT}"]`).trigger('click');

                $(`#appt-begin-normal-events-${lg_day}_0`).val(start);
                $(`#appt-end-normal-events-${lg_day}_0`).val(end);
                $(`#appt-description-normal-events-${lg_day}_0`).val(description);                                                                    
                $(`#appt-guests-normal-events-${lg_day}_0`).val(guests)
                                                                .trigger('change');

            }

            else {

                $(`a[data-calendar-type="${CALENDAR_TYPE.APPOINTMENT_SLOTS}"]`).trigger('click');

                $(`#appt-begin-appointment-slots-${lg_day}_0`).val(start);
                $(`#appt-end-appointment-slots-${lg_day}_0`).val(end);
                $(`#appt-appointment-slots-duration-${lg_day}_0`).val(slot_durations);

            }

            schAppointmentsList[lg_day] = JSON.parse(JSON.stringify(schEventsList[lg_day][id]));            

        }

        function setupSchedulesModalInitialize() {

            var html = '';

            initializeLocalVariablesInSetupSchModal();

            $('.schedules-intro').find('.min').text(DEFAULT_APPOINTMENT_TIME.MIN);
            $('.schedules-intro').find('.max').text(DEFAULT_APPOINTMENT_TIME.MAX);

            dpDateChosen.map((timestamp, i) => {

                let date = new Date(timestamp),

                    year = date.getFullYear(),
                    month = date.getMonth() + 1,
                    day = date.getDate(),
                    isLegendExpand = true,

                    legend_day = year + '-' + month + '-' + day;

                if (i === 0) {

                    isLegendExpand = true;

                } else {

                    isLegendExpand = false;


                }

                html += createCalendarFieldSetInSchModal(legend_day, isLegendExpand);

                initSchApptLegendDayValue(legend_day, {
                    type: CALENDAR_TYPE.EVENT,
                    day: legend_day,
                    name: '',
                    description: '',
                    userId: _CURRENT_USER.ID,
                    guests: [],
                    slot_durations: null,
                    start: DEFAULT_APPOINTMENT_TIME.START,
                    end: DEFAULT_APPOINTMENT_TIME.END,
                });

            });

            $(this).find('.setup-schedules').html(html);

            $('#modalSetupSchedules fieldset:not(:first-child) .legend-toggle').trigger('click');

            initSelectBoxChooseGuests();

            //console.log(schAppointmentsList);
            
            /*onTimer_checkApptToolbarStatus();*/

            if ( window.localCalendarAction === CALENDAR_ACTION.EDIT ) {

                initializeEditCalendarModal();

            }

            onTimer_checkValidatePeriodsInSchSetupModal();

        }

        function onTimer_checkValidatePeriodsInSchSetupModal() {

            const setValidateAttrOfEvent = function(event, resultsObj) {

                    event.validate = {

                        msg: resultsObj.invalidate ? resultsObj.msg : '',
                        status: resultsObj.invalidate ? 'invalidate' : 'validate',
                        boolStatus: !resultsObj.invalidate

                    };

                },
                setAppointmentBoxVStatus = function(event, lg_day, resultsObj) {

                    const $parent = $(`.appointments[data-legend-day="${lg_day}"]`),
                        $appointment_box = $parent.find('> .appointment-box'),
                        $error_box = $parent.find('> .error-msg');

                    if (resultsObj.invalidate) {

                        if ($error_box.length === 0) {

                            $parent.prepend(`<div class="error-msg error-validation-msg"></div>`);

                        }

                        $parent.find('.error-msg.error-validation-msg').text(event.validate.msg);

                        if (!$appointment_box.hasClass('__error')) {

                            $appointment_box.addClass('__error');


                        }

                    } else {

                        if ($appointment_box.hasClass('__error')) {

                            $appointment_box.removeClass('__error');

                            $error_box.length && ($error_box.remove());

                        }

                    }

                },
                checkPeriodInValidateError = function(event, eventsList) {

                    const p1_start = event.start,
                        p1_end = event.end;

                    var boolInvalidate = false;

                    eventsList && (eventsList.forEach((myEvent, k) => {

                        if (!boolInvalidate) {

                            const p2_start = myEvent.start,
                                p2_end = myEvent.end;

                            const startCompare1 = timeLocaleCompare(p2_start, p1_start),
                                startCompare2 = timeLocaleCompare(p2_start, p1_end),
                                endCompare1 = timeLocaleCompare(p2_end, p1_start),
                                endCompare2 = timeLocaleCompare(p2_end, p1_end);

                            boolInvalidate = (startCompare1 >= 0 && (startCompare2 <= 0)) ||
                                (endCompare1 >= 0 && endCompare2 <= 0);

                        }

                    }));

                    return boolInvalidate;

                },
                checkEventInValidateError = function(event, eventsList) {

                    //console.log(event);                    

                    if (window.localCalendarAction === CALENDAR_ACTION.NEW && 
                            checkPeriodInValidateError(event, eventsList)) return {
                        invalidate: true,
                        msg: INVALID_PERIOD_ERROR
                    };

                    const { type, name, guests, description } = event;

                    if (type === CALENDAR_TYPE.EVENT) {

                        return {
                            invalidate: name.length === 0 || guests.length === 0 || description.length === 0,
                            msg: INVALID_EVENTS_FORM_ERROR
                        };

                    }

                    return {
                        invalidate: name.length === 0,
                        msg: INVALID_EVENTS_FORM_ERROR
                    };




                };

            tmrValidatePeriodsInSchSetupModal = setInterval(function() {

                const keys = Object.keys(schAppointmentsList),
                    length = keys.length;

                let boolResultsValidate = true;

                for (let i = 0; i < length; i++) {

                    const lg_day = keys[i];

                    const schLists = schAppointmentsList[lg_day];

                    //const boolInvalidate = checkPeriodInValidateError(schLists, j);
                    const resultsObj = checkEventInValidateError(schLists, schEventsList[lg_day]);

                    setValidateAttrOfEvent(schLists, resultsObj);

                    setAppointmentBoxVStatus(schLists, lg_day, resultsObj);

                    //console.log(j + '-' + boolInvalidate);                       

                    if (boolResultsValidate && resultsObj.invalidate) {

                        //console.log(boolInvalidate);

                        boolResultsValidate = !resultsObj.invalidate;

                    }

                }


                if (boolResultsValidate !== window.localPeriodsValidateInSetupSchModal) {

                    window.localPeriodsValidateInSetupSchModal = boolResultsValidate;

                }

                //console.log(schAppointmentsList);

                //clearInterval(tmrValidatePeriodsInSchSetupModal);


            }, 100);

        }

        function onTimer_checkCalendarToolbarStatus() {

            const tmrCalendarToolbarStatus = setInterval(function() {

                const $btnCreateEvents = $('#btnSetupSchedules'),
                      $btnUnselectAll = $('#btnDpUnselectAll');   

                //console.log(dpDateChosen);
                
                if ( $btnCreateEvents.length || $btnUnselectAll.length ) {

                    if ( dpDateChosen.length ) {

                        $btnCreateEvents.length && $btnCreateEvents.hasClass('disabled') && ($btnCreateEvents.removeClass('disabled'));
                        $btnUnselectAll.length && $btnUnselectAll.hasClass('disabled') && ($btnUnselectAll.removeClass('disabled'));

                    }

                    else {

                        //console.log(dpDateChosen.length);

                        $btnCreateEvents.length && !$btnCreateEvents.hasClass('disabled') && ($btnCreateEvents.addClass('disabled'));
                        $btnUnselectAll.length && !$btnUnselectAll.hasClass('disabled') && ($btnUnselectAll.addClass('disabled'));

                    }

                }

                else {

                    clearInterval(tmrCalendarToolbarStatus);

                }
             

            }, 100);

        }

        function onTimer_renderTimelineEvents() {

            tmrRenderTimeLineEvents = setInterval(function() {

                const $timeline = $('#timeline > ul'),
                      day = new Date(window.localDayTimeLine),
                      strDay = getFullDayFormat(day);

                if ($timeline.length) {

                    const $items = $timeline.find('li');

                    if ( $items.length !== schEventsList[strDay].length || 
                         true === window.localEventsSaveChanged ) {

                        printEventsOnTimeLine($timeline, strDay);

                        window.localEventsSaveChanged = false;

                    }

                }

                printEventsLogOnCalendar();

            }, 100);

        }

        function initSelectBoxChooseGuests() {

            const placeholder = $('.appt-guests-normal-events.js-select-simple').eq(0).data('placeholder');

            $('.appt-guests-normal-events.js-select-simple').select2({
                    placeholder
                }).on('select2:select', onChange_changeSelect2UsersList)
                .on('select2:unselect', onChange_changeSelect2UsersList);

        }

        function updateOriginalSourceEventsList() {           

            _schEventsList = JSON.parse(JSON.stringify(schEventsList));

        }      

        function updateLocalEventsList() {

            window.localCalendarEvents = JSON.parse(JSON.stringify(schEventsList));

        }

        function timeLocaleCompare(t1, t2) {

            return t1.localeCompare(t2);
        }


        function onChange_changeAppointmentTime(e) {

            const $this = $(this),
                legend_day = $this.data('legend-day'),
                field = $this.data('sch-field');

            let v = $this.val();

            /*let minCompare = timeLocaleCompare(v.toString(), DEFAULT_APPOINTMENT_TIME.MIN),
                maxCompare = timeLocaleCompare(v.toString(), DEFAULT_APPOINTMENT_TIME.MAX),
                boolValidate = minCompare >= 0 && (maxCompare <= 0);*/

            // nếu đang chọn giờ bắt đầu mà giờ bắt đầu >= giờ kết thúc => giờ bắt đầu không thay đổi
            // nếu đang chọn giờ kết thúc mà giờ giờ kết thúc <= giờ bắt đầu => giờ kết thúc không thay đổi

            if (field === 'start') {

                let endTime = schAppointmentsList[legend_day].end;

                if (timeLocaleCompare(v.toString(), endTime) >= 0) {

                    v = schAppointmentsList[legend_day][field];
                    $this.val(v);

                    return;

                }

            } else {

                let startTime = schAppointmentsList[legend_day].start;

                if (timeLocaleCompare(v.toString(), startTime) <= 0) {

                    v = schAppointmentsList[legend_day][field];
                    $this.val(v);

                    return;

                }

            }

            schAppointmentsList[legend_day][field] = v;

            //console.log(schAppointmentsList);

        }

        function destroyTimersInSetupSchModal() {

            clearInterval(tmrValidatePeriodsInSchSetupModal);
            //clearInterval(tmrCalendarToolbarStatus);

        }

        function initializeLocalVariablesInSetupSchModal() {

            if (typeof(window.localPeriodsValidateInSetupSchModal) === 'undefined') {

                window.localPeriodsValidateInSetupSchModal = false;

            }

            if ( typeof(window.localEventsSaveChanged) === 'undefined' ) {

                window.localEventsSaveChanged = false;

            }

            schAppointmentsList = {};

        }

        function destroyLocalVariablesInSetupSchModal() {

            if (typeof(window.localPeriodsValidateInSetupSchModal) !== 'undefined') {

                delete window.localPeriodsValidateInSetupSchModal;

            }

            if ( typeof(window.localEventsSaveChanged) !== 'undefined' ) {

                delete window.localEventsSaveChanged;

            }

        }

        async function getUsersLists() {

            return await $.ajax({

                type: "POST",
                async: true,
                url: ajaxurl,
                data: {
                    action: _CHILD_HOOK_ACTIONS.actions._AJAX_GET_USERS_LIST_ACTION
                }

            });

        }

        function setPeriodTimeWhenChooseTypeEvent(legend_day, type) {

            const $parent = $('.tab-lists-content.calendar-tab-lists-content.__appointment > div.active'),
                $start = $parent.find('input[type="time"][data-sch-field="start"'),
                $end = $parent.find('input[type="time"][data-sch-field="end"');

            const startTime = $start.val(),
                endTime = $end.val();

            schAppointmentsList[legend_day].start = startTime;
            schAppointmentsList[legend_day].end = endTime;

            if (type === CALENDAR_TYPE.APPOINTMENT_SLOTS) {

                const $duration = $parent.find('input[type="number"]');

                schAppointmentsList[legend_day].slot_durations = parseInt($duration.val());

            }


        }        

        function onChange_changeEventName(e) {

            const v = $(this).val().trim(),
                legend_day = $(this).data('legend-day');

            schAppointmentsList[legend_day].name = v;

        }

        function onChange_changeEventDesc(e) {

            e.preventDefault();

            const v = $(this).val().trim(),
                legend_day = $(this).data('legend-day');

            if (legend_day && v) {

                schAppointmentsList[legend_day].description = v;

            }

            console.log(schAppointmentsList);

        }

        function onChange_changeSelect2UsersList(e) {

            let legend_day = $(this).data('legend-day');

            schAppointmentsList[legend_day].guests = $(this).val();

        }  

        function sortEventLists(eventsList) {

            eventsList.sort(function(event1, event2) {

                return timeLocaleCompare(event1.start, event2.start);                

            });

        }

        function printEventsOnTimeLine($timeline, strDay) {

            let html = '';

            const $parent = $timeline.parent(),
                $empty = $parent.find('.empty');

            if ( schEventsList[strDay].length > 0 ) {

                sortEventLists(schEventsList[strDay]);

                if ( $empty.length ) $empty.remove();

                schEventsList[strDay].forEach((event, i) => {

                    const { name, slot_durations, start, end, type } = event;

                    let timelineItemHTML = dayTimeLineTemp,
                        timelineDurationHTML = dayTimeLineDurationTemp;

                    timelineItemHTML = timelineItemHTML.replace(/\{milestones_begintime\}/ig, start)
                        .replace(/\{milestones_endtime\}/ig, end)
                        .replace(/\{begin_time\}/ig, start)
                        .replace(/\{end_time\}/ig, end)
                        .replace(/\{event_name\}/ig, ucFirstEachWord(name))
                        .replace(/\{index\}/ig, i);

                    if (type === CALENDAR_TYPE.APPOINTMENT_SLOTS) {

                        timelineDurationHTML = timelineDurationHTML.replace(/\{duration\}/, slot_durations);

                        timelineItemHTML = timelineItemHTML.replace(/\{duration_timeline\}/, timelineDurationHTML);

                    } else {

                        timelineItemHTML = timelineItemHTML.replace(/\{timelineDurationHTML\}/, "")
                            .replace(/\{duration_timeline\}/, "");

                    }

                    html += timelineItemHTML;                    

                });

            }              

            else {                

                if ( $empty.length === 0 ) {

                    $parent.append(timeLineEmptyEvents);
                    
                } 
           

            }

            $timeline.html(html);

        }

        function printEventsLogOnCalendar() {

            const keys = Object.keys(_schEventsList),
                  findCalendarCell = function(strTime) {

                    return $('#dpCalendar').find(`td.datepick-days-cell[onclick*=",${strTime})"]`);

                  };

            for (let i = 0; i < keys.length; i++) {

                const lg_day = keys[i],
                d = new Date(lg_day),
                strTime = d.getTime();                      

                let numEvents = 0;

                _schEventsList[lg_day].map((event, i) => {

                    const id = `todo-list-${lg_day}-${i}`,
                         $cell = findCalendarCell(strTime);

                    if ( schEventsList[lg_day].length ) {                        

                        if ($cell.length) {

                            //console.log($cell);

                            if (!$cell.hasClass('datepick-unselectable __event-available')) {

                                $cell.addClass('datepick-unselectable __event-available');

                            }

                            $cell.data('legend-day', strTime);

                            let $parent = $cell.find('.events-log'),
                                $events_log = $parent.find('> ul');
                                

                            if ($events_log.length === 0) {

                                $cell.append(`<div class="events-log"><ul></ul></div>`);

                                $events_log = $cell.find('.events-log > ul');

                            }

                            //$events_log.html('');

                            if ( schEventsList[lg_day][i] ) {

                                if ( i === 0 ) {

                                    const $item = $('li#' + id),
                                        name = schEventsList[lg_day][i].name;

                                    if ( $item.length === 0 ) {  

                                        //console.log($events_log); 

                                        $events_log.append(`
                                            <li id="${id}" class="${id}">${name}</li>
                                        `);

                                    }

                                    else {

                                        $item.text(name);

                                    }

                                }       

                                numEvents++;

                            }

                        }

                    }

                    else {

                        if ($cell.length) {

                            if ($cell.hasClass('datepick-unselectable __event-available')) {

                                $cell.removeClass('datepick-unselectable __event-available');

                            }

                            $cell.removeData('legend-day');

                            $cell.find('.events-log > ul').remove();                            

                        }

                    }

                });

                //console.log(numEvents);               

                let $cell = findCalendarCell(strTime),
                    $parent = $cell.find('.events-log'),
                    $eventsShowMores = $parent.find('> .event-show-mores');

                if ( $eventsShowMores.length === 0 ) {

                    if ( numEvents > 1 ) {

                        $parent.append('<div class="event-show-mores"></div>');

                        $eventsShowMores = $parent.find('> .event-show-mores');

                    }                  

                }

                if ( numEvents > 1 ) {

                    $eventsShowMores.html(`<a href="#">+${numEvents - 1} more(s)</a>`);   
                    
                }

                else {
                    $eventsShowMores.remove();
                }

            }

        }  

        function initializeDayTimeLineModal() {            

            const $timeline = $('#timeline > ul'),
                lgDay = new Date(window.localDayTimeLine),
                strDay = getFullDayFormat(lgDay);

            $('#modalDayTimeline').find('.modal-title .lg-day').text(strDay);

            printEventsOnTimeLine($timeline, strDay);

            onTimer_renderTimelineEvents();

        }

        function resetDayTimeLineModal() {

            clearInterval(tmrRenderTimeLineEvents);

            if ( window.localDayTimeLine ) {

                resetLocalTimeLine();

                delete window.localDayTimeLine;

            }            

        }        

        function resetCalendarModalAction() {

            if ( window.localCalendarAction ) { 
                
                if ( window.localCalendarAction === CALENDAR_ACTION.EDIT ) {

                    resetLocalTimeLine();
                    
                }

                delete window.localCalendarAction;

            }

            if ( window.localCalendarActiveId ) {

                delete window.localCalendarActiveId;

            }

        };

        function selectLocalTimeLine() {

            if ( window.localDayTimeLine ) {
              
                dpDateChosen = [window.localDayTimeLine];

            }

        }

        function resetLocalTimeLine() {

            if ( dpDateChosen ) {

                dpDateChosen = [];

            }

        }

        //#region Declare all calendar click events

        function onClick_changeTypeEvent(e) {

            const legend_day = $(this).data('legend-day'),
                type = $(this).data('calendar-type');

            schAppointmentsList[legend_day].type = type;

            setPeriodTimeWhenChooseTypeEvent(legend_day, type);

            console.log(schAppointmentsList);

        }

        function onClick_setupSchedulesSaveChanges(e) {

            e.preventDefault();

            const saveNewCalendarEvent = function() {

                const keys = Object.keys(schAppointmentsList);

                for (let i = 0; i < keys.length; i++) {

                    const lg_day = keys[i];

                    if (schEventsList[lg_day]) {

                    } else {
                        schEventsList[lg_day] = [];
                    }

                    schEventsList[lg_day].push(schAppointmentsList[lg_day]);

                }

            },
            saveEditCalendarEvent = function() {

                const keys = Object.keys(schAppointmentsList),
                      lg_day = keys[0],
                      id = window.localCalendarActiveId;

                schEventsList[lg_day][id] = JSON.parse(JSON.stringify(schAppointmentsList[lg_day])); 

                window.localEventsSaveChanged = true;

            };            

            if (window.localPeriodsValidateInSetupSchModal) {

                $('#modalSetupSchedules').modal('hide');

                $('#btnDpUnselectAll').trigger('click');

                pushMessageValidate("success", SAVE_CHANGES_SUCCESS, "topCenter", 1000);

                if ( window.localCalendarAction === CALENDAR_ACTION.NEW ) {

                    saveNewCalendarEvent();

                }

                else {

                    saveEditCalendarEvent();

                }

            } else {

                pushMessageValidate("error", INVALID_EVENTS_FORM_ERROR, "topCenter", 1000);

            }

            updateOriginalSourceEventsList();

            updateLocalEventsList();

            printEventsLogOnCalendar();           

            //console.log(schEventsList);

        }

        function onClick_setApptDayDefault(e) {

            e.preventDefault();

            const $this = $(this),
                lg_day = $this.data('legend-day');

            const __perform_task = function(_lg_day) {

                const resetApptsBox = function($box, day) {

                    $box.html('');
                    schAppointmentsList[day] = [];

                };

                $('fieldset .appointments').each((i, e) => {

                    const $box = $(e),
                        day = $box.data('legend-day');

                    if (day === _lg_day) return;

                    resetApptsBox($box, day);

                    schAppointmentsList[_lg_day].map((period, i) => {

                        const { start, end } = period;

                        createNewAppointmentBox($box, day, {
                            start,
                            end
                        });

                    });

                });

            }

            if (confirm('Do you want to set day default to other ?')) {

                __perform_task(lg_day);

            }

        }

        function onClick_removeAnAppointment(e) {

            e.preventDefault();

            const $this = $(this),
                legend_day = $this.data('legend-day'),
                $box = $this.closest('.appointment-box'),
                index = $box.index();

            $box.remove();

            schAppointmentsList[legend_day].splice(index, 1);

            //console.log(schAppointmentsList);

        }

        function onClick_createNewAppointment(e) {

            e.preventDefault();

            let $parent = $(this).closest('.legend-body').find('.appointments'),
                legend_day = $(this).data('legend-day');

            createNewAppointmentBox($parent, legend_day, {
                start: DEFAULT_APPOINTMENT_TIME.MIN,
                end: DEFAULT_APPOINTMENT_TIME.MAX
            });

            //console.log(schAppointmentsList);

        }

        function onClick_showEventDayTimeline(e) {

            e.preventDefault();

            window.localDayTimeLine = $(this).data('legend-day');

            $('#modalDayTimeline').modal({
                show: true,
                backdrop: 'static'
            });

        }

        function onClick_showEventDetails(e) {

            e.preventDefault();

            const id = parseInt($(this).closest('li').data('index')),
                day = new Date(window.localDayTimeLine),
                strDay = getFullDayFormat(day),
                event = schEventsList[strDay][id],
                { name, type, userId, guests, description, slot_durations, start, end } = event,
                author = getUser(userId);

            let eventDetailModalHTML = eventDetailModalTemp,
                getGuestListsHTML = function(guests) {

                    let html = '';

                    guests.forEach(uid => {

                        const guest = getUser(uid);

                        html += `<a class="btnViewLocation btnGuest">${guest.data.display_name}</a>`;

                    });

                    return html;

                }

            eventDetailModalHTML = eventDetailModalHTML.replace(/\{event_name\}/ig, ucFirstEachWord(name))
                .replace(/\{start\}/ig, start)
                .replace(/\{end\}/ig, end)
                .replace(/\{author\}/ig, author.data.display_name);

            if (type === CALENDAR_TYPE.EVENT) {

                const guestsListHTML = getGuestListsHTML(guests);

                let timeLineGuestsHTML = timeLineGuestsTemp.replace(/\{guests_list\}/ig, guestsListHTML),
                    timeLineDescriptionHTML = timeLineDescriptionTemp.replace(/\{description\}/ig, description);

                eventDetailModalHTML = eventDetailModalHTML.replace(/\{event_type\}/ig, "__active")
                    .replace(/\{appointment_slots_type\}/ig, "")
                    .replace(/\{guests_template\}/ig, timeLineGuestsHTML)
                    .replace(/\{description_template\}/ig, timeLineDescriptionHTML)
                    .replace(/\{duration_template\}/ig, "");

            } else {

                let timeLineDurationHTML = dayTimeLineDurationTemp.replace(/\{duration\}/ig, `Duration: ${slot_durations}`);

                eventDetailModalHTML = eventDetailModalHTML.replace(/\{appointment_slots_type\}/ig, "__active")
                    .replace(/\{event_type\}/ig, "")
                    .replace(/\{guests_template\}/ig, "")
                    .replace(/\{description_template\}/ig, "")
                    .replace(/\{duration_template\}/ig, timeLineDurationHTML);

            }

            $('#modalDayTimeline .modal-body').append(eventDetailModalHTML);

            $('.eventDetailsBox').show('fast');

            $('.modal.in').scrollTop(0);

        }

        function onClick_editEvent(e) {
            
            window.localCalendarAction = CALENDAR_ACTION.EDIT;
            window.localCalendarActiveId = parseInt( $(this).data('index') );

            onClick_OpenSetupSchedulesModal(e);

        }

        function onClick_removeEvent(e) {

            e.preventDefault();

            const id = $(this).data('index'),
                  day = new Date(window.localDayTimeLine),
                  strDay = getFullDayFormat(day);                 

            schEventsList[strDay].splice(id, 1);   

            updateLocalEventsList();

        }

        function onClick_closeEventDetailsModal(e) {

            e.preventDefault();

            $('.eventDetailsBox').hide('fast', function() {
                $('.eventDetailsBox').remove();
            });

        }

        function onClick_createEventOnTimeLineModal(e) {

            e.preventDefault();            

            $('#btnSetupSchedules').trigger('click');

        }

        function onClick_OpenSetupSchedulesModal(e) {           

            e.preventDefault();

            const $modal = $('#modalSetupSchedules'),
                  $modal_title = $modal.find('.modal-title');

            if ( typeof( window.localCalendarAction ) === 'undefined' ) {

                window.localCalendarAction = CALENDAR_ACTION.NEW;

            }

            if ( window.localCalendarAction === CALENDAR_ACTION.NEW ) {

                $modal_title.text(CALENDAR_DIALOG_TITLE.NEW);

            }

            else {                

                $modal_title.text(CALENDAR_DIALOG_TITLE.EDIT);

            }

            selectLocalTimeLine();

            $modal.modal({
                show: true,
                backdrop: 'static'
            });   
            
        }
        
        function onClick_updateCalendarToServer(e) {

            e.preventDefault();

            const showAjaxLoader = function() {

                $('.calendar-update-loader').removeClass('loader-hidden')
                    .show('slow');

            },
            hideAjaxLoader = function() {

                $('.calendar-update-loader').addClass('loader-hidden')
                    .hide('slow');

            };

            showAjaxLoader();

            //if ( schEventsList.length ) {

                const fd = new FormData();
                
                fd.append("action", _CHILD_HOOK_ACTIONS.actions._AJAX_SAVE_EVENTS_LIST_ACTION);
                fd.append("eventsList", JSON.stringify(schEventsList));

                $.ajax({
                    type : "POST",
                    async : true,
                    url : ajaxurl,
                    contentType : false,
                    processData : false,
                    data : fd
                }).done(function(data) {

                    if ( data === 'success' ) {

                        pushMessageValidate("success", "You update completed", "topRight", 1000);

                    }

                    hideAjaxLoader();

                });

            //}

        }

        //#endregion

        async function initialize() {

            usersList = await getUsersLists();

            schEventsList = typeof(currentUserEventsList) !== 'undefined' ? JSON.parse( JSON.stringify( currentUserEventsList ) ) : {};

            _schEventsList = JSON.parse( JSON.stringify(schEventsList) );

            if (typeof(window.localCalendarEvents) === 'undefined') {

                window.localCalendarEvents = JSON.parse( JSON.stringify(schEventsList) );
    
            }

            printEventsLogOnCalendar();

        }

        
        $(document).on('click', '.legend-toggle', function(e) {

            e.preventDefault();

            const $this = $(this);
            const $items = $this.siblings('.legend-body');

            if ($this.hasClass('__minimize')) {

                $this.removeClass('__minimize')
                    .addClass('__expand');

                $items.show('fast');

            } else {

                $this.removeClass('__expand')
                    .addClass('__minimize');

                $items.hide('fast');

            }

        })

        $(document).on('click', '.btnCalendarNavig', function(e) {

            e.preventDefault();

            const $this = $(this),
                $dropdown = $this.siblings('.calendar-dropdown-menu');

            if ( $dropdown.length ) {

                $this.toggleClass('__active');
                $dropdown.toggleClass('__show'); 
                
            }

        });

        $(document).on('mouseup', function(e) {

            const target = e.target,
                dropdown_node = document.querySelector('.calendar-dropdown-menu'),
                btn_node = document.querySelector('.btnCalendarNavig.__active');

            if ((dropdown_node && dropdown_node.contains(target)) || (btn_node && btn_node.contains(target))) {

            } else {

                if (btn_node && dropdown_node) btn_node.click();

                else {

                    dropdown_node && (dropdown_node.classList.remove('__show'));

                }

            }

        });

        $('#dpCalendar').datepick({
            prevText: '«',
            nextText: '»',
            multiSelect: 9999,
            yearRange: '+0:+0',
            minDate: +1,
            numberOfMonths: 2,
            stepMonths: 2,
            dateFormat: "yy-mm-dd",
            onSelect: OnDpCalendarSelectDay
        });

        function OnDpCalendarSelectDay(dates) {
            
            dates = dates.toString().trim();

            if ( dates ) {

                let datesSelected = dates.split(',');          

                datesSelected = datesSelected.filter(d => {

                    const myDate = new Date(d),
                        lg_day = getFullDayFormat(myDate);

                    // chọn những ngày không có trong danh sách events đã tạo
                    return typeof( schEventsList[lg_day] ) === 'undefined' || schEventsList[lg_day].length === 0;

                }).map(d => {

                    const myDate = new Date(d);

                    return myDate.getTime();

                });
            

                datesSelected.sort();

                dpDateChosen = [...datesSelected];

            }

            else {

                dpDateChosen = [];

            }

            //console.log(dpDateChosen);

        }

        $('#btnDpChooseRange').click(function(e) {

            e.preventDefault();

            $('.btnCalendarNavig.__active').trigger('click');

            setTimeout(function() {

                const ONE_DAY_IN_MILISECONDS = (1000 * 60 * 60 * 24),
                    beginDate = new Date($('#dpBeginRange').val()),
                    endDate = new Date($('#dpEndRange').val()),
                    diff = endDate - beginDate,
                    numDays = diff / ONE_DAY_IN_MILISECONDS;

                for (let i = 0; i <= numDays; i++) {

                    const timestamp = beginDate.getTime() + i * ONE_DAY_IN_MILISECONDS;

                    //console.log(timestamp);

                    if (dpDateChosen.indexOf(timestamp) === -1) {

                        $.datepick._selectDay(this, '#dpCalendar', timestamp);

                    }

                }

            }, 200);

        });

        $('#btnDpUnselectAll').click(function(e) {

            dpDateChosen.map(timestamp => {

                $.datepick._selectDay(this, '#dpCalendar', timestamp);

            });

            dpDateChosen = [];

        });

        $(document).on('click', '.calendar-tabslist.__appointment a', onClick_changeTypeEvent)
            .on('change', '.appointments .txtEventName', onChange_changeEventName)
            .on('change', '.appointments .appt-description', onChange_changeEventDesc);          

        $('#btnSetupSchedules').click(onClick_OpenSetupSchedulesModal);

        function noScrollOnBody() {

            $('body').css('overflow', 'hidden');
        }

        function visibleScrollOnBody() {

            $('body').css('overflow', '');

        }

        $('.modalCalendar').on('shown.bs.modal', function(e) {

            noScrollOnBody();

        }).on('hidden.bs.modal', function(e) {

            resetCalendarModalAction();

            if ( $('.modalCalendar:visible').length === 0 ) { 

                visibleScrollOnBody();

            }

            else {

                noScrollOnBody();

            }

        });

        $('#modalSetupSchedules').on('shown.bs.modal', function(e) {

            setupSchedulesModalInitialize.call(this);

        }).on('hidden.bs.modal', function(e) {            

            destroyTimersInSetupSchModal();
            destroyLocalVariablesInSetupSchModal();

            $(this).find('.setup-schedules').html('');

        }).on('input', 'input[type=time]', onChange_changeAppointmentTime);

        $('#modalDayTimeline').on('shown.bs.modal', function(e) {

            initializeDayTimeLineModal();


        }).on('hidden.bs.modal', function(e) {            

            resetDayTimeLineModal();
            updateOriginalSourceEventsList();

            $(this).find('#timeline').html('<ul></ul>');

        }).on('click', '#timeline li .event-item', onClick_showEventDetails)
          .on('click', '#timeline li .btnEditEvent', onClick_editEvent)
          .on('click', '#timeline li .btnRemoveEvent', onClick_removeEvent);

        $(document).on('click', '.btnNewAppointment', onClick_createNewAppointment)
            .on('click', '.btnRemoveAppointment', onClick_removeAnAppointment)
            .on('click', '.btnSetApptDayDefault', onClick_setApptDayDefault)
            .on('click', '.datepick-days-cell.__event-available', onClick_showEventDayTimeline)
            .on('click', '.eventDetailsModalClose', onClick_closeEventDetailsModal);

        $(document).on('show.bs.modal', '.modal', function() {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

        $('#btnSetupSchedulesSaveChanges').click(onClick_setupSchedulesSaveChanges);

        $('#btnTimelineCreateEvents').click(onClick_createEventOnTimeLineModal);

        $('#btnUpdateCalendarToServer').click(onClick_updateCalendarToServer);

        initialize();        

        onTimer_checkCalendarToolbarStatus();

        //onTimer_printEventsLogOnCalendar();

    }

    setupCalendarSchedules();


});