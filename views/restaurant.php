<?php

include_once '../settings/connection.php';
include_once '../settings/core.php';

include_once '../actions/FeedBackService/get/getReview.php';
include_once '../actions/CafeteriaManagementService/get/getResturantDetails.php';
include_once '../actions/FeedBackService/get/getNumberCafReviews.php';
include_once '../actions/CafeteriaManagementService/get/getMenu.php';

$userID = $_SESSION['userID'];
$cafID = isset($_GET['cafID']) ? intval($_GET['cafID']) : 0; // Default to 0 if cafID is not provided
$result = getRecentReviews($conn, $cafID);
$resultsDetails = getAllCafeteriaDetails($conn);
$menusBF = getCafeteriaMenus($conn, 'BREAKFAST');
$menusL = getCafeteriaMenus($conn, 'LUNCH');
$menusD = getCafeteriaMenus($conn, 'DINNER');

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
  <style>
    #star {
      cursor: pointer;
      font-size: 1.5rem;
    }

    .text-warning {
      color: #ffc107 !important;
    }
  </style>
</head>

<body class="fixed-bottom-bar">
  <special-header></special-header>

  <div class="d-none">
    <div class="bg-primary p-3 d-flex align-items-center">
      <a class="toggle togglew toggle-2" href="#"><span></span></a>
      <h4 class="fw-bold m-0 text-white">Cafeteria Menu</h4>
    </div>
  </div>
  <div class="offer-section py-4">
    <div class="container position-relative">
      <img alt="#" src="../img/trending1.png" class="restaurant-pic" />
      <div class="pt-3 text-white">
        <h2 class="fw-bold"><?php echo $resultsDetails['cafeteriaName'] ?></h2>
        <p class="text-white m-0">Inside Ashesi University</p>
        <div class="rating-wrap d-flex align-items-center mt-2">
          <ul class="rating-stars list-unstyled">
            <li>
              <i class="feather-star text-warning"></i>
              <i class="feather-star text-warning"></i>
              <i class="feather-star text-warning"></i>
              <i class="feather-star text-warning"></i>
              <i class="feather-star"></i>
            </li>
          </ul>
          <p class="label-rating text-white ms-2 small"><?php echo getReviewCount($conn, $cafID) ?> Reviews</p>
        </div>
      </div>
      <div class="pb-4">
        <div class="row">
          <div class="col-6 col-md-2">
            <p class="text-white-50 fw-bold m-0 small">Opening time</p>
            <p class="text-white m-0"><?php echo $resultsDetails['openingTime'] ?></p>
          </div>
          <div class="col-6 col-md-2">
            <p class="text-white-50 fw-bold m-0 small">Closing time</p>
            <p class="text-white m-0"><?php echo $resultsDetails['closingTime'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="p-3 bg-primary mt-n3 rounded position-relative" id="con1">
      <div class="d-flex align-items-center">
        <div class="feather_icon">
          <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i
              class="p-2 bg-light rounded-circle fw-bold feather-upload"></i></a>
          <a href="#ratings-and-reviews" class="text-decoration-none text-dark mx-2"><i
              class="p-2 bg-light rounded-circle fw-bold feather-star"></i></a>
          <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i
              class="p-2 bg-light rounded-circle fw-bold feather-map-pin"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container position-relative">
    <div class="row">
      <div class="col-md-8 pt-3">
        <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">

          <div class="d-flex item-aligns-center">
            <p class="fw-bold h6 p-3 border-bottom mb-0 w-100">Menu</p>
          </div>
          <div class="row m-0">
            <h6 class="p-3 m-0 bg-light w-100">
              Breakfast <small class="text-black-50"><?php echo count($menusBF); ?> ITEMS</small>
            </h6>
            <div class="col-md-12 px-0 border-top">
              <div class>
                <?php
                foreach ($menusBF as $menu): ?>
                  <div class="d-flex gap-2 p-3 border-bottom gold-members">
                    <div
                      class="fw-bold <?php echo $menu['mealStatus'] == 'Non veg' ? 'text-danger non_veg' : 'text-success veg'; ?>">
                      .</div>
                    <div>
                      <h6 class="mb-1"><?php echo $menu['name']; ?></h6>
                      <p class="text-muted mb-0"><?php echo $menu['price']; ?></p>
                    </div>
                    <span class="ms-auto">
                      <a href="#" class="btn btn-outline-secondary btn-sm" data-meal-id="<?php echo $menu['mealID'];?>"   data-user-id="<?php echo $userID;?>">
                        ADD
                      </a>
                    </span>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
          <h6 class="p-3 m-0 bg-light w-100">
            Lunch <small class="text-black-50"><?php echo count($menusL); ?> ITEMS</small>
          </h6>
          <div class="col-md-12 px-0 border-top">
            <div class>
              <?php
              foreach ($menusL as $menu): ?>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div
                    class="fw-bold <?php echo $menu['mealStatus'] == 'Non veg' ? 'text-danger non_veg' : 'text-success veg'; ?>">
                    .</div>
                  <div>
                    <h6 class="mb-1"><?php echo $menu['name']; ?></h6>
                    <p class="text-muted mb-0"><?php echo $menu['price']; ?></p>
                  </div>
                  <span class="ms-auto">
                      <a href="#" class="btn btn-outline-secondary btn-sm" data-meal-id="<?php echo $menu['mealID'];?>"   data-user-id="<?php echo $userID;?>">
                        ADD
                      </a>
                  </span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <h6 class="p-3 m-0 bg-light w-100">
            Dinner <small class="text-black-50"><?php echo count($menusD); ?> ITEMS</small>
          </h6>
          <div class="col-md-12 px-0 border-top">
            <div class>
              <?php
              foreach ($menusD as $menu): ?>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div
                    class="fw-bold <?php echo $menu['mealStatus'] == 'Non veg' ? 'text-danger non_veg' : 'text-success veg'; ?>">
                    .</div>
                  <div>
                    <h6 class="mb-1"><?php echo $menu['name']; ?></h6>
                    <p class="text-muted mb-0"><?php echo $menu['price']; ?></p>
                  </div>
                  <span class="ms-auto">
                      <a href="#" class="btn btn-outline-secondary btn-sm" data-meal-id="<?php echo $menu['mealID'];?>"   data-user-id="<?php echo $userID;?>">
                        ADD
                      </a>
                  </span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

        <div class="bg-white p-3 mb-3 rating-review-select-page rounded shadow-sm">
          <h6 class="mb-3">Rate and Comment</h6>
          <div class="d-flex align-items-center mb-3">
            <p class="m-0 small">Rate the Place</p>
            <div class="star-rating ms-auto">
              <div class="d-inline-block">
                <!-- Star icons with data-value attribute -->
                <i class="feather-star" data-value="1"></i>
                <i class="feather-star" data-value="2"></i>
                <i class="feather-star" data-value="3"></i>
                <i class="feather-star" data-value="4"></i>
                <i class="feather-star" data-value="5"></i>
              </div>
            </div>
          </div>
          <form name="cafeteriaFeedback" method="POST" action="../actions/FeedBackService/post/addCafeteriaReview.php?cafID=<?php echo $cafID ?>">
            <input type="hidden" name="rating" id="rating" value="">
            <div class="form-group mb-3">
              <label class="form-label small">Your Comment</label>
              <textarea class="form-control" name="feedback"></textarea>
            </div>
            <div class="form-group mb-0">
              <button type="submit" name="ratingBtn" class="btn btn-primary w-100">
                Submit
              </button>
            </div>
        </div>


      </div>

      <div class="col-md-4 pt-3">
        <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar" id="order-details" data-user-id="<?php echo $userID; ?>">

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
          var cafID =  <?php echo json_encode($cafID); ?>;
      </script>

  <nav id="main-nav"></nav>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../vendor/jquery/jquery.min.js"></script>


  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../vendor/slick/slick/slick.min.js"></script>

  <script src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script src="../js/osahan.js"></script>

  <script src="../js/headerFooterManager.js"></script>

  <script src="../js/restaurant.js"></script>


</body>

</html>