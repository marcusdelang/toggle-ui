$(document).ready(function(){
    alert("hello")
    $('#on').click(function () {
        var commandName = "/api/power/on";

        $.ajax({
                type: 'POST',
                url: "turn_on_process.php",
                data: {"command": commandName},
                dataType: 'json',
                success: function(re){
                    if(re=='1'){
                        alert("Status changed!");
                    }else{
                        alert("Failed! ");
                    }
                },
                error:function(){
                    alert("error");
                }
            });
});
});