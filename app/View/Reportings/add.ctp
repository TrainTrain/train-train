<div class="users form">
<?php echo $this->Form->create('Reporting'); ?>
    <fieldset>
        <legend><?php echo __('Signaler'); ?></legend>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Form->hidden('user_id',['value'=>$user_id]);
        echo $this->Form->hidden('train_id',['value'=>$train_id]);
      echo $this->Form->Select('types',array('option'=>array('Arrêt'=>'Arrêt','Retard'=>'Retard')));
      echo $this->Form->input('content',['type'=>'text']);
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
