$(document).ready(function(){

  $("#logoutLink").on("click",function(e){
    e.preventDefault();

    var jsonObject = {
        "action" : "LOGOUT"
    };

    $.ajax({
        type: "POST",
        url: "data/applicationLayer.php",
        data: jsonObject,
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        success: function(jsonData) {
            //alert(jsonData);
            location.reload();


        },
        error: function(errorMsg) {
          //alert(errorMsg.statusText);
        }
    });

  });

});
