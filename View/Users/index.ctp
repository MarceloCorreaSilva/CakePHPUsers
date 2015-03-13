<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
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
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(
						$user['Group']['name'], 
						array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); 
					?>
				</td>
				<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['birthday']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td>
					<?php echo ($user['User']['status'] == 1) ? h(__('Active')) : h(__('Inactive')); ?>&nbsp;
				</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'), array('action' => 'view', $user['User']['id'])); 
					?>
					<?php echo $this->Html->link(
						__('Edit'), array('action' => 'edit', $user['User']['id'])); 
					?>
					<?php echo $this->Form->postLink(
						__('Delete'), 
						array('action' => 'delete', $user['User']['id']), 
						array(), 
						__('Are you sure you want to delete # %s?', $user['User']['id'])); 
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->element('paging/default'); ?>
</div>
