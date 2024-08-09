<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';
$userID = userIdExist(); // Default to 0 if cafID is not provided
$userName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Askbootstrap" />
  <meta name="author" content="Askbootstrap" />
  <link rel="icon" type="image/png" href="../img/fav.png" />
  <title>Ashesi Eats</title>

  <link href="../vendor/slick/slick/slick.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/slick/slick/slick-theme.css" rel="stylesheet" type="text/css" />

  <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <link href="../css/style.css" rel="stylesheet" />

  <link href="../vendor/sidebar/demo.css" rel="stylesheet" />
</head>

<body class="fixed-bottom-bar">
  <special-header></special-header>
  <div class="">
    <div class="bg-primary p-3 d-flex align-items-center">
      <a class="toggle togglew toggle-2" href="#"><span></span></a>
      <h4 class="fw-bold m-0 text-white">Trending</h4>
    </div>
  </div>

  <div class="osahan-trending">
    <div class="container">
      <div class="most_popular py-5">

      </div>
    </div>

    <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
      <div class="row">
        <div class="col">
          <a href="home.php" class="text-dark small fw-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-home"></i></p>
            Home
          </a>
        </div>
        <div class="col selected">
          <a href="trending.php" class="text-danger small fw-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-map-pin text-danger"></i></p>
            Trending
          </a>
        </div>
        <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
          <div class="bg-danger rounded-circle mt-n0 shadow">
            <a href="checkout.php" class="text-white small fw-bold text-decoration-none">
              <i class="feather-shopping-cart"></i>
            </a>
          </div>
        </div>
        <div class="col">
          <a href="profile.php" class="text-dark small fw-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-user"></i></p>
            Profile
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <special-footer></special-footer>

  <nav id="main-nav"> </nav>
  <script>
    // Pass PHP session data to JavaScript
    var userName = <?php echo json_encode($_SESSION['username']); ?>;
    var userID = <?php echo json_encode($userID); ?>;
  </script>



  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../vendor/slick/slick/slick.min.js"></script>

  <script src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script src="../js/osahan.js"></script>

  <script src="../js/headerFooterManager.js"></script>
  <script src="../js/trending.js"></script>

</body>

</html>