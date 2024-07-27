<?php
include  "../settings/core.php";
// include "../functions/displayCafeterias.php";
// $userID = userIdExist();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Askbootstrap" />
    <meta name="author" content="Askbootstrap" />
    <link rel="icon" type="image/png"  src="img/logo.png"/>
    <title>Ashesi Eats</title>

    <link
      href="../vendor/slick/slick/slick.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="../vendor/slick/slick/slick-theme.css"
      rel="stylesheet"
      type="text/css"
    />

    <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../css/style.css" rel="stylesheet" />

    <link href="../vendor/sidebar/demo.css" rel="stylesheet" />


    <script
      type="7cd9e49886f583b445a907f9-text/javascript"
      src="../vendor/jquery/jquery.min.js"
    ></script>
    <script
      type="7cd9e49886f583b445a907f9-text/javascript"
      src="../vendor/bootstrap/js/bootstrap.bundle.min.js"
    ></script>

  </head>
  <body class="fixed-bottom-bar">
    <special-header></special-header>
    <div class="osahan-home-page">
      <div class="bg-primary p-3 d-none">
        <div class="text-white">
          <div class="title d-flex align-items-center">
            <a class="toggle" href="#">
              <span></span>
            </a>
            <h4 class="fw-bold m-0 ps-5">Browse</h4>
            <a
              class="text-white fw-bold ms-auto"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
              href="#"
              >Filter</a
            >
          </div>
        </div>
        <div class="input-group bg-white rounded shadow-sm mt-3">
          <span class="input-group-text bg-transparent border-0 rounded-0"
            ><i class="feather-search"></i
          ></span>
          <input
            type="text"
            class="form-control bg-transparent border-0 rounded-0 px-0 shadow-none"
            placeholder="Enter Your Location"
            aria-label="Enter Your Location"
          />
        </div>
      </div>

      <!-- Our Cafeterias -->

      <div class="bg-white">
        <div class="container">
          <div class="py-3 title d-flex align-items-center">
            <h5 class="m-0">Cafeterias</h5>
            
          </div>
          <div class="offer-slider">
            <div class="cat-item px-1 py-3">
              <a class="d-block text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/pro1.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="cat-item px-1 py-3">
              <a class="d-block text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/pro2.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="cat-item px-1 py-3">
              <a class="d-block text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/pro3.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="cat-item px-1 py-3">
              <a class="d-block text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/pro4.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="cat-item px-1 py-3">
              <a class="d-block text-center shadow-sm" href="trending.html">
                <img alt="#" src="img/pro2.jpg" class="img-fluid rounded" />
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="pt-4 pb-2 title d-flex align-items-center">
          <h5 class="m-0">Trending this week</h5>
          <a class="fw-bold ms-auto" href="trending.html"
            >View all <i class="feather-chevrons-right"></i
          ></a>
        </div>

        <div class="trending-slider">

          <!-- <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>d-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                <div
                  class="favourite-heart text-danger position-absolute rounde
                    alt="#"
                    src="img/trending1.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div> -->
              <?php 
              include_once "../functions/displayCafeterias.php";
              ?>
              <!-- <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >Famous Dave's Bar-B-Que
                    </a>
                  </h6>
                  <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm py-1 px-2"
                      ><i class="feather-clock"></i> 15–30 min</span
                    >
                    <span class="float-end text-black-50"> $350 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-danger">OFFER</span>
                  <small> Use Coupon OSAHAN50</small>
                </div>
              </div> -->
            <!-- </div>
          </div> -->
          <!-- <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>
                <div
                  class="favourite-heart text-danger position-absolute rounded-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                    alt="#"
                    src="img/trending2.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div> -->
              <!-- <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >Thai Famous Cuisine</a
                    >
                  </h6>
                  <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm py-1 px-2"
                      ><i class="feather-clock"></i> 30–35 min</span
                    >
                    <span class="float-end text-black-50"> $250 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
          <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>
                <div
                  class="favourite-heart text-danger position-absolute rounded-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                    alt="#"
                    src="img/trending3.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm py-1 px-2"
                      ><i class="feather-clock"></i> 15–25 min</span
                    >
                    <span class="float-end text-black-50"> $500 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>
                <div
                  class="favourite-heart text-danger position-absolute rounded-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                    alt="#"
                    src="img/trending2.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >Thai Famous Cuisine</a
                    >
                  </h6>
                  <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm py-1 px-2"
                      ><i class="feather-clock"></i> 30–35 min</span
                    >
                    <span class="float-end text-black-50"> $250 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div> -->
          
        <!-- </div> -->

        <div class="py-3 title d-flex align-items-center">
          <h5 class="m-0">Most popular</h5>
          <a class="fw-bold ms-auto" href="most_popular.html"
            >26 places <i class="feather-chevrons-right"></i
          ></a>
        </div>

        <div class="trending-slider">

          <div class="osahan-slider-item">
              <div
                class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
              >
                <div class="list-card-image">
                  <div class="star position-absolute">
                    <span class="badge text-bg-success"
                      ><i class="feather-star"></i> 3.1 (300+)</span
                    >
                  </div>
                  <div
                    class="favourite-heart text-danger position-absolute rounded-circle"
                  >
                    <a href="#"><i class="feather-heart"></i></a>
                  </div>
                  <div class="member-plan position-absolute">
                    <span class="badge text-bg-dark">Promoted</span>
                  </div>
                  <a href="restaurant.html">
                    <img
                      alt="#"
                      src="img/popular1.png"
                      class="img-fluid item-img w-100"
                    />
                  </a>
                </div>
                <div class="p-3 position-relative">
                  <div class="list-card-body">
                    <h6 class="mb-1">
                      <a href="restaurant.html" class="text-black"
                        >The osahan Restaurant
                      </a>
                    </h6>
                    <p class="text-gray mb-1 small">• North • Hamburgers</p>
                    <p class="text-gray mb-1 rating"></p>
                    <ul class="rating-stars list-unstyled">
                      <li>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star"></i>
                      </li>
                    </ul>
                    <p></p>
                  </div>
                  <div class="list-card-badge">
                    <span class="badge text-bg-danger">OFFER</span>
                    <small>65% OSAHAN50</small>
                  </div>
                </div>
            </div>
          </div>
          <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>
                <div
                  class="favourite-heart text-danger position-absolute rounded-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                    alt="#"
                    src="img/popular2.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >Thai Famous Indian Cuisine</a
                    >
                  </h6>
                  <p class="text-gray mb-1 small">• Indian • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
          <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>
                <div
                  class="favourite-heart text-danger position-absolute rounded-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                    alt="#"
                    src="img/popular3.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-1 small">• Hamburgers • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="osahan-slider-item">
            <div
              class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
            >
              <div class="list-card-image">
                <div class="star position-absolute">
                  <span class="badge text-bg-success"
                    ><i class="feather-star"></i> 3.1 (300+)</span
                  >
                </div>
                <div
                  class="favourite-heart text-danger position-absolute rounded-circle"
                >
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                  <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                  <img
                    alt="#"
                    src="img/popular8.png"
                    class="img-fluid item-img w-100"
                  />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="restaurant.html" class="text-black"
                      >Bite Me Now Sandwiches</a
                    >
                  </h6>
                  <p class="text-gray mb-1 small">American • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge text-bg-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

    <div
      class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none"
    >
      <div class="row">
        <div class="col selected">
          <a
            href="home.html"
            class="text-danger small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-home text-danger"></i></p>
            Home
          </a>
        </div>
        <div class="col">
          <a
            href="most_popular.html"
            class="text-dark small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-map-pin"></i></p>
            Trending
          </a>
        </div>
        <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
          <div class="bg-danger rounded-circle mt-n0 shadow">
            <a
              href="checkout.html"
              class="text-white small fw-bold text-decoration-none"
            >
              <i class="feather-shopping-cart"></i>
            </a>
          </div>
        </div>
        <div class="col">
          <a
            href="favorites.html"
            class="text-dark small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-heart"></i></p>
            Favorites
          </a>
        </div>
        <div class="col">
          <a
            href="profile.html"
            class="text-dark small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-user"></i></p>
            Profile
          </a>
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
          <a href="my_order.html"
            ><i class="feather-list me-2"></i> My Orders</a
          >
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
          <a href="favorites.html"
            ><i class="feather-heart me-2"></i> Favorites</a
          >
        </li>
        <li>
          <a href="trending.html"
            ><i class="feather-trending-up me-2"></i> Trending</a
          >
        </li>
        <li>
          <a href="most_popular.html"
            ><i class="feather-award me-2"></i> Most Popular</a
          >
        </li>
        <li>
          <a href="restaurant.html"
            ><i class="feather-paperclip me-2"></i> Restaurant Detail</a
          >
        </li>
        <li>
          <a href="checkout.html"><i class="feather-list me-2"></i> Checkout</a>
        </li>
        <li>
          <a href="successful.html"
            ><i class="feather-check-circle me-2"></i> Successful</a
          >
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
          <a href="#"
            ><i class="feather-link me-2"></i> Navigation Link Example</a
          >
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
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Filter</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body p-0">
            <div class="osahan-filter">
              <div class="filter">
                <div class="p-3 bg-light border-bottom">
                  <h6 class="m-0">SORT BY</h6>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="customRadios1"
                      value="option1"
                      checked
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="customRadios1"
                    >
                      Top Rated
                    </label>
                  </div>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="customRadios2"
                      value="option2"
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="customRadios2"
                    >
                      Nearest Me
                    </label>
                  </div>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="customRadios3"
                      value="option3"
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="customRadios3"
                    >
                      Cost High to Low
                    </label>
                  </div>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="customRadios4"
                      value="option4"
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="customRadios4"
                    >
                      Cost Low to High
                    </label>
                  </div>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="customRadios5"
                      value="option5"
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="customRadios5"
                    >
                      Most Popular
                    </label>
                  </div>
                </div>

                <div class="p-3 bg-light border-bottom">
                  <h6 class="m-0">FILTER</h6>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value
                      id="defaultCheck1"
                      checked
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="defaultCheck1"
                    >
                      Open Now
                    </label>
                  </div>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value
                      id="defaultCheck2"
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="defaultCheck2"
                    >
                      Credit Cards
                    </label>
                  </div>
                </div>
                <div class="border-bottom p-3">
                  <div class="form-check form-check-reverse m-0">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value
                      id="defaultCheck3"
                    />
                    <label
                      class="form-check-label text-start w-100"
                      for="defaultCheck3"
                    >
                      Alcohol Served
                    </label>
                  </div>
                </div>

                <div class="p-3 bg-light border-bottom">
                  <h6 class="m-0">ADDITIONAL FILTERS</h6>
                </div>
                <div class="px-3 pt-3">
                  <input
                    type="range"
                    class="form-range"
                    min="0"
                    max="5"
                    step="0.5"
                  />
                  <div class="row mb-3">
                    <div class="col-6">
                      <label>Min</label>
                      <input
                        class="form-control"
                        placeholder="$0"
                        type="number"
                      />
                    </div>
                    <div class="col-6 text-end">
                      <label>Max</label>
                      <input
                        class="form-control"
                        placeholder="$1,0000"
                        type="number"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer p-0 border-0">
            <div class="col-6 m-0 p-0">
              <button
                type="button"
                class="btn border-top btn-lg w-100"
                data-bs-dismiss="modal"
              >
                Close
              </button>
            </div>
            <div class="col-6 m-0 p-0">
              <button type="button" class="btn btn-primary btn-lg w-100">
                Apply
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    
    <script
      type="7cd9e49886f583b445a907f9-text/javascript"
      src="vendor/slick/slick/slick.min.js"
    ></script>

    <script
      type="7cd9e49886f583b445a907f9-text/javascript"
      src="vendor/sidebar/hc-offcanvas-nav.js"
    ></script>

    <script
      type="7cd9e49886f583b445a907f9-text/javascript"
      src="./js/osahan.js"
    ></script>

    <script
      src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="7cd9e49886f583b445a907f9-|49"
      defer
    ></script>

    <script src="js/headerFooterManager.js"></script>
  </body>
</html>
