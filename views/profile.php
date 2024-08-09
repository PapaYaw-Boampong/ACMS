<?php
session_start();
// Include the connection file
include_once '../settings/connection.php';
include_once '../actions/UserManagementService/get/getUserDetails.php';

// Assuming userIdExist() returns the user ID if the user exists
$userID = userIdExist();

// Fetch user details using the function
$userDetails = getUserDetailsByID($conn, $userID);

if ($userDetails) {
    $user = [
        'name' => $userDetails['name'],
        'phoneNo' => $userDetails['phoneNo'],
        'email' => $userDetails['email']
    ];
} else {
    // Handle case where user details are not found
    $user = [
        'name' => '',
        'phoneNo' => '',
        'email' => ''
    ];
}

// // Fetch user data from the database
// $query = "SELECT name, phoneNo, email FROM users WHERE userID = ?";
// $stmt = mysqli_stmt_init($conn);
// if (!mysqli_stmt_prepare($stmt, $query)) {
//     die("Error: " . mysqli_error($conn));
// }
// mysqli_stmt_bind_param($stmt, "i", $userID);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);
// $user = mysqli_fetch_assoc($result);
// mysqli_stmt_close($stmt);
// mysqli_close($conn);

// Close the database connection
mysqli_close($conn);
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
    <script>
       
    </script>
