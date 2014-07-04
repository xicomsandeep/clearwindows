<div id="header" class="mt70">
    <h1 class="text-center"><a href="#" >Clear Window</a></h1>
		</div>
<div class="login-wrap">
<?php echo $this->Form->create(null, array('url' => array('controller' => 'users','action' => 'login'),'inputDefaults' => array('label' => false,'div' => false,'class'=>'form-horizontal')));	?>

<div class="control-group form-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <?php 
				$username = isset($cookie_values['username']) ? $cookie_values['username'] : '';
				echo $this->Form->input('User.username', array('type' => 'text','placeholder' => 'Username', 'value' => $username, 'class' => 'form-control', 'size' => '38' ));?>

    </div>
</div>
<div class="control-group form-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <?php 
				$password = isset($cookie_values['password']) ? $cookie_values['password'] : '';
				echo $this->Form->input('User.password', array('type' => 'password' ,'placeholder' => 'Password', 'value' => $password,'class' => 'form-control', 'size' => '38' ));?>
    </div>
</div>
<div class="control-group form-group">
    <div class="controls">
        <label class="checkbox">
    <?php echo $this->Form->input('User.remember_me', array('type' => 'checkbox', 'class' => 'check', 'label' => false,'checked' => (isset($cookie_values) ? 'checked' : '') )); ?><label for="remember">Remember my login details</label>
        </label>
        <button type="submit" class="btn btn-success">Sign in</button>
    </div>
</div>
</form>

</div>