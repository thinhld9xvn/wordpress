jQuery( function($) {
    
    var media = {
        
        ready: function() {
            
            $(document).on('click', '.field_media_widget_remove', this.removeCustomFieldMedia)
                       .on('click', '.media_upload', this.uploadMedia)
                       .on('click', '.field_media_widget_add', this.addCustomFieldMedia);
                                       
        },
        
        addCustomFieldMedia: function(e) {
             e.preventDefault();
        
            var field_id = $(this).attr('data-field-id'),
                image_path = $(this).attr('data-image-path'),
                remove_widget_src = image_path + '/widget_remove.png',
                thumbnail_enable = $(this).attr('data-thumbnail-enable') === 'true',
                html_field = '';
            
            html_field += '<div class="field mtop10">';
            
            if ( thumbnail_enable  ) {
                html_field +=  '<img src="" class="thumbnail_media_field_metabox vmiddle" />';
            }
                       
            html_field +=  '    <input type="text" name="' + field_id + '[]' + '" class="media_field_metabox vmiddle" value="" />'
                       +  '    <input type="button" class="button button-default media_upload vmiddle" value="Chọn ảnh" />'
                       +  '    <img src="' + remove_widget_src  + '" class="field_media_widget_remove vmiddle cpointer" />'
                       +  '</div>';
            
            $(this).closest('.metabox_field').append( html_field );
            
        },
        
        removeCustomFieldMedia: function(e) {
            
            e.preventDefault();
            $(this).closest( '.field' ).remove();
            
        },
        
        uploadMedia: function(e) {
            
             e.preventDefault();
        
            var $field =  $(this).closest('.field'),
                $attachment_thumbnail = $field.find('.thumbnail_media_field_metabox'),
                $attachment_url = $field.find('.media_field_metabox'),
                
                custom_uploader = wp.media({
                    title: 'Select Media',
                    button: {
                        text: 'Upload Image'
                    },
                    multiple: false  // Set this to true to allow multiple files to be selected
                })
                .on('select', function() {
                    
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    
                    if ( $attachment_thumbnail.length > 0 ) {
                        $attachment_thumbnail.attr('src', attachment['url'] );
                    }
                    
                    $attachment_url.val( attachment['url'] );
                   
                })
                .open();
                
            }
    }
    
    media.ready();
    
});