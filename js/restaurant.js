document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll(".star-rating .feather-star");
  let rating = 0;

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      // Set the rating to the star's value
      rating = index + 1;

      // Update the UI to show the selected rating
      stars.forEach((s, i) => {
        if (i < rating) {
          s.classList.add("text-warning");
        } else {
          s.classList.remove("text-warning");
        }
      });

      console.log("Rating selected:", rating);
      // You can now send the rating to the server or handle it as needed
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll(".star-rating .feather-star");
  const ratingInput = document.getElementById("rating");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      const rating = index + 1;
      ratingInput.value = rating;

      stars.forEach((s, i) => {
        if (i < rating) {
          s.classList.add("text-warning");
        } else {
          s.classList.remove("text-warning");
        }
      });
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  fetchRecentCafMeals();
});


// Recents fetch helper functions

function fetchRecentCafMeals() {
    const sliderContainer = document.querySelector(".trending-slider");


    const cafID = sliderContainer.dataset.cafId
  
    const url = `../actions/CafeteriaManagementService/get/cafRecents.php?cafID=${cafID}`; // Change this to your actual API endpoint
  
    fetch(url)
      .then((response) => response.json())
      .then((data) => {
        if (data.success && data.data.length > 0) {
          
          sliderContainer.innerHTML = ""; // Clear previous contents
          data.data.forEach((meal) => {
            const mealElement = createRecentMealElement(meal);
            sliderContainer.appendChild(mealElement);
          });
  
          initializeCafRecentsSlider()
  
  
        } else {
          console.error("No recent meals found");
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
                  <a href="#">
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
  
  function initializeCafRecentsSlider() {
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
            slidesToShow: 3,
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
  




