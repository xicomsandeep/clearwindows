<div class="popupCntr">
	<span class="overlay"></span>	
	<div class="popupBox">		
	    <a class="close" href="<?php echo SITE_URL; ?>"><img src="<?php echo FRONT_END_IMAGES_PATH ?>close_btn.png" alt="" /></a>	
	    <div class="content">	        
	        <h2>Log In to Your <span>Account</span></h2>
	        <?php echo $this->Xicom->display_errors(); ?>
            <?php
				echo $this->Form->create(
					null, array(
						'url' => array(
							'controller' => 'users', 
							'action' => 'login'),
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
	                    <?php echo $this->Form->input('User.email', array('type' => 'text','required' => 'false' ,'placeholder'=>'Email address', 'class'=>'required'));?>                    

	                <div class="checkdiv">
	                    <p><?php echo $this->Form->checkbox('remember_me', array ('class' => '', 'label' => false, 'div' => false)); ?> Remember me</p>
	                </div>
	                </div>
	            </div>
	            
	            <div class="col">
	                <label>Password</label>
	                <div class="inputtext">
	                     <?php echo $this->Form->input('User.password', array('type' => 'password','required' => 'false' ,'placeholder'=>'Password', 'class'=>'required'));?>                        
	                </div>
	                <div class="checkdiv" style="width:100%;">
	                    <a href="<?php echo $this->Html->url( array('controller' => 'users', 'action' => 'forgot_password') ) ?>">Forgot your Password? </a>
	                </div>
	            </div>
	        </div>
	        <?php echo $this->Form->submit('Login', array ('class' => 'loginbtn ', 'label' => false, 'div' => false)); ?>
	        <?php                
            echo $this->Form->end();
			?> 	       
	        
		</div>
	                        
	    <div class="row account">
	        <a class="black-btn fright" href="<?php echo $this->Html->url( array('controller' => 'users', 'action' => 'register' ) ) ?>"><span>Create your Account</span></a>	
	    	<span class="text">Are you a New User?</span>
	    </div>    
	</div>
</div>

<script language="javascript">

    $(document).ready(function() {
        $('#UserLoginForm').validate({
            submitHandler: function(form) {                
                form.submit();
            }   
        });
    })
    
</script>
