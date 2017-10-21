<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<?php wp_head();?>
</head>
<body>

<nav class="navbar navbar-light bg-light">
	<a class="navbar-brand" href="#"><?php bloginfo();?></a>
</nav>

<div class="jumbotron">
	<h1><?php echo esc_html( get_theme_mod( 'jumbotron_title', 'Hello World' ) );?></h1>
	<p class="lead"><strong><?php echo esc_html( get_theme_mod( 'jumbotron_lead', 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.' ) );?></strong></p>
</div>

	<?php wp_footer();?>
</body>
</html>