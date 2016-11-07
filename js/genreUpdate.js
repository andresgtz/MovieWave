$(document).ready(function(){
  var jsonObject = {
      "action" : "UPDATEGENRE"
  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
          //alert(jsonData);
          alert(jsonData);

      },
      error: function(errorMsg) {
          alert(errorMsg.statusText);
      }
  });

});
