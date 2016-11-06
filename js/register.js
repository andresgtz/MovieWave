$(document).ready(function() {
    $("#register-button").on("click", function() {
        var jsonObject = {
            "username": $("#register-username").val(),
            "userPassword": $("#register-password1").val(),
            "confirmPassword": $("#register-password2").val(),
            "userEmail": $("#register-email-input").val(),
            "action": "REGISTER"
        };
        console.log(jsonObject)
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
                            alert(jsonData);
                        },
                        error: function(errorMsg) {
                            alert(errorMsg.statusText);
                        }
                    });
                } else {
                    alert("The passwords do not match.")
                }
            } else {
                alert("The email is not valid.")
            }
        } else {
            alert("The usarname is not valid.")
        }
    })
});