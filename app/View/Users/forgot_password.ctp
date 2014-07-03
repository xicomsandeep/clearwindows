<div class="popupCntr">
	<span class="overlay"></span>	
	<div class="popupBox">		
	    <a class="close" href="<?php echo SITE_URL; ?>"><img src="<?php echo FRONT_END_IMAGES_PATH ?>close_btn.png" alt="" /></a>	
	    <div class="content">	        
	        <h2>Forgot <span>Password</span></h2>
	        <?php echo $this->Xicom->display_errors(); ?>
            <?php
				echo $this->Form->create(
					null, array(
						'url' => array(
							'controller' => 'users', 
							'action' => 'forgot_password'),
						'inputDefaults' => array(
								'label' => false,
								'div' => false
							)
						)
					);
				?>	        
	        <div class="row">
	            <div class="col">
	                <label>Email</label>
	                <div class="inputtext">
	                    <?php echo $this->Form->input('User.email', array('type' => 'text','required' => false,'placeholder'=>'Email address', 'class'=>'required' ));?> 
	                </div>
	            </div>
	        </div>
	        <?php echo $this->Form->submit('Forgot Password', array ('class' => 'black-btn mt20', 'label' => false, 'div' => false)); ?>
	        <?php echo $this->Form->end();?> 	       
		</div>
	</div>
</div>
<script language="javascript">

    $(document).ready(function() {
        $('#UserForgotPasswordForm').validate({
            submitHandler: function(form) {                
                form.submit();
            }   
        });
    })
    
</script>
