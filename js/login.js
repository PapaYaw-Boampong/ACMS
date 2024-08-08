function checkEmail() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/login_action.php",
        data: 'action=check_email&email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            let response = JSON.parse(data);
            let emailCheckElement = $("#check-email");
            emailCheckElement.html(response.message);
            if (response.success) {
                emailCheckElement.css('color', 'green');
            } else {
                emailCheckElement.css('color', 'red');
            }
        },
        error: function() {
            $("#check-email").html("Error checking email.").css('color', 'red');
        }
    });
}


function checkPassword() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/login_action.php",
        data: 'action=check_password&email=' + $("#email").val() + '&password=' + $("#password").val(),
        type: "POST",
        success: function(data) {
            let response = JSON.parse(data);
            let passwordCheckElement = $("#check-password");
            passwordCheckElement.html(response.message);
            if (response.success) {
                passwordCheckElement.css('color', 'green');
            } else {
                passwordCheckElement.css('color', 'red');
            }
        },
        error: function() {
            $("#check-password").html("Error checking password.").css('color', 'red');
        }
    });
}


document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loginForm").addEventListener("submit", handleFormSubmit);
});


function handleFormSubmit(event) {
    event.preventDefault(); // Stop the form from submitting normally

    // Get form data
    const formData = new FormData(event.target);
    formData.append("login", true); 

    // Make AJAX request
    fetch('../actions/UserManagementService/post/login_action.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Display success alert
            Swal.fire({
                title: 'Success!',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirect to another page if needed
                if (data.redirect) {
                    window.location.href = data.redirect;
                     
                    
                    // Initializing order state
                    localStorage.setItem('currentOrderID', -1);

                }
            });
        } else {
            // Display error alert
            Swal.fire({
                title: 'Sorry!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Display error alert
        Swal.fire({
            title: 'Error!',
            text: 'An error occurred. Please try again later.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        console.error('Error:', error);
    });
}
