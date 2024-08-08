document.addEventListener("DOMContentLoaded", function () {
    // const flag = localStorage.getItem("currentOrderID") ? localStorage.getItem("currentOrderID"): -1;

    // if (flag !== -1) {
    //   fetchOrderDetails(flag);
    // } else {
    //   renderNoOrdersMessage();
    // }

    fetchOrderDetails(2);
});

function fetchOrderDetails(orderId) {
  const url = `../actions/OrderService/get/OrderInfo.php?orderID=${4}`;

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
                        <input type="number" class="form-control" id="quantity-${meal.mealID}" name="quantity" value="${meal.quantity}" required>
                    </div>
                    <p class="text-gray mb-0 float-end ms-2 text-muted small">GHS${meal.price}</p>
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
            <a class="btn btn-success w-100 btn-lg" href="successful.html">PAY <i class="feather-arrow-right"></i></a>
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
