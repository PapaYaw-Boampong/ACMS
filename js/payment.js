document.addEventListener('DOMContentLoaded', function () {

  // Fetch payment methods and populate the payment methods container
  fetchPaymentMethods();

  const userID = 1; // Define userID
  const orderID = 1; // Define orderID
  const paymentID = 1; // Define paymentID, if it's constant

  const saveButton = document.querySelector('#savePreference');
  saveButton.addEventListener('click', function () {
      const selectedOption = document.querySelector('input[name="deliveryPickup"]:checked').value;
      const selectedPaymentMethodID = document.querySelector('input[name="paymentMethod"]:checked').value;

      fetch('../actions/PaymentManagementService/put/updateOrderDetails.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify({
              orderID: orderID,
              deliveryPickup: selectedOption,
              paymentMethodID: selectedPaymentMethodID,
              paymentID: paymentID,
          }),
      })
      .then(response => response.json())
      .then(data => {
          if (data.status === 'success') {
              Swal.fire({
                  title: 'Success!',
                  text: 'Preference saved successfully!',
                  icon: 'success',
                  confirmButtonText: 'OK'
              });
          } else {
              Swal.fire({
                  title: 'Error!',
                  text: 'Error saving preference: ' + data.message,
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          }
      })
      .catch(error => {
          console.error('Error:', error);
          Swal.fire({
              title: 'Failed!',
              text: 'Failed to save preference.',
              icon: 'error',
              confirmButtonText: 'OK'
          });
      });
  });

  // Handle payment button click
  document.getElementById('payButton').addEventListener('click', function (event) {
      event.preventDefault();

      // Get the selected payment method
      const selectedPaymentMethodID = document.querySelector('input[name="paymentMethod"]:checked').value;
      const amount = 60

      if (selectedPaymentMethodID == 1 || selectedPaymentMethodID == 2) {
          // Trigger Paystack API for methods 1 and 2
          const handler = PaystackPop.setup({
              key: 'pk_test_4956ceabc8e23826517b60fc6853310bf79974b7', // Replace with your Paystack public key
              email: 'akooku12@gmail.com', // Replace with the customer's email address
              amount: amount * 100, // Amount to be charged in pesowas
              currency: 'GHS', // Currency code
              callback: function(response) {
                  console.log('Payment successful. Reference:', response.reference);
                  Swal.fire({
                      title: 'Payment Successful!',
                      text: 'Your payment was successful. Reference: ' + response.reference,
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then(() => {
                      window.location.href = 'successful.html'; // Redirect to a success page
                  });
              },
              onClose: function() {
                  Swal.fire({
                      title: 'Payment Cancelled',
                      text: 'You closed the payment window.',
                      icon: 'warning',
                      confirmButtonText: 'OK'
                  });
              }
          });
          handler.openIframe();
      } else if (selectedPaymentMethodID == 3) {
          // Handle meal plan verification for method 3
          fetch('../actions/PaymentManagementService/get/checkMealPlan.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                  userID: userID,
                  orderID: orderID,
                  paymentID: paymentID,
                  amount: amount
              }),
          })
          .then(response => response.json())
          .then(data => {
              if (data.status === 'success' && data.balanceSufficient) {
                  // Deduct from meal plan
                  return fetch('../actions/PaymentManagementService/put/deductMealPlan.php', {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                      },
                      body: JSON.stringify({
                          userID: userID,
                          amount: amount
                      }),
                  });
              } else {
                  throw new Error('Insufficient balance in meal plan.');
              }
          })
          .then(response => response.json())
          .then(data => {
              if (data.status === 'success') {
                  Swal.fire({
                      title: 'Payment Successful!',
                      text: 'Your payment was successful.',
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then(() => {
                      window.location.href = 'successful.html'; // Redirect to a success page
                  });
              } else {
                  throw new Error('Failed to deduct meal plan balance.');
              }
          })
          .catch(error => {
              console.error('Error:', error);
              Swal.fire({
                  title: 'Payment Failed!',
                  text: error.message,
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          });
      } else if (selectedPaymentMethodID == 4) {
          // Directly proceed for method 4
          Swal.fire({
            title: 'Payment Successful!',
            text: 'Your payment was successful. Please make sure to pay with cash.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'successful.html'; // Redirect to a success page
        });        
      }
  });

  // Function to fetch payment methods and populate the payment methods
  function fetchPaymentMethods() {
      fetch('../actions/PaymentManagementService/get/fetchPaymentMethods.php')
          .then(response => response.json())
          .then(data => {
              console.log('Data fetched:', data);
              const container = document.getElementById('payment-methods-container');
              container.innerHTML = '';
              if (Array.isArray(data)) {
                  data.forEach(method => {
                      const methodHTML = `
                          <div class="col-lg-3 col-md-6">
                              <div class="form-check position-relative border-custom-radio p-0">
                                  <input type="radio" id="paymentMethod${method.methodID}" name="paymentMethod" value="${method.methodID}" class="form-check-input" />
                                  <label class="form-check-label w-100 border rounded" for="paymentMethod${method.methodID}"></label>
                                  <div>
                                      <div class="p-3 rounded rounded-bottom-0 bg-white shadow-sm w-100" style="min-height: 80px;">
                                          <div class="d-flex align-items-center mb-2">
                                              <h6 class="mb-0">${method.payment_method}</h6>
                                              <p class="mb-0 badge text-bg-light ms-auto"></p>
                                          </div>
                                          ${method.method_description ? `<p class="meal-plan-details text-muted mb-0">${method.method_description}</p>` : ''}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      `;
                      container.innerHTML += methodHTML;
                  });
              } else {
                  console.error('Unexpected data format:', data);
              }
          })
          .catch(error => {
              console.error('Error fetching payment methods:', error);
          });
  }
});
