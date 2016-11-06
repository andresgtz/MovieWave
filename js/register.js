$(document).ready(function(){
	$("#register").on("click", function() {
            var jsonObject = {
                "username": $("#register-username").val(),
                "userPassword": $("#register-password1").val(),
                "confirmPassword": $("#register-password2").val(),
                "userEmail": $("#register-email-input").val(),
                "action" : "register"
            };

            $.ajax({
                type: "POST",
                url: "data/applicationLayer.php",
                data: jsonObject,
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function(jsonData) {
                    alert(jsonData);
                },
                error: function(errorMsg) {
                    alert(errorMsg.statusText);
                }
            });
});
