<!-- Include Connection File -->
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
        <h2 class="fw-bold"><?php echo $cafeteriaDetails['cafeteriaName'] ?></h2>
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
            <p class="text-white-50 fw-bold m-0 small">Delivery</p>
            <p class="text-white m-0"><?php echo $cafeteriaDetails['openingTime'] ?></p>
          </div>
          <div class="col-6 col-md-2">
            <p class="text-white-50 fw-bold m-0 small">Open time</p>
            <p class="text-white m-0"><?php echo $cafeteriaDetails['openingTime'] ?></p>
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

  <div class="container position-relative">
    <div class="row">
      <div class="col-md-8 pt-3">
        <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
          <div class="d-flex item-aligns-center">
            <p class="fw-bold h6 p-3 border-bottom mb-0 w-100">Current Meals</p>
          </div>

          <!-- Current Meal List -->
          <div class="row m-0">
            <h6 class="p-3 m-0 bg-light w-100">
              Meals <small class="text-black-50" id="currentMealCount">ITEMS</small>
            </h6>
            <div class="col-md-12 px-0 border-top">
              <ul class="list-group" id="mealList"></ul>
            </div>
          </div>


        </div>

        <!-- Archived Meal List -->
        <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
          <div class="d-flex item-aligns-center">
            <p class="fw-bold h6 p-3 border-bottom mb-0 w-100">Archived Meals</p>
          </div>


          <div class="row m-0">
            <h6 class="p-3 m-0 bg-light w-100">
              Meals <small class="text-black-50" id="archivedMealCount">ITEMS</small>
            </h6>
            <div class="col-md-12 px-0 border-top">
              <ul class="list-group" id="archivedMealList"></ul>
            </div>
          </div>


        </div>

      </div>
      <div class="col-md-4 pt-3">
        <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
          <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
            <img alt="osahan" src="../img/starter1.jpg" class="me-3 rounded-circle img-fluid" />
            <div class="d-flex flex-column">
              <h6 class="mb-1 fw-bold"><?php echo $cafeteriaDetails['cafeteriaName'] ?></h6>
              <p class="mb-0 small text-muted">
                <i class="feather-map-pin"></i> Inside Ashesi University
              </p>
            </div>
          </div>
          <div class="bg-white border-bottom py-2">


            <div class="gold-members align-items-center justify-content-between px-3 py-2">

              <!-- Form -->
              <form id="addMealForm">
                <div class="form-group mb-3">
                  <label for="name">Meal Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-3">
                  <label for="mealType">Meal Type</label>
                  <select class="form-control" id="mealType" name="mealType" required>
                    <option value="">Select</option>
                    <option value="BREAKFAST">BREAKFAST</option>
                    <option value="LUNCH">LUNCH</option>
                    <option value="SUPPER">SUPPER</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="mealImage">Meal Image</label>
                  <input type="file" class="form-control" id="mealImage" name="mealImage" accept="image/*" required>
                </div>
                <div class="form-group mb-3">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group mb-3">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="col-md-12 px-0 border-top">
                  <div class="py-3" ty>
                    <button type="submit" class="btn btn-lg w-100 btn-primary">Add Meal</button>
                  </div>
                </div>
              </form>



            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
    <div class="row">
      <div class="col">
        <a href="home.html" class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
          Home
        </a>
      </div>
      <div class="col selected">
        <a href="trending.html" class="text-danger small fw-bold text-decoration-none">
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

  <!-- Footer -->
  <special-footer></special-footer>

  <nav id="main-nav"></nav>

  <!-- Edit Meal Modal -->
  <div class="modal fade" id="editMealModal" tabmeal.mealID="-1" aria-labelledby="editMealModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMealModalLabel">Edit Meal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editMealForm">
            <div class="form-group mb-3">
              <label for="editname">Meal Name</label>
              <input type="text" class="form-control" id="editname" name="editname" required>
            </div>
            <div class="form-group mb-3">
              <label for="editprice">Price</label>
              <input type="number" class="form-control" id="editprice" name="editprice" required>
            </div>
            <input type="hidden" id="editMealID">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script  src="../vendor/jquery/jquery.min.js"></script>

  <script  src="../vendor/slick/slick/slick.min.js"></script>

  <script  src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script  src="../js/osahan.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../js/headerFooterManager.js"></script>

  <script src="../js/cafeteria.js"></script>

</body>

</html>