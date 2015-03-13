<?php 
	$this->Html->css(
		array('Users.jquery-ui'), 
		array('inline' => false)
	); 
	$this->Html->script(
		array('Users.jquery-ui.min', 'Users.calendar'), 
		array('inline' => false)
	); 
?>

<div class="users form">
	<?php echo $this->Form->create('User', array(
		'enctype' => 'multipart/form-data',
        'class' => 'form-signin', 
        'role' => 'form',
        'inputDefaults' => array(
            'class' => 'form-control',
            'div' => array(
                'class' => 'form-group'
            )
        )
    )); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
		<?php
			echo $this->Form->input('group_id');
			echo $this->Form->input('name');
			echo $this->Form->input('gender', array(
				'type' => 'select',
				'empty' => 'Selecione...',
				'options' => array(
					'f' => 'Feminino',
					'm' => 'Masculino'
				)
			));
			echo $this->Form->input('birthday', array('type' => 'text', 'id' => 'calendar'));
			echo $this->Form->input('profile_image', array('type' => 'file'));
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('password_hint');
			echo $this->Form->input('status', array('type' => 'hidden', 'value' => true));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
