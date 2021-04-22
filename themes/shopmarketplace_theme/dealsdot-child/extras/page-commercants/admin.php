<?php

	require_once dirname(__FILE__) . '/simplexlsx/SimpleXLSX.php';
	//require_once dirname(__FILE__) . '/events/shop-lists-event.php';
	//require_once dirname(__FILE__) . '/events/shop-categories-event.php'; 

  $messages = \MessageNotification\MessageGetUtils::get_all();
		
	//extract($messages); 

	$commercants_list = \Commercants\CommercantGetListUtils::get(); 

  //echo "<pre>"; print_r($commercants_list);

	$args = array(

		'taxonomy' => PRODUCT_TAXONOMY,
		'hide_empty' => false

	);

	$categories_list = get_terms($args);

	$recent_update = get_option(_COM_OPTION_RECENT_UPDATE);
	$recent_update = empty( $recent_update ) || FALSE === $recent_update ? '' : $recent_update; ?>

<div id="commercants-page">	

	<h2><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::COMMERCANTS_MANAGEMENTS_LABEL_ID] ?></h2>

	<div class="metabox-wrapper mtop20">

		<div class="tabbles">

	        <a class="active" href="#">
	            <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_LISTS_LABEL_ID] ?>
	        </a>
	        
	        <a href="#">
            <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PRODUCT_CATEGORIES_LABEL_ID] ?>
	        </a>

	    </div>

	    <div class="tabbles-nav">

	    	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=unicorn-faq' ?>">

		    	<div class="tabbles-content show">				
				    
					<?php include dirname(__FILE__) . '/templates/shop_lists_tab.php'; ?>

				</div>

				<div class="tabbles-content">
			
					<?php include dirname(__FILE__) . '/templates/product_categories_tab.php'; ?>

				</div>

			</form>

		</div>
		    
	</div>

</div>

<div class="ajaxLoadingWrapper">
    <div>
        <span><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::LOADING_DATA_MSG_ID] ?></span>
        <span class="spinner show"></span>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newStoreModal" tabindex="-1" role="dialog" aria-labelledby="newStoreModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newStoreModalHeading"><?=  $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CREATE_THE_NEW_STORE_LABEL_ID] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="<?= \Stores\STORE_DATA::STORE_FORM_NEW_ID ?>" 
              class="frmAdminStore" 
              method="post"
              action="">

            <?php 

              $options = array(

                  \Stores\STORE_OPTIONS_FIELDS::FORM_SUBMIT => $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SAVE_YOUR_ACCOUNT_AND_STORE_DETAILS_LABEL_ID],
                  \Stores\STORE_OPTIONS_FIELDS::FORM_ACTION => \Stores\STORE_DATA::STORE_NEW_ACTION

              );

              (new \Stores\UC_Store_Form($options))->print_form_fields(); ?>

        </form>             
            
      </div>     
      
    </div>
  </div>
</div>

<div class="modal fade" id="detailsStoreModal" tabindex="-1" role="dialog" aria-labelledby="detailsStoreModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsStoreModalHeading"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_DETAILS_LABEL_ID] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  	<form id="frmDetailsStore" class="frmAdminStore" method="post" action=""></form>
            
      </div>     
      
    </div>
  </div>
</div>

