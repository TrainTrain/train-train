<?php
echo $this->Form->create('UserPreferences');
echo $this->Form->select('preferences_id', ['multiple' => true, 'options' => $preferences, 'empty' => 'choisissez']);
echo $this->Form->end('Envoyer');
?>
