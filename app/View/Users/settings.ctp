<section id="contentCntr" class="add-product">
    <section class="contentcenter">
		<h2>My <strong>Account</strong></h2>

		<?php echo $this->element('left_sidebar'); ?>		

   		 <div class="registerBox account content-right">
	   		 	<?php
	            echo $this->Session->flash('success');
				echo $this->Session->flash('error');
				?> 
                 <?php 
                 echo $this->Form->create('User', array ('id' => 'userEditProfile', 'class' => 'formStyle','type' => 'file','multiple'=>'multiple'));
				 echo $this->Form->input('id', array('type' => 'hidden', 'value' => $user_data['User']['id']) );
				 ?>
                        
                    <div class="row bborder1">
                        <h4>Change Email</h4>
                        <p>Current email: <?php echo $user_data['User']['email']; ?> </p>                            
                        <div class="row mb30">
                            <div class="col">
                                <label>New Email</label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('new_email', array ('type' => 'text', 'required' => false,'label' => false, 'div' => false)); ?>
                                	<?php if ( isset($errArr['new_email']) ) : ?>
                                	<label for="NewEmail" class="error"><?php echo $errArr['new_email'] ?></label>
                                	<?php endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <label>Confirm New email </label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('confirm_email', array ('type' => 'text','label' => false, 'div' => false)); ?>
                                	<?php if ( isset($errArr['confirm_email']) ) : ?>
                                	<label for="ConfirmEmail" class="error"><?php echo $errArr['confirm_email'] ?></label>
                                	<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row pt30 bborder1">
                        <h4>Change password</h4>
                        <div class="row mb30">
                            <div class="col">
                                <label>Current password</label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('current_password', array ('type' => 'password','label' => false, 'div' => false)); ?>
                                    <?php if ( isset($errArr['current_password']) ) : ?>
                                	<label for="CurrentPassword" class="error"><?php echo $errArr['current_password'] ?></label>
                                	<?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="row mb30">
                            <div class="col">
                                <label>New password </label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('new_password', array ('type' => 'password','label' => false, 'div' => false)); ?>
                                    <?php if ( isset($errArr['new_password']) ) : ?>
                                	<label for="NewPassword" class="error"><?php echo $errArr['new_password'] ?></label>
                                	<?php endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <label>Confirm New password</label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('confirm_new_password', array ('type' => 'password','label' => false, 'div' => false)); ?>
                                     <?php if ( isset($errArr['confirm_new_password']) ) : ?>
                                	<label for="ConfirmNewPassword" class="error"><?php echo $errArr['confirm_new_password'] ?></label>
                                	<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--   
                    <div class="row pt30 bborder1">
                        <h4>Change URL </h4>

                        <div class="row mb30">
                            <div class="col">
                                <label>Current URL: imranr</label>
                            </div>
                            <div class="col">
                                <label>New URL</label>
                                <div class="inputtext">
                                    <input type="text" />
                                </div>
                            </div>

                        </div>                      
                        
                    </div>-->
                        
                    <div class="row pt30 mb30">
                        <!--<h4>Notification</h4>

                        <div class="row pb30 bborder1">
                            <div class="col">
                                <label>Notify me when someone:</label>
                            </div>
                            <div class="checkarae">
                                <p><input type="checkbox" />Send me direct message</p>
                                <p><input type="checkbox" />Follow me</p>
                                <p><input type="checkbox" />Comment on my artwork</p>
                                <p><input type="checkbox" />Request to assign me for the artwork </p>
                            </div>

                        </div>-->
                        
                        <div class="row pt30 pb20">
                        
                            <h4>Newsletter</h4>
                            <div class="checkarae">
                                <p>
                                	<?php 
                                	$this->request->data['User']['send_newsletter'] = $user_data['User']['send_newsletter'];
                                	echo $this->Form->input('send_newsletter', array('type' => 'checkbox', 'label' => false, 'div' => false) ) ?>
                                	I would like to receive periodic newsletter and announcements </p>
                            </div>

                        </div>
                        
                    </div>
                            
                    <div class="row">
                    	<div class="submitButtonBox">
                    	 <?php echo $this->Form->submit('Save Changes', array ('class' => 'loginbtn reg ', 'label' => false, 'div' => false)); ?>
                    	</div>
                    </div>
               <?php
               echo $this->Form->end();
               ?>
            	
            </div>   
    </section>
</section>
<script>
/*$("#userEditProfile").validate({
  submitHandler: function(form) {
  	if ( $("#UserNewEmail").val() != ''){alert("in");
  		$("#userEditProfile").validate({
				rules: {
					'data[User][new_email]': {
						required: true,
						email: true
					},
					'data[User][confirm_email]': {
						required: true,
						equalTo: "#UserConfirmEmail"
					}
				},
				messages: {
					'data[User][new_email]': {
						required: "Please provide a email",
						email: "Please enter a valid email address",
						minlength: "Your password must be at least 5 characters long"
					},
					'data[User][confirm_email]': {
						required: "Please provide a email",
						equalTo: "Please enter the same email as above"
					}
				}
			});
  		return false;
  	}
    form.submit();
  }
 });*/
</script>