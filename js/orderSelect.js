document.addEventListener("DOMContentLoaded", function() {
    const sliderItems = document.querySelectorAll('.order-trigger');

    sliderItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const mealID = item.getAttribute('data-mealid');
            const cafID = item.getAttribute('data-cafid');
            createOrder(mealID, cafID);
        });
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const sliderItems = document.querySelectorAll('.order-trigger');

    sliderItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const mealID = item.getAttribute('data-mealid');
            const cafID = item.getAttribute('data-cafid');
            const userID = 1; // Example user ID, you should replace this with the actual user ID
            const quantity = 1; // Example quantity

            const flag = localStorage.getItem('currentOrderID');

            if (flag !== -1 ) {
                updateOrder(userID, mealID, quantity, cafID);
            } else {
                createOrder(userID, mealID, quantity, cafID);
            }
        });
    });
});

function createOrder(userID, mealID, quantity, cafID) {
    $.ajax({
        url: 'path/to/create/order/endpoint.php', // Replace with the actual path to your create order endpoint
        type: 'POST',
        data: {
            userID: userID,
            mealID: mealID,
            quantity: quantity
        },
        success: function(response) {
            const result = JSON.parse(response);
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
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred while creating the order.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function updateOrder(userID, mealID, quantity, cafID) {
    const orderID = localStorage.getItem('currentOrderID');
    $.ajax({
        url: 'path/to/update/order/endpoint.php', // Replace with the actual path to your update order endpoint
        type: 'POST',
        data: {
            userID: userID,
            mealID: mealID,
            quantity: quantity,
            orderID: orderID
        },
        success: function(response) {
            const result = JSON.parse(response);
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
        },
        error: function(xhr, status, error) {
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred while updating the order.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}



