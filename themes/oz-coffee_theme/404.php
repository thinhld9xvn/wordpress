<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( "charset" ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />	
		<?php wp_head(); ?>
	</head>

    <body>

		<div class="page-404">

			<div class="wrapper flex-layout flex-direction-column flex-align-center">

				<h1>
					404
				</h1>

				<h3>
					Không tìm thấy trang !
				</h3>

				<p class="text">
					Trang đã bị xóa hoặc địa chỉ URL không đúng
				</p>

				<p class="back">
					<a href="<?= get_bloginfo('url') ?>" class="btnPrimaryLayout">
						QUAY VỀ TRANG CHỦ
					</a>
				</p>

			</div>

		</div>

	</body>

</html>