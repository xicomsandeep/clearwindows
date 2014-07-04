       <style>
       	#ScrollBox {
            overflow-y: scroll;
            border: 0px solid #ccc!important;
            padding:20px;
            height: 400px;
          }
       	
       </style>
       

        <div class="middle-sec">
                <h1 class="left-arrow">Workspace</h1>
                <div class="middle-body">
                   
                        <div class="breadcum-wrap col-xs-6">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Workspace</a></li>                        
                            </ol>
                        </div>
                        <div class="col-xs-6">
                            <form class="form-inline form-padding text-right add-input-sec">
                                <div class="form-group">
                                       
                                    <input type="search" class="form-control" data-bind="value: query, valueUpdate: 'keyup'" autocomplete="off" placeholder="Keywords" name="firstname" id="city"type="text" />
                                    <button type="button" id="form-button" class="btn btn-success" data-toggle="modal" data-target="#myModal">add</button>

                                </div>
                            </form>
                        </div>                 
                    <div class="col-xs-12">
                        <div class="description-area">
                            <h3>Heading Title</h3>
                             <div id="ScrollBox"   data-bind="foreach: name" style="border:1px solid;">
                                <div class="user-info-list"  data-bind="click:function(){get_user_info($data.id)}">
                             	  <a>
                                        <span data-bind="text:created" class="post-time"></span>
                                       <h4><span data-bind="text:first_name"></span>
                                       <span data-bind="text:last_name"></span></h4>  
                                    <p class="discript" >                                     
                                       <span data-bind="text:email"></span>
                                       <span data-bind="text:mobile_no"></span>
                                    </p>                         	  
                             	  </a>
                                <div>
                             </div>
                        </div>
                    </div>                   
                </div>
                
                <div class="clear"></div>
            </div>
            
<!------------------------------------------Contact add form(Modal Window)------------------------------------------------------->
   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:745px;height:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Contact</h4>
      </div>
      <div class="modal-body" style="height:400px;">
        <?php echo $this->Form->create('Customer',array('id'=>'customer_info','url'=>array('controller'=>'Customers','action'=>'add')))?>
        
			   <span id="customer_form_msg"> </span>
			  <div class="form-group">
			  	<?php echo $this->Form->label('Customer Type', __('Customer Type')); ?>
			     <div class="col-sm-10">
			     	
			     <?php echo $this->Form->radio('customer_type_id',
				  $customer_type,array('legend'=>false,'div'=>false)
				 );?>	
			    </div>
			 </div>  
        	 <div class="form-group">
			     <div class="col-sm-10">
			     <?php echo $this->Form->input('first_name');?>	
			    </div>
			 </div>
			  <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('last_name');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('email');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('password');?>
			    </div>
			 </div>
			 <div class="form-group">
			   
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('telephone_no');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('mobile_no');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('add_1');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('add_2');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('add_3');?>
			    </div>
			 </div>
			 <div class="form-group">
			 
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('add_4');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			      <?php echo $this->Form->input('add_5');?>
			    </div>
			 </div>
			 <div class="form-group">
			    
			     <div class="col-sm-10">
			     <?php echo $this->Form->input('add_6');?>
			    </div>
			 </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save">
      </div>
      	</form>
    </div>
  </div>
