
<!doctype html>
<html lang="en">
	<head>
		<title>Login</title>
		<?php 
		include TASTY_RECIPES_FRAGMENTS . 'css.php';
		?>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="/resources/js/loginform.js"></script>
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
						<form id="loginform" action="" method="POST">
							Username:
							<input type="text" id="username" name="username" size="20" maxlength="15" >
							<br><br>
							Password:
							<input type="password" id="password" name="password" size="20" maxlength="15">
							<br><br>
							<input id="login" type="button" value="Log in" name="loginButton">
							<input type="button" onclick="window.location.href='register.php'" value="Sign up">
						</form>
				</div>
					<br><br><br>
		</div>
		</div>
	</body>
</html>
