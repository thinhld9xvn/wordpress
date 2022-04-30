import { slider } from './jquery.slider.js';
import { setupBookingForm } from './jquery.booking.js';
import { setupResponsive } from './jquery.responsive.js';
import { setupNavMobileMenu } from './jquery.mobile-menu.js';
import { setupChatBox } from './jquery.chatbox.js';
import { setupGallery } from './jquery.gallery.js';

jQuery(window).load(function() {    
    slider.ready();
    setupResponsive(); 
});

setupBookingForm();
setupNavMobileMenu();
setupChatBox();
setupGallery();