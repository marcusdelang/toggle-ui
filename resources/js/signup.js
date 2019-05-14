$(function() {
    $("#submit").click(signup);
});

function signup(){
event.preventDefault();
let username = $('#username').val();
let password = $('#password').val();
let email = $('#email').val();
$.ajax({
    type: 'POST',
    url: '/View/register_process.php',
    data: {
        username: username,
        password: password,
        email: email,
    },
    dataType: 'json',
    success: function (response) {
    if(response["register_result"] == "true"){
        alert('Your account has been created!')
        window.location.href="loginPage.php"
    }else{
        alert('Incorrect information.')
    }
    },
    error: function (a,b,c) {
        alert(c)
    }

});
};