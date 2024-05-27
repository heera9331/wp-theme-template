<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
</head>
<body>

	
	
<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Theme-Dev</a> 
			<?php 
		  		$args = array('menu_class' => 'navbar nav gap-3');
		  		wp_nav_menu($args); 
		  	?> 
  </div>
</nav>
	
<div class="container p-2">
	<h1 class="text-center">
		 Title - <?php the_title(); ?>
	</h1>
	</div>

	<hr>
	<p>page template - header.php</p>