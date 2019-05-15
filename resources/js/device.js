$(function() {
  getDevices();
  removeDevice();
  toggleDevice();
});
$(setInterval(function() {
  getDevices();
},300000));

function getConnectionStatus(token){
    $.ajax({ 
        url: '/View/get_connection_status.php',
        data: {token : token},
        type: 'post',
        dataType:'json',
        success: function(data) {
            if(data["connection_status"] === "true"){
            $('.' + token).siblings('#connectivity_status').val('Online')
            enableToggleButton(token)
            }else if(data["connection_status"] === "false"){
            $('.' + token).siblings('#connectivity_status').val('Offline')
            disableToggleButton(token)
        }
        },
        error: function(a,b,c) {
          alert(c)
        }
   }); 
};
function enableToggleButton(token){
  $('.' + token).siblings('.toggle_device_status').removeClass('button_disable')
  $('.' + token).siblings('.toggle_device_status').addClass('button_enable')

}
function disableToggleButton(token) {
  $('.' + token).siblings('.toggle_device_status').removeClass('button_enable')
  $('.' + token).siblings('.toggle_device_status').addClass('button_disable')

}

function getPowerStatus(token){
    $.ajax({ 
        url: '/View/get_power_status.php',
        data: {token : token},
        type: 'post',
        dataType:'json',
        success: function(data) {
            if(data["status_power"]=== "on"){
              $('.' + token).siblings('#power_status').val('On')
            }else if(data["status_power"]=== "off"){
              $('.' + token).siblings('#power_status').val('Off')
            }else{
              $('.' + token).siblings('#power_status').val('N/A')
            }
        }
   }); 
};


function toggleDevice(){
  $('.device-items').on('click','.toggle_device_status', function () {
    let device = $(this);
    let token = device.val();
    let power_status = device.nextAll('#power_status').val();
    if(power_status === "On"){
    $.ajax({
      url: "/View/turn_off_process.php",
      data: {
        token: token
      },
      type: "post",
      dataType: "json",
      success: function(data) {
        if (data["turn_off_result"] === "true") {
          $('.' + token).siblings('#power_status').val('Off')
        } else if (data["turn_off_result"] === "false") {
          $('.' + token).siblings('#power_status').val('On')
        } else {
          $("#power_status").val("UNKNOWN");
          getPowerStatus();
        }
      },
      error: function(error) {}
    });
}else if(power_status === "Off"){
    $.ajax({ 
        url: '/View/turn_on_process.php',
        data: {
            token : token
        },
        type: 'post',
        dataType:'json',
        success: function(data) {
            if(data["turn_on_result"] === "true"){
              $('.' + token).siblings('#power_status').val('On')
            }else if(data["turn_on_result"] === "false"){
              $('.' + token).siblings('#power_status').val('Off')
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
    let device_token = device.val();
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
      $(".device-items").empty();
      for (var i = 0; i < data["get_devices_result"].length; i++) {
      let token = data["get_devices_result"][i]["token"];
      let name = data["get_devices_result"][i]["name"];
      $(".device-items").append(
        '<div class="device-item">'
        + '<button class="toggle_device_status" type="submit" id="1" name="action" value="'
        + token
        + '">Toggle</button>'
        + '<input class="'
        + token
        + '" id="device_token" type="text" name="text" value="'
        + token
        + '" readonly="readonly"/>'
        + '<input  id="device_text" type="text" name="text" value="'
        + name
        + '"/>'
        + '<input  id="power_status" type="text" name="text" value="N/A" placeholder="unknown" readonly="readonly"/>'
        + '<input  id="connectivity_status" type="text" name="text" value="Offline" readonly="readonly"/>'
        + '<button class="delete_device" type="submit" name="action" value="'
        + token
        + '">Remove</button>'
        + '</div>'
        + '<br>'
        );
        getPowerStatus(token)
        getConnectionStatus(token)  
      }
    },
    error: function(a,b,c) {
      alert(c)
      }
  });
}
