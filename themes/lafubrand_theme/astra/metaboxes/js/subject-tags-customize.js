jQuery(function($) {

    var subject_tags_list = [];

    function renderedSubjectItems() {

        let html = '';

        subject_tags_list.forEach((subject, i) => {

            html += `
                        <span class="subject-tag-item">

                            <span class="subject-tag-name">${subject.value}</span>

                            <span class="dashicons dashicons-no-alt subject-tag-remove" data-sid="${subject.id}"></span>

                        </span>
                    `;

        }); 

        $('#subject-tags-added').html( html );

        $('input[type=hidden][name=txtSubjectTagsList]').val(JSON.stringify( subject_tags_list ));

    }

    function handleAddSubjectItem(e) {      

        e.preventDefault();

        const subject_selected_id = $('#sl-subject-tags-lists').val(),
                subject_selected_name = $('#sl-subject-tags-lists').find('option[value="' + subject_selected_id + '"]')
                                                                    .text().trim(),

            subject_id = subject_tags_list.find(o => o.id == subject_selected_id);
        
        if ( typeof( subject_id ) === 'undefined' ) {

            subject_tags_list.push({

                id : subject_selected_id,
                value : subject_selected_name

            });

        }

        else {
            alert('Chủ đề đã được thêm từ trước, mời chọn chủ đề khác !!!');
        }

        renderedSubjectItems();

    }

    function handleRemoveSubjectItem(e) {

       e.preventDefault();

       const $this = $(e.currentTarget),
             subject_id = parseInt( $this.data('sid') );

        const index = subject_tags_list.findIndex(item => item.id == subject_id);

        if ( index !== -1 ) {

            subject_tags_list.splice(index, 1);

            renderedSubjectItems();

        }

    }

    function get_ajax_subject_items() {

        const url = new URL(window.location.href);

        $.ajax({

            method : "POST",
            url : ajaxurl,
            data : {

                action : 'sb_get_subject_items',
                post_id : url.searchParams.get('post')

            },
            success: (data) => {

                //console.log(data);

                if ( data !== 'no-data' ) {

                    subject_tags_list = JSON.parse( JSON.stringify( data ) );

                    renderedSubjectItems();

                }

            }

        })

    }

    $('.btnAddSubjectTags').click(handleAddSubjectItem);
    $(document).on('click', '.subject-tag-remove', handleRemoveSubjectItem);

    get_ajax_subject_items();

});