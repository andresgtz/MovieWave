$(document).ready(function(){
  $('#submitComment').on("click", function(e){
  e.preventDefault();
  var jsonObject = {
      "action" : "ADDCOMMENT",
      "comment" : $('#commentText').val(),
      "rating" : $('#ratingValue').val(),
      "movieTitle" : $('#h1movieTitle').text()

  };

  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
        alert("Comment added successfully.")
        location.reload();
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error in result page.");      }
  });
  });
});
