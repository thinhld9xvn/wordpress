(function ($) {    

    var _ = {
        isFunc: function(obj) {
            return $.isFunction(obj);
        }
    }    

    $.fn.extend({

        simplePager: function (opt) { 

            return this.each( function() {

                console.log(opt);

                var $self = $(this),
                    defaults = {
                        page_show_size: 10,   // showing index number of pager
                        page_max_size: 20,  // max length of pager                                
                        first_page: '<<',  // first page text of pager                
                        last_page: '>>',// last page text of pager
                        page_jump_index: 2,
                        pageitem_click: function(num) {}, // action after page clicking                
                        page_loadComplete: function() {} // pager load event if page_max_size > 0
                    },
                    firstIndexNumPagePoint = 0, // đánh dấu đầu cho khoảng số trang hiển thị
                    lastIndexNumPagePoint = 0; // đánh dấu cuối cho khoảng số trang hiển thị

                    // ví dụ: chỉ hiển thị số trang từ 1 cho đến 10 thì:
                    //  firstIndexNumPagePoint sẽ là index của trang 1
                    //  lastIndexNumPagePoint sẽ là index của trang 10
                    //  index dùng code jquery để tính toán qua hàm .index()

                if( _.isFunc( opt.page_max_size ) ) {                                      
                    opt.page_max_size = opt.page_max_size();                 
                }        

                var options = $.extend(defaults, opt);

                options.page_show_size = parseInt( options.page_show_size );
                options.page_max_size = parseInt( options.page_max_size );
                options.page_jump_index = parseInt( options.page_jump_index );

                if ( options.page_show_size > options.page_max_size) {
                    options.page_show_size = options.page_max_size;
                }             

                if( options.page_max_size > 0 ) {                     

                    lastIndexNumPagePoint = options.page_show_size - 1;

                    var strHTML = '<li class="navigation page_first"><a href="#">{0}</a></li>'.replace('{0}', options.first_page);
                    
                    for (var i = 1; i <= options.page_max_size; i++) {
                        if (i == 1) {
                            strHTML += "<li class='number first show selected'><a href='#'>1</a></li>";
                        }
                        else {
                            if (i < options.page_show_size) {
                                strHTML += "<li class='number show'><a href='#'>{0}</a></li>".replace('{0}', i);
                            }
                            else if (i == options.page_show_size) {
                                strHTML += "<li class='number last show'><a href='#'>{0}</a></li>".replace('{0}', i);
                            }
                            else {
                                strHTML += "<li class='number hide'><a href='#'>{0}</a></li>".replace('{0}', i);
                            }
                        }
                    }
                    strHTML += '<li class="navigation page_last"><a href="#"">{1}</a></li>'.replace('{1}', options.last_page);

                    $self.html( strHTML );                           

                    var pagenumber = {                       
                        ready: function () {   

                            $( 'li.number', $self ).click( pagenumber.clickEvent );

                        },
                        check: function(i, s) {

                            var $pageitem = $( 'li.number', $self ).eq(i),
                                check = $pageitem.hasClass( s );

                            if ( ! check ) {

                                switch (s) {

                                    case 'hide':
                                        $pageitem.removeClass('show')
                                                 .addClass('hide');

                                        break;

                                    case 'show':
                                        $pageitem.removeClass('hide')
                                                 .addClass('show');

                                        break;

                                    default:
                                        break;

                                }

                            }

                        },

                        lastItemSelected: function( $obj ) {

                            var count = pagenumber.getCount(),
                                $pageitem = $( 'li.number', $self ); 

                            // mỗi lần về càng cuối trang mới điểm đầu và cuối sẽ chuyển page_jump_index số trang
                            firstIndexNumPagePoint += options.page_jump_index; 
                            lastIndexNumPagePoint += options.page_jump_index;

                            //console.log( firstIndexNumPagePoint + ' ' + lastIndexNumPagePoint );

                            if ( $obj.hasClass('navigation page_last') ) {
                                
                                lastIndexNumPagePoint = options.page_max_size - 1; 
                                firstIndexNumPagePoint = lastIndexNumPagePoint - options.page_show_size + 1;

                            }                        

                            while ( lastIndexNumPagePoint > count ) {

                                lastIndexNumPagePoint--;
                                firstIndexNumPagePoint--;

                            }   

                            for (var bg = firstIndexNumPagePoint - 1; bg >= 0; bg--) {
                                pagenumber.check(bg, 'hide');
                            }

                            for (var mid = firstIndexNumPagePoint; mid <= firstIndexNumPagePoint + 9; mid++) {
                                pagenumber.check(mid, 'show');
                            }

                            for (var end = lastIndexNumPagePoint + 1; end <= count; end++) {
                                pagenumber.check(end, 'hide');
                            }

                            $pageitem.filter('.first').removeClass('first');
                            $pageitem.filter('.last').removeClass('last');

                            $pageitem.eq( firstIndexNumPagePoint ).addClass('first');
                            $pageitem.eq( lastIndexNumPagePoint ).addClass('last');
                        },

                        firstItemSelected: function( $obj ) {

                            var $pageitem = $('li.number'),
                                count = pagenumber.getCount();

                            // mỗi lần về càng đầu trang mới điểm đầu và cuối sẽ giảm page_jump_index số trang
                            firstIndexNumPagePoint -= options.page_jump_index;
                            lastIndexNumPagePoint -= options.page_jump_index;

                            if ( $obj.hasClass('navigation page_first') ) {
                                
                                firstIndexNumPagePoint = 0;
                                lastIndexNumPagePoint = options.page_show_size - 1;                                 

                            } 

                            while (firstIndexNumPagePoint < 0 ) {

                                firstIndexNumPagePoint++;
                                lastIndexNumPagePoint++;

                            }                            

                            for (bg = firstIndexNumPagePoint - 1; bg >= 0; bg--) {
                                pagenumber.check(bg, 'hide');
                            }

                            for (mid = firstIndexNumPagePoint; mid <= firstIndexNumPagePoint + 9; mid++) {
                                pagenumber.check(mid, 'show');
                            }

                            for (end = lastIndexNumPagePoint + 1; end <= count; end++) {
                                pagenumber.check(end, 'hide');
                            }

                            $pageitem.filter('.first').removeClass('first');
                            $pageitem.filter('.last').removeClass('last');

                            $pageitem.eq( firstIndexNumPagePoint ).addClass('first');
                            $pageitem.eq( lastIndexNumPagePoint ).addClass('last');
                        },

                        getCount: function() {

                            var count = $('li.number').length - 1;
                            return count;

                        },

                        clickEvent: function(e) {

                            e.preventDefault(); 

                            var $pageitem = $(this),
                                $pageitem_obj = $( 'li.number', $self ),
                                count = pagenumber.getCount();

                            if ( e.data !== null ) {
                                $pageitem = e.data.itemClick;
                            }

                            if ( ! $pageitem.hasClass('selected') ) {                                

                                if ( $pageitem.hasClass('first') || $pageitem.hasClass('navigation page_first') ) {
                                    pagenumber.firstItemSelected( $pageitem );
                                }

                                if ( $pageitem.hasClass('last') || $pageitem.hasClass('navigation page_last') ) {
                                    pagenumber.lastItemSelected( $pageitem );
                                }

                                $pageitem_obj.filter('.selected').removeClass('selected');

                                if ( ! $pageitem.hasClass('navigation') ) {
                                    $pageitem.addClass('selected');
                                }

                                else {

                                    if ( $pageitem.hasClass('page_first') ) {

                                        $pageitem_obj.eq(0).addClass('selected');

                                    }

                                    else {
                                        $pageitem_obj.eq(count).addClass('selected');
                                    }

                                }

                                options.pageitem_click( $pageitem_obj.filter('.selected').index( '.number' ) + 1 );

                            }
                        }

                    }

                    var navigationItem = {

                        ready: function () {
                            $( 'li.navigation', $self ).click(navigationItem.ClickEvent);
                        },

                        ClickEvent: function (e) {

                            e.preventDefault();                           

                            e.data = {};
                            e.data.itemClick = $(this);

                            pagenumber.clickEvent(e);

                        }
                    }

                    pagenumber.ready();
                    navigationItem.ready();                    

                    options.page_loadComplete();  
                }

            });
        }
    });

})(jQuery);
