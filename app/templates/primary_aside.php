<?php 

if(isset($_SESSION['user_id'])){
	Aside::insurance_time_left();

}

if(isset($_SESSION['car_id'])){
	Aside::get_car_id();
	Aside::get_max_miles();
	Aside::next_oil_change();
	Aside::next_air_change();
	Aside::next_cabin_change();
	Aside::next_tire_purchase();
	Aside::next_tire_rotation();
}
else{
	echo "here";
}
	?>


<aside>
	<img src="/images/sedan2_white.png">
	<hr>
	Current Vehicle:
	<b><br><?php echo $_SESSION['current_car']?><br></b>
	<hr>
	Last Logged Mileage:
	<b><br><?php echo $_SESSION['max_miles'] ?> Miles <br></b>
	Next Oil Change:
	<b><br><?php echo $_SESSION['oil_miles'] . " Miles | " . $_SESSION['oil_days'] . " Days"?><br></b>
	Time on Insurance Policy:
	<b><br><?php echo $_SESSION['insurance_time_left']?> <br></b>
	Engine Air Filter:
	<b><br><?php echo $_SESSION['air_miles'] . " Miles | " . $_SESSION['air_days'] . " Days"?><br></b>
	Cabin Air Filter:
	<b><br><?php echo $_SESSION['cabin_miles'] . " Miles | " . $_SESSION['cabin_days'] . " Days"?><br></b>
	Tire Rotation:
	<b><br><?php echo $_SESSION['rotation_miles'] . " Miles | " . $_SESSION['rotation_days'] . " Days"?><br></b>
	Left on Tires:
	<b><br><?php echo $_SESSION['tire_change_miles']  . " Miles | " . $_SESSION['tire_change_days'] . " Days" ?><br></b>
</aside>