import { onClick_chooseThumbnailProductEvent } from './handleEvents/onClick_chooseThumbnailProductEvent.js'; 

import { onClick_getCoordiateAsyncEvent } from './handleEvents/onClick_getCoordiateAsyncEvent.js';

import { onClick_toggleTabItemsEvent } from './handleEvents/onClick_toggleTabItemsEvent.js';

import { onClick_chooseExcelFileEvent } from './handleEvents/onClick_chooseExcelFileEvent.js';

import { onClick_updateShopListsEvent } from './handleEvents/onClick_updateShopListsEvent.js';

import { onClick_chooseExcelCategoriesFileEvent } from './handleEvents/onClick_chooseExcelCategoriesFileEvent.js';

import { onClick_updateCategoriesListsEvent } from './handleEvents/onClick_updateCategoriesListsEvent.js';

import { onClick_addNewStoreEvent } from './handleEvents/onClick_addNewStoreEvent.js';

import { onClick_removeSelectedRowsEvent } from './handleEvents/onClick_removeSelectedRowsEvent.js';

import { onClick_createStoresAccountEvent } from './handleEvents/onClick_createStoresAccountEvent.js';

import { onClick_editCellEvent } from './handleEvents/onClick_editCellEvent.js';

import { onClick_selectColumnEvent } from './handleEvents/onClick_selectColumnEvent.js';

import { onKeyDown_unfocusCellEvent } from './handleEvents/onKeyDown_unfocusCellEvent.js';

import { onBlur_unfocusCellEvent } from './handleEvents/onBlur_unfocusCellEvent.js';

import { onChange_selectCheckboxEvent } from './handleEvents/onChange_selectCheckboxEvent.js';

import { onClick_showStoreDetailsEvent } from './handleEvents/onClick_showStoreDetailsEvent.js';

import { onModalShown_showModalEvent } from './handleEvents/onModalShown_showModalEvent.js';

import { onModalHidden_hideModalEvent } from './handleEvents/onModalHidden_hideModalEvent.js';

import { onModalHidden_hideDetailsStoreModalEvent } from './handleEvents/onModalHidden_hideDetailsStoreModalEvent.js';

import { commercants_lists_data, setCommercantsListsData } from './inits/inits.js';

import { setupStorePage } from './utils/setupStorePageUtils.js';

const $tblCommercants = jQuery('#tblCommercants');

jQuery(document).on('click', '.galleries .item', onClick_chooseThumbnailProductEvent);

jQuery('.btnGetCoordiates').click(onClick_getCoordiateAsyncEvent);

jQuery('.tabbles > a').click(onClick_toggleTabItemsEvent);    

//jQuery('.btnUploadFile').click(onChooseFile);
jQuery('#btnImportShopLists').click(onClick_chooseExcelFileEvent);
jQuery('#btnUpdateShopLists').click(onClick_updateShopListsEvent);

jQuery('#btnImportProductCategories').click(onClick_chooseExcelCategoriesFileEvent);
jQuery('#btnUpdateProductCategories').click(onClick_updateCategoriesListsEvent);  

jQuery('#btnAddNewStore').click(onClick_addNewStoreEvent);

jQuery('#btnRemoveStores').click(onClick_removeSelectedRowsEvent);

jQuery('#btnCreateStoresAcc').click(onClick_createStoresAccountEvent);

$tblCommercants.on('click', 'tbody td', onClick_editCellEvent);
$tblCommercants.on('click', 'tbody td', onClick_selectColumnEvent);

jQuery(document).on('keydown', '#tblCommercants tbody td', onKeyDown_unfocusCellEvent)
            .on('blur', '#tblCommercants tbody td', onBlur_unfocusCellEvent)        
            .on('change', '#tblCommercants .chkSelectRow', onChange_selectCheckboxEvent)
            .on('click', '#tblCommercants .btnRowDetails', onClick_showStoreDetailsEvent);

jQuery('.modal').on('shown.bs.modal', onModalShown_showModalEvent);

jQuery('.modal').on('hidden.bs.modal', onModalHidden_hideModalEvent);

jQuery('#detailsStoreModal').on('hidden.bs.modal', onModalHidden_hideDetailsStoreModalEvent);

jQuery.fn.modal.Constructor.prototype.enforceFocus = function() {};  

__dt_shop_lists.length &&
    setCommercantsListsData( JSON.parse( JSON.stringify( __dt_shop_lists ) ) );

jQuery('.tabbles > a').eq(0)
                      .trigger('click');

setupStorePage();

