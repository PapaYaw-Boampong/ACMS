document.addEventListener("DOMContentLoaded", function() {
    fetchOrderDetails();
});

function fetchOrderDetails() {
    const orderID = 4; // Example order ID
    
    const url = `../actions/OrderService/get/OrderInfo.php?orderID=${orderID}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderOrderDetails(data.data);
            } else {
                console.error("No order found");
            }
        })
        .catch(error => console.error("Error fetching order details:", error));
}

function renderOrderDetails(order) {
    const container = document.getElementById('orderDetailsContainer');
    container.innerHTML = ''; // Clear previous contents

    const orderElement = createOrderElement(order);
    container.appendChild(orderElement);
}

function createOrderElement(order) {
    const orderDiv = document.createElement('div');
    orderDiv.classList.add('osahan-status');
    orderDiv.innerHTML = `
        <div class="p-3 status-order bg-white border-bottom d-flex align-items-center space-between">
            <p class="m-0">
                <i class="feather-calendar text-primary"></i> ${new Date(order.orderDate).toLocaleDateString()} ${new Date(order.orderDate).toLocaleTimeString()}
            </p>
        </div>
        <div class="p-3 border-bottom">
            <h6 class="fw-bold">Order Status</h6>
            <p class="m-0">${order.status}</p>
        </div>
        <div class="p-3 border-bottom bg-white">
            <h6 class="fw-bold">PickUp Type</h6>
            <p class="m-0 ">${order.deliveryStatus}</p>
        </div>
        <div class="p-3 border-bottom">
            <h6 class="fw-bold">Meals</h6>
            <ul class="list-unstyled m-0">
                ${order.meals.map(meal => `
                    <li class="d-flex justify-content-between">
                        <span>${meal.mealName}   X    ${meal.quantity}</span>
                        <span>$${meal.price}</span>
                    </li>
                `).join('')}
            </ul>
        </div>
        <div class="p-3 bg-white">
            <div class="d-flex align-items-center mb-2">
                <h6 class="fw-bold mb-1">Total Cost</h6>
                <h6 class="fw-bold ms-auto mb-1">GHS ${order.orderTotal}</h6>
            </div>
            <p class="m-0  text-muted">
                This looks Yummy <br /> Good Choice :)
            </p>
        </div>
    `;
    return orderDiv;
}

function renderNoOrdersMessage() {
    const noOrdersDiv = document.createElement('div');
    noOrdersDiv.classList.add('p-3', 'rounded', 'shadow-sm', 'bg-white', 'text-center');
    noOrdersDiv.innerHTML = `
        <p class="fw-bold text-muted">No orders found</p>
        <p>It looks like you haven't placed any orders yet.</p>
        <a href="home.php" class="btn btn-primary">Browse Meals</a>
    `;
    return noOrdersDiv;
}