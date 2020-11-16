
    <div class="above-header-slogan">
        <?= $slogan ?>
    </div>

    <div class="above-header-catalogue-button">
        <a href="#">
            <span class="fa fa-download"></span>
            <span><?= $button_download ?></span>
        </a>
    </div>

    <div class="above-header-searchbar -wide">    

        <form method="get" action="<?php echo home_url( '/'); ?>">
            <input type="search" name="s" placeholder="Tìm kiếm ..." value="" />
            <button type="submit" class="btnSearch">
                <span class="fa fa-search"></span>
            </button>
        </form>

    </div>

    <div class="above-header-searchbar -short">    
        
        <form method="get" action="<?php echo home_url( '/'); ?>">
            <input type="search" class="hidden" name="s" placeholder="Tìm kiếm ..." value="" />
            <button type="button" class="btnSearch">
                <span class="fa fa-search"></span>
            </button>
        </form>

    </div>

    <div class="above-header-phone">
        <span class="fa fa-phone"></span>
        <a href="tel:<?= $phone_url ?>">
            <?= $phone_text ?>
        </a>
    </div>

    <div class="above-header-polylang">
        <?php 
            pll_the_languages(array(
                'dropdown' => true
            ));
        ?>
    </div>