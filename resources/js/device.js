 $(function() {
  getConnectionStatus()
  getPowerStatus()
    $("#toggle_device_status").click(toggleDevice);
});




function getConnectionStatus(){
    $.ajax({ 
        url: '/View/get_connection_status.php',
        data: {token : "3ja3bU?geh"},
        type: 'post',
        dataType:'json',
        success: function(data) {
            if(data["connection_status"] === "true"){
            $('#connectivity_status').val("Online");
            }else{
            $('#connectivity_status').val("Offline");
        }
        },
        error: function(a,b,c) {
          alert(b)
        }
   }); 
};

function getPowerStatus(){
    $.ajax({ 
        url: '/View/get_power_status.php',
        data: {token : "3ja3bU?geh"},
        type: 'post',
        dataType:'json',
        success: function(data) {
            if(data["status_power"]=== "on"){
                $('#power_status').val("On");
                //$("#toggle_device_status").click(turnOffDevice);
            }else{
                $('#power_status').val("Off");
                //$("#toggle_device_status").click(turnOnDevice);
            }
        }
   }); 
};


function toggleDevice(){
    var device = "3ja3bU?geh";
    var power_status = $('#power_status').val();
    if(power_status === "On"){
    $.ajax({
      url: "/View/turn_off_process.php",
      data: {
        token: device
      },
      type: "post",
      dataType: "json",
      success: function(data) {
        if (data["turn_off_result"] === "true") {
          $("#power_status").val("Off");
        } else if (data["turn_off_result"] === "false") {
          $("#power_status").val("On");
        } else {
          $("#power_status").val("UNKNOWN");
          getPowerStatus();
        }
      },
      error: function(error) {}
    });
}else{
    $.ajax({ 
        url: '/View/turn_on_process.php',
        data: {
            token : device,
        },
        type: 'post',
        dataType:'json',
        success: function(data) {
            if(data["turn_on_result"] === "true"){
            $('#power_status').val("On");
            }else if(data["turn_on_result"] === "false"){
            $('#power_status').val("Off");
            }else{
                $('#power_status').val("UNKNOWN");
                getPowerStatus();
                }    
        },
        error: function(error){
        }
});
}
}  


