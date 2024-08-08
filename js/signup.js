function checkEmail() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/signup_action.php",
        data: {
            action: 'check_email',
            email: $("#email").val()
        },
        type: "POST",
        success: function(response) {
            const data = JSON.parse(response);
            const emailCheckElement = $("#check-email");
            emailCheckElement.html(data.message);
            if (data.success) {
                emailCheckElement.css('color', 'green');
            } else {
                emailCheckElement.css('color', 'red');
            }
        },
        error: function() {
            const emailCheckElement = $("#check-email");
            emailCheckElement.html("Error checking email.");
            emailCheckElement.css('color', 'red');
            console.error("Error checking email");
        }
    });
}


function checkPhoneNumber() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/signup_action.php",
        data: {
            action: 'check_phoneNo',
            phoneNo: $("#phoneNo").val()
        },
        type: "POST",
        success: function(response) {
            const data = JSON.parse(response);
            const phoneCheckElement = $("#check-phoneNo");
            phoneCheckElement.html(data.message);
            if (data.success) {
                phoneCheckElement.css('color', 'green');
            } else {
                phoneCheckElement.css('color', 'red');
            }
        },
        error: function() {
            const phoneCheckElement = $("#check-phoneNo");
            phoneCheckElement.html("Error checking phone number.");
            phoneCheckElement.css('color', 'red');
            console.error("Error checking phone number");
        }
    });
}


function checkPassword() {
    jQuery.ajax({
        url: "../actions/UserManagementService/post/signup_action.php",
        data: 'action=check_password&password=' + $("#password").val(),
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
    document.getElementById("signupForm").addEventListener("submit", handleFormSubmit);
});



function handleFormSubmit(event) {
    event.preventDefault(); // Stop the form from submitting normally

    // Get form data
    const formData = new FormData(event.target);
    formData.append("signup", true);

    // Make AJAX request
    fetch('../../ACMS/actions/UserManagementService/post/signup_action.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Attempt to parse the JSON response
    })
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
                window.location.href = `login.php`; // Change this to your desired URL
            });
        } else {
            // Display error alert
            Swal.fire({
                title: 'Error!',
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
