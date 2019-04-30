$(document).ready(function(){
	
		$('#loginButton').click(function () {
			window.location.href="login.php";
		}); 

		$('#logout-user').click(function () {
			window.location.href="logOut.php";
		}); 

		$('#login').click(function () {
		    var username = $('#username').val(); 
            var user_password = $('#password').val();	
			if(username!=""&&user_password!=""){
				$.ajax({
					type: 'POST',
					url: "login_process.php",
					data: {"username": username, "password": user_password},
					dataType: 'json',
					success: function(re){
						if(re=='1'){
							alert("Login sucessfully");
							window.location.href="index.php";
						}else{
							alert("Wrong username or password!  Login failed! ");
							$('#username').text('');
							$('#password').text('');
							$('#username').focus();
						}
					},
					error:function(){
						alert("error");
					}
				});

			}else{
				alert("empty username or password!");
			}

    });
 });