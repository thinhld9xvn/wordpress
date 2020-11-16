<!-- pvcf-template-field -->
<div class="pvcf-field pvcf-field-box postbox pvcf-template-field mtop20">

	<button type="button" class="button-link pvcf-collapse-button pvcf-collapse-box">
		<span class="screen-reader-text">Toggle panel: Thông tin trường</span>
		<span class="toggle-indicator"></span>
	</button>

	<!-- pvcf-field-section-title -->
	<h2 class="pvcf-field-section-title pvcf-handle pvcf-handle-title  pvcf-collapse-box">
		<strong>
			Thông tin trường 
			<span class="title"></span>
			<span class="require"></span>
			<span class="type"></span>
		</strong>
	</h2>

	<!-- pvcf-field-section -->
	<div class="pvcf-field-section-body inside mtop20">

		<!-- pvcf-field-cg -->
		<div class="pvcf-field-cg">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">
				Tiêu đề hiển thị
			</div>
			<!-- #pvcf-field-label -->

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">
				<input type="text" class="pvcf-field-title" name="pv-contact-form-field[%index][pvcf-field-title]" value="" />
			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-cg -->

		<!-- pvcf-field-cg -->
		<div class="pvcf-field-cg mtop10">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">
				Tên trường
			</div>
			<!-- #pvcf-field-label -->

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">
				<input type="text" class="pvcf-field-name" name="pv-contact-form-field[%index][pvcf-field-name]" value="" />
			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-cg -->

		<!-- pvcf-field-cg -->
		<div class="pvcf-field-cg mtop10">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">
				Class của trường
			</div>
			<!-- #pvcf-field-label -->

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">
				<input type="text" class="pvcf-field-class" name="pv-contact-form-field[%index][pvcf-field-class]" value="" />
			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-cg -->

		<!-- pvcf-field-cg -->
		<div class="pvcf-field-cg mtop10">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">
				Class của đối tượng cha bao quanh trường
			</div>
			<!-- #pvcf-field-label -->

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">
				<input type="text" class="pvcf-field-parent-class" name="pv-contact-form-field[%index][pvcf-field-parent-class]" value="" />
			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-cg -->

		<!-- pvcf-field-cg -->
		<div class="pvcf-field-cg mtop10">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">
				Kiểu dữ liệu
			</div>
			<!-- #pvcf-field-label -->

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">

				<select class="sl-pvcf-field-type">
					<option value="null">Trống</option>
					<option value="select">Hộp lựa chọn</option>
					<option value="textbox">Hộp văn bản một dòng</option>
					<option value="textarea">Hộp văn bản nhiều dòng</option>			            						
					<option value="email">Hộp nhập email</option>
					<option value="tel">Hộp nhập số điện thoại</option>
					<option value="hiddenfield">Hộp văn bản ẩn</option>
					<option value="submit">Nút submit</option>
				</select>

				<input type="hidden" class="pvcf-field-type-value-hidden" name="pv-contact-form-field[%index][pvcf-field-type][value]" value="">
				<input type="hidden" class="pvcf-field-type-text-hidden" name="pv-contact-form-field[%index][pvcf-field-type][text]" value="">

			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-cg -->

		<!-- pvcf-field-cg -->
		<div class="pvcf-field-cg pvcf-field-cg-hidden pvcf-field-select-cg select mtop10 hidden">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">

				<p>Dữ liệu hộp chọn</p>

				<p>

				  Cú pháp: [value] : [text] <br/>
				  Ví dụ: </p>

				<p style="padding: 0 0 0 10px">
				  red : Màu đỏ <br/>
				  green : Màu xanh

				</p>
			</div>
			<!-- #pvcf-field-label -->		            			

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">

				<textarea class="txt-pvcf-select-options" rows="10"></textarea>

				<input type="hidden" name="pv-contact-form-field[%index][pvcf-field-select-options]" value="">

			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-cg -->

		<!-- pvcf-field-textarea-cg -->
		<div class="pvcf-field-cg pvcf-field-cg-hidden textarea pvcf-field-textarea-cg mtop10 hidden">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">

				<p>Số dòng</p>
				
			</div>
			<!-- #pvcf-field-label -->		            			

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">
				
				<input type="text" name="pv-contact-form-field[%index][pvcf-field-textarea-rows]" value="">

			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-textarea-cg -->

		<!-- pvcf-field-require-cg -->
		<div class="pvcf-field-cg pvcf-field-cg-hidden select textarea textbox email tel pvcf-field-require-cg mtop10">

			<!-- pvcf-field-label -->
			<div class="pvcf-field-label">
				Tùy chọn nâng cao
			</div>		            					
			<!-- #pvcf-field-label -->		            			

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">

				<label>
					<input type="checkbox" class="pvcf-field-required-checkbox vmiddle" />
					<span class="vmiddle">Trường bắt buộc phải nhập</span>
				</label>

				<input type="hidden" name="pv-contact-form-field[%index][pvcf-field-require]" value="">

			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-require-cg -->

		<!-- pvcf-field-remove-cg -->
		<div class="pvcf-field-cg pvcf-field-remove-cg mtop20">		            				

			<!-- pvcf-field-input -->
			<div class="pvcf-field-input">

				<button type="button" class="button button-default pvcf-button pvcf-button-remove-field">
					<img class="vmiddle" src="<?php echo PVCF_DIRECTORY_IMG . '/pvcf_remove.png' ?>" alt="pvcf-remove-field" />
					<span class="vmiddle">Xóa trường</span>
				</button>

			</div>
			<!-- #pvcf-field-input -->

		</div>
		<!-- #pvcf-field-remove-cg -->

	</div>
	<!-- pvcf-field-section -->

</div>
<!-- #pvcf-template-field -->