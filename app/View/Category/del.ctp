<?php
	echo 'Add Category';
	echo $this->Form->create('Category', ['url' => ['controller' => 'category', 'action' => 'add']]);
	echo 'Name: ';
	echo $this->Form->input('name', [
		'label' => false,
		'div' => false,
		'type' => 'text',
		'required',
		'value' => isset($this->request->data['Category']['name']) ?$this->request->data['Category']['name'] : '',
		'placeholder' => "category's name"
	]);
	echo $this->Form->submit('Add');
	echo $this->Form->end();
?>