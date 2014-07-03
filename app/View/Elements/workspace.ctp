       <style>
       	#ScrollBox {
            overflow-y: scroll;
            border: 2px solid silver;
            border-radius: 4px;
            box-shadow: 3px 3px 6px #535353;
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
                             	  <a  data-toggle="modal" data-target="#myModal_customer_info" rel="dfsdf"><span data-bind="text:first_name"></span><br/>
                             	  <span data-bind="text:last_name"></span><br/>
                             	  <span data-bind="text:created"></span><br/>
                             	  <span data-bind="text:email"></span><br/>
                             	  <span data-bind="text:mobile_no"></span><br/>
                             	  <hr/>
                             	  </a>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
					<ul class="nav nav-tabs" role="tablist" id="myTab">
					  <li class="active"><a href="#Basic_Info" role="tab" data-toggle="tab">Home</a></li>
					  <li><a href="#Notes" role="tab" data-toggle="tab">Profile</a></li>
					  <li><a href="#Links" role="tab" data-toggle="tab">Messages</a></li>
					  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
					</ul>
					
					<div class="tab-content">
					  <div class="tab-pane active" id="Basic_Info">
					  	  <label>Name:</label><label>Abhishek Tripathi</label>
					  	  <label>Email:</label><label>Abhsihek@xicom.biz</label>
					  	  <label>PhoneNo:</label><label>234234234234</label>\
					  	  <label>Telephone NO:</label><label>21321423432</label>
					  	  
					  </div>
					  <div class="tab-pane" id="Notes">
					  	 <label>Subject</label><input type="text">
					  	  <label>Body</label><textarea></textarea>
					      <?php echo $this->Form->input('employee', array('type'=>'select', 'empty'=>__('Courses type'), 'class' => 'selectsearch', 'options' => $customer_type,'label'=>'','style'=>'width:200px;')); ?>
					  	  <input type="button" value="save"> 
					  	  <table>
						      <thead>
						        <tr>
						          <th>#</th>
						          <th>First Name</th>
						          <th>Last Name</th>
						          <th>Username</th>
						        </tr>
						      </thead>
						      <tbody>
						        <tr>
						          <td>1</td>
						          <td>Mark</td>
						          <td>Otto</td>
						          <td>@mdo</td>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------Customer information(Modal Window)------------------------------------------------------->
