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





////////////////////////creating and deleting orders//////////////////////


document.addEventListener("DOMContentLoaded", function() {
  // Select all anchor tags inside span with the class 'ms-auto'
  const addButtons = document.querySelectorAll('span.ms-auto a[data-meal-id]');

  // Iterate over each button and attach a click event listener
  addButtons.forEach(button => {
      button.addEventListener('click', function(event) {
          event.preventDefault();  // Prevent the default anchor behavior

          // Get the meal ID and user ID from data attributes
          const mealID = button.getAttribute('data-meal-id');
          const userID = button.getAttribute('data-user-id');

          // You can now call your function to handle the meal addition
          // For example, you can call a function to create or update an order
          handleAddMeal(userID, mealID, cafID);
      });
  });
});


function handleAddMeal(userID, mealID, cafID) {
  // Retrieve the current order ID from localStorage
  const currentOrderID = localStorage.getItem('currentOrderID') ?? -1;
  console.log(currentOrderID);
  // If no current order exists, create a new one
  if (currentOrderID == -1) {
    console.log("reached");
      createOrder(userID, mealID, 1, cafID);
  } else {
      updateOrder(currentOrderID, mealID, 1, cafID);
  }
}


document.addEventListener("DOMContentLoaded", function() {
  // Use URLSearchParams to get the mealID and cafID from the URL
  const params = new URLSearchParams(window.location.search);
  const mealID = params.get('mealID');
  const cafID = params.get('cafID'); // Assuming cafID is also present in the URL

  if (mealID) {
      const quantity = 1; // Default quantity
      const currentOrderID = localStorage.getItem('currentOrderID') ?? -1;

      Swal.fire({
          title: 'Add Meal to Order?',
          text: "Do you want to add this meal to your order?",
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, add it!',
          cancelButtonText: 'No, cancel',
      }).then((result) => {
          if (result.isConfirmed) {
              if (currentOrderID === -1) {
                  createOrder(userID, mealID, quantity, cafID);
              } else {
                  updateOrder(currentOrderID, mealID, quantity, cafID);
              }
          }
          // Clear the mealID and cafID parameters from the URL after processing
          params.delete('mealID');
          const newUrl = `${window.location.pathname}?${params.toString()}`;
          history.replaceState(null, '', newUrl);
      });
  }
});


function updateOrder(orderID, mealID, quantity, cafID) {
  fetch('../actions/OrderService/put/updateOrder.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ orderID, mealID, quantity,cafID })
  })
  .then(response => response.json())
  .then(result => {
      if (result.success) {
          Swal.fire({
              title: 'Success!',
              text: result.message,
              icon: 'success',
              confirmButtonText: 'OK'
          }).then(() => {
              window.location.href = `restaurant.php?cafID=${cafID}`;
          });
      } else {
          Swal.fire({
              title: 'Error!',
              text: result.message,
              icon: 'error',
              confirmButtonText: 'OK'
          });
      }
  })
  .catch(error => {
      Swal.fire({
          title: 'Error!',
          text: 'An error occurred while updating the order.',
          icon: 'error',
          confirmButtonText: 'OK'
      });
  });
}

function createOrder(userID, mealID, quantity, cafID) {
  fetch('../actions/OrderService/post/createorder.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ userID, mealID, quantity })
  })
  .then(response => response.json())
  .then(result => {
      if (result.success) {
          // Store the order ID in local storage
          localStorage.setItem('currentOrderID', result.orderID);

          Swal.fire({
              title: 'Success!',
              text: result.message,
              icon: 'success',
              confirmButtonText: 'OK'
          }).then(() => {
              window.location.href = `restaurant.php?cafID=${cafID}`;
          });
      } else {
          Swal.fire({
              title: 'Error!',
              text: result.message,
              icon: 'error',
              confirmButtonText: 'OK'
          });
      }
  })
  .catch(error => {
      Swal.fire({
          title: 'Error!',
          text: 'An error occurred while creating the order.',
          icon: 'error',
          confirmButtonText: 'OK'
      });
  });
}




///////////////////side pane for orders/////////////////////////

document.addEventListener("DOMContentLoaded", function () {
  const flag = localStorage.getItem("currentOrderID") ?? -1;

  if (flag !== -1) {
    fetchOrderDetails(flag);
  } else {
    renderNoOrdersMessage();
  }
});

function fetchOrderDetails(orderId) {
  const url = `../actions/OrderService/get/OrderInfo.php?orderID=${orderId}`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        renderOrderDetails(data.data);
      } else {
        console.error("No order found");
      }
    })
    .catch((error) => console.error("Error fetching order details:", error));
}

function renderOrderDetails(order) {
  const container = document.getElementById("order-details");

  container.innerHTML = "";

  let orderHTML = "";

  orderHTML += `
        <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
            <img alt="osahan" src="../img/starter1.jpg" class="me-3 rounded-circle img-fluid" />
            <div class="d-flex flex-column">
                <h6 class="mb-1 fw-bold">Order ID: ${order.orderID}</h6>
                <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> ${order.cafeteriaName}</p>
            </div>
        </div>
    `;

  order.meals.forEach((meal) => {
    orderHTML += `
            <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="me-2 text-success">&middot;</div>
                    <div class="media-body">
                        <p class="m-0">${meal.mealName}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group mb-0">
                        <input type="number" class="form-control w-20" id="quantity-${meal.mealID}" name="quantity" value="${meal.quantity}" required>
                    </div>
                    <p class="text-gray mb-0 float-end ms-2 text-muted small">GHS ${meal.price}</p>
                </div>
            </div>
        `;
  });

  orderHTML += `
    <br>
      <div class="input-group" mt-5>
                <span class="input-group-text" id="message"
                  ><i class="feather-message-square"></i
                ></span>
                <textarea
                  placeholder="Any suggestions? We will pass it on..."
                  aria-label="With textarea"
                  class="form-control"
                ></textarea>
              </div>

        <div class="bg-white p-3 clearfix border-bottom">
            <p class="mb-1">Item Total <span class="float-end text-dark"> ${order.meals.length} X </span></p>
            <br>

            <h6 class="fw-bold mb-0">TO PAY <span class="float-end">GHS ${order.orderTotal}</span></h6>
        </div>
        <div class="p-3">
            <a class="btn btn-success w-100 btn-lg" href="checkout.php?orderID=${order.orderID}">Proceed to Checkout <i class="feather-arrow-right"></i></a>
        </div>
    `;

  container.innerHTML = orderHTML;
}

function renderNoOrdersMessage() {
  const noOrdersDiv = document.createElement("div");
  noOrdersDiv.classList.add(
    "p-3",
    "rounded",
    "shadow-sm",
    "bg-white",
    "text-center"
  );
  noOrdersDiv.innerHTML = `
        <p class="fw-bold text-muted">No orders found</p>
        <p>It looks like you haven't placed any orders yet.</p>
        <a href="home.php" class="btn btn-primary">Browse Meals</a>
    `;
  return noOrdersDiv;
}





