
    <div class="row">
		<div class="floatleft mtop10"><h1><?php echo $view_title ?></h1></div>
		<div class="floatright"><?php echo $this->Html->link('<span>Back to Users List</span>', array('controller' => 'Users', 'action' => 'index'), array('class' => 'black_btn', 'escape' => false)) ?></div>
    </div>
	<div align="center" class="greybox mtop15">
	
			<table cellspacing="0" cellpadding="7" border="0" align="center">
				
				<tr>
					<td valign="middle"><strong class="upper">User Type:</strong></td>
					<td><?php echo h($user['Group']['name']); ?></td>
				</tr>
			   <tr>
					<td valign="middle"><strong class="upper">First name:</strong></td>
					<td><?php echo h($user['User']['first_name']); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Last name:</strong></td>
					<td><?php echo h($user['User']['last_name']); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Username:</strong></td>
					<td><?php echo h($user['User']['username']); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">email:</strong></td>
					<td><?php echo h($user['User']['email']); ?></td>
				</tr>
				
				
				 <tr>
					<td valign="middle"><strong class="upper">Address:</strong></td>
					<td><?php echo h($user['User']['address']); ?></td>
				</tr>
				 <tr>
					<td valign="middle"><strong class="upper">Zip code:</strong></td>
					<td><?php echo h($user['User']['zip_code']); ?></td>
				</tr>
				
				
				
				<tr>
                	<td>&nbsp;</td>
					
				</tr>
			</table>
		</form>
	</div>


