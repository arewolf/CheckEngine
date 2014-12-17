<?php

// Controller
class Controller extends AjaxController {
		
	public static $user_tests=[];
	public static $car_tests=[];

	public function run_all_checks(){
		$sql="SELECT * FROM user";
		$results = db::execute($sql);
		while($row = $results->fetch_assoc()){
			$user = new User($row['user_id']);
			foreach(self::$user_tests as $test) {
				$test->eval_test($user, NULL);
			}
			
			$sql_car ="SELECT * FROM car WHERE user_id = '{$user->user_id}'";
			$results_car = db::execute($sql_car);
			while($row_car = $results_car->fetch_assoc()){
			
				foreach(self::$car_tests as $test) {
					$test->eval_test($user, $row_car['car_id']);

				}
			}		
		}
	}

	protected function init() {

		$this->view['data'] = $this->run_all_checks() . "\n";
	


	}
}

Controller::$user_tests = [new InsuranceTest()];
Controller::$car_tests = [new AirFilterTest(), new CabinFilterTest(), new OilChangeTest(), new PurchaseTiresTest()];

$controller = new Controller();
