


<header>
	<div>
		<a href="/"><img src="/images/checkengine_white.png">
		<div class="clearfix">
			<h1>CHECK ENGINE</h1>
			<p>Maintenance ALERT</p></a>
			<?php if ($_SESSION['user_id']): ?>
			<div class="access"> Welcome back, <?php echo ($_SESSION['first_name']) ?> | <a href="/logout">LogOut</a> <a href="/create?user_id=<?php echo $_SESSION["user_id"] ?>">Edit</a></div>
			<div class="social">
				<i class="fa fa-facebook-square"></i>
				<i class="fa fa-twitter-square"></i>
				<i class="fa fa-google-plus-square"></i>
			</div>
			<?php else : ?>
			<a href="/login"><div class="button"><span>LOGIN</span></div></a>
			<?php endif ?>
			


		</div>
	</div>
	
</header>