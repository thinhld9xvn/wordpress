<?php $searchbutton = get_theme_mod('dealsdot_header_search_button','0'); ?>
<?php if($searchbutton == '1'){ ?>
<div class="search-area">
	<?php get_product_search_form(); ?>
</div>
<?php } ?>