
$(document).ready(function(){
  $('#addMovieli').hide();
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
            //alert(jsonData['username']);
            $('#addMovieli').show();
          }
          else {
            //alert("session not started");
            $('#addMovieli').hide();
          }
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
      }
  });



});
