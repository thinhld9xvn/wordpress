export function onClick_selectColumnEvent(e) {

     //e.preventDefault();

     if ( e.target.type === 'checkbox' ) { }

     else {

         const $checkbox = jQuery(this).find('input[type=checkbox]');
         
         $checkbox.length && $checkbox.trigger('click');

     }

}