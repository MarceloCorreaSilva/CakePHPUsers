<div class="formulario">
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
        <legend><?php echo __('Please enter your email and password'); ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-lg btn-primary btn-block'));
            echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'register'), array('class' => 'btn'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>