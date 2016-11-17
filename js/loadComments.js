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
          $('#userComments').append("<div><strong>User: &nbsp;</strong>"+jsonData[i]['username']+"&nbsp;<strong> Rating:</strong>"+jsonData[i]['rate']+"<br><strong>Comment:</strong><p>"+ jsonData[i]['content']+"</p>")
        }
      },
      error: function(errorMsg) {
          //alert(errorMsg.statusText);
          alert("Error loading comments.");      }
  });
});
