<?php 	

	$mydb = $this->mydb;	

	$languages = $_SESSION['qtranslate_languages']; 



	$option = $mydb->check_all_contents_lang_default(); ?>



<div class="col-wrap">



    <div class="navtab-content">



		<h3>
			<?php echo $themehelper->translate("Thiết lập nâng cao"); ?>
		</h3>



		<div id="col-left">



			<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">



				<div class="qtranslate-groupbox">


						<label for="qtranslate_set_all_default">

							<input id="qtranslate_set_all_default" 

								   name="qtranslate_advanced_settings" 

								   type="radio" 

								   value="set_all_default" />

							<span>
								<?php echo $themehelper->translate("Thiết lập ngôn ngữ mặc định cho tất cả các nội dung đã tạo chưa đặt ngôn ngữ"); ?>
							</span>

						

							<p class="padleft25">



								<span>
									( <?php echo $themehelper->translate("Áp dụng cho tất cả bài viết, trang, danh mục, terms"); ?> )
								</span>



								<select name="slQtransDefLangCode"

										class="mtop10">



									<?php foreach( $languages as $lang ) : ?>



										<option value="<?php echo $lang->code ?>">

											<?php echo $lang->name ?>

										</option>



									<?php endforeach; ?>

									

								</select>



							</p>



						</label>


						<?php if ( '1' == $option ) : ?>

							<img class="vmiddle" 

								 src="<?php echo DEFAULT_BASE64_SRC ?>" />



							<span class="vmiddle mleft10">

								<?php echo $themehelper->translate("Tất cả nội dung đã được thiết lập ngôn ngữ mặc định.") ?>

							</span>				


						<?php endif; ?>


				</div>

					<div class="qtranslate-groupbox mtop20">



						<button type="submit" name="btnAdvancedSettingsSubmit" class="button button-primary">

							<?php echo $themehelper->translate("Thiết lập"); ?>

						</button>



					</div>			



			</form>



		</div>



	</div>



</div>