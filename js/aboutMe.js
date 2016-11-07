$(document).ready(function(){
	$('#saveAboutMe').on("click", function(e) {
		var jsonObject = {
                "aboutMe" : $("#editAboutMe").val(),
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
                    alert(errorMsg.statusText);
                }
            });
	});
});