<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title>Page Title</title>
	
	<!-- Google Fonts Api -->

	<link href='http://fonts.googleapis.com/css?family=Play:400,700|Roboto+Condensed:400italic,700,400' rel='stylesheet' type='text/css'>
	<link href="/font_awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Main CSS -->
	<link rel="stylesheet" href="/bower_components/ReptileForms/dist/reptileforms.min.css">
	<link rel="stylesheet" href="/css/styles.css">

	<!-- Modernizr -->
	<script src="/bower_components/modernizr/modernizr.js"></script>

</head>
<body>

	<div class="page">

		<?php echo $primary_header; ?>
		<?php echo $primary_aside; ?>
		<?php echo $main_content; ?>
		<?php echo $primary_footer; ?>
		
	</div>
	<div class='notices'></div>


	<!-- Include Common Scripts -->
	<script src="/bower_components/jquery/dist/jquery.js"></script>
	<script src="/bower_components/ReptileForms/dist/reptileforms.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	
	<!-- Main JS -->
	<script src="/js/main.js"></script>

</body>
</html>