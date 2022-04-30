import { slider } from './jquery.slider.js';
import { reponsiveWindow } from './jquery.responsive.js';
import { setupNavMobileMenu } from './jquery.mobile-menu.js';
import { tabsList } from './jquery.tabslist.js'; 
import { setupVideo } from './jquery.video.js';
import { setupSidebar } from './jquery.sidebar.js';
import { setupFaqs } from './jquery.faqs.js';

reponsiveWindow();
setupNavMobileMenu();
setupVideo();
setupSidebar();
setupFaqs();

jQuery(window).load(function() {
    slider.ready();
})

tabsList.ready();
