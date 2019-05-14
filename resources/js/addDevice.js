$(function() {
      $("#submit").click(addDevice);
  });
  
  

function addDevice() {
    event.preventDefault();
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
          alert("Your device has been added to the database.")
          window.location.href="devicesPage.php"
        } else{
          alert("Unable to add device.")
        }
      },
      error: function(error) {
c      }
    });
  }