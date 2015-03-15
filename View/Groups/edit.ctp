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
        <legend><?php echo __('Edit Group'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->label('Group.permissions', __('Permissions'));
        ?>
        <div class="row">
            <div class="col-md-2">
                <?php echo $this->Form->input('Group.permissions.index', array(
                    'type' => 'select', 'options' => array( true => 'Sim', false => 'Não' )
                )); ?>
            </div>
            <div class="col-md-2">
                <?php echo $this->Form->input('Group.permissions.view', array(
                    'type' => 'select', 'options' => array( true => 'Sim', false => 'Não' )
                )); ?>
            </div>
            <div class="col-md-2">
                <?php echo $this->Form->input('Group.permissions.add', array(
                    'type' => 'select', 'options' => array( true => 'Sim', false => 'Não' )
                )); ?>
            </div>
            <div class="col-md-2">
                <?php echo $this->Form->input('Group.permissions.edit', array(
                    'type' => 'select', 'options' => array( true => 'Sim', false => 'Não' )
                )); ?>
            </div>
            <div class="col-md-2">
                <?php echo $this->Form->input('Group.permissions.delete', array(
                    'type' => 'select', 'options' => array( true => 'Sim', false => 'Não' )
                )); ?>
            </div>
        </div>
        <?php
        echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-lg btn-success', 'style' => 'float: left;'));
        echo $this->Html->link(__('Cancel'), array('controller' => 'groups', 'action' => 'index'), array('class' => 'btn btn-lg btn-danger', 'style' => 'float: left; margin-left: 10px;'));
        ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
