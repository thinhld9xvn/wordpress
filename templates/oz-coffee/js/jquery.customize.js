import { slider } from './jquery.slider.js';
import { reponsiveWindow } from './jquery.responsive.js';
import { setupNavMobileMenu } from './jquery.mobile-menu.js';
import { setupFilterBar } from './jquery.filterbar.js';
import { setupModal } from './jquery.modal.js';

slider.ready();

reponsiveWindow();
setupNavMobileMenu();
setupFilterBar();
setupModal();