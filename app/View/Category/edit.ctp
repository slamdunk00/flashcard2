<?php
	echo 'Add Category';
	echo $this->Form->create('Category');
	echo 'Name: ';
	echo $this->Form->input('name', [
		'label' => false,
		'div' => false,
		'type' => 'text',
		'value' => $cat_name,
		'placeholder' => "category's name"
	]);
	echo $this->Form->submit('Edit');
	echo $this->Form->end();
?>