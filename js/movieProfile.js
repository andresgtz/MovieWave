$(document).ready(function(){

  var jsonObject = {
      "action" : "GETMOVIEINFO",
      "movieTitle" : $("#h1movieTitle").text()
  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
        $("#movieId").append(jsonData[0]);
        $("#movieTitle").append(jsonData[1]);
        $("#movieYear").append(jsonData[2]);
        $("#movieGenre").append(jsonData[3]);
        $("#movieActors").append(jsonData[4]);
        $("#movieDescription").append(jsonData[5]);
        $("#movieRating").append(jsonData[6]);
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error in movie page.");
      }
  });
  $("#addFavorite").on("click", function(e) {
    e.preventDefault();

    var jsonObject = {
        "action" : "ADDFAVORITE",
        "movieId" : $("#movieId").text()
    };

    $.ajax({
        type: "POST",
        url: "data/applicationLayer.php",
        data: jsonObject,
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        success: function(jsonData) {
          if(jsonData["status"] == "SUCCESS"){
            alert("Added to favorite");
          }else{
            alert("Movie not added to favorites.")
          }

        },
        error: function(errorMsg) {
            //alert(errorMsg.statusText);
            alert("Error in add favorite.");
        }
    });

  });

});
