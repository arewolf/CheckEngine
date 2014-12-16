<?php

// Controller
class Controller extends AppController {
	protected function init() {
		$sql= "SELECT * FROM insurance WHERE user_id = {$_SESSION['user_id']}";

		$results = db::execute($sql);
		while($row = $results->fetch_assoc()){
			$insurance_view_fragment = new InsuranceViewFragment;
			$insurance_view_fragment->insurer = $row['insurer'];
			$insurance_view_fragment->policy_number = $row['policy_number'];
			$insurance_view_fragment->insurance_expiration_date= $row['insurance_expiration_date'];
			$insurance_view_fragment->insurance_id = $row['insurance_id'];
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
		<th>Insurance Logs</th>
		<tr>
			<td><b>Insurer</b></td><td><b>Policy Number</b></td><td><b>Insurance Expiration Date</b></td>
		</tr>
		
			<?php echo $output ?>
		
	</table>
	
</div>