</head>
<body class="fixed-bottom-bar">
    <special-header></special-header>
    <div class="osahan-profile">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="fw-bold m-0 text-white">Profile</h4>
            </div>
        </div>
        <div class="container position-relative">
            <div class="py-5 osahan-profile row">
                <div class="col-md-4 mb-3">
                    <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden" id="profile-nav"></div>
                </div>
                <div class="container col-md-8 mb-3">
                    <div class="rounded shadow-sm p-4 bg-white">
                        <h5 class="mb-4">My account</h5>
                        <div id="edit_profile">
                            <div id="success-message" style="display:none;"></div>
                            <div>
                            <form method="POST" action="../actions/UserManagementService/put/update_account.php">
                              <div class="form-group mb-3">
                                  <label class="pb-1">Name</label>
                                  <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required />
                              </div>
                              <div class="form-group mb-3">
                                  <label class="pb-1">Mobile Number</label>
                                  <input type="text" name="phoneNo" class="form-control" value="<?php echo htmlspecialchars($user['phoneNo']); ?>" required />
                              </div>
                              <div class="form-group mb-3">
                                  <label class="pb-1">Email</label>
                                  <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required />
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                              </div>
                          </form>
                            </div>
                            <div class="additional">
                                <div class="change_password my-3">
                                    <a href="change_password.php" class="p-3 border rounded bg-white btn d-flex align-items-center">Change Password<i class="feather-arrow-right ms-auto"></i></a>
                                </div>
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
          <div class="col">
            <a
              href="home.html"
              class="text-dark small fw-bold text-decoration-none"
            >
              <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
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
          <div class="col selected">
            <a
              href="profile.php"
              class="text-danger small fw-bold text-decoration-none"
            >
              <p class="h4 m-0"><i class="feather-user"></i></p>
              Profile
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <special-footer></special-footer>

    <nav id="main-nav"></nav>

    <div
      class="modal fade"
      id="paycard"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Credit/Debit Card</h5>
            <button
              type="button"
              class="btn-close shadow-none"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h6 class="m-0">Add new card</h6>
            <p class="small">
              WE ACCEPT
              <span class="osahan-card ms-2 fw-bold"
                >( Master Card / Visa Card / Rupay )</span
              >
            </p>
            <form>
              <div class="form-row">
                <div class="col-md-12 form-group mb-3">
                  <label class="form-label fw-bold small">Card number</label>
                  <div class="input-group">
                    <input
                      placeholder="Card number"
                      type="number"
                      class="form-control"
                    />
                    <button class="btn btn-outline-secondary" type="button">
                      <i class="feather-credit-card"></i>
                    </button>
                  </div>
                </div>
                <div class="row g-2 mb-3">
                  <div class="col-md-8 form-group">
                    <label class="form-label fw-bold small"
                      >Valid through(MM/YY)</label
                    ><input
                      placeholder="Enter Valid through(MM/YY)"
                      type="number"
                      class="form-control"
                    />
                  </div>
                  <div class="col-md-4 form-group">
                    <label class="form-label fw-bold small">CVV</label
                    ><input
                      placeholder="Enter CVV Number"
                      type="number"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-md-12 form-group mb-3">
                  <label class="form-label fw-bold small">Name on card</label
                  ><input
                    placeholder="Enter Card number"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-md-12 form-group mb-0">
                  <div class="form-check custom-checkbox">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value
                      id="custom-Check1"
                    />
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
                data-bs-dismiss="modal"
              >
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
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Delivery Address</h5>
            <button
              type="button"
              class="btn-close shadow-none"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
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
                      class="form-control"
                    />
                    <button class="btn btn-outline-secondary" type="button">
                      <i class="feather-map-pin"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-12 form-group mb-3">
                  <label class="form-label">Complete Address</label
                  ><input
                    placeholder="Complete Address e.g. house number, street name, landmark"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="col-md-12 form-group mb-3">
                  <label class="form-label">Delivery Instructions</label
                  ><input
                    placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall"
                    type="text"
                    class="form-control"
                  />
                </div>
                <div class="mb-0 col-md-12 form-group">
                  <label class="form-label">Nickname</label>
                  <div
                    class="btn-group w-100"
                    role="group"
                    aria-label="Basic radio toggle button group"
                  >
                    <input
                      type="radio"
                      class="btn-check"
                      name="btnradio"
                      id="btnradio4"
                      checked
                    />
                    <label class="btn btn-outline-secondary" for="btnradio4"
                      >Home</label
                    >
                    <input
                      type="radio"
                      class="btn-check"
                      name="btnradio"
                      id="btnradio5"
                    />
                    <label class="btn btn-outline-secondary" for="btnradio5"
                      >Work</label
                    >
                    <input
                      type="radio"
                      class="btn-check"
                      name="btnradio"
                      id="btnradio6"
                    />
                    <label class="btn btn-outline-secondary" for="btnradio6"
                      >Other</label
                    >
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
                data-bs-dismiss="modal"
              >
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
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body py-0">
            <button class="btn btn-light text-primary btn-sm">
              <i class="feather-plus"></i>
            </button>
            <span class="ms-2 smal text-primary"
              >Send an invite to a friend</span
            >
            <p class="mt-3 small">Invited friends (2)</p>
            <div class="d-flex align-items-center mb-3">
              <div class="me-3">
                <img
                  alt="#"
                  src="../img/user1.jpg"
                  class="img-fluid rounded-circle"
                />
              </div>
              <div>
                <p class="small fw-bold text-dark mb-0">Kate Simpson</p>
                <p class="mb-0 small">
                  <a
                    href="../cdn-cgi/l/email-protection"
                    class="__cf_email__"
                    data-cfemail="147f756071677d7964677b7a547b6160767b7b7f3a777b79"
                    >[email&#160;protected]</a
                  >
                </p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <div class="me-3">
                <img
                  alt="#"
                  src="../img/user2.png"
                  class="img-fluid rounded-circle"
                />
              </div>
              <div>
                <p class="small fw-bold text-dark mb-0">Andrew Smith</p>
                <p class="mb-0 small">
                  <a
                    href="../cdn-cgi/l/email-protection"
                    class="__cf_email__"
                    data-cfemail="6c0d02081e091b1f010518042c190554420f0301"
                    >[email&#160;protected]</a
                  >
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
      src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script
      src="../vendor/jquery/jquery.min.js"
    ></script>
    <script
      src="../vendor/bootstrap/js/bootstrap.bundle.min.js"
    ></script>

    <script
      src="../vendor/slick/slick/slick.min.js"
    ></script>

    <script
      src="../vendor/sidebar/hc-offcanvas-nav.js"
    ></script>

    <script
      src="../js/osahan.js"
    ></script>
    <script src="../js/headerFooterManager.js"></script>
    
 
  </body>


</html>
