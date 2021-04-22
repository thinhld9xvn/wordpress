export function onKeyDown_checkMaxLengthTextEvent(e) {

    const $this = jQuery(this),
              maxLength = parseInt( $this.attr('maxlength') ),
              v = $this.val();
    
    if ( v.length === maxLength ) {

        return false;

    }
    
}