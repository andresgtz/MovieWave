
$(document).ready(function(){
  //hide error msg and success msg
  $("#logPasswordErrorMsg").hide();
  $("#logBlankField").hide();

  //submit movie ajax
  $("#loginButton").on("click", function(e) {
        e.preventDefault();

        //submit movie validation
        var a = $("#loginUsername").val() != "";
        var b = $("#loginPassword").val() != "";

        if(a & b ){
            var jsonObject = {
                "loginUsername": $("#loginUsername").val(),
                "loginPassword": $("#loginPassword" ).val(),
                "action" : "LOGIN"
            };

            $.ajax({
                type: "POST",
                url: "data/applicationLayer.php",
                data: jsonObject,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function(jsonData) {
                    //alert(jsonData);
                    if(jsonData['message'] == "SUCCESS"){
                      location.reload();
                    }else{
                      $("#logBlankField").hide();
                      $("#logPasswordErrorMsg").show();
                    }


                },
                error: function(errorMsg) {
                  //alert(errorMsg.statusText);
                  $("#logBlankField").hide();
                  $("#logPasswordErrorMsg").show();
                }
            });

    }else{
      $("#logPasswordErrorMsg").hide();
      $("#logBlankField").show();

    }
  });

});
