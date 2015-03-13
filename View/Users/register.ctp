<div class="users">
	<?php echo $this->Form->create('User', array(
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
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('password_hint');
			echo $this->Form->input('status', array('type' => 'hidden', 'value' => true));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>