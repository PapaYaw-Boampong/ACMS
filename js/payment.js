////////////////////side pane for orders/////////////////////////

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
    
                <h6 class="fw-bold mb-0">TO PAY <span class="float-end" id=TotalAmount>GHS ${order.orderTotal}</span></h6>
            </div>
            <div class="p-3">
                <a class="btn btn-success w-100 btn-lg" href="#" id="payButton"> Pay <i class="feather-arrow-right"></i></a>
            </div>
        `;
  
    container.innerHTML = orderHTML;
  
    // Attach the event listener for the payment button here
    document
      .getElementById("payButton")
      .addEventListener("click", function (event) {
        event.preventDefault();
  
        // Get the selected payment method
        const selectedPaymentMethodID = document.querySelector(
          'input[name="paymentMethod"]:checked'
        ).value;
  
        const totalAmountElement = document.querySelector("#TotalAmount");
  
        // Get the content of the span
        const totalAmountText = totalAmountElement.textContent;
  
        // Optional: Extract the numerical value if needed
        const totalAmountValue = parseFloat(
          totalAmountText.replace("GHS", "").trim()
        );
        const amount = totalAmountValue;
  
        if (selectedPaymentMethodID == 1 || selectedPaymentMethodID == 2) {
          // Trigger Paystack API for methods 1 and 2
          const handler = PaystackPop.setup({
            key: "pk_test_4956ceabc8e23826517b60fc6853310bf79974b7", // Replace with your Paystack public key
            email: "akooku12@gmail.com", // Replace with the customer's email address
            amount: amount * 100, // Amount to be charged in pesowas
            currency: "GHS", // Currency code
            callback: function (response) {
              console.log("Payment successful. Reference:", response.reference);
              Swal.fire({
                title: "Payment Successful!",
                text:
                  "Your payment was successful. Reference: " + response.reference,
                icon: "success",
                confirmButtonText: "OK",
              }).then(() => {
                window.location.href = "successful.html"; // Redirect to a success page
              });
            },
            onClose: function () {
              Swal.fire({
                title: "Payment Cancelled",
                text: "You closed the payment window.",
                icon: "warning",
                confirmButtonText: "OK",
              });
            },
          });
          handler.openIframe();
        } else if (selectedPaymentMethodID == 3) {
          // Handle meal plan verification for method 3
          fetch("../actions/PaymentManagementService/get/checkMealPlan.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              userID: userID,
              orderID: orderID,
              paymentID: paymentID,
              amount: amount,
            }),
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success" && data.balanceSufficient) {
                // Deduct from meal plan
                return fetch(
                  "../actions/PaymentManagementService/put/deductMealPlan.php",
                  {
                    method: "POST",
                    headers: {
                      "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                      userID: userID,
                      amount: amount,
                    }),
                  }
                );
              } else {
                throw new Error("Insufficient balance in meal plan.");
              }
            })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                Swal.fire({
                  title: "Payment Successful!",
                  text: "Your payment was successful.",
                  icon: "success",
                  confirmButtonText: "OK",
                }).then(() => {
                  window.location.href = "successful.html"; // Redirect to a success page
                });
              } else {
                throw new Error("Failed to deduct meal plan balance.");
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              Swal.fire({
                title: "Payment Failed!",
                text: error.message,
                icon: "error",
                confirmButtonText: "OK",
              });
            });
        } else if (selectedPaymentMethodID == 4) {
          // Directly proceed for method 4
          Swal.fire({
            title: "Payment Successful!",
            text: "Your payment was successful. Please make sure to pay with cash.",
            icon: "success",
            confirmButtonText: "OK",
          }).then(() => {
            window.location.href = "successful.html"; // Redirect to a success page
          });
        }
  
        localStorage.setItem("currentOrderID", -1);
      });
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
  
  ///////////////////
  
  document.addEventListener("DOMContentLoaded", function () {
    // Fetch payment methods and populate the payment methods container
    fetchPaymentMethods();
  
    const params = new URLSearchParams(window.location.search);
    const orderID = params.get("orderID");
  
    const paymentID = 1;
  
    const saveButton = document.querySelector("#savePreference");
    saveButton.addEventListener("click", function () {
      const selectedOption = document.querySelector(
        'input[name="deliveryPickup"]:checked'
      ).value;
      const selectedPaymentMethodID = document.querySelector(
        'input[name="paymentMethod"]:checked'
      ).value;
  
      fetch("../actions/PaymentManagementService/put/updateOrderDetails.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderID: orderID,
          deliveryPickup: selectedOption,
          paymentMethodID: selectedPaymentMethodID,
          paymentID: paymentID,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "success") {
            Swal.fire({
              title: "Success!",
              text: "Preference saved successfully!",
              icon: "success",
              confirmButtonText: "OK",
            });
          } else {
            Swal.fire({
              title: "Error!",
              text: "Error saving preference: " + data.message,
              icon: "error",
              confirmButtonText: "OK",
            });
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          Swal.fire({
            title: "Failed!",
            text: "Failed to save preference.",
            icon: "error",
            confirmButtonText: "OK",
          });
        });
    });
  
    // Function to fetch payment methods and populate the payment methods
    function fetchPaymentMethods() {
      fetch("../actions/PaymentManagementService/get/fetchPaymentMethods.php")
        .then((response) => response.json())
        .then((data) => {
          console.log("Data fetched:", data);
          const container = document.getElementById("payment-methods-container");
          container.innerHTML = "";
          if (Array.isArray(data)) {
            data.forEach((method) => {
              const methodHTML = `
                            <div class="col-lg-3 col-md-6">
                                <div class="form-check position-relative border-custom-radio p-0">
                                    <input type="radio" id="paymentMethod${
                                      method.methodID
                                    }" name="paymentMethod" value="${
                method.methodID
              }" class="form-check-input" />
                                    <label class="form-check-label w-100 border rounded" for="paymentMethod${
                                      method.methodID
                                    }"></label>
                                    <div>
                                        <div class="p-3 rounded rounded-bottom-0 bg-white shadow-sm w-100" style="min-height: 80px;">
                                            <div class="d-flex align-items-center mb-2">
                                                <h6 class="mb-0">${
                                                  method.payment_method
                                                }</h6>
                                                <p class="mb-0 badge text-bg-light ms-auto"></p>
                                            </div>
                                            ${
                                              method.method_description
                                                ? `<p class="meal-plan-details text-muted mb-0">${method.method_description}</p>`
                                                : ""
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
              container.innerHTML += methodHTML;
            });
          } else {
            console.error("Unexpected data format:", data);
          }
        })
        .catch((error) => {
          console.error("Error fetching payment methods:", error);
        });
    }
    
  });
  