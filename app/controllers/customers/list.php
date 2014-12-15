<?php

// Controller
class Controller extends AppController {
	protected function init() {
	


		


		// $sql = "
		// SELECT *
		// FROM customer
		// ";
		// $output= '';
		// $results = db::execute($sql);

		// while($row = $results->fetch_assoc()){
		// 	$customer_view_fragment = new CustomerViewFragment;
		// 	$customer_view_fragment->firstname= $row['firstname'];
		// 	$customer_view_fragment->lastname= $row['lastname'];
		// 	$customer_view_fragment->customer_id= $row['customer_id'];
		// 	$customer_view_fragment->age= $row['age'];
		// 	$this->view->output .= $customer_view_fragment->render();
	
		$sql="SELECT rotation_date
			  FROM tire 
			  WHERE car_id = {$_SESSION['car_id']} 
			  ORDER BY rotation_date desc 
			  LIMIT 1";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$date1 = new DateTime($row['rotation_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;
		$_SESSION['interval']= $weeks;

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = {$_SESSION['user_id']}";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$subtract_miles = $weeks * $row_mpw['mpw'];
		$_SESSION['rotation_miles'] = intval(5000 - $subtract_miles);
		$_SESSION['rotation_days'] = intval(($_SESSION['rotation_miles']/$row_mpw['mpw'])*7);
	

}	
	
}

$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view -->



	
