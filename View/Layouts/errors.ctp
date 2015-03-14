<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'normazile',
            'bootstrap.min'
        ));

        echo $this->Html->script(array(
            'lib/jquery.min',
            'lib/modernizr',
            'lib/bootstrap.min',
        ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
