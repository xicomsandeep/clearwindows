<?php $this->Paginator->options(array('url' => array('?' => $this->params->query)));

	$this->Html->scriptBlock('function chg_rec_per_page(num)
		{
			var url = \''.html_entity_decode($this->Paginator->url(array('?' => array_merge($this->params->query, array('count' => ''))))).'\'+num
			window.location = url;
		}', array('inline' => false));
?>
<h1><?php echo $view_title ?></h1>
<div class="floatright"><?php echo $this->Html->link('<span>Add Job Type</span>', array('controller' => 'JobTypes', 'action' => 'add'), array('class' => 'black_btn', 'escape' => false)) ?></div>
<div class="row mtop15">
	<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
		<tr valign="top">
		  <td align="left" class="searchbox">
			<div class="floatleft">
				<?php echo $this->Form->create(null, array('url' => array('controller' => 'JobTypes', 'action' => 'admin_index', 'admin' => true), 'name' => 'frm_srch', 'id' => 'frm_srch', 'type' => 'get', 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false))) ?>
				  <table width="100%" cellpadding="4" cellspacing="2" >
					  <tr>
						  <td width="20%">Keyword</td>
						  <td width="30%"><?php echo $this->Form->input('keyword', array('name' => 'name', 'class' => 'input', 'style' => "width: 300px;", 'value' => (!empty($this->params->query['name'])?$this->params->query['name']:''), 'required' => false)); ?></td>
					    </tr>
					    <tr>
						 <td colspan="2" align="right"><div class="black_btn2"><span class="upper"><input type="submit" class="search_btne" value="Search" name=""></span></div></td>
					</tr>	
										  
				  </table>
				</form>
			</div>
		  </td>
	  </tr>
	</table>
</div>
<div class="row mtop30">
	<form name="frm_user" id="frm_user" action="<?php echo $this->Html->url(array('controller' => 'JobTypes', 'action' => 'manage_action')); ?>" method="post" onsubmit="return CheckUserAction(this)">
		<br clear="all" /><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" class="listing">
			<tr>
				<td colspan="11">
					<div class="pagination floatright">
						<?php echo $this->Paginator->counter(array('format' => 'Showing Records: %start% to %end% of %count%'));  ?>
						&nbsp;&nbsp; <?php echo $this->Form->input('rec_per_page', array('type'=>'select', 'class' => 'input', 'style' => "width: 150px;", 'label' => false, 'div' => false, 'error' => false, 'options'=>Configure::read('ARR_REC_PER_PAGE'), 'default' => (!empty($this->params->query['count'])?$this->params->query['count']:ADMIN_NUM_PER_PAGE), 'onchange' => 'chg_rec_per_page(this.value)')); ?>
						
					</div>
				</td>
			</tr>
			<tr>
				<th width="5%" align="left" nowrap="nowrap">#ID</th>
				<th width="17%" align="left" nowrap="nowrap">Name</th>
	         
	            <th width="5%" align="center" nowrap="nowrap">Created</th>
				<th width="5%" align="center" nowrap="nowrap">Modified</th>
				<th width="5%" align="center" nowrap="nowrap">Action</th>
				<th width="5%" align="center" nowrap="nowrap"><input type="checkbox" name="checkall" id="checkall" onclick="checkAll(this);" /></th>
			</tr>
			<?php 
			if(count($job_type))
			{
				//pr($result_arr);
			
				$i=1;
				$bgClass="";
				foreach($job_type as $row_arr)
				{
					//debug($row_arr);exit;
					$row = $row_arr['JobType'];
					//$page++;
					if($i%2==0)
						$bgClass = "oddRow";
					else
						$bgClass = "evenRow";

				?>
				<tr class="<?=$bgClass?>">
					<td align="left"><?php echo $row['id'];?></td>
				
					<td align="left"><?php echo $row['name']?></td>
                    
                    <td align="center"><?php echo formatDateTime($row['created']); ?></td>
				  
					<td align="center"><?php echo formatDateTime($row['modified']); ?></td>
					
					<td align="center">
						<?php echo $this->Html->image(ADMIN_IMAGES_PATH.'edit_icon.gif', array('url'=>array('controller'=>'JobTypes', 'action'=>'edit', $row['id'], 'admin'=>true))); ?>
				
						<?php echo $this->Html->image(ADMIN_IMAGES_PATH.'view.gif', array('url'=>array('controller'=>'JobTypes', 'action'=>'view', $row['id'], 'admin'=>true))); ?>
			
					<td align="center"><input type="checkbox" name="list[]" value="<?php echo $row['id'];?>"/></td>
			
				</tr> 
			<?php
					$i++; 
				}
			?>
			<tr>
                <td colspan="11" align="left" class="bordernone">
					<div class="floatleft mtop7">
						<div class="pagination">
							<?php echo $this->Paginator->prev("<< Previous", null, null, array('class' => 'disabled')); ?>
							<?php echo $this->Paginator->numbers(); ?>
							<?php echo $this->Paginator->next("Next >>", null, null, array('class' => 'disabled')); ?>
							<!-- prints X of Y, where X is current page and Y is number of pages -->
						</div>
					</div>
				  			<div class="floatright">
						<div class="floatleft">
						<span class="redtext top5" id="err_status" style="float:left;"></span> &nbsp;&nbsp;
						<select name="task" id="task" class="select-small" >
							<option value="">Select Option</option>
						
							<option value="delete">Delete</option>
						 </select>
						</div>
						<div class="floatleft mleft10"><input type="submit" class="submit_btn" value="" name="Search"></div>
				</td>
			</tr>
			<?php
			} else{
			?>
				<tr class="redtext">
					<td align="center" colspan="8">No record found</td>
				</tr>
			<?php }?>
		</table>
	</form>
</div>
