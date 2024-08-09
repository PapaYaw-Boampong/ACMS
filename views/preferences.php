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
  <meta name="description" content="Ashesi Eats" />
  <link rel="icon" type="image/png" href="../img/fav.png" />
  <title>Ashesi Eats</title>
  <link href="../vendor/slick/slick/slick.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/slick/slick-theme.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet" />
  <link href="../vendor/sidebar/demo.css" rel="stylesheet" />
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Load preferences
      $.ajax({
        url: 'load_preferences.php',
        type: 'GET',
        success: function(response) {
          const preferences = JSON.parse(response);
          // Set dietary restrictions
          preferences.dietaryRestrictions.split(',').forEach(function(item) {
            $(`input[name="dietaryRestrictions"][value="${item}"]`).prop('checked', true);
          });
          // Set diet
          preferences.diet.split(',').forEach(function(item) {
            $(`input[name="diet"][value="${item}"]`).prop('checked', true);
          });
          // Set cultural restrictions
          preferences.culturalRestrictions.split(',').forEach(function(item) {
            $(`input[name="culturalRestrictions"][value="${item}"]`).prop('checked', true);
          });
        }
      });

      // Save preferences
      $('#preferenceForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: 'save_preferences.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            alert('Preferences updated successfully');
          },
          error: function() {
            alert('Failed to update preferences');
          }
        });
      });
    });
  </script>
</head>

