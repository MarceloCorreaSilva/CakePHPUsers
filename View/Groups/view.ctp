<div class="groups view">
    <h2><?php echo __('Group'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($group['Group']['id']); ?>
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($group['Group']['name']); ?>
        </dd>
    </dl>
</div>

<div class="related">
    <h3><?php echo __('Related Users'); ?></h3>
    <?php if (!empty($group['User'])): ?>
        <table cellpadding="0" cellspacing="0"  class="table">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Gender'); ?></th>
                <th><?php echo __('Birthday'); ?></th>
                <th><?php echo __('Profile Image'); ?></th>
                <th><?php echo __('Email'); ?></th>
                <th><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($group['User'] as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo empty($user['gender']) ? h('') : (($user['gender'] == 'm') ? __('Man') : __('Woman')); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($user['birthday'])); ?></td>
                    <td><?php echo $user['profile_image']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="...">
                            <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')), array('controller' => '', 'action' => 'view', $user['id']), array('class' => 'btn', 'escape' => false, 'title' => __('View'))); ?>
                            <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('controller' => '', 'action' => 'edit', $user['id']), array('class' => 'btn', 'escape' => false, 'title' => __('Edit'))); ?>
                            <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('controller' => '', 'action' => 'delete', $user['id']), array('class' => 'btn', 'escape' => false, 'title' => __('Delete')), __('Are you sure you want to delete # %s?', $user['id'])); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
