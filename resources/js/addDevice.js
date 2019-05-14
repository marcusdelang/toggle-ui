$(function() {
      $("#submit").click(addDevice);
  });
  
  

function addDevice() {
    var token = $('#token_device').val();
    var name = $('#name_device').val();
    $.ajax({
      url: "/View/add_device.php",
      data: {
        device_token: token,
        device_name: name 
      },
      type: "post",
      dataType: "json",
      success: function(data) {
        if (data["add_device_result"] === "true") {
          alert("")
        }
      },
      error: function(error) {}
    });
  }