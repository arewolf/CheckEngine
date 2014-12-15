<?php

class OilViewFragment extends ViewFragment{
	//settings
	private $template="<tr><td>{{change_date}}</td><td>{{oil_miles}}</td></tr>";
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
