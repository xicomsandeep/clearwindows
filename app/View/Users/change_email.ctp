<section class="dashboard">
	<div class="inner-container">
		<?php echo $this->element('left_sidebar'); ?>		

   		 <div class="dashboard-right registerBox account content-right">
			 <h2 class="main-heading"><?php echo __('Change Email')?></h2>
	   		 	<?php echo $this->Xicom->display_errors($errors); ?>
                 <?php 
					echo $this->Form->create('User', array('url' => $this->Html->url( null, true ), 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false)));
				 ?>
                    <div class="row bborder1">
                        <dl class="row">
							<dt class="textleft col"><?php echo $this->Form->label('User.new_email', __('New Email ID'));?>
                                                            
                                                        <div class="inputtext"><?php echo $this->Form->input('User.new_email', array('class' => 'email required input','type' => 'text')); ?></div></dt>
                                                        <dd class="col"><?php echo $this->Form->label('User.confirm_email', __('Confirm New Email ID'));?>
                                                            <div class="inputtext"><?php echo $this->Form->input('User.confirm_email', array('class' => 'email required input', 'type' => 'text')); ?></div>
                                                        </dd>
						</dl>        
                        <dl class="row">
							<dt>&nbsp;&nbsp;&nbsp;</dt>
                                                        <dd><input class="black-btn" type="submit" value="<?php echo __('Submit')?>"></dd>
						</dl>
                    </div>
               <?php
               echo $this->Form->end();
               ?>
            	
            </div>   
    </div>
</section>
<script>
	$("#UserChangeEmailForm").validate({
		rules:{
			'data[User][confirm_email]': {
				equalTo: "#UserNewEmail"
			}
		}
	});
</script>
