document.addEventListener("DOMContentLoaded", function() {
    fetchOrders();
  });
  
  function fetchOrders() {
    const userID = 1; // Example user ID
    const limit = 10; // Example limit
    const status = null; // Example status
    
    const url = `../actions/OrderService/get/Orders.php?userID=1`;
  
    fetch(url)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          renderOrders(data.data);
          console
        } else {
          console.error("No orders found");
        }
      })
      .catch(error => console.error("Error fetching orders:", error));
  }
  
  function renderOrders(groupedOrders) {
    const completedOrders = document.getElementById('completed');
    const progressOrders = document.getElementById('progress');
    const canceledOrders = document.getElementById('canceled');
  
    renderOrderList(groupedOrders.READY, completedOrders);
    renderOrderList(groupedOrders.IN_PROGRESS, progressOrders);
    renderOrderList(groupedOrders.CANCELED, canceledOrders);
  }
  
  function renderOrderList(orders, container) {
    container.innerHTML = ''; // Clear previous contents
    orders.forEach(order => {
      const orderElement = createOrderElement(order);
      container.appendChild(orderElement);
    });
  }
  
  function createOrderElement(order) {
    const orderDiv = document.createElement('div');
    orderDiv.classList.add('pb-3');
    orderDiv.innerHTML = `
      <div class="p-3 rounded shadow-sm bg-white">
        <div class="d-flex border-bottom pb-3">
          <div class="text-muted me-3">
            <img alt="#" src="../img/popular5.png" class="img-fluid order_img rounded" />
          </div>
          <div>
            <p class="mb-0 fw-bold"><a href="restaurant.html" class="text-dark">${order.cafeteriaName}</a></p>
            <p class="text- fw-bold mb-0">${order.mealName} x ${order.quantity}</p>
            <p>ORDER #${order.orderID}</p>
            <p class="mb-0 small"><a href="orderDetails.php">View Details</a></p>
          </div>
          <div class="ms-auto">
            <p class="bg-success text-white py-1 px-2 rounded small text-center mb-1">${order.status}</p>
            <p class="small fw-bold text-center"><i class="feather-clock"></i> ${new Date(order.orderDate).toLocaleDateString()}</p>
          </div>
        </div>
        <div class="d-flex pt-3">
          <div class="small">
           
          </div>
          <div class="text-muted m-0 ms-auto me-3 small">
            Total Payment<br />
            <span class="text-dark fw-bold">GHS ${order.price}</span>
          </div>
          <div class="text-end">
            <a href="checkout.html" class="btn btn-primary px-3">Reorder</a>
            <a href="contact-us.html" class="btn btn-outline-primary px-3">Rate</a>
          </div>
        </div>
      </div>
    `;
    return orderDiv;
  }
  