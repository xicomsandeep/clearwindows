<section class="dashboard">
    <div class="inner-container">
        <?php echo $this->element('left_sidebar'); ?>		

        <div class="dashboard-right registerBox account content-right">
            <h2 class="main-heading"><?php echo __('Change Password') ?></h2>
            <?php echo $this->Xicom->display_errors($errors); ?> 
            <?php
            echo $this->Form->create('User', array('url' => $this->Html->url(null, true), 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false)));
            ?>
            <div class="bborder1">
                <dl class="row">
                    <dt class="textleft col">
                    <?php echo $this->Form->label('old_password', __('Existing Password').' <span class="star">*</span>'); ?>
                    <div class="inputtext"><?php echo $this->Form->input('old_password', array('class' => 'required input', 'style' => '', 'type' => 'password')); ?></div>
                    </dt>

                    <dd class="col">
                        <?php echo $this->Form->label('password', __('New Password').' <span class="star">*</span>'); ?>
                        <div class="inputtext"><?php echo $this->Form->input('password', array('class' => 'required input', 'style' => '', 'type' => 'password')); ?></div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="textleft col">
                    <?php echo $this->Form->label('confirm_password', __('Re-type New Password').' <span class="star">*</span>'); ?>
                    <div class="inputtext"><?php echo $this->Form->input('confirm_password', array('class' => 'required input', 'style' => '', 'type' => 'password')); ?></div>
                    </dt>
                    <dd class="col">

                    </dd>
                </dl>                
                <dl class="row">
                    <dt>&nbsp;&nbsp;&nbsp;</dt>
                    <dd class="col">
                        <input type="submit" value="<?php echo __('Submit') ?>" class="black-btn">
                    </dd>
                </dl>
            </div>
            <?php
            echo $this->Form->end();
            ?>

        </div>   
    </div>
</section>
<script>
    $("#UserChangePasswordForm").validate({
        rules: {
            'data[User][password]': {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            'data[User][confirm_password]': {
                required: true,
                equalTo: "#UserPassword"
            }
        }
    });
</script>
