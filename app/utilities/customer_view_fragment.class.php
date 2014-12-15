<?php

class CustomerViewFragment extends ViewFragment{
	//settings
	private $template="<div>{{firstname}} {{lastname}}: <a href='/customer/form?customer_id={{customer_id}}'>Edit</a> | <a href='customer/remove?customer_id={{customer_id}}'>Remove</a></div>";
	private $values = [];

	//set
	public function __set($property_name, $value){
		$this->values[$property_name] = $value;
	}

	//render
	public function render(){
	return parent::fill($this->values, $this->template);
	}

} 
