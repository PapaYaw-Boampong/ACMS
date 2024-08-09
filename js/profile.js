document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../actions/UserManagementService/put/update_account.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('success-message').innerHTML = xhr.responseText;
                document.getElementById('success-message').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 3000);
            } else {
                document.getElementById('success-message').innerHTML = '<span style="color:red">An error occurred. Please try again.</span>';
                document.getElementById('success-message').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 3000);
            }
        };
        xhr.send(formData);
    });
});