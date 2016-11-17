$(document).ready(function(){
  $('#submitSearch').on("click", function(e){
      e.preventDefault();
      var jsonObject = {
          "action" : "GETRESULTSEARCH",
          "title" : $('#textSearch').val()
      };

      $.ajax({
          type: "POST",
          url: "data/applicationLayer.php",
          data: jsonObject,
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function(jsonData) {
            //alert(jsonData)
            if(jsonData == 1){
              $(location).attr('href', 'movieProfile.php?movieTitle='+$('#textSearch').val());
            }else{
              alert("Movie not found");
            }
          },
          error: function(errorMsg) {
              //alert(errorMsg.statusText);
              alert("Error in result page.");
              console.log("valio verga")
          }
      });
  });


});
