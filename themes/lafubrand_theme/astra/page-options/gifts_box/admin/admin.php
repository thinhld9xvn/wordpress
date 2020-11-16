<?php $option_meta = $this->option_meta; ?>

<div class="lafubrand-gifts-box-wrapper">

	<div class="container">

		<div class="lafu-toolbar">

			<a class="btn btn-primary btnShowBannerDialog -newbanner" data-banner-action="new" href="#">

				<span class="dashicons dashicons-welcome-add-page"></span> 
				Tạo banner
				
			</a>
			

			<a class="btn btn-primary btnUpdateToServer" href="#">

				Cập nhật
				
			</a>

		</div>

		<div class="lafu-main">

			<table id="lafu-tbl-banner-lists" class="lafu-table-layout">

				<tr>

					<th>
						STT
					</th>

					<th>
						Tên banner
					</th>

					<th>
						Ảnh banner
					</th>

					<th>
					</th>
					
				</tr>

				<tr>

					<!--<td>1</td>
					<td>Banner 1</td>
					<td>
						<img src="https://testing.lafubrand.com/wp-content/uploads/2020/09/thiet-ke-web1.jpg"
							 alt=""
							 height="50" />
					</td>
					<td>
						<a href="#">
							<span class="dashicons dashicons-welcome-write-blog"></span>
						</a>

						<a href="#">
							<span class="dashicons dashicons-welcome-comments"></span>
						</a>
					</td>-->
					
				</tr>
				
			</table>

		</div>
		
	</div>
	
</div>

<div id="bannerDialog" class="modal bannerDialog" data-backdrop="static"  tabindex="-1" role="dialog">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title -newbanner">Hộp thoại tạo banner</h5>
        <h5 class="modal-title -editbanner">Hộp thoại sửa banner</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">

      		<div class="input-box">

      			<label>
      				Tên banner
      			</label>

      			<div class="box-content">

      				<input id="txtBannerName" type="text" class="form-control w400p mleft20 txtBannerName" value="" />
      				<input id="txtEditBannerName" type="text" class="form-control w400p mleft20 txtBannerName" value="" />

      			</div>
      			
      		</div>

      		<div class="input-box">

      			<label>
      				URL
      			</label>

      			<div class="box-content">

      				<input id="txtBannerURL" type="text" class="form-control w400p mleft20 txtBannerURL" value="" />
      				<input id="txtEditBannerURL" type="text" class="form-control w400p mleft20 txtBannerURL" value="" />

      			</div>
      			
      		</div>

      		<div class="input-box">

      			<label>
      				Phương thức hiển thị khi nhấn chọn banner
      			</label>

      			<div class="box-content">

      				<select id="slUrlTargetMethod" class="slUrlTargetMethod form-control w400p mleft20">
      					<option value='_blank'>Hiển thị trên tab mới (mặc định)</option>
      					<option value='_self'>Hiển thị đè lên tab đang mở</option>
      				</select>

      				<select id="slEditUrlTargetMethod" class="slUrlTargetMethod form-control w400p mleft20">
      					<option value='_blank'>Hiển thị trên tab mới (mặc định)</option>
      					<option value='_self'>Hiển thị đè lên tab đang mở</option>
      				</select>      				

      			</div>
      			
      		</div>

      		<div class="input-box">

      			<label>
      				Ảnh banner
      			</label>

      			<div class="box-content chooseBannerBox flex-vertical-middle">

      				<img id="imgBanner" class="imgBanner" src="" alt="" />
      				<img id="imgEditBanner" class="imgBanner" src="" alt="" />

      				<button class="button button-default btnChooseBannerImage media_upload">

      					Mời chọn ảnh
      					
      				</button>

      			</div>
      			
      		</div>

      		<div class="input-box">

      			<label>
      				Vị trí đặt banner
      			</label>

      			<div class="box-content">

      				<table class="lafu-table-layout -setbanner">

      					<tr>

	      					<th>
	      						Danh mục
	      					</th>

	      					<th>
	      						
	      					</th>

	      					<th>
	      						Chủ đề
	      					</th>

	      					<th>
	      						
	      					</th>

	      				</tr>

	      				<tr>

	      					<td>

			      				<?php 
			      					$field_name = "lafu-c-lists";

			      					$args = array(					        
								        'show_count'       => 0,
								        'orderby'          => 'name',
								        'echo'             => 0,
								        'hide_empty'	   => 0,
								        'hierarchical'	   => 1,
								        'name'			   => $field_name,
								        'class'			   => $field_name . " select-list-box",
								        'id'			   => $field_name
								    );

								    $categories_list = wp_dropdown_categories( $args );

								    $str_replace = "<ul$1>";

								    $categories_list = preg_replace('/<select([^>]*)>/', $str_replace, $categories_list);

								    $str_replace = "<li$1>";

								    $categories_list = preg_replace('/<option([^>]*)>/', $str_replace, $categories_list);					   

								    echo $categories_list;

			      				?>     

			      			</td>

			      			<td>

			      				<div class="lafu-checkboxes-wrapper -cat -disabled">

				      				<label class="cat-obj-setting-show">

									    <input type="checkbox" data-obj-type="cat" data-obj-setting="show" class="lafu-checkboxes-settings" value="1"> 
									    <span>Hiển thị (có / không)</span>

								    </label>

								    <label class="cat-obj-setting-showOnAllPosts">

									    <input type="checkbox" data-obj-type="cat" data-obj-setting="showOnAllPosts" class="lafu-checkboxes-settings" value="1"> 
									    <span>Bao gồm tất cả bài viết (có / không)</span>

								    </label>

								 </div>

			      			</td>

			      			<td>

			      				<ul class="select-list-box lafu-sj-lists" 
			      					id="lafu-sj-lists"
			      					name="lafu-sj-lists">

			      					<li class="no-choice">--- Không có chủ đề nào ---</li>
			      						
			      				</ul>


			      			</td>

			      			<td>

			      				<div class="lafu-checkboxes-wrapper -sj -disabled">

				      				<label class="subject-obj-setting-show">

									    <input type="checkbox" data-obj-type="subject"  data-obj-setting="show" class="lafu-checkboxes-settings" value="1"> 
									    <span>Hiển thị (có / không)</span>

								    </label>

								    <label class="subject-obj-setting-showOnPosts">
									    <input type="checkbox" data-obj-type="subject" data-obj-setting="showOnPosts" class="lafu-checkboxes-settings" value="1"> 
									    <span>Bao gồm bài viết (có / không)</span>
								    </label>

								 </div>

			      			</td>

			      		</tr>

			      	</table> 				
      				
      			</div>      			
      			
      		</div>

        
      </div>

      <div class="modal-footer">

      	<button type="button" 
        		class="btn btn-primary btnCreateBanner">
        	Tạo banner
        </button>

        <button type="button" 
        		class="btn btn-primary btnUpdateBanner">
        	Cập nhật banner
        </button>

        <button type="button" 
        		class="btn btn-secondary" 
        		data-dismiss="modal">Đóng lại</button>

      </div>

    </div>

  </div>
  
</div>

<div id="loader-overlay" class="loader-overlay">

	<div class="overlay-container">

		<div class="lafu-loader"></div>

	</div>

</div>