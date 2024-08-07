<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Ashesi Eats" />
    <link rel="icon" type="image/png" href="../img/fav.png" />
    <title>Ashesi Eats - Reset Password</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="acms-signup login-page">
        <div class="d-flex align-items-center justify-content-center flex-column vh-100">
            <div class="px-5 col-md-6 ms-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2>Reset Password</h2>
                    <form action="update_password.php" method="POST" class="mt-5 mb-4">
                        <div class="form-group">
                            <label class="form-label pb-1">New Password</label>
                            <input type="password" name="new_password" class="form-control py-1" required />
                        </div>
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>" />
                        <button type="submit" class="btn btn-primary btn-lg w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
