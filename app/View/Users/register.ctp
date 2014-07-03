<?php
	echo $this->Html->script(array('jquery.form', 'jquery.autotab'));
?>
<section class="dashboard">
    <section class="contentcenter">
        <aside class="left-side login-left">
            <div class="sections">
                <h2>Why Join us</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum mollis tortor sed vestibulum. Praesent a fermentum dui. Nam ullamcorper at orci a semper. Maecenas vehicula, metus bibendum congue elementum, nibh nunc mattis lorem, luctus laoreet augue libero eu tortor. 
                </p>
                <ul>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Lorem ipsum dolor sit amet</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum mollis tortor sed vestibulum. Praesent a fermentum dui. Nam ullamcorper at orci a sempe</p>
            </div>            
        </aside>
        <div class="registerBox send-query">        	
            <h2>Become a <span>member</span></h2>
            <?php
            echo $this->Session->flash('success');
            echo $this->Session->flash('error');
            ?>         
            <?php echo $this->Form->create('User', array('id' => 'userSignUp', 'class' => 'formStyle', 'type' => 'file', 'multiple' => 'multiple')); ?>
            <div class="row mb30">
                <div class="col">
                    <label>First name <span class="star">*</span></label>
                    <div class="inputtext">
                        <?php echo $this->Form->input('first_name', array('type' => 'text', 'class' => 'required ', 'minlength' => 2, 'label' => false, 'div' => false)); ?>
                    </div>
                </div>
                <div class="col">
                    <label>Last name <span class="star">*</span></label>
                    <div class="inputtext">
                        <?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'required ', 'minlength' => 2, 'label' => false, 'div' => false)); ?>
                    </div>
                </div>
            </div>

            <div class="row mb30">
                <div class="col">
                    <label>Register as <span class="star">*</span></label>
                    <div class="inputtext"><?php echo $this->Form->input('user_type_id', array('type' => 'select', 'options' => $ARR_USER_TYPE, 'label' => false, 'div' => false)); ?></div>
                </div>
                <div class="col">
                    <label>Email address <span class="star">*</span></label>
                    <div class="inputtext">
                        <?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'required email', 'label' => false, 'div' => false)); ?>
                    </div>
                </div>
            </div>

            <div class="row mb30">
                <div class="col">
                    <label>Password <span class="star">*</span></label>
                    <div class="inputtext">
                        <?php
                        echo $this->Form->input('password', array('id' => 'signuppassword', 'class' => 'required', 'minlength' => 4, 'maxlength' => 20, 'label' => false, 'div' => false));
                        ?>
                    </div>
                </div>
                <div class="col">
                    <label>Confirm Password <span class="star">*</span></label>
                    <div class="inputtext">
                        <?php
                        echo $this->Form->input('confirm_password', array('type' => 'password', 'class' => 'required', 'equalTo' => '#signuppassword', 'label' => false, 'div' => false));
                        ?>
                    </div>
                </div>
            </div>

            <div class="row mb30 phone-no">
				<div class="col">
					<label>Landline number <span class="star">*</span></label>
					<div class="inputtext">
						<?php echo $this->Form->input('User.phone_number.0', array('type' => 'text', 'class' => 'phnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 3, 'size' => 3, 'style' => 'width:30px;')); ?> - 
						<?php echo $this->Form->input('User.phone_number.1', array('type' => 'text', 'class' => 'phnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 3, 'size' => 3, 'style' => 'width:50px;')); ?> - 
						<?php echo $this->Form->input('User.phone_number.2', array('type' => 'text', 'class' => 'phnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 10, 'size' => 10, 'style' => 'width:140px;')); ?>
						<label for="UserPhoneNumber0" class="error" style="display: none;">This field is required.</label>
					</div>
				</div>

				<div class="col">
					<label>Mobile/Cellphone number <span class="star">*</span></label>
					<div class="inputtext">
						<?php echo $this->Form->input('User.mobile_number.0', array('type' => 'text', 'class' => 'mbnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 3, 'size' => 3, 'style' => 'width:30px;')); ?> - 
						<?php echo $this->Form->input('User.mobile_number.1', array('type' => 'text', 'class' => 'mbnumber', 'label' => false, 'div' => false, 'type' => 'text', 'maxlength' => 10, 'size' => 10, 'style' => 'width:150px;')); ?>
						<label for="UserMobileNumber0" class="error" style="display: none;">This field is required.</label>
					</div>
				</div>
            </div>
            <div class="row upload-info">
                <label>Upload 3 recent works</label>
                <p class="row">We need to see an example of your work, so please upload 1 - 3 of your artworks, giving the price, Painting Name and Description  and this will help enable us to see if your account will be approved.</p>
            </div>
            <div class="clear"></div>
            <div class="recent-work mt10">
                <div class="col mb20">
                    <div class="row mt5" id="upload_work_1_div">
                        <div class="choose_file">
                            <span>Upload Image <small class="star">*</small></span>
                            <?php echo $this->Form->input('UserWork.work_photo', array('type' => 'file', 'id' => 'upload_work_1', 'onchange' => 'upload_recent_work(this.id);', 'label' => false, 'div' => false)); ?>
                        </div>
                    </div>
                    <?php echo $this->Form->input('UserWork.photo][1', array('type' => 'hidden', 'id' => 'upload_work_1_hidden', 'label' => false, 'div' => false)); ?>
                    <div class="row  choose_inputs">
                        <span>Title <small class="star">*</small></span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.title][1', array('type' => 'text', 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Name of Artist</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.artist][1', array('type' => 'text', 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Description <small class="star">*</small></span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.description][1', array('type' => 'textarea', 'cols' => 2, 'rows' => 2, 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Price</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.price][1', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'number')); ?>
                        </div>
                    </div>
                    
                </div>

                <div class="col mb20">
                    <div class="row mt5" id="upload_work_2_div">
                        <div class="choose_file">
                            <span>Upload Image</span>
                            <?php echo $this->Form->input('UserWork.work_photo', array('type' => 'file', 'id' => 'upload_work_2', 'onchange' => 'upload_recent_work(this.id);', 'label' => false, 'div' => false)); ?>
                        </div>                                
                    </div>
                    <?php echo $this->Form->input('UserWork.photo][2', array('type' => 'hidden', 'id' => 'upload_work_2_hidden', 'label' => false, 'div' => false)); ?>
                    <div class="row  choose_inputs">
                        <span>Title</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.title][2', array('type' => 'text', 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Name of Artist</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.artist][2', array('type' => 'text', 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Description</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.description][2', array('type' => 'textarea', 'cols' => 2, 'rows' => 2, 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Price</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.price][2', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'number')); ?>
                        </div>
                    </div>
                </div>
<div class="recent-work mt10">
                <div class="col">
                    <div class="row mt5" id="upload_work_3_div">
                        <div class="choose_file">
                            <span>Upload Image</span>
                            <?php echo $this->Form->input('UserWork.work_photo', array('type' => 'file', 'id' => 'upload_work_3', 'onchange' => 'upload_recent_work(this.id);', 'label' => false, 'div' => false)); ?>
                        </div>                                
                    </div>
                    <?php echo $this->Form->input('UserWork.photo][3', array('type' => 'hidden', 'id' => 'upload_work_3_hidden', 'label' => false, 'div' => false)); ?>
                    <div class="row choose_inputs ">
                        <span>Title</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.title][3', array('type' => 'text', 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Name of Artist</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.artist][3', array('type' => 'text', 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Description</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.description][3', array('type' => 'textarea', 'cols' => 2, 'rows' => 2, 'label' => false, 'div' => false)); ?>
                        </div>
                        <span>Price</span>
                        <div class="inputtext mt5">
                            <?php echo $this->Form->input('UserWork.price][3', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'number')); ?>
                        </div>
                    </div>
                </div>
     </div>

            </div>

            <div class="row">
                <div class="checkdiv">
                    <p>
                        <input id="terms_conditions" type="checkbox" class="required" value="1" name="data[User][terms]" /> 
                        I agree to accept the <?php echo $this->Html->link('terms and conditions', array('controller' => 'page', 'action' => 'terms'), array('class' => 'red', 'target' => '_blank')) ?>.</p>
                      <label for="data[User][terms]" class="error" style="display:none;">This field is required.</label>
                </div>
            </div>                        

            <div class="row">
                <?php echo $this->Form->submit('Create Account', array('class' => 'loginbtn reg ', 'label' => false, 'div' => false)); ?>
            </div>
            <?php
            echo $this->Form->end();
            ?>        	
        </div>      	
    </section>
    <div class="clear"></div>
</section>
<script language="javascript">
    $(document).ready(function() {
        $('#userSignUp').validate({
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
        $(".accountType").change(function() {
            var selected_type = $(this).val();
            if (selected_type == 'seller')
            {
                $(".recent-work").show();
            }
            else
            {
                $(".recent-work").hide();
            }
        });
        
        $('input.phnumber').autotab();
        $('.phnumber').autotab('filter', 'number');
        $('input.mbnumber').autotab();
        $('.mbnumber').autotab('filter', 'number');
    })

    function upload_recent_work(upload)
    {
        var input = $('#' + upload);
        var hidden_file = input.clone();
        $('<form enctype="multipart/form-data" method="post" id="upload_map"></form>').append(input).hide().appendTo('body').ajaxForm({
            url: site_url + 'users/upload_recent_work',
            success: function(data)
            {
                var data = jQuery.parseJSON(data);
                if (data.success)
                {
                    $('#' + upload + '_hidden').val(data.file_name);
                    $('#' + upload + '_div').html('<img src="' + data.file_temp_url + '" width="200" height="155" ><div class="change_edit"><input type="file" value="Change/Edit" name="data[UserWork][work_photo]" id="' + upload + '"  onchange="upload_recent_work(this.id);" /></div>');
                }
                else
                {
                    alert(data.error);
                }
            }
        }).submit();
    }


</script>
