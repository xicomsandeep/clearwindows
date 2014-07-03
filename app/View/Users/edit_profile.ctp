<?php
echo $this->Html->css(array('jquery.Jcrop', 'popup'));
echo $this->Html->script(array('jquery.form', 'jquery.Jcrop.min', 'popup', 'jquery.autotab'));
?>
<section class="dashboard">
    <div class="inner-container">
        <?php echo $this->element('left_sidebar'); ?>		
        <div class="dashboard-right registerBox edttprofilebox content-right">                    
            <h2 class="main-heading">Edit Profile</h2>
            <?php
            echo $this->Session->flash('success');
            echo $this->Session->flash('error');
            ?> 
            <?php
            echo $this->Form->create('User', array('id' => 'userEditProfile', 'class' => 'formStyle', 'type' => 'file', 'multiple' => 'multiple'));
            ?>

            <div class="row editprofile m0">
                <div class="editimage">
                    <?php echo $this->Html->image(PROFILE_PHOTO_IMG . SMALL . $this->request->data['User']['photo'], array('id' => 'profile_image', 'width' => '140', 'height' => '120')) ?>
                </div>
                <div class="editupload">
                    <label><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'change_photo')) ?>" rel="popup">Change your Picture</a></label>                            
                </div>
            </div>
            <div>
                <div class="row profileinfo m0 bbottom0">
                    <h3>Personal Info</h3>
                </div>

                <div class="row profileinfo m0">

                    <div class="row mb35">
                        <div class="col">
                            <label>First Name <span class="star">*</span></label>
                            <div class="inputtext">
                                <?php echo $this->Form->input('first_name', array('type' => 'text', 'class' => 'required alpha', 'label' => false, 'div' => false)); ?>
                            </div>
                        </div>

                        <div class="col">
                            <label>Last Name <span class="star">*</span></label>
                            <div class="inputtext">
                                <?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'required alpha', 'label' => false, 'div' => false)); ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Email</label>
                            <div class="inputtext">
                                <?php echo $row_user['User']['email'] . ' ' . $this->Html->link(__('Change email id'), array('controller' => 'users', 'action' => 'change_email'), array('class' => 'red')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb35">
                        <div class="col">
                            <label>Address 1 <span class="star">*</span></label>
                            <div class="inputtext">
                                <?php echo $this->Form->input('address', array('type' => 'text', 'class' => 'required ', 'label' => false, 'div' => false)); ?>
                            </div>
                        </div>

                        <div class="col">
                            <label>Address 2 <span class="star">*</span></label>
                            <div class="inputtext">
                                <?php echo $this->Form->input('address2', array('type' => 'text', 'class' => 'required ', 'label' => false, 'div' => false)); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb30">
                        <div class="col">
                            <label>Location</label>
                            <div class="inputtext">
                                <?php echo $this->Form->input('country_id', array('type' => 'select', 'options' => $country_list, 'class' => 'required ', 'label' => false, 'div' => false)); ?>
                            </div>
                        </div>

                        <div class="col">
                            <div class="inputtext mid mr10">
                                <label> City <span class="star">*</span></label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('city', array('type' => 'text', 'class' => 'required ', 'label' => false, 'div' => false)); ?>
                                </div>
                            </div>
                        </div>                     
                    </div>
                    <div class="row mb30">
                        <div class="col">
                            <div class="inputtext mid">
                                <label>Zip Code <span class="star">*</span></label>
                                <div class="inputtext">
                                    <?php echo $this->Form->input('zip_code', array('type' => 'text', 'class' => 'required digits', 'label' => false, 'div' => false, 'maxlength' => 6)); ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div>

                    <div class="row profileinfo bbottom0 m0">
                        <h3>Contact Info</h3>
                    </div>

                    <div class="row profileinfo bbottom0">

                        <div class="row mb35">
                            <div class="col phone-no">
                                <label>Landline number</label>
                                <div class="inputtext">
									<?php echo $this->Form->input('User.phone_number.0', array('type' => 'text', 'class' => 'phnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 3, 'size' => 3, 'style' => 'width:30px;', 'required' => false)); ?> - 
									<?php echo $this->Form->input('User.phone_number.1', array('type' => 'text', 'class' => 'phnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 3, 'size' => 3, 'style' => 'width:50px;')); ?> - 
									<?php echo $this->Form->input('User.phone_number.2', array('type' => 'text', 'class' => 'phnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 10, 'size' => 10, 'style' => 'width:140px;')); ?>
									<label for="UserPhoneNumber0" class="error" style="display: none;">This field is required.</label>
								</div>
                            </div>

                            <div class="col phone-no">
                                <label>Mobile/Cellphone number</label>
                                <div class="inputtext">
									<?php echo $this->Form->input('User.mobile_number.0', array('type' => 'text', 'class' => 'mbnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 3, 'size' => 3, 'style' => 'width:30px;', 'required' => false)); ?> - 
									<?php echo $this->Form->input('User.mobile_number.1', array('type' => 'text', 'class' => 'mbnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 10, 'size' => 10, 'style' => 'width:150px;')); ?>
									<label for="UserMobileNumber0" class="error" style="display: none;">This field is required.</label>
								</div>
                            </div>
                        </div>                             


                    </div>

                </div>

                <div class="row">
                    <div class="submitButtonBox">
                        <?php echo $this->Form->submit('Save Changes', array('class' => 'loginbtn reg ', 'label' => false, 'div' => false)); ?>
                    </div>
                </div>
                <?php
                echo $this->Form->end();
                ?>

            </div>

        </div>
</section>
<script>
    $("#userEditProfile").validate({
		 'rules': {
			'data[User][mobile_number][0]': {
				required: function() {
					return ($('input[name="data[User][phone_number][0]"]').val() == '');
				}
			},
			'data[User][phone_number][0]': {
				required: function() {
					return ($('input[name="data[User][mobile_number][0]"]').val() == '');
				}
			}
		},
        submitHandler: function(form) {
            form.submit();
        }
    });
    
	$('input.phnumber').autotab();
	$('.phnumber').autotab('filter', 'number');
	$('input.mbnumber').autotab();
	$('.mbnumber').autotab('filter', 'number');
</script>
