jQuery(function($) {

var $tables = $('.aticlepagebox').find('table');

$tables.each(function(k, obj) {
		
	$(this).removeAttr('width')
		   .removeAttr('style');		   
		   
	$(this).find('colgroup').remove();
		   
	$(this).find('tr').removeAttr('class')
					  .removeAttr('style')
					  .css({
					  		 'width' : '',
					  		 'height' : ''
					  	   });
					  
	$(this).find('td').removeAttr('class')
					  .removeAttr('width')
					  .removeAttr('height')
					  .css({
					  		 'width' : '',
					  		 'height' : ''
					  	   });	

});

});