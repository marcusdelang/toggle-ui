$(function() {
    $("#logout").click(logout);
});

function logout(){
event.preventDefault();
$.ajax({
    type: 'POST',
    url: '/View/logout_process.php',
    dataType: 'json',
    success: function (response) {
    if(response["logout_result"] == "true"){
        alert('Logout successful!')
        window.location.href="index.php"
    }
    },
    error: function (a,b,c) {
        alert(c)
    }

});
};