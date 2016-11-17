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
          for(var i=0; i < jsonData.length; i++){
            $("#genreList").append("<li>"+jsonData[i]+"</li>");
          }

      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error in update genre.");
      }
  });

});
