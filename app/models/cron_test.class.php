<?php

/**
 * Cron Class
 */
class CronTest extends Model {



	public static function run_all_car_checks($car_id) {
		$noc = next_oil_change($car_id);
		$ntr = next_tire_rotation($car_id);
		$ntp = next_tire_purchase($car_id);
		$ncf = next_cabin_filter($car_id);
		$naf = next_air_filter($car_id);
	}
	

	public static function run_all_user_checks($user_id)
		$nip = next_insurance_policy($user_id);
	}


	public static function eval_checks($car_id, $user_id){
		$interval_car[] = run_all_car_checks($car_id);
		$interval_user[]= run_all_user_checks($user_id);

		foreach($interval_car as $interval){
			if ($interval_car <= 15){
				send_notification();
			}
		}

		foreach($interval_user as $interval){
			if ($interval_user <= 15){
				send_notification();
			}
		}
	}

	public static function send_notification($phone, $carrier, $msg){
		$phone = get_phone($user_id);
		$carrier = get_carrier($user_id);
		$msg= msg();
		


	}

	public static function msg(){
		switch ($msg){
			case "oil":
				echo "Your oil needs changed in 15 days";
				break;
			case "air":
				echo "Your air-filter needs changed in 15 days";
				break;
			case "cabin":
				echo "Your cabin-filter needs changed in 15 days";
				break;
			case "insurance":
				echo "Your insurance policy expires in 15 days";
				break;
			case "rotation":
				echo "Your tires need rotated in 15 days";
				break;
			case "tires":
				echo "Your tires need replaced in 15 days";
				break;
			default:
				echo "Error in msg() switch";
				break;
		}
	}
		}
	}
