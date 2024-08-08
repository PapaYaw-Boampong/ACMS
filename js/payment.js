document.addEventListener('DOMContentLoaded', function () {

    const saveButton = document.querySelector('#savePreference');
    saveButton.addEventListener('click', function () {
      const selectedOption = document.querySelector('input[name="deliveryPickup"]:checked').value;
      const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
      const orderID = 1; // Replace with dynamic orderID if needed
      const paymentID = document.getElementById('paymentIDField').value; 

      fetch('../actions/PaymentManagementService/put/updateOrderDetails.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          orderID: orderID,
          deliveryPickup: selectedOption,
          paymentMethod: selectedPaymentMethod,
          paymentID: paymentID,
        }),
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          alert('Preference saved successfully!');
        } else {
          alert('Error saving preference: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Failed to save preference.');
      });
    });

    const modal = document.getElementById('exampleModal');
    const addressIDField = document.getElementById('addressIDField');
    const addressField = document.getElementById('addressField');
    const instructionField = document.getElementById('instructionField');

    modal.addEventListener('show.bs.modal', async (event) => {
      // Assume you have a way to get the addressID; for example, from a button data attribute
      const addressID = 1;

      // Set the hidden field with the addressID
      addressIDField.value = addressID;

      try {
        // Fetch the address data
        const response = await fetch(`../actions/PaymentManagementService/get/fetchAddress.php?addressID=${addressID}`);
        const data = await response.json();

        // Populate the form fields
        addressField.value = data.address;
        instructionField.value = data.deliveryInstruction;
      } catch (error) {
        console.error('Error fetching address data:', error);
      }
    });

    document.getElementById('saveChangesBtn').addEventListener('click', async () => {
      const addressID = addressIDField.value;
      const address = addressField.value;
      const deliveryInstruction = instructionField.value;

      try {
        // Send updated data to server
        const response = await fetch('../actions/PaymentManagementService/put/updateAddress.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            addressID,
            address,
            deliveryInstruction,
          }),
        });

        if (response.ok) {
          // Optionally handle a successful update
          console.log('Address updated successfully');
        } else {
          console.error('Error updating address');
        }
      } catch (error) {
        console.error('Error:', error);
      }
    });
  });

  // Example of paying using Paystack API
  document.getElementById('payButton').addEventListener('click', function (event) {
    event.preventDefault();

    // Get the amount to be paid
    const amount = 60 * 100;

    // Initialize Paystack payment
    const handler = PaystackPop.setup({
      key: 'pk_test_4956ceabc8e23826517b60fc6853310bf79974b7', // Replace with your Paystack public key
      email: 'akooku12@gmail.com', // Replace with the customer's email address
      amount: amount, // Amount to be charged
      currency: 'GHS', // Currency code
      callback: function(response) {
        // This function will be called when the payment is successful
        // You can handle the successful payment here
        console.log('Payment successful. Reference:', response.reference);
        alert('Payment successful!');
        // Optionally, you can redirect or perform other actions
        window.location.href = 'successful.html'; // Redirect to a success page or handle post-payment actions
      },
      onClose: function() {
        // This function will be called if the user closes the Paystack popup
        alert('Payment window closed.');
      }
    });

    // Open the Paystack payment modal
    handler.openIframe();
  });