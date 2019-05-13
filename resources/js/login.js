function login(){
event.preventDefault();
let username = $('#username').val();
let password = $('#password').val();
let submit = $('#submit').val();
$.ajax({
    type: 'POST',
    url: '/View/login_process.php',
    data: {
        username: username,
        password: password,
    },
    success: function (response) {
    if(response == 'Success!'){
        alert('youve logged in')
        location.reload();
    }else{
        $(".formMsg").text(response);
    }
    },
    dataType: 'json'
});
};