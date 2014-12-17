<?php 

class Notification {
	
	private static $carrier_array = [
									"At&amp;t" => "@txt.att.net",
									"Virgin Mobile" => "@vmobl.com",
									"Sprint" => "@messaging.sprintpcs.com",
									"Verizon" => "@vtext.com", 
									"Boost Mobile" => "@myboostmobile.com",
									"T-Mobile" => "@tmomail.net"
									];

	public static function send_notification($user, $msg){
		$phone = $user->phone;
		$clean_phone = preg_replace ('/\(|\)|\-/', '', $phone);
		$carrier = $user->carrier;
		$email= self::$carrier_array[$carrier];
		$send_to = $clean_phone . $email;
 				
		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$msg = wordwrap($msg, 70, "\r\n");
		// Send
		// echo "clean Phone:" . $clean_phone . "<br>";
		// echo "carrier: $carrier <br>";
		// echo "email: $email <br>";
		// echo "send_to: $send_to <br>";
		// echo "message: $msg <br>";
		//mail("$send_to", "", $msg, "From: CheckEngine<notices@dev.CheckEngine.com");
	}
}


