<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row clearfix">
            <div class="col-md-10 column">
                <h2><?php echo __('Groups'); ?></h2>
            </div>
            <div class="col-md-2 column">
                <div class="input-group pull-right" style="margin-top: 15px;">
                 <?php 
                    echo $this->Html->tag('span', '', 
                        array('class' => 'input-group-addon glyphicon glyphicon-plus')
                    );
                    echo $this->Html->link(    
                        __('Add Group'),            
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
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                        <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')), array('action' => 'view', $group['Group']['id']), array('class' => 'btn', 'escape' => false, 'title' => __('View'))); ?>
                                <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn', 'escape' => false, 'title' => __('Edit'))); ?>
                                <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn', 'escape' => false, 'title' => __('Delete')), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
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
