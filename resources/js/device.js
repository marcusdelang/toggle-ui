 $(function() {
    getConnectionStatus();
    $("#toggle_device_status").click(toggleDevice);
});

function toggleDevice(){
    var device = $('#device_token').val();
    var power_status = $('#power_status').val();
    if(power_status === "on"){
    $.ajax({ 
        url: '/View/turn_on_process.php',
        data: {
            'command' : power_status,
        },
        type: 'post',
        dataType:'json',
        success: function(data) {
            $('#power_status').val("off");
        }
   });
} else{
    $.ajax({ 
        url: '/View/turn_on_process.php',
        data: {
            'command' : power_status,
        },
        type: 'post',
        dataType:'json',
        success: function(data) {
            $('#power_status').val("on");
        }
   }); 
}  
}

function getConnectionStatus(){
    //JSON.stringify({url : "http://130.229.151.183/api/device/register"})
    $.ajax({ 
        url: '/View/get_connection_status.php',
        data: {json : JSON.stringify({url : "http://130.229.151.183/api/device/register"})},
        type: 'post',
        success: function(data) {
            if(JSON.parse(data)["status"] === "200"){
            $('#connectivity_status').val("Online");
        }else{
            $('#connectivity_status').val("Offline");
        }
        }
   }); 
};


