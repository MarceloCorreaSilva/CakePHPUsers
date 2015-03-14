<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default" style="margin-top: 40px">
            <div class="panel-heading">
                <h2 class="panel-title"><?php echo __('Install Users Plugin'); ?></h2>
            </div>
            <div class="panel-body" style="text-align: center">
                <p><?php echo __('Checking requirements before installing Users ...'); ?></p>

                <?php $errors = 0; ?>
                <?php
                $files_path = WWW_ROOT . 'files';
                if (!is_writable(TMP)) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i>
                        <?php echo __("Your tmp folder isn't writable"); ?>
                    </div>
                    <?php $errors++; ?>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-success">
                        <a href=""><i class="fa fa-check"></i>
                            <?php echo __('Your tmp folder is writable.'); ?>
                        </a>
                    </div>

                    <?php
                }
                ?>

                <?php
                $config_path = App::pluginPath('Users') . 'Config';
                if (!is_writable($config_path)) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i>
                        <?php echo __("Your app/Plugin/Users/Config folder isn't writable"); ?>
                    </div>
                    <?php $errors++; ?>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-success">
                        <a href="">
                            <i class="fa fa-check"></i>
                            <?php echo __('Your config folder is writable.'); ?>
                        </a>
                    </div>

                    <?php
                }
                ?>
                <?php $filePresent = null; ?>
                <?php if (file_exists(APP . 'Config' . DS . 'database.php')): ?>
                    <div class="alert alert-success">
                        <a href=""><i class="fa fa-check"></i>
                            <?php echo __('Your database configuration file is present.'); ?>
                            <?php $filePresent = true; ?>
                        </a>
                    </div>                    
                <?php else: ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i>
                        <?php echo __('Your database configuration file is NOT present.'); ?>
                        <?php echo __("Rename 'APP/Config/database.php.default' to 'APP/Config/database.php"); ?>
                    </div>
                    <?php $errors++; ?>
                <?php endif; ?> 
                                
                <?php
                if (isset($filePresent)):
                    try {
                        $connected = ConnectionManager::getDataSource('default');
                    } catch (Exception $connectionError) {
                        $connected = false;
                    }
                    
                    if ($connected && $connected->isConnected()): ?>
                        <div class="alert alert-success">
                            <a href=""><i class="fa fa-check"></i>
                                <?php echo __('Your database is connected.'); ?>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-times"></i>
                            <?php echo __('You need to connect a database before continue.'); ?>
                        </div>
                        <?php $errors++; ?>
                    <?php endif;
                endif; 
                ?>
                
                <div class="clearfix"></div>
                <?php if (!$errors) { ?>
                    <?php
                    if (!file_exists(App::pluginPath('Users') . 'Config' . DS . 'config.php')) {
                        echo $this->Html->link(
                            '<i class="fa fa-arrow-circle-right"></i> Configure my workflow now!', 
                            array('controller' => 'install', 'action' => 'configure', 'plugin' => 'users'), 
                            array('class' => 'btn btn-success btn-lg', 'escape' => false)
                        );
                    }
                    ?>
                <?php } else { ?>
                    <div class="alert alert-warning">
                        <i class="fa fa-info-circle"></i>
                        <?php echo __('Please, fix all the itens above to continue.'); ?>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            <div class="panel-footer" style="text-align: center">
                <small>
                    <?php echo __('We will create a config file and create 2 tables in your database.'); ?>
                </small>
            </div>
        </div>
    </div>
</div>