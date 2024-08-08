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
          <a href="home.html" class="text-dark small fw-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-home"></i></p>
            Home
          </a>
        </div>
        <div class="col selected">
          <a href="trending.html" class="text-danger small fw-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-map-pin text-danger"></i></p>
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
  </div>

  <!-- Footer -->
  <special-footer></special-footer>

  <nav id="main-nav"> </nav>

  <div class="modal fade" id="filters" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Filters</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="osahan-filter">
            <div class="filter">
              <div class="p-3 bg-light border-bottom">
                <h6 class="m-0">SORT BY</h6>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="customRadios1" value="option1" checked />
                  <label class="form-check-label text-start w-100" for="customRadios1">
                    Top Rated
                  </label>
                </div>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="customRadios2" value="option2" />
                  <label class="form-check-label text-start w-100" for="customRadios2">
                    Nearest Me
                  </label>
                </div>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="customRadios3" value="option3" />
                  <label class="form-check-label text-start w-100" for="customRadios3">
                    Cost High to Low
                  </label>
                </div>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="customRadios4" value="option4" />
                  <label class="form-check-label text-start w-100" for="customRadios4">
                    Cost Low to High
                  </label>
                </div>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="customRadios5" value="option5" />
                  <label class="form-check-label text-start w-100" for="customRadios5">
                    Most Popular
                  </label>
                </div>
              </div>

              <div class="p-3 bg-light border-bottom">
                <h6 class="m-0">FILTER</h6>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="checkbox" value id="defaultCheck1" checked />
                  <label class="form-check-label text-start w-100" for="defaultCheck1">
                    Open Now
                  </label>
                </div>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="checkbox" value id="defaultCheck2" />
                  <label class="form-check-label text-start w-100" for="defaultCheck2">
                    Credit Cards
                  </label>
                </div>
              </div>
              <div class="border-bottom p-3">
                <div class="form-check form-check-reverse m-0">
                  <input class="form-check-input" type="checkbox" value id="defaultCheck3" />
                  <label class="form-check-label text-start w-100" for="defaultCheck3">
                    Alcohol Served
                  </label>
                </div>
              </div>

              <div class="p-3 bg-light border-bottom">
                <h6 class="m-0">ADDITIONAL FILTERS</h6>
              </div>
              <div class="px-3 pt-3">
                <input type="range" class="form-range" min="0" max="5" step="0.5" />
                <div class="row mb-3">
                  <div class="col-6">
                    <label>Min</label>
                    <input class="form-control" placeholder="$0" type="number" />
                  </div>
                  <div class="col-6 text-end">
                    <label>Max</label>
                    <input class="form-control" placeholder="$1,0000" type="number" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer p-0 border-0">
          <div class="col-6 m-0 p-0">
            <a href="#" class="btn border-top btn-lg w-100" data-bs-dismiss="modal">Close</a>
          </div>
          <div class="col-6 m-0 p-0">
            <a href="most_popular.html" class="btn btn-primary btn-lg w-100">Apply</a>
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

  <script src="../js/headerFooterManager.js"></script>
  <script src="../js/trending.js"></script>

</body>

</html>