import { setupFilterSliderOnSidebar } from './utils/setupFilterSliderOnSidebarUtils.js';

import { setupTestimolatesSlider } from './utils/setupTestimolatesSliderUtils.js';

import { setupToggleSearchButton } from './utils/setupToggleSearchButtonUtils.js';

import { setupExpandCategoriesListOnSidebar } from './utils/setupExpandCategoriesListOnSidebarUtils.js';

import { setupSearchBar } from './utils/setupSearchBarUtils.js';

import { setupSalesPriceBox } from './utils/setupSalesPriceBoxUtils.js';

import { setupNavMobileMenu } from './utils/setupNavMobileMenuUtils.js';

import { setupLoadProductsInSlider } from './utils/setupLoadProductsInSliderUtils.js';

import { setupUserLocation } from './utils/setupUserLocationUtils.js';

import { setupProductsFilterBar } from './utils/setupProductsFilterBarUtils.js';

import { setupFilterNavigation } from './utils/setupFilterNavigationUtils.js';

import { setupMegaMenuCategories } from './utils/setupMegaMenuCategoriesUtils.js';

import { setupToggleWidgetOnMobile } from './utils/setupToggleWidgetOnMobileUtils.js';

jQuery(function($) {

    setupFilterSliderOnSidebar();

    setupTestimolatesSlider();

    setupNavMobileMenu();    

    setupSalesPriceBox();
    
    setupToggleSearchButton();

    setupExpandCategoriesListOnSidebar();

    setupSearchBar();    

    setupLoadProductsInSlider();    

    setupUserLocation();

    setupProductsFilterBar();

    setupFilterNavigation();  
    
    setupMegaMenuCategories();

    setupToggleWidgetOnMobile();
    

})

