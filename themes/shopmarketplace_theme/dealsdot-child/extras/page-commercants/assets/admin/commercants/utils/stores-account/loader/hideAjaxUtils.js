export function hideAjax() {

    const $this = jQuery(this),
          $wrapper = $this.closest('.tabbles-nav'),
          $table_wrapper = $this.closest('.table-wrapper');

    $wrapper.removeClass('__gap');

    $wrapper.find('.store-notify').remove();
    
    $table_wrapper.removeClass('disabled');

}