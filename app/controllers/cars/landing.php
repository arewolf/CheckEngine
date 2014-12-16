<?php

// Controller
class Controller extends AppController {
	protected function init() {
		$user_id = $_SESSION['user_id'];
		$car = new Car($user_id);
		$sql = "SELECT * FROM car WHERE user_id = $user_id";
		$this->view->results= db::execute($sql);

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div>
	<h1>Choose Your Vehicle</h1>
	<form action="/cars/process_select" method="POST">
		<select name="car_select">
			<?php while($row = $results->fetch_assoc()){ ?>
		 	<option><?php echo $row['name']?></option>
			<?php } ?>
			</select>
		<button>Select Vehicle</button>
	</form>
	<a href="/cars/new"><h2>Add a New Car</h2></a>
</div>
	

