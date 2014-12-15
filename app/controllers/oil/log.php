<?php

// Controller
class Controller extends AppController {
	protected function init() {
		$sql= "SELECT * FROM oil WHERE car_id = {$_SESSION['car_id']}";

		$results = db::execute($sql);
		while($row = $results->fetch_assoc()){
			$insurance_view_fragment = new OilViewFragment;
			$insurance_view_fragment->oil_miles= $row['oil_miles'];
			$insurance_view_fragment->change_date= $row['change_date'];
			$this->view->output .= $insurance_view_fragment->render();

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
		<th>Oil Logs</th>
		<tr>
			<td><b>Change Date</b></td><td><b>Mileage</b></td>
		</tr>
		
			<?php echo $output ?>
		
	</table>
	
</div>