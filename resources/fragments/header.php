		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="/resources/js/loginform.js"></script>

<div class="logo">
			<div><img src="resources/images/bar2.jpg" alt="Tasty recipes" style="width:100%"></div>
			<div class="logo_text">Welcome to Tasty Recipes</div>
			</div>
			<div class="menu">
				<div class="menuitem"><a href="index.php"> Homepage</a></div>
				<div class="menuitem"><a href="meatballs.php">Meatballs</a></div>
				<div class="menuitem"><a href="pancakes.php">Pancakes</a></div>
				<div class="menuitem"><a href="calendar.php"> Calendar</a></div>
				<div class="menuitem" id="loginItem">
					<?php if(!isset($_SESSION['username'])): ?>
						<button id="loginButton" value='LogIn'>
						<?php echo "LogIn"; ?>
						</button>
						
					<?php else:?>
						<a id="logout-user"> Logout </a>
					<?php endif; ?>
				</div>
			</div>
			
