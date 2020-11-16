<div class="faq-containers">

		<div class="container">

			<div class="faq-containers-inside faq-main-containers">

				<div class="faq-toolbar">

					<div class="faq-containers-inside faq-toolbar-container ">

						<button type="button" class="btn btn-primary btnCreateCampaign" data-toggle="modal" data-target="#CreateCampaignDialog">

							<span class="dashicons-before dashicons-welcome-add-page"></span> 
							<span class="label">Thêm chiến dịch</span>

						</button>

						<button type="button" class="btn btn-primary btnCampList" data-toggle="modal" data-target="#CampaignsListDialog">

							<span class="dashicons-before dashicons-flag"></span> 
							<span class="label">Danh sách chiến dịch</span>

						</button>

						<button type="button" class="btn btn-primary btnQList" data-toggle="modal" data-target="#QListsDialog">

							<span class="dashicons-before dashicons-flag"></span> 
							<span class="label">Danh sách câu hỏi</span>

						</button>

						<button type="button" class="btn btn-primary btnUpdate">

							<span class="dashicons-before dashicons-screenoptions"></span> 
							<span class="label">Cập nhật</span>

						</button>

						<!--<div class="searchbox">
		      				
		      				<div class="input-group">							    

							    <input type="text" 
							    	   placeholder="Tìm kiếm câu hỏi ..." 
							    	   class="txtSearch"
							    	   name="txtSearch" 
							    	   aria-label="Tìm kiếm câu hỏi" 
							    	   aria-describedby="btnGroupSearch"
							    	   value="" />

							   	<div class="input-group-prepend">

							      <div class="input-group-text" id="btnGroupSearch">@</div>

							    </div>

							 </div>
		      				
		      			</div>-->

					</div>
					
				</div>

				<div class="faq-elements-container">				

				</div>

			</div>

		</div>

		<div id="CreateCampaignDialog" class="modal FAQCampaignDialog FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại tạo chiến dịch</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

		    <form id="frmNewCampaign" method="post" action="">

		      	<div class="modal-body">

		      		<div class="faq-input">
	        			<label for="txtCampaign">Tên chiến dịch</label>
	        			<input type="text" id="txtCampaign" class="txtCampaign form-control" value="" required>
	    			</div>

	    			<div class="faq-input">

	    				<label>Danh sách câu hỏi</label>

	    				<div class="chooseQuestionLists mtop10">

	    					<div class="inside padleft20">

	    						<label for="slCQuestionLists">Bộ câu hỏi</label>

	    						<select id="slCQuestionLists" class="form-control slQuestionLists" name="slQuestionLists"></select>

	    						<div class="QListsPanel mtop10">

	    							<div class="panel-left col-sm-6 col-xs-12 pull-left">

	    								<label>Nội dung bộ câu hỏi</label>

	    								<div class="toolbarPanelLeft">        
									        <a href="#" class="btn btn-secondary btnCopyAllQuest">
									        	>>
									        </a>
									    </div>

	    								<div class="qlists-sortables sortables-leftpanel mtop10">
	    								</div>

	    								<div class="qlists-sortables sortables-rightpanel mtop10">
	    								</div>

	    							</div>

	    							<div class="panel-right col-sm-6 col-xs-12 pull-left">

	    								<label class="text-center">Danh sách câu hỏi cho chiến dịch</label>

	    							</div>

	    						</div>

	    					</div>
	    					
	    				</div>
	    				
	    			</div>

				    <div class="faq-input">

					    <label>Tùy chọn nâng cao</label>

	    				<div class="configuration">

	    					<div class="inside padleft20">

	        					<div class="faq-input">

							        <label for="txtBgMessage">Câu chào mời</label>
									<input type="text" id="txtBgMessage" name="txtBgMessage" class="form-control txtBgMessage" value="" required>

							    </div>

						        <div class="faq-input">

						            <label for="txtFinishMessage">Thông điệp hoàn thành khi gửi</label>
									<textarea id="txtFinishMessage" name="txtFinishMessage" rows="5" class="form-control txtFinishMessage" required></textarea>

						        </div>

						        <div class="faq-input">           
						            <label for="txtFinishEMessage">Thông điệp cảm ơn sau cùng</label>
									<textarea id="txtFinishEMessage" name="txtFinishEMessage" rows="5" class="form-control txtFinishEMessage" required></textarea>
						        </div>

							</div>
						</div>
				    </div>
		        
		      	</div>

		      	<div class="modal-footer">

			        <button type="submit" class="btn btn-primary btnCreateNewCampaign">Tạo chiến dịch</button>
			        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

		      	</div>

		  	</form>

		    </div>

		  </div>
		  
		</div>

		<div id="EditCampaignDialog" class="modal FAQCampaignDialog FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại chỉnh sửa chiến dịch</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

		    <form id="frmEditCampaign" method="post" action="">

		      	<div class="modal-body">

		      		<div class="faq-input">
	        			<label for="txtEditCampaign">Tên chiến dịch</label>
	        			<input type="text" id="txtEditCampaign" class="txtEditCampaign form-control" value="" required>
	    			</div>

	    			<div class="faq-input">

	    				<label>Danh sách câu hỏi</label>

	    				<div class="chooseQuestionLists mtop10">

	    					<div class="inside padleft20">

	    						<label for="slECQuestionLists">Bộ câu hỏi</label>

	    						<select id="slECQuestionLists" class="form-control slQuestionLists" name="slECQuestionLists"></select>

	    						<div class="QListsPanel mtop10">

	    							<div class="panel-left col-sm-6 col-xs-12 pull-left">

	    								<label>Nội dung bộ câu hỏi</label>

	    								<div class="toolbarPanelLeft">        
									        <a href="#" class="btn btn-secondary btnCopyAllQuest">
									        	>>
									        </a>
									    </div>

	    								<div class="qlists-sortables sortables-leftpanel mtop10">
	    								</div>

	    								<div class="qlists-sortables sortables-rightpanel mtop10">
	    								</div>

	    							</div>

	    							<div class="panel-right col-sm-6 col-xs-12 pull-left">

	    								<label class="text-center">Danh sách câu hỏi cho chiến dịch</label>

	    							</div>

	    						</div>

	    					</div>
	    					
	    				</div>
	    				
	    			</div>

				    <div class="faq-input">

					    <label>Tùy chọn nâng cao</label>

	    				<div class="configuration">

	    					<div class="inside padleft20">

	        					<div class="faq-input">

							        <label for="txtEditCpBgMessage">Câu chào mời</label>
									<input type="text" id="txtEditCpBgMessage" name="txtEditCpBgMessage" class="form-control txtEditCpBgMessage" value="" required>

							    </div>

						        <div class="faq-input">

						            <label for="txtEditCpFinishMessage">Thông điệp hoàn thành khi gửi</label>
									<textarea id="txtEditCpFinishMessage" name="txtEditCpFinishMessage" rows="5" class="form-control txtEditCpFinishMessage" required></textarea>

						        </div>

						        <div class="faq-input">
						            <label for="txtEditCpFinishEMessage">Thông điệp cảm ơn sau cùng</label>
									<textarea id="txtEditCpFinishEMessage" name="txtEditCpFinishEMessage" rows="5" class="form-control txtEditCpFinishEMessage" required></textarea>
						        </div>

							</div>
						</div>
				    </div>
		        
		      	</div>

		      	<div class="modal-footer">

			        <button type="submit" class="btn btn-primary btnSaveCampaignChanges">Lưu thay đổi</button>
			        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

		      	</div>

		  	</form>

		    </div>

		  </div>
		  
		</div>

		<div id="CampaignsListDialog" class="modal FAQCampaignDialog FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại hiển thị danh sách chiến dịch</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

			    <div class="modal-body">

		      		<div class="toolbar-container">

				        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateCampaignDialog">
				            <span class="dashicons-before dashicons-welcome-add-page"></span>
				        </button>

	    			</div>

		        	<table class="mtop10">

		      			<thead>
		      				<tr>
		      					<th>STT</th>
		      					<th align="center">Tên chiến dịch</th>
		      					<th align="center">Mã hiển thị</th>
		      					<th align="center">Thông điệp</th>
		      					<th align="center">Thông tin khách hàng</th>
		      					<th></th>	      					
		      				</tr>
		      			</thead>

		      			<tbody>
		      				<tr>
		      					<td colspan="6" align="center">Chưa có chiến dịch nào ở đây ...</td>
		      				</tr>

		      			</tbody>

		      		</table>

					<div class="toolbar-container mtop10">

				        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateCampaignDialog">
				            <span class="dashicons-before dashicons-welcome-add-page"></span>
				        </button>

				    </div>	      		
		        
		      	</div>

		      	<div class="modal-footer">
			       
			        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

		      	</div>		  	

		    </div>

		  </div>		 
		  
		</div>

		<div id="CampaignShortCodeDialog" class="modal FAQCampaignDialog FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại hiển thị mã chiến dịch</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

			    <div class="modal-body">

		      		<div class="faq-input">

		      			<label for="txtFAQShortCode">
		      				Mã chiến dịch
		      			</label>

		      			<input id="txtFAQShortCode" type="text" class="form-control" name="txtFAQShortCode" value=""  readonly="true">
		      			
		      		</div>

		      		<div class="faq-input">

		      			<label for="txtFAQShortCodeSb">
		      				Mã chiến dịch cho sidebar
		      			</label>

		      			<input id="txtFAQShortCodeSb" type="text" class="form-control" name="txtFAQShortCodeSb" value="" readonly="true">
		      			
		      		</div>
		        
		      	</div>

		      	<div class="modal-footer">
			       
			        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

		      	</div>		  	

		    </div>

		  </div>		 
		  
		</div>

		<div id="CampaignEditMessageDialog" class="modal FAQCampaignDialog FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại chỉnh sửa thông điệp</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

			    <div class="modal-body">

		      		<div class="faq-input">

				        <label for="txtEditBgMessage">Câu chào mời</label>
						<input type="text" id="txtEditBgMessage" name="txtEditBgMessage" class="form-control txtEditBgMessage" value="" required>

				    </div>

			        <div class="faq-input">

			            <label for="txtEditFinishMessage">Thông điệp hoàn thành khi gửi</label>
						<textarea id="txtEditFinishMessage" name="txtEditFinishMessage" rows="5" class="form-control txtEditFinishMessage" required></textarea>

			        </div>

			        <div class="faq-input">           
			            <label for="txtEditFinishEMessage">Thông điệp cảm ơn sau cùng</label>
						<textarea id="txtEditFinishEMessage" name="txtEditFinishEMessage" rows="5" class="form-control txtEditFinishEMessage" required></textarea>
			        </div>
		        
		      	</div>

		      	<div class="modal-footer">
			       
			       <button type="button" class="btn btn-primary btnSaveCampMessageChanges">Lưu thay đổi</button>
			        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

		      	</div>		  	

		    </div>

		  </div>		 
		  
		</div>

		<div id="CreateQListDialog" class="modal FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại tạo bộ câu hỏi</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

			    <form id="frmNewQList" method="post" action="">

			      	<div class="modal-body">

			      		<div class="faq-input">
		        			<label for="txtQListName">Tên bộ câu hỏi</label>
		        			<input type="text" id="txtQListName" class="txtQListName form-control" value="" required>
		    			</div>		

		    			<div class="faq-input">

		        			<label>Danh sách câu hỏi</label>

		        			<div class="qlists-container">

			        			<div class="toolbar-container qlists-toolbar">

			        				<button type="button" class="btn btn-secondary btnAddNewQuestion">
			        					<span class="dashicons-before dashicons-welcome-add-page"></span>
			        				</button>
			        				
			        			</div>

			        			<div class="qlists-sortables mtop10">
								    
								</div>

								<div class="toolbar-container qlists-toolbar mtop10">

			        				<button type="button" class="btn btn-secondary btnAddNewQuestion">
			        					<span class="dashicons-before dashicons-welcome-add-page"></span>
			        				</button>
			        				
			        			</div>

			        		</div>


		    			</div>    			
			        
			      	</div>

			      	<div class="modal-footer">

				        <button type="submit" class="btn btn-primary btnCreateNewQList">Tạo bộ câu hỏi</button>
				        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

			      	</div>

			  	</form>

		    </div>

		  </div>		  	
		  
		</div>

		<div id="QListsDialog" class="modal FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại hiển thị danh sách các bộ câu hỏi</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

		      	<div class="modal-body">

		      		<div class="toolbar-container">

				        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateQListDialog">
				            <span class="dashicons-before dashicons-welcome-add-page"></span>
				        </button>

	    			</div>

		        	<table class="mtop10">

		      			<thead>
		      				<tr>
		      					<th>STT</th>
		      					<th align="center" style="">Tên bộ câu hỏi</th>
		      					<th></th>	      					
		      				</tr>
		      			</thead>

		      			<tbody>
		      				<tr>
		      					<td colspan="3" align="center">Chưa có bộ câu hỏi nào ở đây.</td>
		      				</tr>

		      			</tbody>

		      		</table>

					<div class="toolbar-container mtop10">

				        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateQListDialog">
				            <span class="dashicons-before dashicons-welcome-add-page"></span>
				        </button>

				    </div>	      		
		        
		      	</div>

		      	<div class="modal-footer">
			       
			        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>

		      	</div>		  	

		    </div>

		  </div>		  
		  
		</div>

		<div id="EditQListDialog" class="modal FAQElementsDialog" data-backdrop="static" tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">

		        <h5 class="modal-title">Hộp thoại sửa bộ câu hỏi</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		      </div>

			    <form id="frmEditQList" method="post" action="">

			      	<div class="modal-body">

			      		<div class="faq-input">
		        			<label for="txtEQListName">Tên bộ câu hỏi</label>
		        			<input type="text" id="txtEQListName" class="txtEQListName form-control" value="" required>
		    			</div>		

		    			<div class="faq-input">

		        			<label>Danh sách câu hỏi</label>

		        			<div class="qlists-container">

			        			<div class="toolbar-container qlists-toolbar">

			        				<button type="button" class="btn btn-secondary btnAddNewQuestion">
			        					<span class="dashicons-before dashicons-welcome-add-page"></span>
			        				</button>
			        				
			        			</div>

			        			<div class="qlists-sortables mtop10">
								    
								</div>

								<div class="toolbar-container qlists-toolbar mtop10">

			        				<button type="button" class="btn btn-secondary btnAddNewQuestion">
			        					<span class="dashicons-before dashicons-welcome-add-page"></span>
			        				</button>
			        				
			        			</div>

			        		</div>


		    			</div>    			
			        
			      	</div>

			      	<div class="modal-footer">

				        <button type="submit" class="btn btn-primary btnSaveQListChanges">Lưu thay đổi</button>
				        <button type="button" class="btn btn-secondary btnQListUnChanges" data-dismiss="modal">Đóng lại</button>

			      	</div>

			  	</form>

		    </div>

		  </div>		 
		  
		</div>

		<div id="ViewElementDialog" class="modal FAQElementsDialog" data-backdrop="static"  tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Hộp thoại xem FAQ</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		      		<div class="faq-input">

		      			<label>Nội dung câu hỏi</label>
		      			<textarea name="txtVQuestion" class="form-control txtQuestion disabled" rows="3"></textarea>

		      			<div class="mtop10 text-right">
		      				<a class="treeinfo" href="#">Thông tin liên kết</a>
		      			</div>

		      		</div>

		      		<div class="faq-input">

		      			<button type="button" class="btn btn-secondary btnAddNewAnswer disabled">
		      			Thêm câu trả lời</button>		      			

		      		</div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>
		      </div>
		    </div>

		  </div>
		  
		</div>

		<div id="TreeInfoDialog" class="modal FAQElementsDialog" data-backdrop="static"  tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Thông tin cây FAQ</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		      		<div id="trentCharts">

		      		</div>
		      		
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Đóng lại</button>
		      </div>
		    </div>

		  </div>
		  
		</div>		

		<div id="ShowUsersRegInfoDialog" class="modal FAQElementsDialog" data-backdrop="static"  tabindex="-1" role="dialog">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Thông tin khách hàng đã đăng ký</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		      		<table id="usersRegInfoDt" class="display" style="width:100%">

				        <thead>

				            <tr>
				                <th>STT</th>
				                <th>Họ và tên</th>
				                <th>Email</th>
				                <th>Số điện thoại</th>	
				                <th>Đáp án đã chọn</th>			                
				                <th></th>
				            </tr>

				        </thead>

				        <tbody>

				        </tbody>

				    </table>	      		
		        
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-primary btnSaveUserInfoChanges" data-dismiss="modal">Lưu thay đổi</button>
		        <button type="button" class="btn btn-secondary btnCloseUserRegDialog" data-dismiss="modal">Đóng lại</button>
		      </div>
		    </div>

		  </div>
		  
		</div>

	</div>	

	<div class="sortable-ui qlist-sortable-ui qlist-sortable-ui-template hidden">
								        
	    <h2>Câu hỏi chưa có nội dung ...</h2>

		<div class="inside">

	    	<div class="faq-questionbox">

	    		<div class="faq-input">

	      			<label>Nội dung câu hỏi</label>
	      			<textarea name="txtQuestion" class="form-control txtQuestion" rows="3" required></textarea>

	      			<div class="mtop10 text-right">
	      				<a class="treeinfo" href="#">Thông tin liên kết</a>
	      			</div>

	      		</div>

	      		<div class="faq-input">

	      			<button type="button" class="btn btn-secondary btnAddNewAnswer">
	      				<span class="dashicons-before dashicons-welcome-add-page"></span>
	      				Thêm câu trả lời
	      			</button>	

	      			<button type="button" class="btn btn-danger btnRemoveQuestion">
	      				<span class="dashicons-before dashicons-trash"></span>
	      				Xóa câu hỏi
	      			</button>		      			

	      		</div>

			</div>

		</div>

    </div>