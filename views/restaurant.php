<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';
include_once '../actions/FeedBackService/get/getReview.php';
include_once '../actions/CafeteriaManagementService/get/getResturantDetails.php';
include_once '../actions/FeedBackService/get/getNumberCafReviews.php';
include_once '../actions/CafeteriaManagementService/get/getMenu.php';
// session_start();
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
        <a href="contact-us.html" class="btn btn-sm btn-outline-light ms-auto">Contact</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class>
      <p class="fw-bold pt-4 m-0">FEATURED ITEMS</p>

      <div class="trending-slider rounded">
        <div class="osahan-slider-item">
          <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image">
              <a href="checkout.html">
                <img alt="#" src="../img/trending1.png" class="img-fluid item-img w-100" />
              </a>
            </div>
            <div class="p-3 position-relative">
              <div class="list-card-body">
                <h6 class="mb-1">
                  <a href="checkout.html" class="text-black">Famous Dave's Bar-B-Que</a>
                </h6>
                <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>
                <p class="text-gray m-0">
                  <span class="text-black-50"> $350 FOR TWO</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="osahan-slider-item">
          <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image">
              <a href="checkout.html">
                <img alt="#" src="../img/trending2.png" class="img-fluid item-img w-100" />
              </a>
            </div>
            <div class="p-3 position-relative">
              <div class="list-card-body">
                <h6 class="mb-1">
                  <a href="checkout.html" class="text-black">Thai Famous Cuisine</a>
                </h6>
                <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                <p class="text-gray m-0">
                  <span class="text-black-50"> $250 FOR TWO</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="osahan-slider-item">
          <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image">
              <a href="checkout.html">
                <img alt="#" src="../img/trending3.png" class="img-fluid item-img w-100" />
              </a>
            </div>
            <div class="p-3 position-relative">
              <div class="list-card-body">
                <h6 class="mb-1">
                  <a href="checkout.html" class="text-black">The osahan Restaurant</a>
                </h6>
                <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                <p class="text-gray m-0">
                  <span class="text-black-50"> $500 FOR TWO</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="osahan-slider-item">
          <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image">
              <a href="checkout.html">
                <img alt="#" src="../img/trending2.png" class="img-fluid item-img w-100" />
              </a>
            </div>
            <div class="p-3 position-relative">
              <div class="list-card-body">
                <h6 class="mb-1">
                  <a href="checkout.html" class="text-black">Thai Famous Cuisine</a>
                </h6>
                <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                <p class="text-gray m-0">
                  <span class="text-black-50"> $250 FOR TWO</span>
                </p>
              </div>
            </div>
          </div>
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
                    <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#extras">ADD</a></span>
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
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
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
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
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
        <div class="bg-white p-3 mb-3 restaurant-detailed-ratings-and-reviews shadow-sm rounded">
          <a class="text-primary float-end" href="#">Top Rated</a>
          <h6 class="mb-1">All Ratings and Reviews</h6>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $rating = $row["rating"];
          ?>
              <div class="reviews-members py-3">
                <div class="d-flex align-items-start gap-3">
                  <a href="#">
                    <img alt="#" src="<?php echo $row['userImage']; ?>" class="rounded-pill" />
                  </a>
                  <div>
                    <div class="reviews-members-header">
                      <div class="star-rating float-end">
                        <div class="d-inline-block" style="font-size: 14px">
                          <?php
                          for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                              echo '<i class="feather-star text-warning"></i>';
                            } else {
                              echo '<i class="feather-star"></i>';
                            }
                          }
                          ?>
                        </div>
                      </div>
                      <h6 class="mb-0">
                        <a class="text-dark" href="#"><?php echo $row["name"]; ?></a>
                      </h6>
                      <p class="text-muted small"><?php echo date("D, d M Y", strtotime($row["dateTime"])); ?></p>
                    </div>
                    <div class="reviews-members-body">
                      <p><?php echo htmlspecialchars($row["feedback"]); ?></p>
                    </div>
                    <div class="reviews-members-footer">
                      <a class="total-like btn btn-sm btn-outline-primary" href="#">
                        <i class="feather-thumbs-up"></i> 856M
                      </a>
                      <a class="total-like btn btn-sm btn-outline-primary" href="#">
                        <i class="feather-thumbs-down"></i> 158K
                      </a>
                      <span class="total-like-user-main ms-2" dir="rtl">
                        <a href="#"><img alt="#" src="../img/reviewer3.png" class="total-like-user rounded-pill" /></a>
                        <a href="#"><img alt="#" src="../img/reviewer4.png" class="total-like-user rounded-pill" /></a>
                        <a href="#"><img alt="#" src="../img/reviewer5.png" class="total-like-user rounded-pill" /></a>
                        <a href="#"><img alt="#" src="../img/reviewer6.png" class="total-like-user rounded-pill" /></a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <hr />
          <?php
            }
          } else {
            echo "No reviews found.";
          } ?>
          <a class="text-center w-100 d-block mt-3 fw-bold" href="#">See All Reviews</a>
        </div>

      </div>

      <div class="col-md-4 pt-3">
        <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
          <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
            <img alt="osahan" src="../img/starter1.jpg" class="me-3 rounded-circle img-fluid" />
            <div class="d-flex flex-column">
              <h6 class="mb-1 fw-bold">Munchies Extra</h6>
              <p class="mb-0 small text-muted">
                <i class="feather-map-pin"></i> Inside Ashesi University
              </p>
            </div>
          </div>
          <div class="bg-white border-bottom py-2">
            <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
              <div class="d-flex align-items-center">
                <div class="me-2 text-success">&middot;</div>
                <div class="media-body">
                  <p class="m-0">Fried rice</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <span class="count-number float-end"><button type="button"
                    class="btn-sm left dec btn btn-outline-secondary">
                    <i class="feather-minus"></i></button><input class="count-number-input" type="text" readonly
                    value="1" /><button type="button" class="btn-sm right inc btn btn-outline-secondary">
                    <i class="feather-plus"></i></button></span>
                <p class="text-gray mb-0 float-end ms-2 text-muted small">
                  GHS 12
                </p>
              </div>
            </div>
            <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
              <div class="d-flex align-items-center">
                <div class="me-2 text-success">&middot;</div>
                <div class="media-body">
                  <p class="m-0">Fried Chicken Thigh</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <span class="count-number float-end"><button type="button"
                    class="btn-sm left dec btn btn-outline-secondary">
                    <i class="feather-minus"></i></button><input class="count-number-input" type="text" readonly
                    value="1" /><button type="button" class="btn-sm right inc btn btn-outline-secondary">
                    <i class="feather-plus"></i></button></span>
                <p class="text-gray mb-0 float-end ms-2 text-muted small">
                  GHS 13
                </p>
              </div>
            </div>
            <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
              <div class="d-flex align-items-center">
                <div class="me-2 text-danger">&middot;</div>
                <div class="media-body">
                  <p class="m-0">Sausage Kebab</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <span class="count-number float-end"><button type="button"
                    class="btn-sm left dec btn btn-outline-secondary">
                    <i class="feather-minus"></i></button><input class="count-number-input" type="text" readonly
                    value="2" /><button type="button" class="btn-sm right inc btn btn-outline-secondary">
                    <i class="feather-plus"></i></button></span>
                <p class="text-gray mb-0 float-end ms-2 text-muted small">
                  GHS 20
                </p>
              </div>
            </div>
          </div>
          <div class="bg-white p-3 py-3 border-bottom clearfix">
            <div class="input-group">
              <span class="input-group-text" id="message"><i class="feather-message-square"></i></span>
              <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea"
                class="form-control"></textarea>
            </div>
          </div>
          <div class="bg-white p-3 clearfix border-bottom">
            <p class="mb-1">
              Item Total <span class="float-end text-dark">GHS 50</span>
            </p>
            <p class="mb-1">
              Restaurant Charges
              <span class="float-end text-dark">GHS 5</span>
            </p>
            <p class="mb-1">
              Delivery Fee<span class="text-info ms-1"><i class="feather-info"></i></span><span
                class="float-end text-dark">GHS 5</span>
            </p>
            <hr />
            <h6 class="fw-bold mb-0">
              TO PAY <span class="float-end">GHS 60</span>
            </h6>
          </div>
          <div class="p-3">
            <a class="btn btn-success w-100 btn-lg" href="successful.html">PAY GHS 60<i
                class="feather-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <special-footer></special-footer>

  <nav id="main-nav"></nav>


  <script  src="../vendor/jquery/jquery.min.js"></script>


  <script  src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script  src="../vendor/slick/slick/slick.min.js"></script>

  <script  src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script  src="../js/osahan.js"></script>

  <script src="../js/headerFooterManager.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const stars = document.querySelectorAll(".star-rating .feather-star");
      let rating = 0;

      stars.forEach((star, index) => {
        star.addEventListener("click", () => {
          // Set the rating to the star's value
          rating = index + 1;

          // Update the UI to show the selected rating
          stars.forEach((s, i) => {
            if (i < rating) {
              s.classList.add("text-warning");
            } else {
              s.classList.remove("text-warning");
            }
          });

          console.log("Rating selected:", rating);
          // You can now send the rating to the server or handle it as needed
        });
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const stars = document.querySelectorAll(".star-rating .feather-star");
      const ratingInput = document.getElementById("rating");

      stars.forEach((star, index) => {
        star.addEventListener("click", () => {
          const rating = index + 1;
          ratingInput.value = rating;

          stars.forEach((s, i) => {
            if (i < rating) {
              s.classList.add("text-warning");
            } else {
              s.classList.remove("text-warning");
            }
          });
        });
      });
    });
  </script>
</body>

</html>