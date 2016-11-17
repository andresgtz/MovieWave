
$(document).ready(function(){
  $("#addMovieli").hide();
  $("#logoutLink").hide();
  $("#userLink").hide();
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
            $("#userLink").append("Welcome, " + jsonData['username']);
            $("#addMovieli").show();
            $("#logoutLink").show();
            $("#userLink").show();
            $("#loginLink").hide();
            $("#comments").show();
            $("#noLoginMsg").hide();
            $("#addFavorite").show();
          }
          else {
            $("#addMovieli").hide();
            $("#logoutLink").hide();
            $("#userLink").hide();
            $("#loginLink").show();
            $("#comments").hide();
            $("#noLoginMsg").show();
            $("#addFavorite").hide();
          }

      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
      }
  });



});
