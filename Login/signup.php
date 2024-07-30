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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
    </script>
</head>

<body>
  <div class="acms-signup login-page">
    <div class="d-flex align-items-center justify-content-center flex-column vh-100">
      <div class="px-5 col-md-6 ms-auto">
        <div class="px-5 col-10 mx-auto">
          <h2 class="text-dark my-0">Hello There.</h2>
          <p class="text-50">Sign up to continue</p>
          <form class="mt-5 mb-4" action="../actions/UserManagementService/post/signup_action.php" method="POST">
            <div class="form-group">
              <label class="text-dark pb-1">Name</label>
              <input type="text" placeholder="Enter Name" class="form-control py-1" name=name />
            </div>
             <div class="form-group">
                <label class="text-dark pb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control py-1" onkeyup="checkEmail()" required />
                <span id="check-email"></span>
              </div>
              <div class="form-group">
                  <label class="text-dark pb-1">Phone Number</label>
                  <input type="tel" id="phoneNo" name="phoneNo" placeholder="Enter Phone Number" class="form-control py-1" onkeyup="checkPhoneNumber()" required />
                  <span id="check-phoneNo"></span>
              </div>
            <div class="form-group">
              <label class="text-dark pb-1">Password</label>
              <input type="password" placeholder="Enter Password" class="form-control py-1" name=password />
            </div>
            <div class="form-group">
              <label class="text-dark pb-1">Role</label>
              </select>
              <?php include_once "../actions/UserManagementService/put/select_plan.php";?>
              <?php include_once "../settings/connection.php";?>
              <?php $role = getRoles($conn);?>
                <select class="form-control py-1" name="role"  style=" border-color: #ced4da; padding: 5%;">
                    <?php foreach ($role as $roles): ?>
                        <option value="<?php echo $roles['roleID']; ?>"><?php echo $roles['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
              <label class="text-dark pb-1">Meal Plan Status</label>
              <?php include_once "../actions/UserManagementService/put/select_meal.php";?>
              <?php include_once "../settings/connection.php";?>
              <?php $status = getMealstatus($conn);?>
                <select class="form-control py-1" name="mealPlan"  style=" border-color: #ced4da; padding: 5%;">
                    <?php foreach ($status as $Status): ?>
                        <option value="<?php echo $Status['status_id']; ?>"><?php echo $Status['status']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary btn-lg w-100 custom-btn">SIGN UP</button>
          </form>
        </div>
        <div class="new-acc d-flex align-items-center justify-content-center">
          <a href="./login.php">
            <p class="text-center m-0">Already have an account? Sign in</p>
          </a>
        </div>
      </div>
    </div>
  </div>

    <script type="6f2da711c007ffaa282dd9e2-text/javascript" src="../vendor/jquery/jquery.min.js"></script>
    <script type="6f2da711c007ffaa282dd9e2-text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="6f2da711c007ffaa282dd9e2-text/javascript" src="../vendor/slick/slick/slick.min.js"></script>
    <script type="6f2da711c007ffaa282dd9e2-text/javascript" src="../vendor/sidebar/hc-offcanvas-nav.js"></script>
    <script type="6f2da711c007ffaa282dd9e2-text/javascript" src="../js/osahan.js"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="6f2da711c007ffaa282dd9e2-|49" defer></script>
    <script src="../js/headerFooterManager.js"></script>
</body>

</html>
