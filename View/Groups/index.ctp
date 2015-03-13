<div class="groups index">
	<h2><?php echo __('Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($groups as $group): ?>
			<tr>
				<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
							__('View'), array('action' => 'view', $group['Group']['id'])); 
					?>
					<?php echo $this->Html->link(
							__('Edit'), array('action' => 'edit', $group['Group']['id'])); 
					?>
					<?php echo $this->Form->postLink(
							__('Delete'), 
							array('action' => 'delete', $group['Group']['id']),
							array(), 
							__('Are you sure you want to delete # %s?', $group['Group']['id'])
						); 
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->element('paging/default'); ?>
</div>
