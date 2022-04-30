import { slider } from './jquery.slider.js';
import { reponsiveWindow } from './jquery.responsive.js';
import { setupNavMobileMenu } from './jquery.mobile-menu.js';
import { tabsList } from './jquery.tabslist.js'; 
import { setupSearchBar } from './jquery.searchbar.js';
import { setupShoppingCarts } from './jquery.shoppingcart.js';
import { setupBanksListLogo } from './jquery.banksListLogo.js';
import { setupPopupMarker } from './jquery.modal.js';

slider.ready();
tabsList.ready();
reponsiveWindow();
setupNavMobileMenu();
setupSearchBar();
setupShoppingCarts();
setupBanksListLogo();
setupPopupMarker();