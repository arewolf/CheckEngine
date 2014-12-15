<?php

class TireRotationViewFragment extends ViewFragment{
	//settings
	private $template="<tr><td>{{rotation_date}}</td><td>{{rotation_mileage}}</td></tr>";

	//set
	public function __set($property_name, $value){
		$this->values[$property_name] = $value;
	}

	//render
	public function render(){
	return parent::fill($this->values, $this->template);
	}

} 
