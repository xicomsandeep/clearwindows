<?php ?>
<div class="users row">
 <?php 
    echo $this->Session->flash('success');
    echo $this->Session->flash('error');
    ?>
    <div class="floatleft mtop10"><h1><?php echo __('Change Password'); ?></h1></div>
    
    <div class="floatright">
        <?php echo $this->Html->link('<span>' . __('Back To Manage User') . '</span>', array('controller' => 'users', 'action' => 'manage', 'admin' => true), array('class' => 'black_btn', 'escape' => false)); ?>            </div>
</div>

<div align="center" class="whitebox mtop15">
    <?php
    //echo $this->Form->create('User');
    echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'change_password', 'admin' => true), 'type' => 'post'));
    ?>

    <table cellspacing="0" cellpadding="7" border="0" align="center">

        <tr>
            <td align="left"><strong class="upper">New Password</strong></td>
            <td align="left">	<?php
        echo $this->Form->input('password', array('class' => 'input required', 'label' => false, 'error' => false, 'div' => false, 'style'=>'width: 450px;'));
        ?>
            </td>
        </tr>
		<tr>
            <td align="left"></td>
            <td align="left"><div class="black_btn2"><span class="upper"><?php echo $this->Form->end('Change Password'); ?></span></div></td>
        </tr>
    </table>

</div>
