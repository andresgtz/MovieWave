
$(document).ready(function(){

  var jsonObject = {
      "action" : "CHECKSESSION"
  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
          //alert(jsonData);
          if(jsonData['username'] != ""){
            alert(jsonData['username']);
          }
          else {
            alert("session not started");
          }
      },
      error: function(errorMsg) {
          alert(errorMsg.statusText);
      }
  });



});
