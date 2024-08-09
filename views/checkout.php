<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';

$userID = userIdExist(); 
$userName = $_SESSION['username'];
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
    <link rel="icon" type="image/png" href="../img/fav.png" />
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  </head>
  <body class="fixed-bottom-bar">
    <special-header></special-header>
    <div class="osahan-checkout">
      <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
          <a class="toggle togglew toggle-2" href="#"><span></span></a>
          <h4 class="fw-bold m-0 text-white">Checkout</h4>
        </div>
      </div>

      <div class="container position-relative">
        <div class="py-5 row g-4">
          <div class="col-md-8">
            <div>
              <div
                class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden"
              >
              <div class="osahan-cart-item-profile bg-white p-3">
                <div class="d-flex flex-column">
                  <div class="p-3 py-3 border-bottom clearfix">
                  <h6 class="mb-3 fw-bold">Delivery or Pickup</h6>
                  <div class="row g-4 mb-3">
                    <div class="col-lg-6">
                      <div class="form-check position-relative border-custom-radio p-0">
                        <input
                          type="radio"
                          id="customRadioInline1"
                          name="deliveryPickup"
                          value="Delivery"
                          class="form-check-input"
                        />
                        <label
                          class="form-check-label w-100 border rounded"
                          for="customRadioInline1"
                        ></label>
                        <div>
                          <div class="p-3 bg-white rounded rounded-bottom-0 shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                              <h6 class="mb-0">Delivery</h6>
                              <p class="mb-0 badge text-bg-success ms-auto"></p>
                            </div>
                          </div>
                          <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            class="btn btn-light border-top w-100 rounded-top-0"
                            >Edit</a
                          >
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-check position-relative border-custom-radio p-0">
                        <input
                          type="radio"
                          id="customRadioInline2"
                          name="deliveryPickup"
                          value="Pickup"
                          class="form-check-input"
                        />
                        <label
                          class="form-check-label w-100 border rounded"
                          for="customRadioInline2"
                        ></label>
                        <div>
                          <div class="p-3 rounded rounded-bottom-0 bg-white shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                              <h6 class="mb-0">Pickup</h6>
                              <p class="mb-0 badge text-bg-light ms-auto">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  

                  <div class="p-3 py-3 border-bottom clearfix">
                  <h6 class="mb-3 fw-bold">Select Payment Method</h6>
                  <div class="row g-4 mb-3" id="payment-methods-container">
                      <!-- Payment methods will be inserted here -->
                  </div>
                  </div>

                  <button id="savePreference" class="btn btn-primary">SAVE</button>
                </div>
              </div>                           
              </div>


            </div>
          </div>
          <div class="col-md-4">
          <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar" id="order-details" data-user-id="<?php echo $userID; ?>">

        </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <special-footer></special-footer>
    
    <nav id="main-nav"></nav>

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
            <h5 class="modal-title">Edit Delivery Address</h5>
            <button
              type="button"
              class="btn-close shadow-none"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form id="addressForm">
              <input type="hidden" id="addressIDField" />
              <div class="form-row">
                <div class="col-md-12 form-group">
                  <label class="form-label">Delivery Address</label>
                  <div class="input-group mb-3">
                    <input
                      id="addressField"
                      placeholder="e.g B7, second floor"
                      type="text"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-md-12 form-group mb-3">
                  <label class="form-label">Delivery Instructions</label>
                  <input
                    id="instructionField"
                    placeholder="e.g. Leave the food in the opposite room"
                    type="text"
                    class="form-control"
                  />
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
              <button
                type="button"
                class="btn btn-primary btn-lg w-100"
                id="saveChangesBtn"
              >
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none"
    >
    </div>

    <script>
          // Pass PHP session data to JavaScript
          var userName = <?php echo json_encode($_SESSION['username']); ?>;
          var userID =  <?php echo json_encode($userID); ?>;
      </script>


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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script src="../js/headerFooterManager.js"></script>

    <script src="../js/payment.js"></script>
  </body>
</html>
