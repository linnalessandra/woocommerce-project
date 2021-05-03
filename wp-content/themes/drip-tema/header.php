<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php wp_head(); ?>
</head>
<body <?php echo body_class(); ?>>
<header>
	<?php    
	$mainMenuArray = [
		'theme_location' => 'mainmenu'
		];
							
		wp_nav_menu($mainMenuArray);
	?>
</header>
<h1>HEADER</h1>
