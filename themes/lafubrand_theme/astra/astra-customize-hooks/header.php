<?php

if ( ! function_exists('astra_polylang_switcher_mobile_markup') ) :

    function astra_polylang_switcher_mobile_markup() { ?>

            <ul class="l-bar lang-bar-mobile">
                <?php pll_the_languages(); ?>
            </ul>

<?php
    }

	add_action( 'astra_masthead_content', 'astra_polylang_switcher_mobile_markup', 5 );

endif;

if ( ! function_exists('astra_icons_mobile_markup') ) :

    function astra_icons_mobile_markup() { ?>

        <div class="above-header-searchbar -short mobile-header-searchbar hidden-laptop">

            <form method="get" action="<?php echo home_url( '/'); ?>">
                <input type="search" class="hidden" name="s" placeholder="Tìm kiếm ..." value="" />
                <button type="button" class="btnSearch">
                    <span class="fa fa-search"></span>
                </button>
            </form>

        </div>

        <a href="tel:+84981557998" class="phone hidden-laptop">
            <span class="fa fa-phone"></span>
        </a>

        <a href="#" class="catalogue hidden-laptop">
            <span class="fa fa-download"></span>
        </a>

<?php
    }

	add_action( 'astra_masthead_content', 'astra_icons_mobile_markup', 5 );

endif;