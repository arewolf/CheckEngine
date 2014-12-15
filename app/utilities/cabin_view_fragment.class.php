<?php

class CabinViewFragment extends ViewFragment{
	//settings
	private $template="<tr><td>{{cabin_mileage}}</td><td>{{cabin_change_date}}</td></tr>";
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
