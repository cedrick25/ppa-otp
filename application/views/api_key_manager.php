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
								<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-list"></i>  API Key Manager </h3> </div>

								<div class="panel-body">
							    	Export: <button class="btn btn-primary btnCSV">CSV</button> <button class="btn btn-primary btnPDF">PDF</button> <button class="btn btn-primary btnXLS">EXCEL</button>

							    	<span class="pull-right "><button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Add API Key</button></span>

						 		<br/><br/>
						 			<table id="tblApiKey" class="display " cellspacing="0" width="100%">
								        <thead>
								            <tr>
								                <th>ID</th>
								                <th>Information System</th>
								                <th>API Key</th>
								                <th>Created By</th>
								                <th>Created Date</th>
								                <th>Lastmodified By</th>
								                <th>Lastmodified Date</th>
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
			<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-plus"></i>  Add API Key <i class="pull-right fa fa-close"  data-dismiss="modal"></i></h3> </div>

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
						<label for="">Information System:</label>
						<select class="form-control infoSystem" id="">
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
<div id="modalUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
       	<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-edit"></i>  Update API Key <i class="pull-right fa fa-close"  data-dismiss="modal"></i></h3> </div>

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
						<label for="">Information System:</label>
						<select class="form-control updateInfoSystem" id="">
						</select>
					</div>
					<button class="btn btn-primary pull-right" id="btnUpdateSubmit">Save</button>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modalChangeStatus" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
       	<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="nav-pills" style="margin-top: 5px; margin-bottom: 5px;   font-size: 24px;"><i class="fa fa-edit"></i> Change API Key Status <i class="pull-right fa fa-close"  data-dismiss="modal"></i></h3> </div>

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
						<p class="changeStatusText"></p>
					</div>
					<button class="btn btn-primary pull-right" id="btnChangeSubmit">Save</button>
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
	    		$.wms.dashboard.apiKeyManager();
    		}
        }, 200);
   });
</script>