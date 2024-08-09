document.addEventListener("DOMContentLoaded", function () {
  renderSideBar();
});

// Function to insert navigation menu into #main-nav
function insertNavMenu(selector) {
  const nav_container = document.querySelector(selector);
  
  const navHtml = `
      <ul class="second-nav">
        <li>
          <a href="home.php"><i class="feather-home me-2"></i> Homepage</a>
        </li>
        <li>
          <a href="my_order.php"><i class="feather-list me-2"></i> My Orders</a>
        </li>

        <li>
          <a href="trending.php"><i class="feather-trending-up me-2"></i> Trending</a>
        </li>
        <li>
          <a href="recents.php"><i class="feather-award me-2"></i> Recents</a>
        </li>
        <li>
          <a href="checkout.php"><i class="feather-list me-2"></i> Checkout</a>
        </li>
        <li>
          <a href="profile.php"><i class="feather-user me-2"></i> Profile</a>
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
    `;

  if (nav_container) {
    nav_container.innerHTML = navHtml;
  } else {
    console.error(`Selector ${selector} not found.`);
  }
}

// Function to insert profile menu into #profile-nav
function insertProfileMenu(selector) {
  const profileNavHtml = `

              <a href="profile.html" class>
                <div class="d-flex align-items-center p-3">
                  <div class="left me-3">
                    <img alt="#" src="../img/user1.jpg" class="profile-pic" />
                  </div>
                  <div class="right">
                    <h6 class="mb-1 fw-bold">
                      Ako Oku
                      <i class="feather-check-circle text-success"></i>
                    </h6>
                    <p class="text-muted m-0 small">
                      <!-- <span
                        class="__cf_email__"
                        data-cfemail="c6afa7aba9b5a7aea7a886a1aba7afaae8a5a9ab"
                        >[email&#160;protected]</span
                      > -->
                      <span>82022025</span
                      >
                    </p>
                  </div>
                </div>
              </a>
              <div
                class="osahan-credits d-flex align-items-center p-3 bg-light"
              >
                <p class="m-0">Meal Plan Balance</p>
                <h5 class="m-0 ms-auto text-primary">GHS 52.25</h5>
              </div>
           
              <div class="bg-white profile-details">
                <a
                  data-bs-toggle="modal"
                  data-bs-target="#paycard"
                  class="d-flex w-100 align-items-center border-bottom p-3"
                >
                  <div class="left me-3">
                    <h6 class="fw-bold mb-1 text-dark">Payment Cards</h6>
                    <p class="small text-muted m-0">
                      Add a credit or debit card
                    </p>
                  </div>
                  <div class="right ms-auto">
                    <span class="fw-bold m-0"
                      ><i class="feather-chevron-right h6 m-0"></i
                    ></span>
                  </div>
                </a>
                <a
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  class="d-flex w-100 align-items-center border-bottom p-3"
                >
                  <div class="left me-3">
                    <h6 class="fw-bold mb-1 text-dark">Address</h6>
                    <p class="small text-muted m-0">
                      Add or remove a delivery address
                    </p>
                  </div>
                  <div class="right ms-auto">
                    <span class="fw-bold m-0"
                      ><i class="feather-chevron-right h6 m-0"></i
                    ></span>
                  </div>
                </a>

                <a
                  href="preferences.html"
                  class="d-flex w-100 align-items-center border-bottom px-3 py-4"
                >
                  <div class="left me-3">
                    <h6 class="fw-bold m-0 text-dark">
                      <i
                        class="feather-info bg-success text-white p-2 rounded-circle me-2"
                      ></i>
                      Preferences
                    </h6>
                  </div>

                  <div class="right ms-auto">
                    <span class="fw-bold m-0"
                      ><i class="feather-chevron-right h6 m-0"></i
                    ></span>
                  </div>
                </a>
               
              
                <a
                  href="contact-us.html"
                  class="d-flex w-100 align-items-center border-bottom px-3 py-4"
                >
                  <div class="left me-3">
                    <h6 class="fw-bold m-0 text-dark">
                      <i
                        class="feather-phone bg-primary text-white p-2 rounded-circle me-2"
                      ></i>
                      Contact Us
                    </h6>
                  </div>

                  <div class="right ms-auto">
                    <span class="fw-bold m-0"
                      ><i class="feather-chevron-right h6 m-0"></i
                    ></span>
                  </div>
                </a>
                <a
                  href="privacy.html"
                  class="d-flex w-100 align-items-center px-3 py-4"
                >
                  <div class="left me-3">
                    <h6 class="fw-bold m-0 text-dark">
                      <i
                        class="feather-lock bg-warning text-white p-2 rounded-circle me-2"
                      ></i>
                      Privacy policy
                    </h6>
                  </div>
                  <div class="right ms-auto">
                    <span class="fw-bold m-0"
                      ><i class="feather-chevron-right h6 m-0"></i
                    ></span>
                  </div>
                </a>
               
              </div>
            </div>
          </div>
    `;
  
  if (profile_container) {
    profile_container.innerHTML = profileNavHtml;
  } else {
    console.error(`Selector ${selector} not found.`);
  }
}


// Function to render sidebar button and initialize sidebar content
function renderSideBar() {
  // Insert the navigation menu HTML into #main-nav
  insertNavMenu("#main-nav");

  var $main_nav = $("#main-nav");

  var $toggle = $(".toggle");
  var defaultOptions = {
    disableAt: false,
    customToggle: $toggle,
    levelSpacing: 40,
    navTitle: "Ashesi Eats",
    levelTitles: true,
    levelTitleAsBack: true,
    pushContent: "#container",
    insertClose: 2,
  };

  var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

  // Insert the navigation menu HTML into #main-nav
  insertProfileMenu("#profile-nav");
}





// $(document).ready(function ($) {
//   "use strict";
//   $(".offer-slider").slick({
//     slidesToShow: 4,
//     arrows: true,
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           arrows: true,
//           centerMode: true,
//           centerPadding: "40px",
//           slidesToShow: 2,
//         },
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: "40px",
//           slidesToShow: 2,
//         },
//       },
//     ],
//   });
//   $(".offer-slider").slick({
//     slidesToShow: 4,
//     arrows: true,
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           arrows: true,
//           centerMode: true,
//           centerPadding: "40px",
//           slidesToShow: 2,
//         },
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: "40px",
//           slidesToShow: 2,
//         },
//       },
//     ],
//   });
//   $(".cat-slider").slick({
//     slidesToShow: 8,
//     arrows: true,
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           arrows: true,
//           centerMode: true,
//           centerPadding: "40px",
//           slidesToShow: 4,
//         },
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: "40px",
//           slidesToShow: 4,
//         },
//       },
//     ],
//   });

//
//   $(".osahan-slider").slick({
//     centerMode: false,
//     slidesToShow: 1,
//     arrows: false,
//     dots: true,
//   });
// })(jQuery);

// $('[data-bs-toggle="tooltip"]').tooltip();
