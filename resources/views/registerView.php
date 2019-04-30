
<!doctype html>
<html lang="en">
	<head>
		<title>Login</title>
		<?php 
		include TASTY_RECIPES_FRAGMENTS . 'css.php';
		?>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="resources/js/registerform.js"></script>
		
	</head>
	<body>
		<div class="container">
		<header>
			<?php
			include TASTY_RECIPES_FRAGMENTS . 'header.php';
			?>
		</header>

		<div class="main">
				<div class="divrow">
				
					<br>
				<form id="registerform" action="" method="POST">
					Your username:
					<input type="text" id="username" name="username" size="20" maxlength="15" ><span id='user'></span></li>
					<br><br>
					Your password:
					<input type="password" id="password" name="password" size="20" maxlength="15"><span id='passw'></span></li>
					<br><br>
					Confirm password：
					<input type="password" id="repassword" name="repassword" size="20" maxlength="15"><span id='repassw'></span></li>
					<br><br>
					<input id="register" type="button" value="Register" name="registerButton">
					<input type="reset" name="cancel" value="Cancel">
				</form>
				</div>
					<br><br><br>
		</div>
		</div>
	</body>
</html>
