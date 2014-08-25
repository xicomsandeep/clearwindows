<div class="middle-sec task_middle_section" style="display: none;">
	<h1 class="left-arrow">Workspace</h1>
	<div class="middle-body">
		<div class="breadcum-wrap col-xs-3">
			<ol class="breadcrumb mt10">
				<li>
					<a href="#">Home</a>

				</li>
				<li>
					<a href="#">Task</a>
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
				<h3>Heading Title </h3>
				 <div data-bind="template: { name: temp()}" >
				
				</div>
			</div>
			<div class="clear"></div>
		</div>
		</div>
</div>	

<!---------------------------------------add event modal window------------------------------------------------------>
   <div class="modal fade" id="myModal_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:745px;height:700px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Add Round</h4>
					</div>
					<div class="modal-body" style="height:400px;">
						<?php echo $this->Form->create('Round',array('id'=>'round_form','url'=>array('controller'=>'Rounds','action'=>'add')))?>
						<span id="customer_form_msg"> </span>
						
						<div class="form-group">
							<div class="col-sm-10">
								<?php echo $this -> Form -> input('name',array('class'=>"form-control required")); ?>
							</div>
						</div>
				   </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
						<input type="submit" class="btn btn-primary" value="Save">
					</div>
					</form>
				</div>
			</div>
		</div>
<!---------------------------------------add event modal window------------------------------------------------------>

<script id="task_details" type="text/html">
<div id="ScrollBox"   data-bind="foreach: task_list" style="border:1px solid;">
					<div class="user-info-list"  >
						<a data-bind="click:function(){get_job_detail($data.Job.id)}"> <span data-bind="text:Job.created" class="post-time"></span> <h4><span data-bind="text:Job.subject"></span></h4></a>
						<p class="discript" >
							<h5><b>Customer Name:</b><span data-bind="text:Customer.first_name+ Customer.last_name,click:function(){get_user_info($data.Customer.id)}"></span></h5>
							<h5><b>Employee Name:</b><span data-bind="text:User.first_name+ User.last_name"></span></h5>
							
						</p>
						<p data-bind="text:Job.description"></p>
						 
						<div></div>
					</div>
				</div>
</script>
	
		