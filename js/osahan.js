(function ($) {
  "use strict";
  $(".offer-slider").slick({
    slidesToShow: 4,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },
    ],
  });
  $(".cat-slider").slick({
    slidesToShow: 8,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 4,
        },
      },
    ],
  });
  $(".trending-slider").slick({
    slidesToShow: 3,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".popular-slider").slick({
    centerMode: true,
    centerPadding: "30px",
    slidesToShow: 1,
    arrows: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".osahan-slider").slick({
    centerMode: false,
    slidesToShow: 1,
    arrows: false,
    dots: true,
  });
  $(".osahan-slider-map").slick({
    autoplay: true,
    slidesToShow: 5,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          autoplay: true,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          autoplay: true,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 3,
        },
      },
    ],
  });


  // Function to insert navigation menu into #main-nav
  function insertNavMenu(selector) {
    const navHtml = `
      <ul class="second-nav">
        <li>
          <a href="home.html"><i class="feather-home me-2"></i> Homepage</a>
        </li>
        <li>
          <a href="my_order.html"><i class="feather-list me-2"></i> My Orders</a>
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
          <a href="checkout.html"><i class="feather-list me-2"></i> Checkout</a>
        </li>
        <li>
          <a href="profile.html"><i class="feather-user me-2"></i> Profile</a>
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
    const container = document.querySelector(selector);
    if (container) {
      container.innerHTML = navHtml;
    } else {
      console.error(`Selector ${selector} not found.`);
    }
  }

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
  // $('[data-bs-toggle="tooltip"]').tooltip();
})(jQuery);
