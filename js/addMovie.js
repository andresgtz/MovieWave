
$(document).ready(function(){
  //hide error msg and success msg
  $("#errorMsg").hide();
  $("#successMsg").hide();

  //populate year select
  var opt = '';
  for (i = 2016; i > 1940; i= i-1) {
    opt += '<option value=\"'+i+'\">'+i+'</option>';
  }

  $("#movieYear").append(opt);


  //submit movie ajax
  $("#submitaddMovie").on("click", function(e) {
        e.preventDefault();

        //submit movie validation
        var a = $("#movieTitle").val() != "";
        var b = $("#movieActors").val() != "";
        var c = $("#movieGenre").val() != "";
        var d = $("#movieDescription").val() != "";

        if(a & b & c & d){
            var jsonObject = {
                "movieTitle": $("#movieTitle").val(),
                "movieYear": $("#movieYear option:selected" ).text(),
                "movieActors": $("#movieActors").val(),
                "movieGenre": $("#movieGenre").val(),
                "movieDescription": $("#movieDescription").val(),
                "action" : "addMovie"
            };

            console.log(jsonObject);

            $.ajax({
                type: "POST",
                url: "data/applicationLayer.php",
                data: jsonObject,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function(jsonData) {
                    //alert(jsonData);
                    $("#errorMsg").hide();
                    $("#successMsg").show();

                },
                error: function(errorMsg) {
                    alert(errorMsg.statusText);
                }
            });

    }else{
      $("#successMsg").hide();
      $("#errorMsg").show();

    }
  });

});
