"use strict";

function _typeof(n) {
  return (_typeof =
    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
      ? function (n) {
          return typeof n;
        }
      : function (n) {
          return n &&
            "function" == typeof Symbol &&
            n.constructor === Symbol &&
            n !== Symbol.prototype
            ? "symbol"
            : typeof n;
        })(n);
}

(function (window, document) {
  var i,
    R = document,
    X = window,
    Y = R.getElementsByTagName("html")[0],
    Z = R,
    nn =
      (/iPad|iPhone|iPod/.test(navigator.userAgent) ||
        (!!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform))) &&
      !window.MSStream,
    en =
      "ontouchstart" in window ||
      navigator.maxTouchPoints ||
      (window.DocumentTouch && R instanceof DocumentTouch),
    an = function (n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    },
    tn = function (n) {
      return "auto" === n ? n : an(n) ? n + "px" : n;
    },
    on = function (n) {
      return n.stopPropagation();
    },
    cn = function (e) {
      return function (n) {
        n.preventDefault(), n.stopPropagation(), "function" == typeof e && e();
      };
    },
    ln = function (n, e, a) {
      var t = Array.from(a.children),
        o = t.length,
        i =
          -1 < e
            ? Math.max(0, Math.min(e - 1, o))
            : Math.max(0, Math.min(o + e + 1, o));
      0 === i ? a.prepend(n) : t[i - 1].after(n);
    },
    rn = function (n) {
      return -1 !== ["left", "right"].indexOf(n) ? "x" : "y";
    },
    sn =
      ((i = (function (n) {
        var e = ["Webkit", "Moz", "Ms", "O"],
          a = (R.body || R.documentElement).style,
          t = n.charAt(0).toUpperCase() + n.slice(1);
        if (void 0 !== a[n]) return n;
        for (var o = 0; o < e.length; o++)
          if (void 0 !== a[e[o] + t]) return e[o] + t;
        return !1;
      })("transform")),
      function (n, e, a) {
        if (i)
          if (0 === e) n.style[i] = "";
          else if ("x" === rn(a)) {
            var t = "left" === a ? e : -e;
            n.style[i] = t ? "translate3d(".concat(t, "px,0,0)") : "";
          } else {
            var o = "top" === a ? e : -e;
            n.style[i] = o ? "translate3d(0,".concat(o, "px,0)") : "";
          }
        else n.style[a] = e;
      }),
    e = function (n, e, a) {
      console.warn(
        "%cHC Off-canvas Nav:%c " +
          a +
          "%c '" +
          n +
          "'%c is now deprecated and will be removed in the future. Use%c '" +
          e +
          "'%c option instead. See details about plugin usage at https://github.com/somewebmedia/hc-offcanvas-nav.",
        "color: #fa253b",
        "color: default",
        "color: #5595c6",
        "color: default",
        "color: #5595c6",
        "color: default"
      );
    },
    dn = 0;

  function hcOffcanvasNav(element, options) {
    var settings = Object.assign(
      {
        width: 280,
        height: "auto",
        disableAt: false,
        pushContent: false,
        expanded: false,
        position: "left",
        levelOpen: "overlap",
        levelSpacing: 40,
        levelTitles: true,
        closeOpenLevels: true,
        navTitle: null,
        navClass: "",
        disableBody: true,
        closeOnClick: true,
        customToggle: null,
        bodyInsert: "prepend",
        removeOriginalNav: false,
        rtl: false,
        insertClose: true,
        insertBack: true,
        levelTitleAsBack: true,
        labelClose: "Close",
        labelBack: "Back",
      },
      options
    );

    // ... Additional initialization code here ...

    // Placeholder for triggering the open event
    function openNav() {
      // Implementation for opening the nav
    }

    // Placeholder for triggering the close event
    function closeNav() {
      // Implementation for closing the nav
    }

    // Placeholder for updating the nav
    function updateNav(newOptions) {
      // Implementation for updating the nav settings
    }

    return {
      open: openNav,
      close: closeNav,
      update: updateNav,
    };
  }

  document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((element) => {
    // Initialize tooltip for each element
    // Replace `Tooltip` with the actual Vanilla JS tooltip initialization
    console.log("Initializing tooltip for element:", element);
    // new Tooltip(element);
  });

  document.querySelectorAll('.offer-slider, .cat-slider, .trending-slider, .popular-slider, .osahan-slider, .osahan-slider-map').forEach((element) => {
    const slickSettings = {
      '.offer-slider': {
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
      },
      '.cat-slider': {
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
      },
      '.trending-slider': {
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
      },
      '.popular-slider': {
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
      },
      '.osahan-slider': {
        centerMode: false,
        slidesToShow: 1,
        arrows: false,
        dots: true,
      },
      '.osahan-slider-map': {
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
      },
    };
    
    const className = `.${element.className.split(' ')[0]}`;
    const settings = slickSettings[className];

    if (settings) {
      // Initialize slider with settings
      console.log(`Initializing slider for ${className} with settings:`, settings);
      // new YourSliderLibrary(element, settings);
    }
  });

  // Initialize the off-canvas navigation
  const mainNav = document.getElementById('main-nav');
  const toggle = document.querySelector('.toggle');
  if (mainNav) {
    hcOffcanvasNav(mainNav, {
      disableAt: false,
      customToggle: toggle,
      levelSpacing: 40,
      navTitle: "Ashesi Eats",
      levelTitles: true,
      levelTitleAsBack: true,
      pushContent: "#container",
      insertClose: 2,
    });
  }
})(window, document);
