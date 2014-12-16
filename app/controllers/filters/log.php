<?php

// Controller
class Controller extends AppController {
	protected function init() {
		$sql= "SELECT cabin_mileage, cabin_change_date, filter_id FROM filter WHERE car_id = {$_SESSION['car_id']} AND cabin_change_date IS NOT NULL ORDER BY cabin_change_date desc";

		$results = db::execute($sql);
		while($row = $results->fetch_assoc()){
			$cabin_view_fragment = new CabinViewFragment;
			$cabin_view_fragment->cabin_mileage= $row['cabin_mileage'];
			$cabin_view_fragment->cabin_change_date= $row['cabin_change_date'];
			$cabin_view_fragment->filter_id= $row['filter_id'];
			$this->view->output .= $cabin_view_fragment->render();

		}
		$sql_air= "SELECT air_mileage, air_change_date, filter_id FROM filter WHERE car_id = {$_SESSION['car_id']} AND air_change_date IS NOT NULL ORDER BY air_change_date desc";

		$results_air = db::execute($sql_air);
		while($row = $results_air->fetch_assoc()){
			$filter_view_fragment = new FilterViewFragment;
			$filter_view_fragment->air_mileage= $row['air_mileage'];
			$filter_view_fragment->air_change_date= $row['air_change_date'];
			$filter_view_fragment->filter_id= $row['filter_id'];
			$this->view->output_air .= $filter_view_fragment->render();

		}
	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div>
	<table>
		<th>Cabin Filter Logs</th>
		<tr><td>Cabin Filter Mileage</td><td>Cabin Filter Change Date</td></tr>
			<?php echo $output ?>
		
	</table>
	<table>
		<th>Air Filter Logs</th>
		<tr><td>Air Filter Mileage</td><td>Air Filter Change Date</td></tr>
			<?php echo $output_air ?>
		
	</table>
	
</div>
