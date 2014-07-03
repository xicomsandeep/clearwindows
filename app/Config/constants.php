<?php
$config['xs'] = 'xs';

if($_SERVER['HTTP_HOST'] == 'demo.xicom.us' || $_SERVER['HTTP_HOST'] == '192.168.1.201')
{	

	define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/clearwindow/');
}
elseif($_SERVER['HTTP_HOST'] == '192.168.1.107' || $_SERVER['HTTP_HOST'] == 'localhost')
{
	
	define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/clearwindow/website/');
}
elseif($_SERVER['HTTP_HOST'] == '5.79.20.142')
{
	
	define('SITE_URL', 'http://5.79.20.142/');
}
else 
{
	
	define('SITE_URL', 'http://www.masterpieces.uk.com/');
}

define('DEFAULT_CURRENCY_NAME', 'USD');
define('DEFAULT_CURRENCY', '$');
define('APPLICATION_NAME','Clear Window');
define('CAKE_ADMIN', 'admin');
define('ADMIN_EMAIL','xicom.test@gmail.com');


define('DEFAULT_META_TITLE', "Clear Window");
define('DEFAULT_META_DESCRIPTION', "Clear Window: Internal management.");
define('DEFAULT_META_KEYWORDS', "Clear Window");


//SOCIAL NETWORKING SITE URLS
define('SITE_FACEBOOK_URL', 'http://www.facebook.com/');
define('SITE_TWITTER_URL', 'http://www.twitter.com/');
define('SITE_PINTEREST_URL', 'http://www.pinterest.com/');
define('SITE_GPLUS_URL', 'https://plus.google.com/');
define('SITE_YOUTUBE_URL', 'http://www.youtube.com/');


define('ADMIN_IMAGES_PATH', SITE_URL.'admin_images/');
define('FRONT_END_IMAGES_PATH', SITE_URL.'images/');
define('ADMIN_PAGE_LIMIT',30);
define('PAGE_LIMIT',30);


//ESCROW DETAILS
define('ESCROW_PARTNER_ID', 6477);
define('ESCROW_EMAIL_ID', 'masterpieces121@gmail.com');

class UserRoleConst {

	Const RoleAdmin = 'admin';
	Const RoleUser = 'user';	
}


define('NUM_PER_PAGE', '30');
define('FEED_NUM_PER_PAGE', '20');
define('ADMIN_NUM_PER_PAGE', '30');
define('NUM_COMMENT_PER_PAGE', '15');
define('COMPETITION_NUM_PER_PAGE', '5');
	

define('STATUS_INACTIVE', 0);
define('STATUS_ACTIVE', 1);
define('STATUS_DELETED', 2);



define('SMALL','S_');
define('MEDIUM','M_');
define('LARGE','L_');


define('AUTHENTICATION_DOC_DIR', WWW_ROOT. 'files' .DS. 'authentication' . DS );
define('AUTHENTICATION_DOC_PATH', SITE_URL . 'files/authentication/' );




if($_SERVER['HTTP_HOST'] == '192.168.1.107' || $_SERVER['HTTP_HOST'] == 'localhost')
{
	define('PRODUCT_THUMB_DIR', WWW_ROOT. 'files' .DS. 'products' . DS. 'thumb' . DS );
	define('PRODUCT_THUMB_IMG', SITE_URL . 'files/products/thumb/' );
}
else
{
	define('PRODUCT_THUMB_DIR', WWW_ROOT. 'files' .DS. 'products' . DS);
	define('PRODUCT_THUMB_IMG', SITE_URL . 'files/products/' );
}

define('PROFILE_PHOTO_DIR', WWW_ROOT. 'files' .DS. 'profile' . DS );
define('PROFILE_PHOTO_IMG', SITE_URL . 'files/profile/' );

define('VIDEO_DIR', WWW_ROOT. 'files' .DS. 'video' . DS );
define('VIDEO_IMG', SITE_URL . 'files/video/' );

define('TEMP_DIR', WWW_ROOT. DS. 'temp' . DS );
define('TEMP_IMG', SITE_URL . 'temp/' );

define('SETTING_DIR', WWW_ROOT. 'files' .DS. 'settings' . DS );
define('SETTING_IMG', SITE_URL . 'files/settings/' );
	
define('BANNER_DIR', WWW_ROOT. 'files' .DS. 'banners' . DS );
define('BANNER_IMG', SITE_URL . 'files/banners/' );	

define('MAILCHIMP_API_KEY', '21e921838f0ad4c57c921197c6d841da-us7' );	
define('MAILCHIMP_LIST_ID', '0faf8146e4' );	

define('EMAIL_METHOD','smtp');




/**
 * manage thumbs: to get the images thumbs
 * @params: $key (string)
 */
 function thumbs($key='default')
 {
	$thumb = array();
	$thumb['product_thumb'] =  array(
				array(
					'width'=>55,
					'height'=>55,
					'suffix' => SMALL
				),
				array(
					'width'=>223,
					'height'=>214,
					'suffix' => MEDIUM
				)
			);
	$thumb['user_thumb'] =  array(
				array(
					'width'=>140,
					'height'=>120,
					'suffix' => SMALL
				),
				array(
					'width'=>224,
					'height'=>214,
					'suffix' => MEDIUM
				)
			);	
	$thumb['default'] =  array(
				array(
					'width'=>50,
					'height'=>50,
					'suffix' => SMALL
				),
				array(
					'width'=>200,
					'height'=>100,
					'suffix' => MEDIUM
				)
			);	
	return $thumb[$key];
 }

 // Function to check value in Associative array
	function valueInArray($array, $find)
	{
		 $exists = false;
		 if(!is_array($array)){
		   return;
		}
		foreach ($array as $key => $value) {
			if($find == $value){
			   $exists = 'checked';
			   break;
		  }
		}
		  return $exists;
	}
