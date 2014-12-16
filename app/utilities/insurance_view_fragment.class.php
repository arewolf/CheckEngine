<?php

class InsuranceViewFragment extends ViewFragment{
	//settings
	private $template="<tr><td>{{insurer}}</td><td>{{policy_number}}</td><td>{{insurance_expiration_date}}</td><td><a href='/insurance/insert?insurance_id={{insurance_id}}'>Edit</a></td><td><a href='/insurance/remove?insurance_id={{insurance_id}}' class='remove'>Remove</a></td></tr>";

	//set
	public function __set($property_name, $value){
		$this->values[$property_name] = $value;
	}

	//render
	public function render(){
	return parent::fill($this->values, $this->template);
	}

} 
