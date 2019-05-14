$(function() {
    $("#submit").click(login);
});

function login(){
event.preventDefault();
let username = $('#username').val();
let password = $('#password').val();
$.ajax({
    type: 'POST',
    url: '/View/login_process.php',
    data: {
        username: username,
        password: password,
    },
    dataType: 'json',
    success: function (response) {
    if(response['login_result'] == "true"){
        alert('Youve logged in')
        window.location.href="devicesPage.php"
    }else{
        alert('Incorrect username or password')
    }
    },
    error: function (a,b,c) {
        alert(c)
    }

});
};