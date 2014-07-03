<div class="popupCntr">
	<span class="overlay"></span>	
	<div class="popupBox">		
	    <a class="close" href="<?php echo SITE_URL; ?>"><img src="<?php echo FRONT_END_IMAGES_PATH ?>close_btn.png" alt="" /></a>	
	    <div class="content">	        
	        <h2>Change your <span>password</span></h2>
	        <?php echo $this->Xicom->display_errors(); ?>
            <?php
			echo $this->Form->create(
				null, array(
					'url' => array(
						'controller' => 'users', 
						'action' => 'update_password',$token),
					'inputDefaults' => array(
							'label' => false,
							'div' => false
						),
						'name'=>'userform'
					)
				);
			?>	        
	        <div class="row">
	            <div class="col">
	                <label>Password</label>
	                <div class="inputtext">
	                    <?php echo $this->Form->input('User.password', array('type' => 'password', 'tabindex' => '1','required' => false, 'class'=>'required','placeholder'=>'Password','id'=>'userPasswordNew'));?>
	                </div>
	            </div>
	            <div class="col">
	                <label>Confirm Password</label>
	                <div class="inputtext">
						<?php echo $this->Form->input('User.confirm_password', array('type' => 'password', 'tabindex' => '2','required' =>false,'class' => 'required','placeholder'=>'Confirm password'));?>					
	                </div>
	            </div>
	        </div>
	        <?php echo $this->Form->submit('Reset Password', array ('class' => 'loginbtn mt20 ', 'label' => false, 'div' => false)); ?>
	        <?php echo $this->Form->end();?> 	       
		</div>
	</div>
</div>
<script language="javascript">

    $(document).ready(function() {
        $('#UserUpdatePasswordForm').validate({
            submitHandler: function(form) {                
                form.submit();
            }   
        });
    })
    
</script>


