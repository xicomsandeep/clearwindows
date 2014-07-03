<div id="container">
	<h1>Dashboard</h1>   
    <div align="center" class="whitebox mtop15">
	<?php echo $this->Session->flash(); ?>
	<table cellspacing="0" cellpadding="5" border="0" align="center" style="margin-top:70px;">
		  <tr>
			    <td valign="top" align="left"><?php echo $this->Html->image('/admin_images/dashboard-graphic.png')?></td>
				<td valign="top" align="left">
					<span class="size26">Welcome to Creators Exchange!</span><br /><br />
					<span class="size14">Please use the navigation links at the top to access different<br />
					sections of the administration panel.</span>
				</td>
		  </tr>
	</table>
</div>
