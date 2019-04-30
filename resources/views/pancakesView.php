
<!doctype html>
<html lang="en">
	<head>
		<title id="pancakes">pancakes</title>
		<?php 
		include TASTY_RECIPES_FRAGMENTS . 'css.php';
		?>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="resources/js/comment.js"></script>
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
			<?php
			$recipeNr = 1;

			include TASTY_RECIPES_FRAGMENTS . 'parseRecipeXml.php';
			?>
			<br>
			
			
			
			<div id="comments">
				<?php
				$recipe = 'pancakes';
				include TASTY_RECIPES_FRAGMENTS . 'commentPart.php';
				?>
			</div>

			
		</div>
		</div>
	</body>
</html>
