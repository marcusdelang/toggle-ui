
<!doctype html>
<html lang="en">
	<head>
		<title>Welcome to Tasty Recipes</title>
		<?php 
		include TASTY_RECIPES_FRAGMENTS . 'css.php';
		?>
	</head>
	<body>
		<div class="container">
		<header>
			<?php
			include TASTY_RECIPES_FRAGMENTS . 'header.php';
			?>
		</header>

		<div class="main">
			<br>
			<h2>Classic dishes</h2>
					<div class="divrow">
						<div class="divleft">
							<a href="pancakes.php"> <img class = img1 src="resources/images/pancakes.jpg" alt = "Image of Pancakes"></a>
							<p>Pancakes</p>
						</div>
						<div class="divright">
							<a href="meatballs.php"> <img class = img1 src="resources/images/meatballs.jpg" alt = "Image of Meatballs"></a>
							<p>Meatballs</p>
						</div>
					</div>
					<br><br><br>
		</div>
		</div>
	</body>
</html>
