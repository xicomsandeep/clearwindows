<div class="middle-sec job_middle_section" style="display: none;">
	<h1 class="left-arrow">Workspace</h1>
	<div class="middle-body">
		<div class="breadcum-wrap col-xs-3">
			<ol class="breadcrumb mt10">
				<li>
					<a href="#">Home</a>

				</li>
				<li>
					<a href="#">Job</a>
				</li>
			</ol>
		</div>
		<div class="col-xs-6">
			<input type="search" class="form-control mt10" data-bind="value: query, valueUpdate: 'keyup'" autocomplete="off" placeholder="Keywords" name="firstname" id="city" type="text" />
		</div>
		<div class="col-xs-3">
			<form class="form-inline form-padding text-right add-input-sec">
				<div class="form-group">
					
					<button type="button" onclick="javascript:open_form();" class="btn btn-success">
						add
					</button>
				</div>
			</form>
		</div>
		<div class="col-xs-12">
			<div class="description-area">
				<h3>Heading Title</h3>
				 	<div data-bind="template: { name: temp()}" >
				
				</div>
			</div>
			<div class="clear"></div>
		</div>
		</div>
</div>


<!---------------------------------------------------job modal window--------------------------------------------->
   <!-- Button trigger modal -->
		<!-- Modal -->
		<div class="modal fade" id="myModal_job_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">x</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Job Detail</h4>
					</div>
					<div class="modal-body right-tabing popup-tab">
						<ul class="nav nav-tabs" role="tablist" id="myTab_job">
							<li class="active">
								<a href="#Basic_Info_job" role="tab" data-toggle="tab">Job</a>
							</li>
							<li>
								<a href="#Notes_job" role="tab" data-toggle="tab">Notes</a>
							</li>
							<li>
								<a href="#Links-job" role="tab" data-toggle="tab">Account</a>
							</li>
							<li>
								<a href="#settings_job" role="tab" data-toggle="tab">Links</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active home-tab" id="Basic_Info_job">
								<div id="jod_detail_form"   data-bind="foreach:job_detail">
										<div class="form-group row">
										<label class="col-sm-3">Customer name:</label ><span class="col-sm-9" data-bind="text:Customer.first_name + Customer.last_name"></span>
									</div>
									<div class="form-group row">
										<label class="col-sm-3">Employee name:</label><span class="col-sm-9" data-bind="text:User.first_name + User.last_name"></span>
									</div>
									<div class="form-group row">
										<label class="col-sm-3">Subject:</label><span class="col-sm-9" data-bind="text:Job.subject"></span>
									</div>
									<div class="form-group row">
										<label class="col-sm-3">Description:</label><span class="col-sm-9" data-bind="text:Job.description"></span>
									</div>
									<div class="form-group row">
										<label class="col-sm-3">Date:</label><span class="col-sm-9" data-bind="text:Job.created"></span>
									</div>
									<div class="form-group row">
										<label class="col-sm-3">Cost:</label><span class="col-sm-9" data-bind="text:Job.cost"></span>
									</div>
								</div>
							
									       
								
							</div>
							<div class="tab-pane" id="Notes_job" >
								
							</div>
							<!-----------------------------------------------------tab for account--------------------------------------------------------------->
							<div class="tab-pane" id="Links_job">
							  
							</div>
							<!-----------------------------------------------------tab for account end --------------------------------------------------------------->
							<!-----------------------------------------------------tab for links --------------------------------------------------------------->
							<div class="tab-pane settings" id="settings_job">
								 Link to <input type="text" class="autocomplete2 link_input" data-bind="value: myValue, valueUpdate:'blur' " />
								<div data-bind="foreach:job_detail">
                                 <input type="hidden" id="job_refer_from_id" data-bind="value:Job.id">
                                 <input type="hidden" id="job_refer_from_model" value="Job">
                                </div> 
								<ul data-bind="foreach:link_list" class="col-sm-12 row">
									<li data-bind="html:link_to_icon+' '+link_to" class="col-sm-12 row"></li>
								</ul>
								<div class="clear"></div>
								
							</div>
							<!-----------------------------------------------------tab for links --------------------------------------------------------------->
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>
<!---------------------------------------------------job modal window--------------------------------------------->

<script id="job_details" type="text/html">
<div id="ScrollBox"   data-bind="foreach: all_job_list" style="border:1px solid;">
					<div class="user-info-list"  >
					 <a data-bind="click:function(){get_job_detail($data.Job.id)}"> <span data-bind="text:Job.created" class="post-time"></span> <h4><span data-bind="text:Job.subject"></span></h4>
						<p class="discript" >
							<h5><b>Customer Name:</b><span data-bind="text:Customer.first_name+ Customer.last_name"></span></h5>
							<h5><b>Employee Name:</b><span data-bind="text:User.first_name+ User.last_name"></span></h5>
							
						</p>
						<p data-bind="text:Job.description"></p>
						 
						<div></div>
					 </a>	
					</div>
				</div>
</script>				
	
	