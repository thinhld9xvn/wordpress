</section>
<!--./content-->

<footer class="vk-footer vk-footer--style-1">
    <?php if (is_page_template('page/vechungtoi.php') ||  is_page_template('page/project.php'))  : ?>
        <div class="vk-container">
            <div class="vk-footer__content">
                <div class="_left"><?php echo !empty(get_field('text_copyright', 'option')) ? get_field('text_copyright', 'option') : ''; ?></div>
                <div class="_right">
                    <ul class="vk-footer__list">
                        <?php
                        if (get_field('social', 'option')) :
                            foreach (get_field('social', 'option') as $key => $value) : ?>
                                <li><a href="<?php echo $value; ?>"><i class="fa fa-<?php echo $key; ?>"></i></a></li>
                            <?php endforeach;
                        endif;
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>
<!--./vk-footer-->
<nav class="d-lg-none" id="menu">
    <?php
    $locations = get_nav_menu_locations();
    $flatMainNav = wp_get_nav_menu_items($locations['header-menu']);
    $mainNav = buildTree($flatMainNav);
    ?>
    <ul class="">
        <?php foreach ($mainNav as $key => $menu_main) : ?>
            <?php if (!empty($menu_main->children)) : ?>
                <li>
                    <a href="<?php echo $menu_main->url; ?>"><?php echo $menu_main->title; ?></a>
                    <ul class="">
                        <?php foreach ($menu_main->children as $value) : ?>
                            <li><a href="<?php echo $value->url; ?>" data-scroll-to="<?php echo $value->url; ?>"
                                   data-scroll-offset="0"><?php echo $value->title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?php echo $menu_main->url; ?>"><?php echo $menu_main->title; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>


    </ul>
</nav>
<div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
    <a href="tel:0983960012" title="Liên hệ nhanh">
        <div class="quick-alo-ph-img-circle"></div>
    </a>
</div>
</div>

<!--./main-wrapper-->

<script>
    var loadDeferredStyles = function () {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    if (raf) raf(function () {
        window.setTimeout(loadDeferredStyles, 0);
    });
    else window.addEventListener('load', loadDeferredStyles);
</script>


<?php wp_footer(); ?>
<a id="scrollUp" href="#top" style="position: fixed; z-index: 1; display: none;"><i class="fa fa-angle-up"></i></a>
<script>
    jQuery(document).ready(function ($) {
        $('.scroll-link').on('click',function(e) {
            e.preventDefault();
            fullpage_api.moveSectionDown();
        });

    })

</script>
<!--<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">-->
<!--    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
<!--    (function(){-->
<!--        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
<!--        s1.async=true;-->
<!--        s1.src='https://embed.tawk.to/5d355b529b94cd38bbe8932b/default';-->
<!--        s1.charset='UTF-8';-->
<!--        s1.setAttribute('crossorigin','*');-->
<!--        s0.parentNode.insertBefore(s1,s0);-->
<!--    })();-->
<!--</script>-->
<!--<!--End of Tawk.to Script-->
</body>
</html>