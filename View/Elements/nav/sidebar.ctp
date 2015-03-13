<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo __('Actions'); ?></div>

  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">
      <?php echo $this->Html->link(
        __('List Groups'), 
        array( 'controller' => 'groups', 'action' => 'index' )
      ); ?>
    </li>
    <li class="list-group-item">
      <?php echo $this->Html->link(
        __('New Group'), 
        array( 'controller' => 'groups', 'action' => 'add' )
      ); ?> 
    </li>
    <li class="list-group-item">
      <?php echo $this->Html->link(
        __('List Users'), 
        array( 'controller' => 'users', 'action' => 'index' )
      ); ?> 
    </li>
    <li class="list-group-item">
      <?php echo $this->Html->link(
        __('New User'), 
        array( 'controller' => 'users', 'action' => 'add' )
      ); ?> 
    </li>
    <li class="list-group-item">
      <?php echo $this->Html->link(
        __('Logout'), 
        array( 'controller' => 'users', 'action' => 'logout' )
      ); ?> 
    </li>
  </ul>
</div>
