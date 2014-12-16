<?php

// Controller
class Controller extends AppController {
	protected function init() {
		$sql="SELECT purchase_date, purchase_mileage, warranty, tire_id
			  FROM tire 
			  WHERE car_id = {$_SESSION['car_id']} 
			  AND purchase_date IS NOT NULL
			  ORDER BY purchase_date desc";

		$results = db::execute($sql);
		while($row = $results->fetch_assoc()){
			$tire_purchase_view_fragment = new TirePurchaseViewFragment;
			$tire_purchase_view_fragment->purchase_date= $row['purchase_date'];
			$tire_purchase_view_fragment->purchase_mileage= $row['purchase_mileage'];
			$tire_purchase_view_fragment->warranty= $row['warranty'];
			$tire_purchase_view_fragment->tire_id= $row['tire_id'];

			$this->view->output .= $tire_purchase_view_fragment->render();

		}

		$sql_rotation="SELECT rotation_date, rotation_mileage, tire_id
			  FROM tire 
			  WHERE car_id = {$_SESSION['car_id']} 
			  AND rotation_date IS NOT NULL
			  ORDER BY rotation_date desc";

		$results_rotation = db::execute($sql_rotation);
		while($row = $results_rotation->fetch_assoc()){
			$tire_rotation_view_fragment = new TireRotationViewFragment;
			$tire_rotation_view_fragment->rotation_date= $row['rotation_date'];
			$tire_rotation_view_fragment->rotation_mileage= $row['rotation_mileage'];
			$tire_rotation_view_fragment->tire_id= $row['tire_id'];
			$this->view->output_rotation .= $tire_rotation_view_fragment->render();

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
		<th>Tire Purchases</th>
		<tr><td>Purchase Date</td><td>Purchase Mileage</td><td>Tire Warranty</td></tr>
		<?php echo $output ?>

	</table>
	
	<table>
		<th>Tire Rotations</th>
		<tr><td>Rotation Date</td><td>Rotation Mileage</td></tr>
		<?php echo $output_rotation ?>

	</table>


</div>
