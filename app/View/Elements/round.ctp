<div class="middle-sec round_middle_section" style="display: none;">
		<h1 class="left-arrow">Workspace</h1>
	<div class="middle-body">
		<div class="breadcum-wrap col-xs-3">
			<ol class="breadcrumb mt10">
				<li>
					<a href="#">Home</a>

				</li>
				<li>
					<a href="#">Round</a>
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
				<h3>Heading Title <button type="button" id="form-button" class="btn btn-success" data-toggle="modal" data-target="#myModal_event">Add round</button></h3>
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

<script id="round_details" type="text/html">
	<div id="ScrollBox"   data-bind="foreach: round_list" style="border:1px solid;">
    <div class="user-info-list"">
						<a>  <h4  data-bind="click:function(){job_list_in_round($data.id)}"><span data-bind="text:name"></span></h4>
						<p class="discript" >
							<span data-bind="text:count+' jobs'"></span>
							
						</p> </a>
						
					</div>
	</div>				
</script>


<!-----------------------------job in round-------------------------------------------------------------------------->
<?php echo $this->Html->script(array('knockout-sortable'));?>
<script id="round_job_details" type="text/html">
<div id="ScrollBox"   data-bind="sortable:job_list_round" style="border:1px solid;">
    <div class="user-info-list"">
						<a> <h4><span data-bind="text:Job.subject"></span></h4>
						<p class="discript" >
							<span data-bind=""></span>
							
						</p> </a>
						
					</div>
	</div>	
	
	
</script>
	
		