function checkEmail() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/login_action.php",
        data: 'action=check_email&email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#check-email").html(data);
        },
        error: function() {}
    });
}

function checkPassword() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/login_action.php",
        data: 'action=check_password&email=' + $("#email").val() + '&password=' + $("#password").val(),
        type: "POST",
        success: function(data) {
            $("#check-password").html(data);
        },
        error: function() {}
    });
}