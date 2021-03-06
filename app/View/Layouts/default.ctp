<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('Clear Window', 'Clear Window');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap','font-awesome','bootstrap-select.min','style','responsive','jquery-ui','select2/select2','datepicker'));
		echo $this->Html->script(array('jquery-1.11.0.min','jquery.form.min','jquery.validate','bootstrap.min','bootstrap-select.min','knockout-3.1.0','ajax','select2/select2','bootstrap-datepicker'));
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script>
	  var siteurl="<?php echo FULL_BASE_URL.$this->webroot ;?>";
	</script>
</head>
<body>
	

			

			<?php echo $this->fetch('content'); ?>
	
	<?php if($_SERVER['HTTP_HOST'] != 'demo.xicom.us'){
	 echo $this->element('sql_dump'); 
	}?>
</body>
</html>
