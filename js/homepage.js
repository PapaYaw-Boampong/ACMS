document.addEventListener("DOMContentLoaded", function () {
  fetchCafeterias();
  fetchMealsAndRenderSlider();
  fetchRecentMeals();
});

// Cafeteria fetch helper functions
function fetchCafeterias() {
  const url = `../actions/CafeteriaManagementService/get/allCafeterias.php`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const sliderContainer = document.querySelector(".offer-slider");
        sliderContainer.innerHTML = ""; // Clear previous contents
        data.data.forEach((cafeteria) => {
          const cafeteriaElement = createCafeteriaElement(cafeteria);
          sliderContainer.appendChild(cafeteriaElement);
        });
      } else {
        console.error("No cafeterias found");
        const sliderContainer = document.querySelector(".offer-slider");
        sliderContainer.appendChild(renderNoCafeteriasMessage());
      }

      initializeOfferSlider();
    })
    .catch((error) => {
      console.error("Error fetching cafeterias:", error);
      const sliderContainer = document.querySelector(".offer-slider");
      sliderContainer.appendChild(renderNoCafeteriasMessage());
    });
}

function createCafeteriaElement(cafeteria) {
  // Create a container div for the cafeteria item
  const itemDiv = document.createElement("div");
  itemDiv.className = "cat-item px-1 py-3";

  // Build the inner HTML using template literals for better readability and maintenance
  itemDiv.innerHTML = `
         <h5 class="m-0">${cafeteria.cafeteriaName}</h5>
         <br>
        <a class="d-block text-center shadow-sm" href="cafeteriaDetails.html?cafID=${
          cafeteria.cafeteriaID
        }">
            <img class="img-fluid rounded" src="${
              cafeteria.cafeteriaImage || "../img/pro3.jpg"
            }" alt="${cafeteria.cafeteriaName} - ${cafeteria.description}">
        </a>
    `;

  return itemDiv;
}

function renderNoCafeteriasMessage() {
  const noCafeteriasDiv = document.createElement("div");
  noCafeteriasDiv.className = "p-3 rounded shadow-sm bg-white text-center";
  noCafeteriasDiv.innerHTML = `
        <p class="fw-bold text-muted">No cafeterias found</p>
        <p>Please check back later or contact support.</p>
    `;
  return noCafeteriasDiv;
}

function initializeOfferSlider() {
  $(".offer-slider").slick({
    slidesToShow: 3,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "50px",
          slidesToShow: 4,
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
}

// Meal fetch helper functions

function fetchMealsAndRenderSlider() {
  const url = "../actions/CafeteriaManagementService/get/popularMeals.php"; // Adjust with your actual API endpoint
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      if (data.success && data.data.length > 0) {
        const sliderContainer = document.querySelector(".trending-slider");
        sliderContainer.innerHTML = ""; // Clear previous contents if needed
        data.data.forEach((meal) => {
          const mealElement = createMealElement(meal);
          sliderContainer.appendChild(mealElement);
        });

        initializePopularSlider();
      } else {
        console.error("No meals found");
      }
    })
    .catch((error) => {
      console.error("Error fetching meals:", error);
    });
}

function createMealElement(meal) {
  const itemDiv = document.createElement("div");
  itemDiv.className = "osahan-slider-item";
  itemDiv.innerHTML = `
        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image">
                <div class="star position-absolute">
                    <span class="badge text-bg-success"><i class="feather-star"></i> ${Math.round(
                      meal.avgRating
                    )} </span>
                </div>
                <div class="favourite-heart text-danger position-absolute rounded-circle">
                  <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                    <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                    <img alt="#" src="../img/trending1.png" class="img-fluid item-img w-100" />
                </a>
            </div>
            <div class="p-3 position-relative">
                <div class="list-card-body">
                    <h6 class="mb-1">
                        <a href="restaurant.html" class="text-black">${
                          meal.name
                        }
                        </a>
                    </h6>
                    <p class="text-gray mb-1 small">• ${meal.timeframe} • ${meal.name}</p>
                    <p class="text-gray mb-1 rating"></p>
                    <ul class="rating-stars list-unstyled">
                        ${generateStars(meal.avgRating)}
                    </ul>         
                </div>

            </div>
        </div>
    `;
  return itemDiv;
}

function generateStars(avgRating) {
  let starsHTML = "";
  for (let i = 1; i <= 5; i++) {
    if (i <= Math.round(avgRating)) {
      starsHTML += '<i class="feather-star star_active"></i>';
    } else {
      starsHTML += '<i class="feather-star"></i>';
    }
  }
  return starsHTML;
}

function initializePopularSlider() {
  $(".trending-slider").slick({
    slidesToShow: 3,
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
        breakpoint: 500,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });
}

// Recents fetch helper functions

function fetchRecentMeals() {
  const sliderContainer = document.querySelector(".recents-slider");
  console.log('Slider container:', sliderContainer); // Check if container is found
  const userID = sliderContainer.dataset.userId;
  console.log('User ID:', userID); // Check userID

  const url = `../actions/CafeteriaManagementService/get/recentMeals.php?userID=${userID}`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      console.log('Fetched data:', data); // Inspect the data
      if (data.success && data.data.length > 0) {
        sliderContainer.innerHTML = ""; // Clear previous contents
        data.data.forEach((meal) => {
          const mealElement = createRecentMealElement(meal);
          sliderContainer.appendChild(mealElement);
        });

        initializeRecentsSlider();
      } else {
        sliderContainer.outerHTML = `
            <div class="p-3 no-recent-meals text-center">
                <h5 class="fw-bold text-muted">${data.message || 'No recent meals found'}</h5>
            </div>
        `;
        console.error(data.message || "No recent meals found");
      }
    })
    .catch((error) => {
      console.error("Error fetching recent meals:", error);
    });
}

function createRecentMealElement(meal) {
  const itemDiv = document.createElement("div");
  itemDiv.className = "osahan-slider-item";
  itemDiv.innerHTML = `
        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
            <div class="list-card-image">
                <div class="star position-absolute">
                </div>
                <div class="member-plan position-absolute">
                    <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                    <img alt="#" src="../img/trending1.png" class="img-fluid item-img w-100" />
                </a>
            </div>
            <div class="p-3 position-relative">
                <div class="list-card-body">
                    <h6 class="mb-1">
                        <a href="restaurant.html" class="text-black">${meal.name}
                        </a>
                    </h6>
                    <p class="text-gray mb-3">${meal.timeframe} • GHS ${meal.price}</p>
                </div>
             
            </div>
        </div>
    `;
  return itemDiv;
}

function initializeRecentsSlider() {
  $(".recents-slider").slick({
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
}