<body class="fixed-bottom-bar">
  <special-header></special-header>
  <div class="osahan-profile">
    <div class="container position-relative">
      <div class="py-5 osahan-profile row">
        <div class="container col-md-8 mb-3">
          <div class="rounded shadow-sm">
            <div class="osahan-cart-item-profile bg-white rounded shadow-sm p-4">
              <div class="flex-column">
                <h5 class="mb-4">My preferences</h5>
                <form id="preferenceForm">
                  <div class="form-group mb-3">
                    <label class="pb-1">Dietary restrictions or food allergies:</label>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="dietaryRestrictions" value="gluten-free" id="glutenFree">
                      <label class="form-check-label" for="glutenFree">Gluten-free</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="dietaryRestrictions" value="dairy-free" id="dairyFree">
                      <label class="form-check-label" for="dairyFree">Dairy-free</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="dietaryRestrictions" value="nut-allergy" id="nutAllergy">
                      <label class="form-check-label" for="nutAllergy">Nut allergy</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="dietaryRestrictions" value="shellfish-allergy" id="shellfishAllergy">
                      <label class="form-check-label" for="shellfishAllergy">Shellfish allergy</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="dietaryRestrictions" value="soy-allergy" id="soyAllergy">
                      <label class="form-check-label" for="soyAllergy">Soy allergy</label>
                    </div>
                    <div class="form-group mt-2 ps-4">
                      <input type="text" class="form-control" name="dietaryRestrictionsOther" placeholder="Other (please specify)">
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <label class="pb-1">Specific diet:</label>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="diet" value="vegetarian" id="vegetarian">
                      <label class="form-check-label" for="vegetarian">Vegetarian</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="diet" value="vegan" id="vegan">
                      <label class="form-check-label" for="vegan">Vegan</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="diet" value="keto" id="keto">
                      <label class="form-check-label" for="keto">Keto</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="diet" value="paleo" id="paleo">
                      <label class="form-check-label" for="paleo">Paleo</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="diet" value="pescatarian" id="pescatarian">
                      <label class="form-check-label" for="pescatarian">Pescatarian</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="diet" value="none" id="none">
                      <label class="form-check-label" for="none">None</label>
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <label class="pb-1">Religious or cultural dietary restrictions:</label>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="culturalRestrictions" value="halal" id="halal">
                      <label class="form-check-label" for="halal">Halal</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="culturalRestrictions" value="kosher" id="kosher">
                      <label class="form-check-label" for="kosher">Kosher</label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="checkbox" name="culturalRestrictions" value="hindu-dietary-laws" id="hinduDietaryLaws">
                      <label class="form-check-label" for="hinduDietaryLaws">Hindu dietary laws</label>
                    </div>
                    <div class="form-group mt-2 ps-4">
                      <input type="text" class="form-control" name="culturalRestrictionsOther" placeholder="Other (please specify)">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div
    class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
    <div class="row">
      <div class="col">
        <a
          href="home.html"
          class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
          Home
        </a>
      </div>
      <div class="col">
        <a
          href="most_popular.html"
          class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-map-pin"></i></p>
          Trending
        </a>
      </div>
      <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
        <div class="bg-danger rounded-circle mt-n0 shadow">
          <a
            href="checkout.html"
            class="text-white small fw-bold text-decoration-none">
            <i class="feather-shopping-cart"></i>
          </a>
        </div>
      </div>
      <div class="col">
        <a
          href="favorites.html"
          class="text-dark small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-heart"></i></p>
          Favorites
        </a>
      </div>
      <div class="col selected">
        <a
          href="profile.html"
          class="text-danger small fw-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-user"></i></p>
          Profile
        </a>
      </div>
    </div>
  </div>
  </div>

  <!-- Footer -->
  <special-footer></special-footer>

  <nav id="main-nav">

  </nav>
  <div
    class="modal fade"
    id="paycard"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Credit/Debit Card</h5>
          <button
            type="button"
            class="btn-close shadow-none"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6 class="m-0">Add new card</h6>
          <p class="small">
            WE ACCEPT
            <span class="osahan-card ms-2 fw-bold">( Master Card / Visa Card / Rupay )</span>
          </p>
          <form>
            <div class="form-row">
              <div class="col-md-12 form-group mb-3">
                <label class="form-label fw-bold small">Card number</label>
                <div class="input-group">
                  <input
                    placeholder="Card number"
                    type="number"
                    class="form-control" />
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="feather-credit-card"></i>
                  </button>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-8 form-group">
                  <label class="form-label fw-bold small">Valid through(MM/YY)</label><input
                    placeholder="Enter Valid through(MM/YY)"
                    type="number"
                    class="form-control" />
                </div>
                <div class="col-md-4 form-group">
                  <label class="form-label fw-bold small">CVV</label><input
                    placeholder="Enter CVV Number"
                    type="number"
                    class="form-control" />
                </div>
              </div>
              <div class="col-md-12 form-group mb-3">
                <label class="form-label fw-bold small">Name on card</label><input
                  placeholder="Enter Card number"
                  type="text"
                  class="form-control" />
              </div>
              <div class="col-md-12 form-group mb-0">
                <div class="form-check custom-checkbox">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value
                    id="custom-Check1" />
                  <label class="form-check-label small" for="custom-Check1">
                    Securely save this card for a faster checkout next time.
                  </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer p-0 border-0">
          <div class="col-6 m-0 p-0">
            <button
              type="button"
              class="btn border-top btn-lg w-100"
              data-bs-dismiss="modal">
              Close
            </button>
          </div>
          <div class="col-6 m-0 p-0">
            <button type="button" class="btn btn-primary btn-lg w-100">
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Delivery Address</h5>
          <button
            type="button"
            class="btn-close shadow-none"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class>
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label class="form-label">Delivery Area</label>
                <div class="input-group mb-3">
                  <input
                    placeholder="Delivery Area"
                    type="text"
                    class="form-control" />
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="feather-map-pin"></i>
                  </button>
                </div>
              </div>
              <div class="col-md-12 form-group mb-3">
                <label class="form-label">Complete Address</label><input
                  placeholder="Complete Address e.g. house number, street name, landmark"
                  type="text"
                  class="form-control" />
              </div>
              <div class="col-md-12 form-group mb-3">
                <label class="form-label">Delivery Instructions</label><input
                  placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall"
                  type="text"
                  class="form-control" />
              </div>
              <div class="mb-0 col-md-12 form-group">
                <label class="form-label">Nickname</label>
                <div
                  class="btn-group w-100"
                  role="group"
                  aria-label="Basic radio toggle button group">
                  <input
                    type="radio"
                    class="btn-check"
                    name="btnradio"
                    id="btnradio4"
                    checked />
                  <label class="btn btn-outline-secondary" for="btnradio4">Home</label>
                  <input
                    type="radio"
                    class="btn-check"
                    name="btnradio"
                    id="btnradio5" />
                  <label class="btn btn-outline-secondary" for="btnradio5">Work</label>
                  <input
                    type="radio"
                    class="btn-check"
                    name="btnradio"
                    id="btnradio6" />
                  <label class="btn btn-outline-secondary" for="btnradio6">Other</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer p-0 border-0">
          <div class="col-6 m-0 p-0">
            <button
              type="button"
              class="btn border-top btn-lg w-100"
              data-bs-dismiss="modal">
              Close
            </button>
          </div>
          <div class="col-6 m-0 p-0">
            <button type="button" class="btn btn-primary btn-lg w-100">
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="inviteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold text-dark">Invite</h5>
          <button
            type="button"
            class="btn-close shadow-none"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body py-0">
          <button class="btn btn-light text-primary btn-sm">
            <i class="feather-plus"></i>
          </button>
          <span class="ms-2 smal text-primary">Send an invite to a friend</span>
          <p class="mt-3 small">Invited friends (2)</p>
          <div class="d-flex align-items-center mb-3">
            <div class="me-3">
              <img
                alt="#"
                src="../img/user1.jpg"
                class="img-fluid rounded-circle" />
            </div>
            <div>
              <p class="small fw-bold text-dark mb-0">Kate Simpson</p>
              <p class="mb-0 small">
                <a
                  href="../cdn-cgi/l/email-protection"
                  class="__cf_email__"
                  data-cfemail="365d574253455f5b46455958765943425459595d1855595b">[email&#160;protected]</a>
              </p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="me-3">
              <img
                alt="#"
                src="../img/user2.png"
                class="img-fluid rounded-circle" />
            </div>
            <div>
              <p class="small fw-bold text-dark mb-0">Andrew Smith</p>
              <p class="mb-0 small">
                <a
                  href="../cdn-cgi/l/email-protection"
                  class="__cf_email__"
                  data-cfemail="afcec1cbddcad8dcc2c6dbc7efdac69781ccc0c2">[email&#160;protected]</a>
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0"></div>
      </div>
    </div>
  </div>


   <!-- Pass session data to JavaScript -->
   <script>
          // Pass PHP session data to JavaScript
          var userName = <?php echo json_encode($_SESSION['username']); ?>;
          var userID =  <?php echo json_encode($userID); ?>;
      </script>
  <script
    data-cfasync="false"
    src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script
    src="../vendor/jquery/jquery.min.js"></script>
  <script
    src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script
    src="../vendor/slick/slick/slick.min.js"></script>

  <script
    src="../vendor/sidebar/hc-offcanvas-nav.js"></script>

  <script
    src="../js/osahan.js"></script>


  <script src="../js/headerFooterManager.js"></script>
</body>

</html>