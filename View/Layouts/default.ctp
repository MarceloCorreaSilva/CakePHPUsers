<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $this->fetch('title'); ?>
		</title>
		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css(array(
				'normazile',
				'bootstrap.min'
			));

			echo $this->Html->script(array(
				'lib/jquery.min',
				'lib/modernizr',
				'lib/bootstrap.min',
			));

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->element('nav/navbar-default'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					<?php echo $this->element('nav/sidebar'); ?>
				</div>
				<div class="col-md-10">
					<?php echo $this->Session->flash(); ?>

					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>
