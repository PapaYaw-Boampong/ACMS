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
  

  function fetchOrderDetails(orderID, userID) {
    $.ajax({
        url: '../actions/OrderService/get/orderInfo.php', // Replace with the actual path to your endpoint
        type: 'GET',
        data: {
            orderID: orderID,
            userID: userID
        },
        success: function(response) {
            const result = JSON.parse(response);
            if (result.success) {
                displayOrderDetails(result.data);
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: result.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred while fetching order details.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function displayOrderDetails(orderInfo) {
    const orderContainer = document.getElementById('order-details');
    orderContainer.innerHTML = '';

    if (orderInfo) {
        let orderHTML = '';

        orderHTML += `
            <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                <img alt="osahan" src="../img/starter1.jpg" class="me-3 rounded-circle img-fluid" />
                <div class="d-flex flex-column">
                    <h6 class="mb-1 fw-bold">Order ID: ${orderInfo.orderID}</h6>
                    <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> ${orderInfo.cafeteriaName}</p>
                </div>
            </div>
        `;

        orderInfo.meals.forEach(item => {
            orderHTML += `
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="me-2 text-success">&middot;</div>
                        <div class="media-body">
                            <p class="m-0">${item.mealName}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="form-group mb-0">
                            <input type="number" class="form-control" id="quantity-${item.mealID}" name="quantity" value="${item.quantity}" required>
                        </div>
                        <p class="text-gray mb-0 float-end ms-2 text-muted small">GHS ${item.price}</p>
                    </div>
                </div>
            `;
        });

        const itemTotal = orderInfo.meals.reduce((total, item) => total + (item.price * item.quantity), 0);

        orderHTML += `
            <div class="bg-white p-3 clearfix border-bottom">
                <p class="mb-1">Item Total <span class="float-end text-dark">GHS ${itemTotal}</span></p>
                <p class="mb-1">Restaurant Charges <span class="float-end text-dark">GHS 5</span></p>
                <p class="mb-1">Delivery Fee <span class="text-info ms-1"><i class="feather-info"></i></span><span class="float-end text-dark">GHS 5</span></p>
                <hr />
                <h6 class="fw-bold mb-0">TO PAY <span class="float-end">GHS ${itemTotal + 10}</span></h6>
            </div>
            <div class="p-3">
                <a class="btn btn-success w-100 btn-lg" href="successful.html">PAY GHS ${itemTotal + 10}<i class="feather-arrow-right"></i></a>
            </div>
        `;

        orderContainer.innerHTML = orderHTML;
    }
}





