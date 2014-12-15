<?php

class Customer extends Model{

	protected function insert($input){
	//prepare sql values;
	$sql_values = [
		//this allows for us to control what $_POST items get set to sql statements.
			'firstname' => $input['firstname'],
			'lastname' => $input['lastname'],
			'age' => $input['age'],
			'gender' => $input['gender']
		];

	// Ensure values are encompassed with quote marks
	$sql_values = db::auto_quote($sql_values);

	// Insert
	$results = db::insert('customer', $sql_values);
	
	// Return the Insert ID
	return $results->insert_id;
	}

	public function update($input){
	//prepare sql values;
	$sql_values = [
		//this allows for us to control what $_POST items get set to sql statements.
			'firstname' => $input['firstname'],
			'lastname' => $input['lastname'],
			'age' => $input['age'],
			'gender' => $input['gender']
		];

	// Ensure values are encompassed with quote marks
	$sql_values = db::auto_quote($sql_values);

	// update
	db::update('customer', $sql_values, "WHERE customer_id = {$this->customer_id}");
	
	}

	public function remove(){

		$sql ="
		DELETE 
		FROM customer
		WHERE customer_id = {$this->customer_id};
		";
	
		db::execute($sql);
	}



	
}