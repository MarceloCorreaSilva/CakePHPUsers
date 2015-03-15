<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
        </dd>
        <dt><?php echo __('Group'); ?></dt>
        <dd>
            <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($user['User']['name']); ?>
        </dd>
        <dt><?php echo __('Gender'); ?></dt>
        <dd>
            <?php echo empty($user['User']['gender']) ? h('') : (($user['User']['gender'] == 'm') ? __('Man') : __('Woman')); ?>
        </dd>
        <dt><?php echo __('Birthday'); ?></dt>
        <dd>
            <?php echo h($user['User']['birthday']); ?>
        </dd>
        <dt><?php echo __('Profile Image'); ?></dt>
        <dd>
            <?php echo h($user['User']['profile_image']); ?>
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
        </dd>
        <dt><?php echo __('Password Hint'); ?></dt>
        <dd>
            <?php echo h($user['User']['password_hint']); ?>
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo ($user['User']['status'] == 1) ? __('Active') : __('Inactive'); ?>
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($user['User']['modified']); ?>
        </dd>
    </dl>
</div>
