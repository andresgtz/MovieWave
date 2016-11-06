$(document).ready(function() {
	$("#successMsg").hide()
	$("#passwordErrorMsg").hide()
	$("#invalidMailMsg").hide()
	$("#usernameInvalidMsg").hide()
	$("#errorAddedMsg").hide()
    $("#register-button").on("click", function() {
        var jsonObject = {
            "username": $("#register-username").val(),
            "userPassword": $("#register-password1").val(),
            "confirmPassword": $("#register-password2").val(),
            "userEmail": $("#register-email-input").val(),
            "action": "REGISTER"
        };
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (jsonObject.username != '') {
            if (emailReg.test(jsonObject.userEmail)) {
                if (jsonObject.userPassword == jsonObject.confirmPassword) {
                    $.ajax({
                        type: "POST",
                        url: "data/applicationLayer.php",
                        data: jsonObject,
                        dataType: "json",
                        contentType: "application/x-www-form-urlencoded",
                        success: function(jsonData) {
                            $("#successMsg").show()
							$("#passwordErrorMsg").hide()
							$("#invalidMailMsg").hide()
							$("#usernameInvalidMsg").hide()
							$("#errorAddedMsg").hide()
                        },
                        error: function(errorMsg) {
                            $("#errorAddedMsg").show()
                            $("#successMsg").hide()
							$("#passwordErrorMsg").hide()
							$("#invalidMailMsg").hide()
							$("#usernameInvalidMsg").hide()
                        }
                    });
                } else {
                    $("#passwordErrorMsg").show()
                    $("#successMsg").hide()
					$("#invalidMailMsg").hide()
					$("#usernameInvalidMsg").hide()
					$("#errorAddedMsg").hide()
                }
            } else {
                $("#invalidMailMsg").show()
                $("#successMsg").hide()
				$("#passwordErrorMsg").hide()
				$("#usernameInvalidMsg").hide()
				$("#errorAddedMsg").hide()
            }
        } else {
            $("#usernameInvalidMsg").show()
            $("#successMsg").hide()
			$("#passwordErrorMsg").hide()
			$("#invalidMailMsg").hide()
			$("#errorAddedMsg").hide()
        }
    })
});