</div>
<!------------------------------------------Contact add form(Modal Window)------------------------------------------------------->
<!------------------------------------------Customer information(Modal Window)------------------------------------------------------->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal_customer_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body right-tabing popup-tab">
					<ul class="nav nav-tabs" role="tablist" id="myTab">
					  <li class="active"><a href="#Basic_Info" role="tab" data-toggle="tab">Contact</a></li>
					  <li><a href="#Notes" role="tab" data-toggle="tab">Notes</a></li>
					  <li><a href="#Links" role="tab" data-toggle="tab">Account</a></li>
					  <li><a href="#settings" role="tab" data-toggle="tab">Links</a></li>
					</ul>
					
					<div class="tab-content">
					  <div class="tab-pane active home-tab" id="Basic_Info" data-bind="foreach:user_info">
                                                  <div class="form-group row">
					  	    <label class="col-sm-3">Name:</label ><span class="col-sm-9" data-bind="text:Customer.first_name + Customer.last_name"></span>
                                                  </div>
                                                  <div class="form-group row">
					  	    <label class="col-sm-3">Email:</label><span class="col-sm-9" data-bind="text:Customer.email"></span>
                                                  </div>
                                                  <div class="form-group row">
					  	    <label class="col-sm-3">PhoneNo:</label><span class="col-sm-9" data-bind="text:Customer.telephone_no"></span>
                                                  </div>
                                                  <div class="form-group row">
					  	    <label class="col-sm-3">Mobile NO:</label><span class="col-sm-9" data-bind="text:Customer.mobile_no"></span>
                                                  </div>                                                    					  	  
					  </div>
					  <div class="tab-pane" id="Notes" >
                                                        
                                                    	<?php echo $this->Form->create('Job',array('url'=>array('controller'=>'Jobs','action'=>'add'),'id'=>'customer_note'))?>
                                                       <div class="form-group row">
                                                         <label class="col-xs-3 control-label" for="inputEmail1">Subject</label>
                                                         <div class="col-xs-9" data-bind="foreach:user_info">
                                                         	<input type="hidden" name="data[Job][customer_id]" data-bind="value:Customer.id">      
                                                           <?php echo $this->form->input('Job.subject',array('label'=>false,'class'=>'form-control required'));?>
                                                         </div>
                                                       </div>                                                       
                                                       <div class="form-group row">
                                                         <label class="col-xs-3 control-label" for="TextArea">Body</label>
                                                         <div class="col-xs-9">
                                                           <?php echo $this->form->input('Job.description',array('type'=>'textarea','label'=>false,'class'=>'form-control required'));?>
                                                         </div>
                                                       </div>
                                                       <div class="form-group row">
                                                        
                                                         <div class="col-xs-9">
                                                              <div class="row">
                                                                <div class="col-xs-6">
                                                                <?php echo $this->Form->input('Job.user_id', array('type'=>'select', 'empty'=>__('Employee'), 'class' => 'selectsearch required', 'options' => $employee,'label'=>'','style'=>'width: 100%;height:34px')); ?> 
                                                               </div>
                                                               <div class="col-xs-6">
                                                           <?php echo $this->Form->input('Job.schedule', array('type'=>'select', 'empty'=>__('Schedule'), 'class' => 'selectsearch', 'options' => $customer_type,'label'=>'','style'=>'width: 100%;height:34px')); ?>
                                                         </div>
</div>
</div>
                                                       </div>
                                                       <div class="form-group row">
                                                         <div class="col-xs-9 col-xs-offset-3">
                                                            <input type="reset" class="btn btn-default" value="Reset">
                                                           <button type="submit" class="btn btn-success">save</button>
                                                         </div>
                                                       </div>
                                                     </form>					  	 					      					  	   
					  	  <table class="table table-bordered mt40">
						      <thead>
						        <tr>
						          <th>#</th>
						          <th>User</th>
						          <th>Date</th>						          
						          <th>Subject</th>
						          <th>Action</th>
						        </tr>
						      </thead>
						      <tbody data-bind="foreach:customer_job">
						        <tr>
						          <td data-bind="text:$index"></td>
						          <td data-bind="text:Customer.first_name +Customer.last_name"></td>
						          <td data-bind="text:Job.created"></td>						        
						          <td data-bind="text:(Job.description.length > 6 ? Job.description.substring(0, 5) + '...' : Job.description)"></td>
						          <td><a  class="delete-icon" data-bind="click:function(){remove_job($data.Job.id,$data.Customer.id)}"><i class="fa fa-trash-o"></i></a></td>
						        </tr>
						        
						      </tbody>
						   </table>       					  	
					  </div>
					  <div class="tab-pane" id="Links"></div>
					  <div class="tab-pane" id="settings"></div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<!------------------------------------------Customer information(Modal Window)------------------------------------------------------->
