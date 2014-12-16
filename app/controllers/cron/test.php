<?php

// Controller
class Controller extends AjaxController {
		
	private static $user_tests = [new InsuranecTest()];
	private static $car_tests = [new TireRotTest()];

	public static run_all_checks() {
		"select * from user";
		foreach($users as $user) {
			$phone = $user->phone;
			foreach($user_tests as $test) {
				$test->evalTest($user_id, NULL);
			}
			//Cron::run_all_user_checks($user->user_id);

			"select * from car where user_id = $user_id"
			foreach($cars as $car) {
				foreach($car_tests as $test) {
					$test->evalTest($user_id, $car_id);
				}
				//Cron::run_all_car_checks($car_id);
			}
		}


	}
	protected function init() {
		$this->view['data'] = self::run_all_checks() . "\n";
	}
}
$controller = new Controller();