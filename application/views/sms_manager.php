<?php $this->load->view('templates/header.php'); ?> 
<body style="background-color: #f1f1f1;">
<?php $this->load->view('templates/nav.php'); ?> 

<div class="container loggedBody" hidden>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				 <div class="panel-body">
				 	
				 	<div class="row">
				 		<!-- <div class="col-md-3">
				 			<?php $this->load->view('templates/user_list_nav.php'); ?>
				 		</div> -->
				 		<div class="col-md-12">


				 			<div class="panel panel-primary">
								<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-list"></i>  SMS Manager </h3> </div>

								<div class="panel-body">
							    	Export: <button class="btn btn-primary btnCSV">CSV</button> <button class="btn btn-primary btnPDF">PDF</button> <button class="btn btn-primary btnXLS">EXCEL</button>

							    	<span class="pull-right "><button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Add Message</button></span>

						 		<br/><br/>
						 			<table id="tblSMS" class="display " cellspacing="0" width="100%">
								        <thead>
								            <tr>
								                <th>ID</th>
								                <th>Information System</th>
								                <th>Message</th>
								                <th>Message to</th>
								                <th>To be Sent On</th>
								                <th>Delivery Time</th>
								                <th>Created By</th>
								                <th>Created Date</th>
								                <th>Lastmodified By</th>
								                <th>Lastmodified Date</th>
								                <th>Status</th>
								                <th>Action</th>
								            </tr>
								        </thead>
								        <tbody>
								        </tbody>
								    </table>
								</div>

							</div>

				 		</div>
				 	</div>
				 </div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
       	<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-plus"></i>  Add SMS Notification <i class="pull-right fa fa-close"  data-dismiss="modal"></i></h3> </div>

			<div class="panel-body">
				<div class="" id="addBody">
					<div class="success login-alert hidden" style="width: 100%;">   
		              <div class="alert alert-success alert-dismissible " role="alert">
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <p class="successMessage"></p>
		              </div>
		            </div>
					<div class="error login-alert hidden" style="width: 100%;">   
		              <div class="alert alert-danger alert-dismissible " role="alert">
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <p class="errorMessage"></p>
		              </div>
		            </div>
			    	<div class="form-group">
						<label for="">Message Content:</label>
						<textarea class="form-control" id="addMessage"></textarea>
					</div>
					<div class="form-group">
						<label for="">Date:</label>
						<input type="date" class="form-control" id="addDate">
					</div>
					<div class="form-group">
						<label for="">Time:</label>
						<input type="time" class="form-control" id="addTime">
					</div>
					<div class="form-group">
						<label for="">Recipient:</label>
						<input type="text" class="form-control" id="addRecipient" pattern="\d*" maxlength="11">
					</div>
					<div class="form-group">
						<label for="">Information System:</label>
						<select class="form-control infoSystem" id="">
							<option value=""></option>
						</select>
					</div>
					<button class="btn btn-primary pull-right" id="btnAddSubmit">Save</button>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modalCancel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
       	<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-close"></i>  Cancel SMS Notification <i class="pull-right fa fa-close"  data-dismiss="modal"></i></h3> </div>

			<div class="panel-body">
				<div class="" id="addBody">
					<div class="success login-alert hidden" style="width: 100%;">   
		              <div class="alert alert-success alert-dismissible " role="alert">
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <p class="successMessage"></p>
		              </div>
		            </div>
					<div class="error login-alert hidden" style="width: 100%;">   
		              <div class="alert alert-danger alert-dismissible " role="alert">
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <p class="errorMessage"></p>
		              </div>
		            </div>
			    	<div class="form-group">
						<label for="">Are you sure you want to cancel this message?</label>
					</div>
					<button class="btn btn-primary pull-right" id="btnCancelSubmit">Save</button>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>


</body>
<?php $this->load->view('templates/footer.php'); ?> 
<?php $this->load->view('templates/admin_footer.php'); ?> 

<script type="text/javascript">
	$( window ).ready(function() {
        setTimeout(function () {
        	if($.wms.dashboard.checkPermission("9")){
	        	$.wms.modal.attachModalEvent();
	      		$('.filter-modal select').css('width', '100%')
	      		$(".select2").select2()
	         	$.wms.widget.attachWidgetEvent();
	    		$.wms.dashboard.attachPageEvent();
	    		$.wms.dashboard.smsManager();
    		}
        }, 200);
   });
</script>