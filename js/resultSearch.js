$(document).ready(function(){
  $('#submitSearch').on("click", function(){
  var jsonObject = {
      "action" : "GETRESULTSEARCH",
      "title" : "Bronco"
  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
        alert(jsonData)
        //$(location).attr('href', 'result.php')
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error in result page.");
          console.log("valio verga")
      }
  });
  });


});
