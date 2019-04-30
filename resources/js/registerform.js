
$(document).ready(function(){

			
	$('#username').blur(function(){
		if($(this).val()==''){  //var $user=$('#username').val();
			$('#user').text('Username cannot be empty!');
			$('#username').focus();	
			return false;
		}else if(($(this).val().length)<3){
			$('#user').text('Username should be longer than 3 characters!');
			$('#username').focus();		
			return false;		
		}else if(!($(this).val().match(/^[\u4E00-\u9FA5a-zA-Z0-9_]{0,}$/))){
			$('#user').text('Only english letters, numbers and underscores allowed!');
			$('#username').focus();		
			return false;	   
		}else{
			$('#user').text('');
		}
		
	});
	
	
	$('#password').blur(function(){
		if($(this).val()==''){  //var $user=$('#username').val();
			$('#passw').text('Password cannot be empty!');
			$('#password').focus();	
			return false;
		}else if(($(this).val().length)<6){
			$('#passw').text('Password cannot be less than 6 characters!');
			$('#password').focus();		
			return false;		
		}else if(!($(this).val().match(/^[\u4E00-\u9FA5a-zA-Z0-9_]{0,}$/))){
			$('#passw').text('Only english letters, numbers and underscores allowed!');
			$('#password').focus();		
			return false;	   
		}else{
			$('#passw').text('');
		}		
	});
	

	$('#repassword').blur(function(){
		if($('#password').val()!=($(this).val())){
			$('#repassw').text('The confirm password is not same as the password!');	
			$('#repassword').focus();
			return false;  
		}else{
			$('#repassw').text('');
		}	
	});
	
	
	    $('#register').click(function () {
		    var username = $('#username').val(); 
            var user_password = $('#password').val();
		
			$.ajax({
				type: 'POST',
				url: "register_process.php",
				data: {"username": username, "password": user_password},
				dataType: 'json',
					
				success: function(re){
					if(re=='1'){
						alert("Registration successful!");
						window.location.href="login.php";
					}else{
						alert("Registration failed! ");
					}
				},
				
				error:function(){
					alert("error");
				}
			});
				


    });

			

	
 });


	
	








