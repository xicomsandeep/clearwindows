<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<script type="text/javascript">
		var site_url = '<?php echo SITE_URL; ?>';	
	</script>
	<?php
		echo $this->Html->meta('icon');
		$this->Html->css(array('admin-style','popup','jquery-ui'),null, array('inline'=>false));
		$this->Html->script(array('jquery-1.7.2.min','jquery-ui.custom.min','jquery.validate','popup', 'common', 'admin'), array('inline'=>false));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	
	
</head>
<body class="greybg">
	<!--Wrapper Start from Here-->
	<div id="wrapper">
		<!--Header Start from Here-->
			<?php echo $this->element('/admin/header') ?>
			<div id="container">
				<?php echo $this->fetch('content'); ?>
				<?php echo $this->element('/admin/footer') ?>
			</div>
		<!--Container end Here-->
		</div>
		<!--Wrapper End from Here-->
		
	</div>
	<br clear="all"/>
<?php		
	if($_SERVER['HTTP_HOST'] == '192.168.1.107' || $_SERVER['HTTP_HOST'] == 'localhost')
	//if(1)
	{
		echo $this->element('sql_dump');
	}
?>
</body>
</html>
