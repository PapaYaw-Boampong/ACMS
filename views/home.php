<!DOCTYPE html>

<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';
$userID = userIdExist();
$userName = $_SESSION['username'];
?>


<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Askbootstrap" />
  <meta name="author" content="Askbootstrap" />
  <link rel="icon" type="image/png" src="../img/fav.png" />
  <title>Ashesi Eats</title>

  <link href="../vendor/slick/slick/slick.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/slick/slick/slick-theme.css" rel="stylesheet" type="text/css" />

  <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet" />

  <link href="../vendor/sidebar/demo.css" rel="stylesheet" />

  <script type="7cd9e49886f583b445a907f9-text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body class="fixed-bottom-bar">
  <special-header></special-header>
  <div class="osahan-home-page">

    <div class="container">
      <div class="bg-primary p-3 d-none">
        <div class="text-white">
          <div class="title d-flex align-items-center">
            <a class="toggle" href="#">
              <span></span>
            </a>
            <h4 class="fw-bold m-0 ps-5">Browse</h4>
            <a class="text-white fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Filter</a>
          </div>
        </div>
        <div class="input-group bg-white rounded shadow-sm mt-3">
          <span class="input-group-text bg-transparent border-0 rounded-0"><i class="feather-search"></i></span>
          <input type="text" class="form-control bg-transparent border-0 rounded-0 px-0 shadow-none" placeholder="Enter Your Location" aria-label="Enter Your Location" />
        </div>
      </div>

      <br>

      <!-- Our Cafeterias -->
      <div class="container">

        <div class="pt-4 pb-2 title d-flex align-items-center">
          <h5 class="m-0">Cafeteria</h5>
      
        </div>

        <div class="offer-slider"> </div>
      </div>

      <br><br>

      <div class="container">

         <!-- popular -->

        <div class="pt-4 pb-2 title d-flex align-items-center">
          <h5 class="m-0">Trending this week</h5>
          <a class="fw-bold ms-auto" href="trending.php">View all <i class="feather-chevrons-right"></i></a>
        </div>

        <div class="trending-slider"></div>

          <!-- Recents -->

        <div class="py-3 title d-flex align-items-center">
          <h5 class="m-0">Recents</h5>
          <a class="fw-bold ms-auto" href="recents.php">More <i class="feather-chevrons-right"></i></a>
        </div>

        <div class="recents-slider" data-user-id="<?php echo $userID; ?>"></div>


      </div>
    </div>

      <!-- Footer -->
      <special-footer></special-footer>

      <nav id="main-nav" data-user-name="<?php echo $userName;?>"></nav>

      <script src="../vendor/jquery/jquery.min.js"></script>

      <script src="../vendor/slick/slick/slick.min.js"></script>

      <script src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

      <!-- Pass session data to JavaScript -->
      <script>
          // Pass PHP session data to JavaScript
          var userName = <?php echo json_encode($_SESSION['username']); ?>;
          var userID =  <?php echo json_encode($userID); ?>;
      </script>

      <script src="../js/headerFooterManager.js"></script>

      <script src="../js/homepage.js"></script>

      <script src="../js/osahan.js"></script>

</body>

</html>