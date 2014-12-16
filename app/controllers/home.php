<?php

// Controller
class Controller extends AppController {
	protected function init() {

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div class="home">
	
		<h1 class="top_bar">Welcome to CheckEngine </h1>
	
	<a href="/login" class="no_dec">
		<div class="login_button">
			<span> LOGIN</span>
		</div>
	</a>
	<a href="/create">Create a new Account</a>
</div>
