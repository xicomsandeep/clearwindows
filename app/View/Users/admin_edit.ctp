<?php ?>
<script>
	$(document).ready(function(){
		$('#frm_addedit').validate({
			rules: {
				'data[User][password]': {
					required: true,
					minlength: 6,
					maxlength: 20
				},
				'data[User][confirm_password]': {
					required: true,
					equalTo: "#UserPassword"
				}
			},
			messages: {
				UserConfirmPassword: {
					equalTo: "Password doesn't match."
				}
			}
		});
	})
</script>
    <div class="row">
		<div class="floatleft mtop10"><h1><?php echo $view_title ?></h1></div>
		<div class="floatright"><?php echo $this->Html->link('<span>Back to Users List</span>', array('controller' => 'Users', 'action' => 'index'), array('class' => 'black_btn', 'escape' => false)) ?></div>
    </div>
	<div align="center" class="greybox mtop15">
		<?php 
			echo $this->Form->create('User', array('id' => 'frm_addedit', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false)));
		?>
		
			<table cellspacing="0" cellpadding="7" border="0" align="center">
				
				<tr>
					<td valign="middle"><strong class="upper">User Type:</strong></td>
					<td><?php echo $this->Form->input('group_id', array('type'=>'select','options'=>$groups,'class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
			   <tr>
					<td valign="middle"><strong class="upper">First name:</strong></td>
					<td><?php echo $this->Form->input('first_name', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Last name:</strong></td>
					<td><?php echo $this->Form->input('last_name', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Username:</strong></td>
					<td><?php echo $this->Form->input('username', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">email:</strong></td>
					<td><?php echo $this->Form->input('email', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				
				<?php if($this->params['action']=='admin_add'){?>
				 <tr>
					<td valign="middle"><strong class="upper">Password:</strong></td>
					<td><?php echo $this->Form->input('password', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Confirm Password:</strong></td>
					<td><?php echo $this->Form->input('confirm_password', array('type'=>'password','class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				<?php } ?>
				 <tr>
					<td valign="middle"><strong class="upper">Address:</strong></td>
					<td><?php echo $this->Form->input('address', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Zip code:</strong></td>
					<td><?php echo $this->Form->input('zip_code', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
				</tr>
				
				
				
				<tr>
                	<td>&nbsp;</td>
					<td>
						<div class="floatleft">
							<input type="submit" class="submit_btn" value="">
						</div>
						<div class="floatleft" id="domain_loader" style="padding-left:5px;"></div>
					</td>
				</tr>
			</table>
		</form>
	</div>


