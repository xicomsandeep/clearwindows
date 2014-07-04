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
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap','font-awesome','bootstrap-select.min','style','responsive','jquery-ui','select2/select2'));
		echo $this->Html->script(array('jquery-1.11.0.min','jquery.form.min','jquery.validate','jquery-ui.custom.min','bootstrap.min','bootstrap-select.min','jquery-searchFilter','script','knockout-3.1.0','ajax','select2/select2'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script>
	  var siteurl="<?php echo FULL_BASE_URL.$this->webroot ;?>";
	</script>
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php if($_SERVER['HTTP_HOST'] != 'demo.xicom.us'){
	 echo $this->element('sql_dump'); 
	}?>
</body>
</html>
