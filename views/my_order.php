
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
  
  <script  src="../vendor/jquery/jquery.min.js"></script>
</head>

<body class="fixed-bottom-bar">
  <special-header></special-header>

  <div class="">
    <div class="bg-primary border-bottom p-3 d-flex align-items-center">
      <a class="toggle togglew toggle-2" href="#"><span></span></a>
      <h4 class="fw-bolder m-2 text-white">My Orders</h4>
    </div>
  </div>
  <div class="py-4 osahan-main-body">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mb-3">
          <ul class="nav nav-tabsa custom-tabsa border-0 flex-column bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link border-0 text-dark py-3 active" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">
                <i class="feather-check me-2 text-success mb-0"></i>
                Completed</a>
            </li>
            <li class="nav-item border-top" role="presentation">
              <a class="nav-link border-0 text-dark py-3" id="progress-tab" data-bs-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="false">
                <i class="feather-clock me-2 text-warning mb-0"></i> In
                Progress</a>
            </li>
            <li class="nav-item border-top" role="presentation">
              <a class="nav-link border-0 text-dark py-3" id="canceled-tab" data-bs-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                <i class="feather-x-circle me-2 text-danger mb-0"></i>
                Canceled</a>
            </li>
          </ul>
        </div>
        <div class="tab-content col-md-9" id="myTabContent">
          <div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab"></div>
          <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab"></div>
          <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <special-footer></special-footer>

    <!-- Pass session data to JavaScript -->
    <script>
          // Pass PHP session data to JavaScript
          var userName = <?php echo json_encode($_SESSION['username']); ?>;
          var userID =  <?php echo json_encode($userID); ?>;
      </script>


  <nav id="main-nav">

   
    <script  src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/orders.js"></script>
    <script  src="../vendor/slick/slick/slick.min.js"></script>

    <script  src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

    <script  src="../js/osahan.js"></script>
  
    <script src="../js/headerFooterManager.js"></script>
</body>

</html>