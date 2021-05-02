import { $searchPagination } from '../inits/inits.js';

export function selectPage(n) {

    const $items = $searchPagination.find("li");

    $items.filter(".active")
          .removeClass("active");

    $items.eq(n).addClass("active");

}

export function initPagination(length_items, 
                                pageSize, 
                                incremSlide, 
                                startPage, 
                                numberPage,
                                eventsCallback) {

    var $pagination_items = null,
        pageCount = 0,
        totalSlidepPage = 0,
        _incremSlide = 0,
        prev = null,
        next = null;

    const NEXT_LABEL = 'Suivant';
    const PREV_LABEL = 'Précédent';

    function slide(sens) {

        $pagination_items.hide();
    
        for (let t = startPage; t < incremSlide; t++) {
            $pagination_items.eq(t+1).show();
        }
        if (startPage == 0) {
            next.show();
            prev.hide();
        } else if (numberPage == totalSlidepPage) {
            next.hide();
            prev.show();
        } else {
            next.show();
            prev.show();
        }

        setNextButtonState();
    
        $pagination_items.eq(startPage + 1).find("> a").trigger('click');
    
    
    }   
     

    function setNextButtonState() {

        if ( $pagination_items.eq(startPage + _incremSlide + 1).length ) {

            next.show();

        }

        else {

            next.hide();
            
        }

    }

    function inititalize() {

        $searchPagination.html('');

        pageCount = length_items / pageSize;
        totalSlidepPage = Math.floor(pageCount / incremSlide);
        _incremSlide = incremSlide;
    
        for (var i = 0; i < pageCount; i++) {
            $searchPagination.append('<li><a href="#">' + (i + 1) + '</a></li> ');
            if (i > pageSize - 1) {
                $searchPagination.find("li:eq(" + i + ")").hide();
            }
        }        

        prev = jQuery("<li/>").addClass("prev").html(`<a href='#'>${PREV_LABEL}</a>`).click(function(e) {

            e.preventDefault();
    
            startPage -= _incremSlide;
            incremSlide -= _incremSlide;
            numberPage--;
    
            slide();
    
            //console.log(startPage);
    
            //jQuery("#js-pagination li:eq(" + (startPage + 1) + ") > a").trigger('click');
    
        });
    
        prev.hide();
    
        next = jQuery("<li/>").addClass("next").html(`<a href='#'>${NEXT_LABEL}</a>`).click(function(e) {
    
            e.preventDefault();
    
            /*console.log(startPage); 0
            console.log(pageSize); 20
            console.log(incremSlide); 5 */
    
            startPage += _incremSlide;
            incremSlide += _incremSlide;
            numberPage++;   
            
            //console.log(startPage);
            //console.log(incremSlide);
    
            slide();
    
    
        });        
    
        $searchPagination.prepend(prev).append(next);

        $pagination_items = $searchPagination.find("li");
    
        $pagination_items.eq(1).addClass("active");       
    
        $pagination_items.find('a').click(function(e) {        
    
            e.preventDefault();
    
            const pag_text = jQuery(this).text().trim().toLowerCase();
    
            $pagination_items.removeClass("active");
    
            jQuery(this).parent().addClass("active");
    
            if (pag_text !== PREV_LABEL.toLowerCase() && 
                    pag_text !== NEXT_LABEL.toLowerCase()) {
                
                eventsCallback.onSelectPaginationItem(parseInt(pag_text));
    
            }  
    
    
        });

        setNextButtonState();

    }  
    
    
    inititalize();

    

}