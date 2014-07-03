<?php ?>
 <!--Admin logn section Start from Here-->
<div id="login-box">
  <div class="white-box" style="width:325px; padding-top:60px;">
	<?php echo $this->Xicom->display_errors(); ?>
	<div class="tl">
	  <div class="tr">
		<div class="tm">&nbsp;</div>
	  </div>
	</div>
	<div class="ml">
	  <div class="mr">
		<div class="middle">
		  <div class="lb-data">
			<h1>Administrator Login</h1>			
			<p class="top15 gray12">Please enter a valid username and password to gain access to the administration console.</p>
			<?php
			echo $this->Form->create(
				null, array(
					'url' => array(
						'controller' => 'users', 
						'action' => 'admin_login'),
					'inputDefaults' => array(
							'label' => false,
							'div' => false
						)
				)
			);
			?>
			<p class="top30"><span class="login_field">
				<?php 
				$username = isset($cookie_values['username']) ? $cookie_values['username'] : '';
				echo $this->Form->input('User.username', array('type' => 'text','placeholder' => 'Username', 'value' => $username, 'class' => 'inpt', 'size' => '38' ));?>
			 
			  </span>
			</p>
			<p class="top15">
			<span class="login_field">
				<?php 
				$password = isset($cookie_values['password']) ? $cookie_values['password'] : '';
				echo $this->Form->input('User.password', array('type' => 'password' ,'placeholder' => 'Password', 'value' => $password,'class' => 'inpt', 'size' => '38' ));?>
			 </span>
			</p>
			<div class="top15">
				<div class="floatleft top15 gray12">
					<?php echo $this->Form->input('User.remember_me', array('type' => 'checkbox', 'class' => 'check', 'label' => false,'checked' => (isset($cookie_values) ? 'checked' : '') )); ?><label for="remember">Remember my login details</label>
				</div>
			   
				<div class="floatright">
					<div class="black_btn2"><span class="upper"><input type="submit" value="SUBMIT" name=""></span></div>
				</div>
			</div>
			<?php echo $this->Form->end() ?>
		  </div>
		</div>
	  </div>
	</div>
	<div class="bl">
	  <div class="br">
		<div class="bm">&nbsp;</div>
	  </div>
	</div>
  </div>
</div>
<!--Admin logn section end Here-->
