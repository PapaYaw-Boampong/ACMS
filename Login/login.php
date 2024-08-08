<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="ACMS" />
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

    <div class="login-page vh-100">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="px-5 col-md-6 ms-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2 class="text-dark my-0">Welcome Back</h2>
                    <p class="text-50">Sign in to continue</p>
                    <form class="mt-5 mb-4" id="loginForm" action="#" method="POST">
                        <div class="form-group">
                            <label class="text-dark pb-1">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control py-1" onkeyup="checkEmail()" required />
                            <span id="check-email"></span>
                        </div>
                        <div class="form-group">
                            <label class="text-dark pb-1">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control py-1" onkeyup="checkPassword()" required />
                            <span id="check-password"></span>
                        </div>
                        <button class="btn btn-danger btn-lg w-100" name="login">SIGN IN</button>
                    </form>
                    <a href="forgot_password.html" class="text-decoration-none">
                        <p class="text-center">Forgot your password?</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="signup.php">
                            <p class="text-center m-0">Don't have an account? Sign up</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/slick/slick/slick.min.js"></script>
    <script src="../vendor/sidebar/hc-offcanvas-nav.js"></script>
    <script src="../js/osahan.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script  src="../js/login.js"></script>

</body>

</html>