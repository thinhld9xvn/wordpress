import { onClick_toggleNavMobileMenuEvent } from '../handleEvents/onClick_toggleNavMobileMenuEvent.js';

export function setupNavMobileMenu() {

    jQuery('#nav-mobile-button').click(onClick_toggleNavMobileMenuEvent);   

}

