$(document).ready(function(){
    var jsonObject = {
        "action" : "LOADABOUTME"
    };
    $.ajax({
        type: "POST",
        url: "data/applicationLayer.php",
        data: jsonObject,
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        success: function(jsonData) {
            $('#readAboutMe').val(jsonData.about)
            $('#editAbout').val(jsonData.about)
            $('#pN').text(jsonData.user)
        },
        error: function(errorMsg) {
            //alert(errorMsg.statusText);
        }
    });

	$('#saveAboutMe').on("click", function(e) {

		var jsonObject = {
                "aboutMe" : $("#editAbout").val(),
                "action" : "ABOUTME"
            };

            $.ajax({
                type: "POST",
                url: "data/applicationLayer.php",
                data: jsonObject,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function(jsonData) {
                    location.reload();
                },
                error: function(errorMsg) {
                    //alert(errorMsg.statusText);
                }
            });
	});
});
