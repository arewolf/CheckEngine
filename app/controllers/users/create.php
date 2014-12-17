<?php

// Controller
class Controller extends AppController {
	protected function init() {

		$user_id= $_GET['user_id'];

		$user = new User($user_id);

		$this->view->user=$user;

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div class="create">
	<?php if (!$_SESSION['user_id']): ?>
	<h1>Create A New Account </h1>
		<form action="/process_user" method="POST">
			<input value="<?=$user->first_name ?>" type="text" name="first_name" title="First Name" required data-exp-name="name">
			<input value="<?=$user->last_name ?>" type="text" name="last_name" title="Last Name" required data-exp-name="name">
			<input value="<?=$user->username ?>" type="text" name="username" title="Username" required data-exp-name="name">
			<input value="<?=$user->email ?>" type="text" name="email" title="Email Address" required data-exp-name="email" >
			<input value="<?=$user->phone ?>" type="text" name="phone" title="Phone Number" placeholder="Format: (111)-111-1111" required data-exp-name="phone_number">
			<select value="<?=$user->carrier ?>" name="carrier" title="Phone Carrier">
				<option>At&t</option>
				<option>Sprint</option>
				<option>T-Mobile</option>
				<option>Verizon</option>
				<option>Virgin Mobile</option>
				<option>Boost Mobile</option>
			</select>
			<input value="<?=$user->password ?>" type="password" name="password" title="Password" required data-exp-name="password">
			<input value="<?=$user->mpw ?>" type="text" name="mpw" title="Average Miles Driven Per Week" required data-exp-name="mpw">
			<button>Submit</button>
		</form>
	<?php else:  ?>
	<h1>Edit Existing Account </h1>
	
		<form action="/process_user" method="POST">
			<input value="<?=$user->first_name ?>" type="text" name="first_name" title="First Name" required data-exp-name="name">
			<input value="<?=$user->last_name ?>" type="text" name="last_name" title="Last Name" required data-exp-name="name">
			<input value="<?=$user->email ?>" type="text" name="email" title="Email Address" required data-exp-name="email" >
			<input value="<?=$user->phone ?>" type="text" name="phone" title="Phone Number" placeholder="Format: (111)-111-1111" required data-exp-name="phone_number">
			<select value="<?=$user->carrier ?>" name="carrier" title="Phone Carrier">
				<option>At&t</option>
				<option>Sprint</option>
				<option>T-Mobile</option>
				<option>Verizon</option>
				<option>Virgin Mobile</option>
				<option>Boost Mobile</option>
			</select>
			<input value="<?=$user->mpw ?>" type="text" name="mpw" title="Average Miles Driven Per Week" required data-exp-name="mpw">
			<input type ="hidden" value="<?= $user->user_id ?>" name="user_id">
			<button>Submit</button>
		</form>
	<?php endif ?>	
	
</div>
