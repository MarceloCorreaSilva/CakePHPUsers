<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row clearfix">
            <div class="col-md-10 column">
                <h2><?php echo __('Users'); ?></h2>
            </div>
            <div class="col-md-2 column">
                <div class="input-group pull-right" style="margin-top: 15px;">
                 <?php 
                    echo $this->Html->tag('span', '', 
                        array('class' => 'input-group-addon glyphicon glyphicon-plus')
                    );
                    echo $this->Html->link(    
                        __('Add User'),            
                        array('action' => 'add'), 
                        array('class' => 'form-control btn btn-default')
                    ); 
                ?>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo $this->Paginator->sort('gender'); ?></th>
                    <th><?php echo $this->Paginator->sort('birthday'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('status'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['id']); ?></td>
                        <td>
                            <?php
                            echo $this->Html->link(
                                    $user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id']));
                            ?>
                        </td>
                        <td><?php echo h($user['User']['name']); ?></td>
                        <td><?php echo empty($user['User']['gender']) ? h('') : (($user['User']['gender'] == 'm') ? __('Man') : __('Woman')); ?></td>
                        <td><?php echo h(date('d/m/Y', strtotime($user['User']['birthday']))); ?></td>
                        <td><?php echo h($user['User']['email']); ?></td>
                        <td style="text-align: center;">
                            <?php echo ($user['User']['status'] == 1) ? $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok', 'title' => __('Active'))) : $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove', 'title' => __('Inactive'))); ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')), array('action' => 'view', $user['User']['id']), array('class' => 'btn', 'escape' => false, 'title' => __('View'))); ?>
                                <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $user['User']['id']), array('class' => 'btn', 'escape' => false, 'title' => __('Edit'))); ?>
                                <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $user['User']['id']), array('class' => 'btn', 'escape' => false, 'title' => __('Delete')), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <?php echo $this->element('paging/default'); ?>
            </div>
        </div>
    </div>
</div>