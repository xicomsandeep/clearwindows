<?php

/**
 * Project : Toolcup.com
 * Author  : Nitin
 * Created on : 10-Nov-2011
 * Description : Common helper for custom created function
 */
class XicomHelper extends AppHelper
{
	var $helpers = array('Session', 'Html');
	var $components = 'Session';

	/**
	 * Purpose : to display session errors
	 * Created on : 10-Nov-2011
	 * Author : Nitin
	 */
	function display_errors($errors = '')
	{
		if (($msg = $this->Session->flash()) != '')
		{
			echo $msg;
		}
		elseif (($msg = $this->Session->flash('success')) != '')
		{
			echo $msg;
		}
		elseif (($msg = $this->Session->flash('error')) != '')
		{
			echo $msg;
		}
		elseif ($errors)
		{
			$this->str_from_arr($str, $errors);
			$str = array_unique($str);
			$str = @implode('<br/>', $str);
			echo '<div class="flash_error">' . $str . '</div>';
		}
		else
		{
			echo $this->Session->flash('auth');
		}
	}

	/**
	 * Purpose : to display session errors
	 * Created on : 10-Nov-2011
	 * Author : Nitin
	 */
	function str_from_arr(&$str, $errors)
	{
		if (is_array($errors))
		{
			foreach ($errors as $val)
			{
				$this->str_from_arr($str, $val);
			}
		}
		else
		{
			$str[] = $errors;
		}
	}

	/**
	 * Purpose : TO DISPLAY FACEBOOK LOGIN BUTTON
	 * Created on : 31-Jul-2012
	 * Author : Nitin
	 */
	function fb_button($distxt, $extra="")
	{
		$out = '';
		
		//IF THE FUNCTION IS CALLED MORE THAN ONCE ON THE SAME PAGE THEN NOT TO ADD SCRIPT AGAIN
		if(!defined('FB_BUTTON_SCRIPT_FLAG'))
		{
			$out = '<script type="text/javascript">
				window.fbAsyncInit = function() {
					FB.init({
					  appId      : \''.FB_APP_ID.'\', // App ID
					  status     : true, // check login status
					  cookie     : true // enable cookies to allow the server to access the session
					  //xfbml      : true  // parse XFBML
					});
				};
		  
				(function() {
					var e = document.createElement(\'script\'); e.async = true;
					e.src = document.location.protocol +
					\'//connect.facebook.net/en_US/all.js\';
					document.getElementById(\'fb-root\').appendChild(e);
				}());
		  
				function fbconnect_login() {
					FB.login(function(response) {
						//alert(JSON.stringify(response))
						//alert(response.authResponse.accessToken)
						if (response.status == \'connected\') 
						{
							window.location=\''.SITE_URL.'user/fb_connect/\';
						}
						/* else 
						{
							window.location.reload();
						} */
					}, {scope:\'email,user_birthday,user_location,user_about_me,user_hometown\'});
				}
			</script>';

			define('FB_BUTTON_SCRIPT_FLAG', true);
		}
		
		$out .= '<a href="javascript:void(0);" onclick="fbconnect_login()" '.$extra.'>'.$distxt.'</a>';

		return $out;
	}

	/**
	 * Purpose : TO DISPLAY LINKED LOGIN BUTTON
	 * Created on : 3-Sep-2012
	 * Author : Nitin
	 */
	function twitter_button($distxt, $extra = '')
	{
		$out = '<a href="'.SITE_URL.'user/twitter_connect/redirect/" '.$extra.'>'.$distxt.'</a>';
		echo $out;
	}
	
}
