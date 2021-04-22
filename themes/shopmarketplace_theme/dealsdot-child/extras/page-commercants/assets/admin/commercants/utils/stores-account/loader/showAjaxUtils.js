export function showAjax() {

    const $this = jQuery(this),
          $wrapper = $this.closest('.tabbles-nav'),
          $table_wrapper = $this.closest('.table-wrapper');

    $wrapper.addClass('__gap');
    $wrapper.append(`<div class="store-notify">
                        <div><span id="lblAjaxCaption"><span class="msg"></span> <span class="current"></span>/<span class="length"></span></span> ...</div>                                
                    </div>`);

    $table_wrapper.addClass('disabled');

}