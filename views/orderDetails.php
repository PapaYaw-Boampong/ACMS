
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
  <div class="d-none">
    <div class="bg-primary p-3 d-flex align-items-center">
      <a class="toggle togglew toggle-2" href="#"><span></span></a>
      <h4 class="fw-bold m-0 text-white">My Order</h4>
    </div>
  </div>
  <div class="py-4 osahan-main-body">
    <div class="container">

      <div class="col-md-12">
        <section class="bg-white osahan-main-body rounded shadow-sm overflow-hidden">
          
          <div class="container p-0">
            
            <div class="row">

              <div class="col-lg-12" id="orderDetailsContainer">

                <!-- <div class="osahan-status">
                  <div class="p-3 status-order bg-white border-bottom d-flex align-items-center space-between">
                    <p class="m-0">
                      <i class="feather-calendar text-primary"></i> 16 June,
                      11:30AM
                    </p>

                  </div>
                  <div class="p-3 border-bottom">
                    <h6 class="fw-bold">Order Status</h6>
            
                  </div>

                  <div class="p-3 border-bottom bg-white">
                    <h6 class="fw-bold">Destination</h6>
                    <p class="m-0 small">
                      554 West 142nd Street, New York, NY 10031
                    </p>
                  </div>
                  <div class="p-3 border-bottom">
                    <p class="fw-bold small mb-1">Courier</p>
                    <img alt="#" src="img/fav_web.png" class="img-fluid sc-osahan-logo me-2" />
                    <span class="small text-primary fw-bold">Grocery Courier
                    </span>
                  </div>

                  <div class="p-3 bg-white">
                    <div class="d-flex align-items-center mb-2">
                      <h6 class="fw-bold mb-1">Total Cost</h6>
                      <h6 class="fw-bold ms-auto mb-1">$8.52</h6>
                    </div>
                    <p class="m-0 small text-muted">
                      This looks Yummy <br /> Good Choice :)
                    </p>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
        </section>
        <br>
        <div class="">
              <a href="my_order.php" class="btn btn-primary px-3">Return To Orders</a>
            </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Footer -->
  <special-footer></special-footer>

  <nav id="main-nav">
    <ul class="second-nav">
      <li>
        <a href="home.html"><i class="feather-home me-2"></i> Homepage</a>
      </li>
      <li>
        <a href="my_order.html"><i class="feather-list me-2"></i> My Orders</a>
      </li>
      <li>
        <a href="#"><i class="feather-edit-2 me-2"></i> Authentication</a>
        <ul>
          <li><a href="login.html">Login</a></li>
          <li><a href="signup.html">Register</a></li>
          <li><a href="forgot_password.html">Forgot Password</a></li>
          <li><a href="verification.html">Verification</a></li>
          <li><a href="location.html">Location</a></li>
        </ul>
      </li>
      <li>
        <a href="favorites.html"><i class="feather-heart me-2"></i> Favorites</a>
      </li>
      <li>
        <a href="trending.html"><i class="feather-trending-up me-2"></i> Trending</a>
      </li>
      <li>
        <a href="most_popular.html"><i class="feather-award me-2"></i> Most Popular</a>
      </li>
      <li>
        <a href="restaurant.html"><i class="feather-paperclip me-2"></i> Restaurant Detail</a>
      </li>
      <li>
        <a href="checkout.html"><i class="feather-list me-2"></i> Checkout</a>
      </li>
      <li>
        <a href="successful.html"><i class="feather-check-circle me-2"></i> Successful</a>
      </li>
      <li>
        <a href="map.html"><i class="feather-map-pin me-2"></i> Live Map</a>
      </li>
      <li>
        <a href="#"><i class="feather-user me-2"></i> Profile</a>
        <ul>
          <li><a href="profile.html">Profile</a></li>
          <li><a href="favorites.html">Delivery support</a></li>
          <li><a href="contact-us.html">Contact Us</a></li>
          <li><a href="terms.html">Terms of use</a></li>
          <li><a href="privacy.html">Privacy & Policy</a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="feather-alert-triangle me-2"></i> Error</a>
        <ul>
          <li><a href="not-found.html">Not Found</a></li>
          <li><a href="maintence.html"> Maintence</a></li>
          <li><a href="coming-soon.html">Coming Soon</a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="feather-link me-2"></i> Navigation Link Example</a>
        <ul>
          <li>
            <a href="#">Link Example 1</a>
            <ul>
              <li>
                <a href="#">Link Example 1.1</a>
                <ul>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Link Example 1.2</a>
                <ul>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#">Link Example 2</a></li>
          <li><a href="#">Link Example 3</a></li>
          <li><a href="#">Link Example 4</a></li>
          <li data-nav-custom-content>
            <div class="custom-message">
              You can add any custom content to your navigation items. This
              text is just an example.
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="bottom-nav">
      <li class="email">
        <a class="text-danger" href="home.html">
          <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
          Home
        </a>
      </li>
      <li class="github">
        <a href="faq.html">
          <p class="h5 m-0"><i class="feather-message-circle"></i></p>
          FAQ
        </a>
      </li>
      <li class="ko-fi">
        <a href="contact-us.html">
          <p class="h5 m-0"><i class="feather-phone"></i></p>
          Help
        </a>
      </li>
    </ul>
  </nav>
  <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
    <div class="row">
      <div class="col selected">
        <a href="home.html" class="text-danger small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-home text-danger"></i></p>
          Home
        </a>
      </div>
      <div class="col">
        <a href="most_popular.html" class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-map-pin"></i></p>
          Trending
        </a>
      </div>
      <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
        <div class="bg-danger rounded-circle mt-n0 shadow">
          <a href="checkout.html" class="text-white small fw-bold text-decoration-none">
            <i class="feather-shopping-cart"></i>
          </a>
        </div>
      </div>
      <div class="col">
        <a href="favorites.html" class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-heart"></i></p>
          Favorites
        </a>
      </div>
      <div class="col">
        <a href="profile.html" class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-user"></i></p>
          Profile
        </a>
      </div>
    </div>
  </div>

  <script  src="../vendor/jquery/jquery.min.js"></script>
  <script  src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script  src="../vendor/slick/slick/slick.min.js"></script>

  <script  src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script  src="../js/osahan.js"></script>
  <script  src="../js/orderInfo.js"></script>
 
 
  <script src="../js/headerFooterManager.js"></script>
</body>

</html>