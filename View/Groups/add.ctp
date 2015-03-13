<div class="groups form">
	<?php echo $this->Form->create('Group', array(
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
		<legend><?php echo __('Add Group'); ?></legend>
		<?php
			echo $this->Form->input('name');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
