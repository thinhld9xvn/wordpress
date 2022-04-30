import { slider } from './jquery.slider.js';
import { reponsiveWindow } from './jquery.responsive.js';
import { setupNavMobileMenu } from './jquery.mobile-menu.js';
import { setupFilterBar } from './jquery.filterbar.js';
import { setupModal } from './jquery.modal.js';
import { setupLazyLoading } from './jquery.lazyloading.js';
import { resizeObject } from './jquery.resizeObject.js';
import { setupSearchbar } from './jquery.searchbar.js';

slider.ready();
resizeObject.ready();

reponsiveWindow();
setupNavMobileMenu();
setupFilterBar();
setupModal();
setupLazyLoading();
setupSearchbar();