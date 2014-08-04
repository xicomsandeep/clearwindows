<?php ?>

    <div class="row">
		<div class="floatleft mtop10"><h1><?php echo $view_title ?></h1></div>
		<div class="floatright"><?php echo $this->Html->link('<span>Back to list page</span>', array('controller' => 'JobTypes', 'action' => 'index'), array('class' => 'black_btn', 'escape' => false)) ?></div>
    </div>
	<div align="center" class="greybox mtop15">
		<?php 
			echo $this->Form->create('JobType', array('id' => 'frm_addedit', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false)));
		?>
		
			<table cellspacing="0" cellpadding="7" border="0" align="center">
				<tr>
					<td valign="middle"><strong class="upper">Name:</strong></td>
					<td><?php echo $this->Form->input('name', array('class' => 'input required', 'style' => "width: 450px;")); ?></td>
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


