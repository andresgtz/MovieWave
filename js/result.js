$(document).ready(function(){
  var jsonObject = {
      "action" : "GETRESULTGENRE",
      "genre" : $("#resultHeader").text()
  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
          $.each(jsonData, function( index, value ) {
            $('.resultDiv').append( '<div class="col-md-2"><img height="160" width="120" src="images/movie.jpeg"/><figcaption><a href=\"movieProfile.php?title='+value+'\">'+ value +'</a></figcaption></div>'+'&nbsp;&nbsp;');
          });
          

      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error in result page.");
      }
  });

});
