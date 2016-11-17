$(document).ready(function(){  
  var jsonObject = {
      "action" : "LOADCOMMENTS",
      "movieTitle" : $('#h1movieTitle').text()

  };
  
  $.ajax({
      type: "POST",
      url: "data/applicationLayer.php",
      data: jsonObject,
      dataType: "json",
      contentType: "application/x-www-form-urlencoded",
      success: function(jsonData) {
        for (var i=0; i<jsonData.length; i++) {
          $('#comments').append("<div><label>User:</label><p>"+jsonData[i]['username']+"</p><label>Rating:</label><p>"+jsonData[i]['rate']+"</p><label>Comment:</label><p>"+ jsonData[i]['content']+"</p>")
        }
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error loading comments.");      }
  });
});