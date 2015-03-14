<div class="users" style="margin-top: 100px;">
    <?php
    echo $this->Form->create('User', array(
        'class' => 'form-signin',
        'role' => 'form',
        'inputDefaults' => array(
            'class' => 'form-control',
            'div' => array(
                'class' => 'form-group'
            )
        )
    ));
    ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('group_id');
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('password_hint');
        echo $this->Form->input('status', array('type' => 'hidden', 'value' => true));
        echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-lg btn-success', 'style' => 'float: left;'));
        echo $this->Html->link(__('Cancel'), array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-lg btn-danger', 'style' => 'float: left; margin-left: 10px;'));
        ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>