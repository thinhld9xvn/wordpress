<?php 

    namespace Shortcodes;

    class ShortcodeCustomizeHomeCategoriesUtils {

        public static function render($attr) {

             /*$atts = shortcode_atts( array(
                    'foo' => 'no foo',
                    'baz' => 'default baz'
                ), $atts, 'bartag' );*/ 

            $priority_categories = \Products\ProductGetPriorityCategoriesUtils::get();

            if ( $priority_categories ) : ?>

                <div class="sidebar">

                    <div class="side-menu side-menu-inner animate-dropdown outer-bottom-xs tcenter-sm tcenter-xs">

                        <div class="hidden-lg hidden-md">

                            <button id="btnMegaMenuCatLists" class="hidden-lg hidden-md btnMegaMenuCatLists">
                                Catégories
                            </button>

                            <nav class="yamm megamenu-horizontal">

                                <ul class="nav">

                                    <?php foreach( $priority_categories as $key => $cat ) : ?>

                                        <li class="menu-item">
                                            <a href="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></a>
                                        </li>

                                    <?php endforeach; ?>

                                </ul>

                            </nav>

                        </div>

                        <nav class="yamm megamenu-horizontal active hidden-sm hidden-xs">

                            <ul class="nav flex flex-wrap flex-just-center">

                                <?php foreach( $priority_categories as $key => $cat ) : ?>

                                    <li class="menu-item">
                                        <a href="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></a>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </nav>

                    </div>

                </div>

        <?php endif;

        }

    }