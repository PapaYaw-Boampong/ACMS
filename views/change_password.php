<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Ashesi Eats" />
    <link rel="icon" type="image/png" href="../img/fav.png" />
    <title>Ashesi Eats</title>
    <link href="../vendor/slick/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="../vendor/slick/slick-theme.css" rel="stylesheet" type="text/css" />
    <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../vendor/sidebar/demo.css" rel="stylesheet" />
</head>
<body>
    <div class="acms-signup login-page">
        <div class="d-flex align-items-center justify-content-center flex-column vh-100">
            <div class="px-5 col-md-6 ms-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2>Change Password</h2>
                    <div id="message"></div> <!-- Success or error message will be displayed here -->
                    <form id="change-password-form" class="mt-5 mb-4">
                        <div class="form-group">
                            <label class="form-label pb-1">Old Password</label>
                            <input type="password" name="old_password" class="form-control py-1" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label pb-1">New Password</label>
                            <input type="password" name="new_password" class="form-control py-1" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label pb-1">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control py-1" required />
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Change Password</button>
                    </form>
                </div>
                <div class="new-acc d-flex align-items-center justify-content-center">
                    <a href="../Login/login.php">
                        <p class="text-center m-0">Already have an account? Sign in</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/slick/slick/slick.min.js"></script>
    <script src="../vendor/sidebar/hc-offcanvas-nav.js"></script>
    <script src="../js/osahan.js"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7af3ad0565b65268c19f3195-|49" defer></script>
    <script>
        $(document).ready(function() {
            $('#change-password-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var newPassword = $('input[name="new_password"]').val();
                var confirmPassword = $('input[name="confirm_password"]').val();

                if (newPassword !== confirmPassword) {
                    $('#message').html('<span style="color:red">New passwords do not match.</span>').show().delay(3000).fadeOut();
                    return;
                }

                $.ajax({
                    url: '../actions/UserManagementService/put/update_password.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#message').html(response).show().delay(3000).fadeOut();
                    },
                    error: function() {
                        $('#message').html('<span style="color:red">An error occurred. Please try again.</span>').show().delay(3000).fadeOut();
                    }
                });
            });
        });
    </script>
</body>
</html>
