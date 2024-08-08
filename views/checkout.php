<?php
include_once "../settings/connection.php"; // Include your database connection file
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
                  <div class="row g-4 mb-3">
                    <div class="col-lg-3 col-md-6">
                      <div class="form-check position-relative border-custom-radio p-0">
                      <input type="hidden" id="paymentIDField" value="1"> <!-- Replace with dynamic value if needed -->
                        <input
                          type="radio"
                          id="customRadioInline3"
                          name="paymentMethod"
                          value="Credit/Debit Card"
                          class="form-check-input"
                        />
                        <label
                          class="form-check-label w-100 border rounded"
                          for="customRadioInline3"
                        ></label>
                        <div>
                          <div class="p-3 bg-white rounded rounded-bottom-0 shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                              <h6 class="mb-0">Credit/Debit Card</h6>
                              <p class="mb-0 badge text-bg-success ms-auto"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                      <div class="form-check position-relative border-custom-radio p-0">
                        <input
                          type="radio"
                          id="customRadioInline4"
                          name="paymentMethod"
                          value="Mobile Banking"
                          class="form-check-input"
                        />
                        <label
                          class="form-check-label w-100 border rounded"
                          for="customRadioInline4"
                        ></label>
                        <div>
                          <div class="p-3 rounded rounded-bottom-0 bg-white shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                              <h6 class="mb-0">Mobile Banking</h6>
                              <p class="mb-0 badge text-bg-light ms-auto">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                      <div class="form-check position-relative border-custom-radio p-0">
                        <input
                          type="radio"
                          id="customRadioInline5"
                          name="paymentMethod"
                          value="Meal Plan"
                          class="form-check-input"
                        />
                        <label
                          class="form-check-label w-100 border rounded"
                          for="customRadioInline5"
                        ></label>
                        <div>
                          <div class="p-3 rounded rounded-bottom-0 bg-white shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                              <h6 class="mb-0">Meal Plan</h6>
                              <p class="mb-0 badge text-bg-light ms-auto"></p>
                            </div>
                            <p class="meal-plan-details text-muted mb-0">
                              GHS 100
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                      <div class="form-check position-relative border-custom-radio p-0">
                        <input
                          type="radio"
                          id="customRadioInline6"
                          name="paymentMethod"
                          value="Cash on Delivery"
                          class="form-check-input"
                        />
                        <label
                          class="form-check-label w-100 border rounded"
                          for="customRadioInline6"
                        ></label>
                        <div>
                          <div class="p-3 rounded rounded-bottom-0 bg-white shadow-sm w-100">
                            <div class="d-flex align-items-center mb-2">
                              <h6 class="mb-0">Cash on Delivery</h6>
                              <p class="mb-0 badge text-bg-light ms-auto">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <button id="savePreference" class="btn btn-primary">SAVE</button>
                </div>
              </div>                           
              </div>


            </div>
          </div>
          <div class="col-md-4">
            <div
              class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar"
            >
              <div
                class="d-flex border-bottom osahan-cart-item-profile bg-white p-3"
              >
                <img
                  alt="osahan"
                  src="../img/starter1.jpg"
                  class="me-3 rounded-circle img-fluid"
                />
                <div class="d-flex flex-column">
                  <h6 class="mb-1 fw-bold">Munchies Extra</h6>
                  <p class="mb-0 small text-muted">
                    <i class="feather-map-pin"></i> Inside Ashesi University
                  </p>
                </div>
              </div>
              <div class="bg-white border-bottom py-2">
                <div
                  class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom"
                >
                  <div class="d-flex align-items-center">
                    <div class="me-2 text-success">&middot;</div>
                    <div class="media-body">
                      <p class="m-0">Fried rice</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <span class="count-number float-end"
                      ><button
                        type="button"
                        class="btn-sm left dec btn btn-outline-secondary"
                      >
                        <i class="feather-minus"></i></button
                      ><input
                        class="count-number-input"
                        type="text"
                        readonly
                        value="1" /><button
                        type="button"
                        class="btn-sm right inc btn btn-outline-secondary"
                      >
                        <i class="feather-plus"></i></button
                    ></span>
                    <p class="text-gray mb-0 float-end ms-2 text-muted small">
                      GHS 12
                    </p>
                  </div>
                </div>
                <div
                  class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom"
                >
                  <div class="d-flex align-items-center">
                    <div class="me-2 text-success">&middot;</div>
                    <div class="media-body">
                      <p class="m-0">Fried Chicken Thigh</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <span class="count-number float-end"
                      ><button
                        type="button"
                        class="btn-sm left dec btn btn-outline-secondary"
                      >
                        <i class="feather-minus"></i></button
                      ><input
                        class="count-number-input"
                        type="text"
                        readonly
                        value="1" /><button
                        type="button"
                        class="btn-sm right inc btn btn-outline-secondary"
                      >
                        <i class="feather-plus"></i></button
                    ></span>
                    <p class="text-gray mb-0 float-end ms-2 text-muted small">
                      GHS 13
                    </p>
                  </div>
                </div>
                <div
                  class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom"
                >
                  <div class="d-flex align-items-center">
                    <div class="me-2 text-danger">&middot;</div>
                    <div class="media-body">
                      <p class="m-0">Sausage Kebab</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <span class="count-number float-end"
                      ><button
                        type="button"
                        class="btn-sm left dec btn btn-outline-secondary"
                      >
                        <i class="feather-minus"></i></button
                      ><input
                        class="count-number-input"
                        type="text"
                        readonly
                        value="2" /><button
                        type="button"
                        class="btn-sm right inc btn btn-outline-secondary"
                      >
                        <i class="feather-plus"></i></button
                    ></span>
                    <p class="text-gray mb-0 float-end ms-2 text-muted small">
                      GHS 20
                    </p>
                  </div>
                </div>
              </div>
              <div class="bg-white p-3 py-3 border-bottom clearfix">
                <div class="input-group">
                  <span class="input-group-text" id="message"
                    ><i class="feather-message-square"></i
                  ></span>
                  <textarea
                    placeholder="Any suggestions? We will pass it on..."
                    aria-label="With textarea"
                    class="form-control"
                  ></textarea>
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
                  Delivery Fee<span class="text-info ms-1"
                    ><i class="feather-info"></i></span
                  ><span class="float-end text-dark">GHS 5</span>
                </p>
                <hr />
                <h6 class="fw-bold mb-0">
                  TO PAY <span class="float-end">GHS 60</span>
                </h6>
              </div>
              <div class="p-3" id="payButton">
                <a class="btn btn-success w-100 btn-lg" href="successful.html"
                  >PAY GHS 60<i class="feather-arrow-right"></i
                ></a>
              </div>
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

    <script
      type="df6ebe39ae268b2498852a47-text/javascript"
      src="../vendor/jquery/jquery.min.js"
    ></script>
    <script
      type="df6ebe39ae268b2498852a47-text/javascript"
      src="../vendor/bootstrap/js/bootstrap.bundle.min.js"
    ></script>

    <script
      type="df6ebe39ae268b2498852a47-text/javascript"
      src="../vendor/slick/slick/slick.min.js"
    ></script>

    <script
      type="df6ebe39ae268b2498852a47-text/javascript"
      src="../vendor/sidebar/hc-offcanvas-nav.js"
    ></script>

    <script
      type="df6ebe39ae268b2498852a47-text/javascript"
      src="../js/osahan.js"
    ></script>
    <script
      src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="df6ebe39ae268b2498852a47-|49"
      defer
    ></script>
    <script
      defer
      src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
      integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
      data-cf-beacon='{"rayId":"8a5eb0c07c26639d","version":"2024.7.0","r":1,"serverTiming":{"name":{"cfL4":true}},"token":"dd471ab1978346bbb991feaa79e6ce5c","b":1}'
      crossorigin="anonymous"
    ></script>

    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script src="../js/headerFooterManager.js"></script>

    <script src="../js/payment.js"></script>
  </body>
</html>
