<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> 
        <?php echo $this->Html->link(
            __('Home'), 
            array('admin' => false, 'controller' => 'users', 'action' => 'index'), 
            array('class' => 'navbar-brand')); 
        ?>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if ($logged_in): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $this->Html->tag('i', '', array('class' => 'fa fa-user'), null, array('escape' => false)); ?>
                        <?php echo $current_user['email']; ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                            <?php echo $this->Html->link($this->Html->tag('i', __('Logout'), array('class' => 'fa fa-power-off')), array('admin' => false, 'controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?>
                    </li>
                </ul>
            </li>
            <?php else: ?>
            <li class="dropdown">
                    <?php echo $this->Html->link($this->Html->tag('i', __('Login'), array('class' => 'fa fa-user')), array('controller' => 'users', 'action' => 'login'), array('escape' => false)); ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
