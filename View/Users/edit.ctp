<?php
$this->Html->css(
        array('Users.jquery-ui'), array('inline' => false)
);
$this->Html->script(
        array('Users.jquery-ui.min', 'Users.calendar'), array('inline' => false)
);
?>

<div class="users form">
    <?php
    echo $this->Form->create('User', array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-signin',
        'role' => 'form',
        'inputDefaults' => array(
            'class' => 'form-control',
            'div' => array(
                'class' => 'form-group'
            )
        )
    ));
    ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('group_id');
        echo $this->Form->input('name');
        echo $this->Form->input('gender', array(
            'type' => 'select',
            'empty' => 'Selecione...',
            'options' => array(
                'f' => 'Feminino',
                'm' => 'Masculino'
            )
        ));
        echo $this->Form->input('birthday', array('type' => 'text', 'id' => 'calendar'));
        echo $this->Form->input('profile_image', array(
            'type' => 'file',
            'id' => 'file-1',
            'multiple' => false,
            'class' => 'file-loading'
        ));        

        echo $this->Form->input('password_hint');
        echo $this->Form->label('status', __('Status'));
        echo $this->Form->input('status', array(
            'div' => array('class' => 'checkbox'), 
            'class' => false,
            'label' => false,
            'before' => '<label>',
            'after' => __('Active') . '</label>'
        ));
        echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-lg btn-success', 'style' => 'float: left;'));
        echo $this->Html->link(__('Cancel'), array('controller' => '', 'action' => 'index'), array('class' => 'btn btn-lg btn-danger', 'style' => 'float: left; margin-left: 10px;'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<?php
$path = $this->base . "/img/users/" . $this->request->data['User']['profile_image'];
//$this->Html->scriptStart(array('inline' => false));
//echo "$('#file-1').fileinput({";
//echo "   initialPreview: [";
//echo "       \"<img src='/img/users/" . $this->request->data['User']['profile_image'] . "' class='file-preview-image'>,\" ";
//echo "   ],";
//echo "   initialPreviewConfig: [";
//echo "      {caption: '" . $this->request->data['User']['profile_image'] . "', width: '120px', url: '#'},";
//echo "   ],";
//echo "   uploadUrl: '#',";
//echo "   allowedFileExtensions : ['jpg', 'png','gif'],";
//echo "   overwriteInitial: false,";
//echo "   maxFileSize: 1000,";
//echo "   maxFilesNum: 10,";
//echo "   slugCallback: function(filename) {";
//echo "      return filename.replace('(', '_').replace(']', '_');";
//echo "   }";
//echo "});";
//$this->Html->scriptEnd();
?>
<?php if(!empty($this->request->data['User']['profile_image'])) { ?>
<script>
    $("#file-1").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        initialPreview: [
            "<img src=\"<?php echo $path; ?>\" class=\"file-preview-image\" alt=\"\" title=\"\">",
        ],
    });
</script>
<?php } else { ?>
<script>
    $("#file-1").fileinput({
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false
    });
</script>
<?php }  ?>