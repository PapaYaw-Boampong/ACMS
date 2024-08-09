document.addEventListener("DOMContentLoaded", function() {
    // Use URLSearchParams to get the mealID and cafID from the URL
    const params = new URLSearchParams(window.location.search);
    const mealID = params.get('mealID');
    const cafID = params.get('cafID'); // Assuming cafID is also present in the URL

    if (mealID) {
        const quantity = 1; // Default quantity
        const userID = 1; // Replace with actual userID from your session or local storage
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

                // Clear the mealID and cafID parameters from the URL after processing
                params.delete('mealID');
                params.delete('cafID');
                const newUrl = `${window.location.pathname}?${params.toString()}`;
                history.replaceState(null, '', newUrl);
            }
        });
    }
});

function updateOrder(orderID, mealID, quantity, cafID) {
    fetch('../actions/OrderService/put/updateOrder.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ orderID, mealID, quantity })
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
