jQuery(document).ready(function( $ ) {
 "use strict";
 
        var countdown_select = $("[data-countdown]");
        countdown_select.each(function(){
            $(this).countdown($(this).data('countdown'))
            .on('update.countdown', function(e){
                var format = '%H : %M : %S';
				

					if (e.offset.totalDays > 0) {
						format = '%d Day%!d '+format;
					}
					if (e.offset.weeks > 0) {
						format = '%w Week%!w '+format;
					}
				
                
                $(this).html(e.strftime(''

     + '<div class="box-time-date"><span class="time-num time-day">%D</span> ' + translate.day +'%!d</div>'
     + '<div class="box-time-date"><span class="time-num">%H</span> ' + translate.hrs +'</div>'
     + '<div class="box-time-date"><span class="time-num">%M</span>' + translate.mins +'</div>'
     + '<div class="box-time-date"><span class="time-num">%S</span>' + translate.secs +'</div>'));
				
            });

        }).on('finish.countdown', function(e){
            $(this).html('This offer has expired!').addClass('disabled');
        });
		
}); 