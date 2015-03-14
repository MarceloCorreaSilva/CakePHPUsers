<div class="groups form">
    <?php
    echo $this->Form->create('Group', array(
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
        <legend><?php echo __('Add Group'); ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-lg btn-success', 'style' => 'float: left;'));
        echo $this->Html->link(__('Cancel'), array('controller' => 'groups', 'action' => 'index'), array('class' => 'btn btn-lg btn-danger', 'style' => 'float: left; margin-left: 10px;'));
        ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
