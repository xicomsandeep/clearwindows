<?php ?>
<div id="header">
    <div id="head_lt">
		<!--Logo Start from Here-->
		<span class="floatleft logo">
			<?php 
				echo $this->Html->link($this->Html->image(ADMIN_IMAGES_PATH.'/logo.png', array('title' => "Creators Exchange", 'alt' => "Creators Exchange")), '/admin/', array('escape' => false));
			?>
		</span>
		<!--Logo end  Here-->
    </div>
<?php
	if(!empty($SESS_ADMIN_USERID))
	{
	?>
		<div id="head_rt">Welcome <span><?php echo $SESS_ADMIN_USERNAME; ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo date('d M, Y H:i A');?></div>
	<?php
	}
?>
</div>

<?php
	if(!empty($SESS_ADMIN_USERID))
	{
?>
<div class="menubg">
	<div class="nav">
		<ul id="navigation">
			<li onmouseout="this.className=''" onmouseover="this.className='hov'">
				<?php echo $this->Html->link('Dashboard', array('controller' => 'users', 'action' => 'admin_dashboard')); ?>
			</li>
			<li onmouseover="this.className='hov'" onmouseout="this.className=''"><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'admin_manage'), array('title' => 'Users Listing')); ?>
				<div class="sub">
					<ul>
						<li><?php echo $this->Html->link('Manage Users', array('controller' => 'users', 'action' => 'admin_index'), array('title' => 'Users Listing')); ?></li>
					</ul>
				</div>
			</li>
		   <li onmouseout="this.className=''" onmouseover="this.className='hov'">
				<?php echo $this->Html->link('Manage Job Type', array('controller' => 'JobTypes', 'action' => 'admin_index')); ?>
				
			</li>
					
			
			<li onmouseout="this.className=''" onmouseover="this.className='hov'">
				<?php echo $this->Html->link('Settings', array('controller' => 'settings', 'action' => 'admin_edit')); ?>
				<div class="sub">
					<ul>
						<li><?php echo $this->Html->link('Manage Settings', array('controller' => 'settings', 'action' => 'admin_edit'), array('title' => 'Manage Settings')); ?></li>
						<li><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'admin_change_password'), array('title' => '')); ?></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	<div class="logout"><?php echo $this->Html->link($this->Html->image(ADMIN_IMAGES_PATH.'logout.gif'), array('controller' => 'users', 'action' => 'admin_logout'), array('escape' => false)); ?></div>
</div>
<?php
	}
?>
