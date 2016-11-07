
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
<<<<<<< HEAD
            $('#addMovieli').show();
          }
          else {
            //alert("session not started");
            $('#addMovieli').hide();
=======
          }
          else {
            //alert("session not started");
>>>>>>> 5de505f8fc52d5dd3e2c6e61ad88bba934cb78d7
          }
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
      }
  });



});
