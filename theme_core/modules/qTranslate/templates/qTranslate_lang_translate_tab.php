<?php 

	  $mydb = $this->mydb;



	  $active_lang = $_SESSION['qtranslate_active_lang']; 



	  $language_packages = $_SESSION['qtranslate_languages'];

	  $lang_package = ''; 



	  $index = 0; ?>



<div class="col-wrap">



    <div class="navtab-content">



		<h3>
			<?php echo $themehelper->translate("Dịch chuỗi ngôn ngữ"); ?>
		</h3>



		<div class="fullwidth-section">



			<div class="qtranslate-groupbox">



				<button type="button" 

						class="btnAddStrTranslate button button-default">

					<img class="vmiddle" src="<?php echo ADD_BASE64_SRC ?>" />

					<span class="vmiddle">
						<?php echo $themehelper->translate("Thêm chuỗi dịch"); ?>
					</span>

				</button>



				<div class="qtranslate-tfilter-groupbox pull-right">



					<span>
						<?php echo $themehelper->translate("Tìm kiếm"); ?>
					</span>

					<input type="text" 

						   class="qtranslate-tfilter w400" 

						   placeholder="<?php echo $themehelper->translate("Mời nhập"); ?>..." 

						   value="" />



				</div>



				<div class="clearfix"></div>



			</div> 



			<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">



				<table id="tblStrTranslate" class="wp-list-table widefat fixed striped tblStrTranslate mtop35 w100p">



					<thead>



						<tr>

							<th>

								<a href="#">
									<?php echo $themehelper->translate("Chuỗi nguồn"); ?>
								</a>

							</th>

							<th width="150" class="tcenter">

								<a href="#">
									<?php echo $themehelper->translate("Ngôn ngữ đích"); ?>
								</a>

							</th>

							<th>

								<a href="#">
									<?php echo $themehelper->translate("Chuỗi đích"); ?>
								</a>

							</th>

							<th width="60">

							</th>

						</tr>



					</thead>



					<tbody>



						<tr class="row-template rowhidden">

							<th>

								<input id="_qtranslate_strings[%index][src]" 

									   name="_qtranslate_strings[%index][src]" 

									   type="text" 

									   class="qtranslate_string_src w100p" />

							</th>



							<th class="">

							  	<?php	foreach ( $language_packages as $language ) : ?>

							  				<div class="mtop10">

							  					<img class="vmiddle" src="<?php echo $lang_helper->get_flag_language( $language->locale ) ?>" />

												<span class="vmiddle">

													<?php echo $language->name ?>

												</span>

											</div>

								<?php 	endforeach; ?>



							</th>



							<th>								



								<?php	foreach ( $language_packages as $language ) : ?>



											<div class="mtop10">

												<input id="_qtranslate_strings[%index][dest][<?= $language->code ?>]" 

													   name="_qtranslate_strings[%index][dest][<?= $language->code ?>]" 

													   type="text" 

													   class="w100p" />

											</div>



								<?php	endforeach; ?>									 



							</th>



							<th>								



								<img class="vmiddle btnQtranslateRemoveString cpointer" src="<?php echo REMOVE_BASE64_SRC ?>" />

								

							</th>



						</tr>



						<?php 							

							$t_strings = $mydb->get_all_translate_strings();							



							foreach ( $t_strings as $t_string ) : ?>



								<tr class="row">



									<th>

										<input id="qtranslate_strings[<?= $index ?>][src]" 

											   name="qtranslate_strings[<?= $index ?>][src]" 

											   type="text" 

											   class="qtranslate_string_src w100p" 

											   value="<?php echo $t_string['string_name'] ?>" />

									</th>



									<th class="">



									  	<?php	foreach ( $language_packages as $language ) : ?>



									  				<div class="mtop10">

									  					<img class="vmiddle" src="<?php echo $lang_helper->get_flag_language( $language->locale ) ?>" />

														<span class="vmiddle">

															<?php echo $language->name ?>

														</span>

													</div>



										<?php 	endforeach; ?>



									</th>



									<th>										



										<?php 

												foreach ( $language_packages as $language ) : ?>



													<div class="mtop10">



														<input id="qtranslate_strings[<?= $index ?>][dest][<?= $language->code ?>]" 

															   name="qtranslate_strings[<?= $index ?>][dest][<?= $language->code ?>]" 

															   type="text" 

															   class="w100p" 

															   value="<?php echo $t_string["string_value_$language->code"] ?>" />



													</div>



										<?php	endforeach; ?>											  



									</th>



									<th>								



										<img class="vmiddle btnQtranslateRemoveString cpointer" src="<?php echo REMOVE_BASE64_SRC ?>" />

										

									</th>



								</tr>



					  <?php 	$index++;

					  		endforeach; ?>



					</tbody>



					<tfoot>



						<tr>

							<th>

								<a href="#">
									<?php echo $themehelper->translate("Chuỗi nguồn"); ?>
								</a>

							</th>

							<th width="150" class="tcenter">

								<a href="#">
									<?php echo $themehelper->translate("Ngôn ngữ đích"); ?>
								</a>

							</th>

							<th>

								<a href="#">
									<?php echo $themehelper->translate("Chuỗi đích"); ?>
								</a>

							</th>

							<th width="60">

							</th>

						</tr>



					</tfoot>



				</table>



				<div class="qtranslate-groupbox mtop20">



					<button type="button" 

							class="btnAddStrTranslate button button-default">

						<img class="vmiddle" src="<?php echo ADD_BASE64_SRC ?>" />

						<span class="vmiddle">
							<?php echo $themehelper->translate("Thêm chuỗi dịch"); ?>
						</span>

					</button>



					<div class="qtranslate-tfilter-groupbox pull-right">



						<span>
							<?php echo $themehelper->translate("Tìm kiếm"); ?>
						</span>

						<input type="text" 

							   class="qtranslate-tfilter w400"

							   placeholder="<?php echo $themehelper->translate("Mời nhập"); ?>..." 

							   value="" />



					</div>



					<div class="clearfix"></div>



				</div> 

			

				<div class="qtranslate-groupbox mtop40">



					<button type="submit" 

							name="btnSubmitStrTranslate" 

							class="btnSubmitStrTranslate button button-primary">

						 <?php echo $themehelper->translate("Lưu thông tin"); ?>

					</button>



				</div>



			</form>



		</div>



	</div>



</div>

