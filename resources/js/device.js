 $(function() {
  getConnectionStatus()
  getPowerStatus()
  getDevices()
  removeDevice()
  toggleDevice()
  //$(".toggle_device_status").click(toggleDevice);
  //$(".delete_device").click(removeDevice);

});

function getConnectionStatus(){
  var device = $('#device_token').val();;
    $.ajax({ 
        url: '/View/get_connection_status.php',
        data: {token : device},
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
          //alert()
        }
   }); 
};

function getPowerStatus(){
  var device = $('#device_token').val();;
    $.ajax({ 
        url: '/View/get_power_status.php',
        data: {token : device},
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
  $('.device-items').on('click','.toggle_device_status', function () {
    let device = $(this);
    let device_token = device.attr('id');
    let power_status = device.prevAll('#power_status').val();
    alert(power_status)
    if(power_status === "On"){
    $.ajax({
      url: "/View/turn_off_process.php",
      data: {
        token: device_token
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
  }});
}
  
function removeDevice(){
  $('.device-items').on('click','.delete_device', function () {
    let device = $(this);
    let device_token = device.attr('id');
    $.ajax({
      url: "/View/remove_device.php",
      data: {
        device_token: device_token,
      },
      type: "post",
      dataType: "json",
      success: function(data) {
        if (data["remove_device_result"] === "true") {
          alert("Your device has been removed from database.")
          window.location.href="devicesPage.php"
        } else{
          alert("Unable to remove said device.")
        }
      },
      error: function(error) {
        }
    });
});
}


function getDevices() {
  $.ajax({
    url: "/View/get_devices.php",
    dataType: "json",
    success: function(data) {
      for (var i = 0; i < data["get_devices_result"].length; i++) {
      let token = data["get_devices_result"][i]["token"];
      let name = data["get_devices_result"][i]["name"];
      $(".device-items").append(
        '<div class="device-item">'
        + '<button class="toggle_device_status" type="submit" name="action" id="'
        + token
        + '">Toggle</button>'
        + '<input  id="device_token" type="text" name="text" value="'
        + token
        + '" readonly="readonly"/>'
        + '<input  id="device_text" type="text" name="text" value="'
        + name
        + '"/>'
        + '<input  id="power_status" type="text" name="text" value="N/A" placeholder="unknown" readonly="readonly"/>'
        + '<input  id="connectivity_status" type="text" name="text" value="Offline" readonly="readonly"/>'
        + '<button class="delete_device" type="submit" name="action" id="'
        + token
        + '">Remove</button>'
        + '</div>'
        + '<br>'
        );}
    },
    error: function(a,b,c) {
      alert(c)
      }
  });
}
