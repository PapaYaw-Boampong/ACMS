<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';
include_once '../actions/FeedBackService/get/getReview.php';
include_once '../actions/CafeteriaManagementService/get/getResturantDetails.php';
include_once '../actions/FeedBackService/get/getNumberCafReviews.php';
// session_start();
$result = getRecentReviews($conn);
$resultsDetails = getAllCafeteriaDetails($conn);
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
      <h4 class="fw-bold m-0 text-white">Cafeteria Menu</h4>
    </div>
  </div>
  <div class="offer-section py-4">
    <div class="container position-relative">
      <img alt="#" src="../img/trending1.png" class="restaurant-pic" />
      <div class="pt-3 text-white">
        <h2 class="fw-bold"><?php echo $resultsDetails['cafeteriaName']?></h2>
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
          <p class="label-rating text-white ms-2 small"><?php echo getReviewCount($conn)?> Reviews</p>
        </div>
      </div>
      <div class="pb-4">
        <div class="row">
          <div class="col-6 col-md-2">
            <p class="text-white-50 fw-bold m-0 small">Delivery</p>
            <p class="text-white m-0">GHS 5</p>
          </div>
          <div class="col-6 col-md-2">
            <p class="text-white-50 fw-bold m-0 small">Open time</p>
            <p class="text-white m-0"><?php echo $resultsDetails['openingTime']?></p>
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
              Quick Bites <small class="text-black-50">3 ITEMS</small>
            </h6>
            <div class="col-md-12 px-0 border-top">
              <div class>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-danger non_veg">.</div>
                  <div>
                    <h6 class="mb-1">Chicken Tikka Sub</h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-danger non_veg">.</div>
                  <div>
                    <h6 class="mb-1">
                      Cheese corn Roll
                      <span class="badge text-bg-danger text-white">BEST SELLER</span>
                    </h6>
                    <p class="text-muted mb-0">$600</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-danger non_veg">.</div>
                  <div>
                    <h6 class="mb-1">
                      Chicken Tikka Sub
                      <span class="badge text-bg-danger text-white">Non veg</span>
                    </h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row m-0">
            <h6 class="p-3 m-0 bg-light w-100">
              Starters <small class="text-black-50">3 ITEMS</small>
            </h6>
            <div class="col-md-12 px-0 border-top">
              <div class>
                <div class="d-flex align-items-center gap-2 p-3 border-bottom menu-list">
                  <img alt="#" src="../img/starter1.jpg" class="rounded-pill" />
                  <div>
                    <h6 class="mb-1">Chicken Tikka Sub</h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex align-items-center gap-2 p-3 border-bottom menu-list">
                  <img alt="#" src="../img/starter2.jpg" class="rounded-pill" />
                  <div>
                    <h6 class="mb-1">
                      Cheese corn Roll
                      <span class="badge text-bg-danger">BEST SELLER</span>
                    </h6>
                    <p class="text-muted mb-0">$600</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex align-items-center gap-2 p-3 border-bottom menu-list">
                  <img alt="#" src="../img/starter3.jpg" class="rounded-pill" />
                  <div>
                    <h6 class="mb-1">
                      Chicken Tikka Sub
                      <span class="badge text-bg-success">Pure Veg</span>
                    </h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row m-0">
            <h6 class="p-3 m-0 bg-light w-100">
              Soups <small class="text-black-50">8 ITEMS</small>
            </h6>
            <div class="col-md-12 px-0 border-top">
              <div class="bg-white">
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-danger non_veg">.</div>
                  <div>
                    <h6 class="mb-1">Chicken Tikka Sub</h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-danger non_veg">.</div>
                  <div>
                    <h6 class="mb-1">
                      Cheese corn Roll
                      <span class="badge text-bg-danger">BEST SELLER</span>
                    </h6>
                    <p class="text-muted mb-0">$600</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-success veg">.</div>
                  <div>
                    <h6 class="mb-1">
                      Chicken Tikka Sub
                      <span class="badge text-bg-success">Pure Veg</span>
                    </h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-success veg">.</div>
                  <div>
                    <h6 class="mb-1">Chicken Tikka Sub</h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-danger non_veg">.</div>
                  <div>
                    <h6 class="mb-1">
                      Cheese corn Roll
                      <span class="badge text-bg-danger">BEST SELLER</span>
                    </h6>
                    <p class="text-muted mb-0">$600</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
                <div class="d-flex gap-2 p-3 border-bottom gold-members">
                  <div class="fw-bold text-success veg">.</div>
                  <div>
                    <h6 class="mb-1">
                      Chicken Tikka Sub
                      <span class="badge text-bg-success">Pure Veg</span>
                    </h6>
                    <p class="text-muted mb-0">$250</p>
                  </div>
                  <span class="ms-auto"><a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#extras">ADD</a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <div id="ratings-and-reviews"
            class="bg-white shadow-sm d-flex align-items-center rounded p-3 mb-3 clearfix restaurant-detailed-star-rating">
            <h6 class="mb-0">Rate this Place</h6>
            <div class="star-rating ms-auto">
              <div class="d-inline-block h6 m-0">
                <i class="feather-star text-warning"></i>
                <i class="feather-star text-warning"></i>
                <i class="feather-star text-warning"></i>
                <i class="feather-star text-warning"></i>
                <i class="feather-star"></i>
              </div>
              <b class="text-black ms-2">334</b>
            </div>
          </div>
          <div class="bg-white rounded p-3 mb-3 clearfix graph-star-rating rounded shadow-sm">
            <h6 class="mb-0 mb-1">Ratings and Reviews</h6>
            <p class="text-muted mb-4 mt-1 small">Rated 3.5 out of 5</p>
            <div class="graph-star-rating-body">
              <div class="rating-list">
                <div class="rating-list-left fw-bold small">5 Star</div>
                <div class="rating-list-center">
                  <div class="progress">
                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="56" aria-valuemin="0"
                      aria-valuemax="100" style="width: 56%"></div>
                  </div>
                </div>
                <div class="rating-list-right fw-bold small">56 %</div>
              </div>
              <div class="rating-list">
                <div class="rating-list-left fw-bold small">4 Star</div>
                <div class="rating-list-center">
                  <div class="progress">
                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="23" aria-valuemin="0"
                      aria-valuemax="100" style="width: 23%"></div>
                  </div>
                </div>
                <div class="rating-list-right fw-bold small">23 %</div>
              </div>
              <div class="rating-list">
                <div class="rating-list-left fw-bold small">3 Star</div>
                <div class="rating-list-center">
                  <div class="progress">
                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="11" aria-valuemin="0"
                      aria-valuemax="100" style="width: 11%"></div>
                  </div>
                </div>
                <div class="rating-list-right fw-bold small">11 %</div>
              </div>
              <div class="rating-list">
                <div class="rating-list-left fw-bold small">2 Star</div>
                <div class="rating-list-center">
                  <div class="progress">
                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="6" aria-valuemin="0"
                      aria-valuemax="100" style="width: 6%"></div>
                  </div>
                </div>
                <div class="rating-list-right fw-bold small">6 %</div>
              </div>
              <div class="rating-list">
                <div class="rating-list-left fw-bold small">1 Star</div>
                <div class="rating-list-center">
                  <div class="progress">
                    <div role="progressbar" class="progress-bar bg-info" aria-valuenow="4" aria-valuemin="0"
                      aria-valuemax="100" style="width: 4%"></div>
                  </div>
                </div>
                <div class="rating-list-right fw-bold small">4 %</div>
              </div>
            </div>
            <div class="graph-star-rating-footer text-center mt-3">
              <button type="button" class="btn btn-primary w-100 btn-sm">
                Rate and Review
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
                    <a href="#"><img alt="#" src="../img/reviewer<?php echo $row["user_id"]; ?>.png"
                        class="rounded-pill" /></a>
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
            <!-- <h6 class="mb-1">All Ratings and Reviews</h6>
              <div class="reviews-members py-3">
                <div class="d-flex align-items-start gap-3">
                  <a href="#"
                    ><img alt="#" src="../img/reviewer1.png" class="rounded-pill"
                  /></a>
                  <div>
                    <div class="reviews-members-header">
                      <div class="star-rating float-end">
                        <div class="d-inline-block" style="font-size: 14px">
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star"></i>
                        </div>
                      </div>
                      <h6 class="mb-0">
                        <a class="text-dark" href="#">Trump</a>
                      </h6>
                      <p class="text-muted small">Tue, 20 Mar 2023</p>
                    </div>
                    <div class="reviews-members-body">
                      <p>
                        Contrary to popular belief, Lorem Ipsum is not simply
                        random text. It has roots in a piece of classNameical
                        Latin literature from 45 BC, making it over 2000 years
                        old.
                      </p>
                    </div>
                    <div class="reviews-members-footer">
                      <a
                        class="total-like btn btn-sm btn-outline-primary"
                        href="#"
                        ><i class="feather-thumbs-up"></i> 856M</a
                      >
                      <a
                        class="total-like btn btn-sm btn-outline-primary"
                        href="#"
                        ><i class="feather-thumbs-down"></i> 158K</a
                      >
                      <span class="total-like-user-main ms-2" dir="rtl">
                        <a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer3.png"
                            class="total-like-user rounded-pill"
                        /></a>
                        <a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer4.png"
                            class="total-like-user rounded-pill"
                        /></a>
                        <a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer5.png"
                            class="total-like-user rounded-pill"
                        /></a>
                        <a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer6.png"
                            class="total-like-user rounded-pill"
                        /></a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <hr />
              <div class="reviews-members py-3">
                <div class="d-flex align-items-start gap-3">
                  <a href="#"
                    ><img alt="#" src="../img/reviewer2.png" class="rounded-pill"
                  /></a>
                  <div>
                    <div class="reviews-members-header">
                      <div class="star-rating float-end">
                        <div class="d-inline-block" style="font-size: 14px">
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star text-warning"></i>
                          <i class="feather-star"></i>
                        </div>
                      </div>
                      <h6 class="mb-0">
                        <a class="text-dark" href="#">Jhon Smith</a>
                      </h6>
                      <p class="text-muted small">Tue, 20 Mar 2023</p>
                    </div>
                    <div class="reviews-members-body">
                      <p>
                        It is a long established fact that a reader will be
                        distracted by the readable content of a page when
                        looking at its layout.
                      </p>
                    </div>
                    <div class="reviews-members-footer">
                      <a
                        class="total-like btn btn-sm btn-outline-primary"
                        href="#"
                        ><i class="feather-thumbs-up"></i> 88K</a
                      >
                      <a
                        class="total-like btn btn-sm btn-outline-primary"
                        href="#"
                        ><i class="feather-thumbs-down"></i> 1K</a
                      ><span class="total-like-user-main ms-2" dir="rtl"
                        ><a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer3.png"
                            class="total-like-user rounded-pill" /></a
                        ><a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer4.png"
                            class="total-like-user rounded-pill" /></a
                        ><a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer5.png"
                            class="total-like-user rounded-pill" /></a
                        ><a href="#"
                          ><img
                            alt="#"
                            src="../img/reviewer6.png"
                            class="total-like-user rounded-pill" /></a
                      ></span>
                    </div>
                  </div>
                </div>
              </div>
              <hr /> -->
            <a class="text-center w-100 d-block mt-3 fw-bold" href="#">See All Reviews</a>
          </div>
          <div class="bg-white p-3 rating-review-select-page rounded shadow-sm">
            <h6 class="mb-3">Leave Comment</h6>
            <div class="d-flex align-items-center mb-3">
              <p class="m-0 small">Rate the Place</p>
              <div class="star-rating ms-auto">
                <div class="d-inline-block">
                  <i class="feather-star text-warning"></i>
                  <i class="feather-star text-warning"></i>
                  <i class="feather-star text-warning"></i>
                  <i class="feather-star text-warning"></i>
                  <i class="feather-star"></i>
                </div>
              </div>
            </div>
            <form name = "cafeteriaFeedback">
              <div class="form-group mb-3">
                <label class="form-label small">Your Comment</label><textarea class="form-control"></textarea>
              </div>
              <div class="form-group mb-0">
                <button type="button" class="btn btn-primary w-100">
                  Submit Comment
                </button>
              </div>
            </form>
          </div>
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

  <div class="modal fade" id="extras" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Extras</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="recepie-body">
              <div class="form-check custom-radio border-bottom py-2">
                <input type="radio" id="customRadio1f" name="location" class="form-check-input" checked />
                <label class="form-check-label" for="customRadio1f">Tuna <span class="text-muted">+$35.00</span></label>
              </div>
              <div class="form-check custom-radio border-bottom py-2">
                <input type="radio" id="customRadio2f" name="location" class="form-check-input" />
                <label class="form-check-label" for="customRadio2f">Salmon <span
                    class="text-muted">+$20.00</span></label>
              </div>
              <div class="form-check custom-radio border-bottom py-2">
                <input type="radio" id="customRadio3f" name="location" class="form-check-input" />
                <label class="form-check-label" for="customRadio3f">Wasabi <span
                    class="text-muted">+$25.00</span></label>
              </div>
              <div class="form-check custom-radio border-bottom py-2">
                <input type="radio" id="customRadio4f" name="location" class="form-check-input" />
                <label class="form-check-label" for="customRadio4f">Unagi <span
                    class="text-muted">+$10.00</span></label>
              </div>
              <div class="form-check custom-radio border-bottom py-2">
                <input type="radio" id="customRadio5f" name="location" class="form-check-input" />
                <label class="form-check-label" for="customRadio5f">Vegetables <span
                    class="text-muted">+$5.00</span></label>
              </div>
              <div class="form-check custom-radio border-bottom py-2">
                <input type="radio" id="customRadio6f" name="location" class="form-check-input" />
                <label class="form-check-label" for="customRadio6f">Noodles <span
                    class="text-muted">+$30.00</span></label>
              </div>
              <h6 class="fw-bold mt-4">QUANTITY</h6>
              <div class="d-flex align-items-center">
                <p class="m-0">1 Item</p>
                <div class="ms-auto">
                  <span class="count-number"><button type="button" class="btn-sm left dec btn btn-outline-secondary">
                      <i class="feather-minus"></i></button><input class="count-number-input" type="text" readonly
                      value="1" /><button type="button" class="btn-sm right inc btn btn-outline-secondary">
                      <i class="feather-plus"></i></button></span>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer p-0 border-0">
          <div class="col-6 m-0 p-0">
            <button type="button" class="btn border-top btn-lg w-100" data-bs-dismiss="modal">
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


  <script type="7e678b0dbcbf2a926c40af51-text/javascript" src="../vendor/jquery/jquery.min.js"></script>


  <script type="7e678b0dbcbf2a926c40af51-text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="7e678b0dbcbf2a926c40af51-text/javascript" src="../vendor/slick/slick/slick.min.js"></script>

  <script type="7e678b0dbcbf2a926c40af51-text/javascript" src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script type="7e678b0dbcbf2a926c40af51-text/javascript" src="../js/osahan.js"></script>
  <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="7e678b0dbcbf2a926c40af51-|49" defer></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"8a5eb09f3977639d","version":"2024.7.0","r":1,"serverTiming":{"name":{"cfL4":true}},"token":"dd471ab1978346bbb991feaa79e6ce5c","b":1}'
    crossorigin="anonymous"></script>
  <script src="../js/headerFooterManager.js"></script>
</body>

</html>