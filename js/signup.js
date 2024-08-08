function checkEmail() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/signup_action.php",
        data: 'action=check_email&email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#check-email").html(data);
        },
        error: function() {}
    });
}

function checkPhoneNumber() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/signup_action.php",
        data: 'action=check_phoneNo&phoneNo=' + $("#phoneNo").val(),
        type: "POST",
        success: function(data) {
            $("#check-phoneNo").html(data);
        },
        error: function() {}
    });
}


