<?php

class TirePurchaseViewFragment extends ViewFragment{
	//settings
	private $template="<tr><td>{{purchase_date}}</td><td>{{purchase_mileage}}</td><td>{{warranty}}</td></tr>";

	//set
	public function __set($property_name, $value){
		$this->values[$property_name] = $value;
	}

	//render
	public function render(){
	return parent::fill($this->values, $this->template);
	}

} 
