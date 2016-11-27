<?php
echo $ratings[''][''][''];


<div class="users form">
 echo $this->Form->create('Feedback'); ?>
    <fieldset>
        <legend><?php echo __('Modifier votre avis'); ?></legend>
        <?php echo $this->Form->hidden('id'); ?>
        <?php echo $this->Form->hidden('user_id',['value'=>$user_id]);
        echo $this->Form->hidden('train_id',['value'=>$train_id]);
        echo $this->Form->label('valueSecurite','Sécurité');
        //echo $this->Form->input('rating',['Securite','Propreté','Confort','Température']);
        echo $this->Form->input('securite',['type'=>'range','min'=>1,'max'=>5,'label'=>false]);

        echo $this->Form->label('valueProprete','Propreté');
        echo $this->Form->input('proprete',['type'=>'range','min'=>1,'max'=>5,'label'=>false]);

        echo $this->Form->label('valueConfort','Confort');
        echo $this->Form->input('confort',['type'=>'range','min'=>1,'max'=>5,'label'=>false]);

        echo $this->Form->label('valueTemperature','Température');
        echo $this->Form->input('temperature',['type'=>'range','min'=>1,'max'=>5,'label'=>false]);

        echo $this->Form->label('lblComment','Commentaire');
        echo $this->Form->input('comment',['type'=>'text', 'label'=>false]);
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
