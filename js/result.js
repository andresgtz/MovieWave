$(document).ready(function(){
  var jsonObject = {
      "action" : "GETRESULT",
      "genre" : $("#resultHeader").text()
  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
          //alert(jsonData);


      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error in result page.");
      }
  });

});
