<!-- vragen-groupbox -->
<div class="vragen-groupbox mtop40-ms mtop20-xs">

	<?php
		$args = array(
			'post_type' => 'page',
			'child_of' => $post->ID,
			'hierarchical' => 0,
			'parent' => $post->ID,
			'sort_order' => 'asc',
			'sort_column' => 'post_date',
		);

		$child_pages = get_pages( $args );

		foreach ( $child_pages as $c_page ) : ?>

			<a class="mybutton mybutton-danger padwrap -tshadow -normal" 
			   href="<?php echo get_page_link( $c_page ); ?>">
				<?php echo $c_page->post_title; ?>
			</a>

	<?php endforeach; ?>							

</div>
<!-- #vragen-groupbox -->

					