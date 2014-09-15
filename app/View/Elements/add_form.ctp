<!------------------------------------------Contact add form(Modal Window)------------------------------------------------------->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:745px;height:700px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Add information <i class="glyphicon glyphicon-circle-arrow-left back_btn" onclick="javascript:open_form();"></i>&nbsp;</h4>
			</div>
			<div class="modal-body" style="height:400px;">
				<div class="view_container">
					<div class="radio">
							  <label>
							    <input type="radio" class="view_selecter" rel="view_job" name="optionsRadios"  value="option1" checked>
							    Job
							  </label>
					</div>
					<div class="radio">
							  <label>
							    <input type="radio" class="view_selecter" rel="view_contact" name="optionsRadios"  value="option1" checked>
							    Contact
							  </label>
					</div>
					<div class="radio">
							  <label>
							    <input type="radio" class="view_selecter" rel="view_notes" name="optionsRadios"  value="option1" checked>
							    Note
							  </label>
					</div>
				</div>
				<div class="view_contact view_stuff">
					<?php echo $this->Form->create('Customer',array('id'=>'customer_info','url'=>array('controller'=>'Customers','action'=>'add')))?>
					<span id="customer_form_msg"> </span>
					<div class="form-group">
						<?php echo $this -> Form -> label('Customer Type', __('Customer Type')); ?>
						<div class="col-sm-10">
							<?php echo $this -> Form -> radio('customer_type_id', $customer_type, array('legend' => false, 'div' => false)); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('first_name', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('last_name', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('email', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('password', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('telephone_no', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('mobile_no', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('add_1', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('add_2', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('add_3', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('add_4', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('add_5', array('class' => "form-control")); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<?php echo $this -> Form -> input('add_6', array('class' => "form-control")); ?>
						</div>
					</div>
					
			  </div>
			  <div class="modal-footer view_contact view_stuff" style="display: none;">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<input type="submit" class="btn btn-primary" value="Save">
				</form>
			</div>
			  
			  
			  <div class="view_job view_stuff">
			      <?php echo $this->Form->create('Job',array('url'=>array('controller'=>'Jobs','action'=>'add'),'class'=>'global_note','id'=>'global_add'))?>
						<div class="checkbox">
							<label class="control-label">
								<input type="checkbox" name="data[Job][task]" value="1"  class="task_check task_check_box" rel="make_task_container">
								Make Task </label>
						</div>
						<div class="checkbox">
							<label class="control-label">
								<input type="checkbox" class="task_check job_check" rel="make_job_container">
								Make Job </label>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 control-label" for="TextArea">Job Type</label>
							<div class="col-xs-4">
								<?php //echo $this -> Form -> input('Job.schedule', array('type' => 'select', 'empty' => __('Schedule'), 'class' => 'selectsearch', 'options' => $customer_type, 'label' => '', 'style' => 'width: 100%;height:34px')); ?>
								<select name="data[Job][job_types_id]"  class="selectsearch required" data-bind="options: job_type, optionsText: 'name',optionsCaption: 'Select...', optionsValue: 'id'"></select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 control-label" for="inputEmail1">Subject</label>
							<div class="col-xs-9" >

								<?php echo $this -> form -> input('Job.subject', array('label' => false, 'class' => 'form-control required')); ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 control-label" for="TextArea">Body</label>
							<div class="col-xs-9">
								<?php echo $this -> form -> input('Job.description', array('type' => 'textarea', 'label' => false, 'class' => 'form-control required')); ?>
							</div>
						</div>

						<!-----------------------------------------------------------------make job------------------------------------------------------------------------>
						<div id="make_job_container">
							<div class="form-group row make_job task_input" >
								<label class="col-xs-3 control-label" for="TextArea">Due date</label>
								<div class="col-xs-9">
									<?php echo $this -> form -> input('Job.due_date', array('type' => 'text', 'label' => false, 'class' => 'form-control required  datepicker')); ?>
								</div>
							</div>
							<div class="make_job job_input">
								<label class="checkbox-inline control-label">
									<input type="checkbox" onclick="javascript:if($(this).is(':checked')){$(this).val(1)}else{$(this).val(0)}" id="inlineCheckbox1" name="data[Job][fixed]" >
									Fixed </label>
								<label class="checkbox-inline">
									<input type="checkbox" onclick="javascript:if($(this).is(':checked')){$(this).val(1)}else{$(this).val(0)}" id="inlineCheckbox2" name="data[Job][monthly]" >
									Monthly </label>
								<label class="checkbox-inline">
									<input type="checkbox" onclick="javascript:if($(this).is(':checked')){$(this).val(1)}else{$(this).val(0)}" id="inlineCheckbox3" name="data[Job][weekly]" >
									Weekly </label>
							</div>
							<br/>
							<div class="form-group row make_job task_input">
								<label class="col-xs-3 control-label" for="TextArea">Delegate</label>
								<div class="col-xs-4">
									<?php //echo $this -> Form -> input('Job.schedule', array('type' => 'select', 'empty' => __('Schedule'), 'class' => 'selectsearch', 'options' => $customer_type, 'label' => '', 'style' => 'width: 100%;height:34px')); ?>
									<select name="data[Job][customer_id]"  class="selectsearch required" data-bind="options: customer_list, optionsText: 'first_name',optionsCaption: 'Select...', optionsValue: 'id'"></select>
								</div>
							</div>
							<div class="form-group row make_job job_input" >
								<label class="col-xs-3 control-label" for="TextArea">Round</label>
								<div class="col-xs-4">

									<select name="data[Job][round_id]"  class="selectsearch" data-bind="options: rounds, optionsText: 'name',optionsCaption: 'Select...', optionsValue: 'id'"></select>
								</div>
							</div>
							<div class="form-group row make_job job_input" >
								<label class="col-xs-3 control-label" for="TextArea">Round Position</label>
								<div class="col-xs-9">
									<?php echo $this -> form -> input('Job.round_position', array('type' => 'text', 'label' => false, 'class' => 'form-control required')); ?>
								</div>
							</div>
							<div class="form-group row make_job job_input" >
								<label class="col-xs-3 control-label" for="TextArea">Service charge</label>
								<div class="col-xs-9">
									<?php echo $this -> form -> input('Job.cost', array('type' => 'text', 'label' => false, 'class' => 'form-control required')); ?>
								</div>
							</div>

						</div>
							
			  </div>	
		</div>
			<div class="modal-footer view_job view_stuff" style="display: none;">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<input type="submit" class="btn btn-primary" value="Save">
				</form>
			</div>
			
		</div>
	</div>
</div>
<!------------------------------------------Contact add form(Modal Window)------------------------------------------------------->