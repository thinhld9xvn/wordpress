jQuery(function($) {

	var qtranslate = {		
		
		ready: function() {			

			$(document).on('mouseup', this.onGlobalMouseUp);

			$('.qtranslate_e_uibox').click( this.onSelectUILangOption );			

			$('li', '.qtranslate_e_listbox').click( this.onItemLangChoose );

			$('.btnAddStrTranslate').click( this.onAddNewStrRow );
			$(document).on('click', '.btnQtranslateRemoveString', this.onRemoveStrRow );

			$('.qtranslate-tfilter').keyup( this.onFilterTString );

		},
		// sự kiện toàn cục khi nhấn nhả chuột trên trang		
		onGlobalMouseUp: function(e) {

			var $container = $( '*[data-dropcontainer="true"]' );			

		    if ( ! $container.is(e.target) // if the target of the click isn't the container...
		        && $container.has(e.target).length == 0) { // ... nor a descendant of the container		    		        
		        $container.find('*[data-droptarget="true"]').removeClass('active');
		    }							

		},
		
		// sự kiện ẩn/hiện hộp chọn ngôn ngữ
		// ở trang cài đặt ngôn ngữ
		onSelectUILangOption: function(e) {
			$(this).next('.qtranslate_e_listbox').toggleClass('active');
		},		
		// sự kiện chọn một ngôn ngữ trong hộp chọn
		// ở trang cài đặt ngôn ngữ
		onItemLangChoose: function(e) {

			var $lang_groupbox = $(this).closest('.slqtransLangBox'),
				$e_selected_item = $lang_groupbox.find('.qtranslate_ui_selected_item'),			
				langname = $(this).attr('data-langname'),
				langlocale = $(this).attr('data-langlocale'),
				langcode = $(this).attr('data-langcode'),
				content = $(this).html();			

			$e_selected_item.html( content );			

			$('#txtqtransLangName').val( langname );
			$('#txtqtransLangLocale').val( langlocale );
			$('#txtqtransLangCode').val( langcode );

			$(this).closest('ul').removeClass('active');
		},
		// Thêm một hàng dịch chuỗi trên bảng
		// ở trang cài đặt ngôn ngữ
		onAddNewStrRow: function(e) {

			e.preventDefault();
			
			var $table = $('#tblStrTranslate'),
				$tbody = $table.find('tbody'),
				$row_template = $tbody.find('tr.row-template'),
				$row = $row_template.clone(),
				index = $tbody.find('tr.row').length,
				html = '';

			$row.removeClass('row-template rowhidden')
				.addClass('row');

			html = $row.html();
			html = html.replace( new RegExp('_qtranslate_strings', 'ig'), 'qtranslate_strings' );
			html = html.replace( new RegExp('\%index', 'ig'), index );

			$row.html( html );

			$tbody.append( $row );

		},
		// Xóa một hàng dịch chuỗi trên bảng
		// ở trang cài đặt ngôn ngữ
		onRemoveStrRow: function(e) {

			var $table = $('#tblStrTranslate'),
				$tbody = $table.find('tbody'),	
				$row = $(this).closest('tr.row'),			
				index = $row.index( 'tbody tr.row' ),
				$rows = null;

			$row.remove();

			$rows = $tbody.find('tr.row:nth-child(n+' + index.toString() + ')');

			if ( $rows.length > 0 ) {

				// update index row
				$rows.each( function() {

					index = $(this).index('tbody tr.row');

					html = $(this).html();
					html = html.replace( new RegExp( 'qtranslate_strings\[[0-9]+\]', 'ig'), 'qtranslate_strings[' + index + ']' );

					$(this).html( html );

				});

			}

		},
		// Lọc tìm chuỗi dịch với cụm từ đã nhập trong hộp 
		// ở trang cài đặt ngôn ngữ - tab Dịch chuỗi ngôn ngữ
		onFilterTString: function(e) {

			var key = $(this).val();			
			$('.qtranslate_string_src', '#tblStrTranslate').filter( function(index, elem) {

				var pos = elem.value.indexOf( key );

				// không tìm thấy key
				if ( -1 === pos ) {

					$(elem).closest('tr').css('display', 'none');

				}			
				
				else {
					$(elem).closest('tr').css('display', '');
				}

		    });
			
		}

	}

	qtranslate.ready();	

});