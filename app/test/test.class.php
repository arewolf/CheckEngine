<?php


 abstract class Test{

	abstract protected function get_msg();

	abstract protected function run_test($user, $car_id);

	public final function eval_test($user, $car_id){
		$interval = $this->run_test($user, $car_id);
		
		if ($interval <= 15){
			$msg = $this->get_msg();
			Notification::send_notification($user, $msg);
		}
	}
}

