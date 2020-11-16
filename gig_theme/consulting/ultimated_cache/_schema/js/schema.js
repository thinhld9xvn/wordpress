function responseMessage( msg ) {

  var parent = $('#schema-rating-star'),
      obj = parent.find('#schema-rating-response');  

  if ( obj.length === 0 ) {
    
    $('<div id="schema-rating-response">' + msg + '</div>').appendTo( parent );

    return true;

  }  

  obj.html( msg );

}

// schema rating star
$(document).ready(function(){  
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#schema-rating-star #stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Bạn đã đánh giá " + ratingValue + " sao. Cảm ơn bạn !";
    }
    else {
        msg = "Bạn đã đánh giá " + ratingValue + " sao. Chúng tôi sẽ cải thiện nhiều hơn !";
    }

    responseMessage(msg);

    $('#stars li').off('click')
                  .off('mouseover')
                  .off('mouseout');
    
  });
  
  
});