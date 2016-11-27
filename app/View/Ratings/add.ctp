<?php
echo $this->Form->create('Rating');
echo $this->Form->input('user_id', ['value' => $user_id]);
echo $this->Form->input('train_id', ['value' => $train_id]);
echo $this->Form->input('value');
echo $this->Form->select('rating_type_id', ['value' => $ratingTypes]);
echo $this->Form->end('Envoyer');
 ?>
