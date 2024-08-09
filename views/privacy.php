<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Askbootstrap" />
  <meta name="author" content="Askbootstrap" />
  <link rel="icon" type="image/png" href="../img/fav.png" />
  <title>Ashesi Eats</title>

  <link
    href="../vendor/slick/slick/slick.css"
    rel="stylesheet"
    type="text/css" />
  <link
    href="../vendor/slick/slick/slick-theme.css"
    rel="stylesheet"
    type="text/css" />

  <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <link href="../css/style.css" rel="stylesheet" />

  <link href="../vendor/sidebar/demo.css" rel="stylesheet" />
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
          <div
            class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden" id="profile-nav">
          </div>
        </div>
        <div class="container col-md-8 mb-3">
          <div class="rounded shadow-sm">
            <div class="osahan-privacy bg-white rounded shadow-sm p-4">
              <div id="intro" class="mb-4">
                <div class="mb-3">
                  <h2 class="h5 text-primary">Introduction</h2>
                </div>
                <p>
                  Welcome to the Ashesi Catering Management System. The services provided are specifically tailored to meet the catering needs of Ashesi University.
                </p>
                <p>
                  By using our system, you agree to the following terms and conditions. Please read them carefully.
                </p>
              </div>

              <div id="services" class="mb-4">
                <div class="mb-3">
                  <h3 class="h5 text-primary">1. Using our Services</h3>
                </div>
                <p>
                  You must adhere to the policies made available to you within the system.
                </p>
                <p>
                  Misuse of our services is prohibited. This includes interfering with our services or accessing them using methods other than those provided by Ashesi University. Use our services only as permitted by law and Ashesi University policies. We may suspend or terminate your access if you fail to comply with our terms or policies.
                </p>

                <div id="personal-data" class="mb-3 active">
                  <h4 class="h6 text-primary">A. Personal Data we collect about you</h4>
                </div>
                <p>
                  Personal data refers to information that can identify you. The personal data you provide through our system includes:
                </p>
                <ul class="text-secondary">
                  <li class="pb-2">
                    When you create an account, we collect your name, email address, and login credentials.
                  </li>
                  <li class="pb-2">
                    When you fill out forms to contact the catering team, we collect your name, email, and details about your dietary preferences and requirements.
                  </li>
                </ul>
                <p>
                  We may also collect additional information such as your phone number if you contact us by phone.
                </p>

                <div id="information" class="mb-3 active">
                  <h4 class="h6 text-primary">B. Information we collect automatically</h4>
                </div>
                <p>
                  We may collect information about your interactions with our system automatically. This includes data collected through cookies and similar technologies to help us improve our services.
                </p>
                <p>
                  For more details on cookies and how to manage them, please see our Cookie Policy.
                </p>
              </div>

              <div id="privacy" class="mb-4">
                <div class="mb-3">
                  <h3 class="h5 text-primary">2. Privacy and Data Protection</h3>
                </div>
                <p>
                  Our privacy policies outline how we handle your personal data and protect your privacy when you use our services. By using our services, you consent to the collection and use of your data as described in these policies.
                </p>
              </div>

              <div id="yourContent" class="active">
                <div class="mb-3">
                  <h3 class="h5 text-primary">3. Your Content in our Services</h3>
                </div>
                <p>
                  Some of our services allow you to upload, submit, store, send, or receive content. You retain ownership of any intellectual property rights you hold in that content.
                </p>
                <p>
                  By uploading or submitting content to our services, you grant Ashesi University a worldwide license to use, host, store, reproduce, modify, create derivative works, communicate, publish, publicly perform, publicly display, and distribute such content.
                </p>
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
              <div class="row g-2 mb-3">
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
                src="img/user1.jpg"
                class="img-fluid rounded-circle" />
            </div>
            <div>
              <p class="small fw-bold text-dark mb-0">Kate Simpson</p>
              <p class="mb-0 small">
                <a
                  href="../cdn-cgi/l/email-protection"
                  class="__cf_email__"
                  data-cfemail="c0aba1b4a5b3a9adb0b3afae80afb5b4a2afafabeea3afad">[email&#160;protected]</a>
              </p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="me-3">
              <img
                alt="#"
                src="img/user2.png"
                class="img-fluid rounded-circle" />
            </div>
            <div>
              <p class="small fw-bold text-dark mb-0">Andrew Smith</p>
              <p class="mb-0 small">
                <a
                  href="../cdn-cgi/l/email-protection"
                  class="__cf_email__"
                  data-cfemail="8beae5eff9eefcf8e6e2ffe3cbfee2b3a5e8e4e6">[email&#160;protected]</a>
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0"></div>
      </div>
    </div>
  </div>

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