
	
	
<?php
	$xml = simplexml_load_file('resources/xml/recipe.xml');
?>
	
	<h2>
		<?php 
			echo $xml->recipe[$recipeNr]->title; 
		?>
	</h2>
				
	<div class="divrow">
			<div>
				<img class = img0 src="<?php 
							echo $xml->recipe[$recipeNr]->imageurl; 
						?>" alt="Image of Pancakes"></div>
					<div><?php 
							echo $xml->recipe[$recipeNr]->description; 
						?></div>
					<div>Prep: <?php 
							echo $xml->recipe[$recipeNr]->preptime; 
						?> Cook: <?php 
							echo $xml->recipe[$recipeNr]->cooktime; 
						?> Total: <?php 
							echo $xml->recipe[$recipeNr]->totaltime; 
						?>
					</div>
			</div>
					<br><br>
					
			<div class="divrow">
				<div class="divleft">
						<h2>Ingredients for 
							<?php 
								echo $xml->recipe[$recipeNr]->quantity; 
							?>
						</h2>
				
						<?php 
							foreach ($xml->recipe[$recipeNr]->ingredient->li as $ingredient) {
								echo "<li>" . $ingredient . "</li>";
							}
						?>
				</div>
				<div class="divright">
						<h2>Directions</h2>
						<?php 
							foreach ($xml->recipe[$recipeNr]->recipetext->li as $recipetext) {
								echo "<li>" . $recipetext . "</li>";
							}
						?>
				</div>
			</div>