
document.addEventListener("DOMContentLoaded", function() {
    fetchRecentsMeals();
});

function fetchRecentsMeals() {
    const userID= 1;
    const url = `../actions/CafeteriaManagementService/get/recentMeals.php?userID=${userID}`; 

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.length > 0) {
                const RecentssContainer = document.querySelector('.most_popular.py-5'); // Directly target the specified container
                let row; // Variable to hold the current row element

                data.data.forEach((meal, index) => {
                    // Create a new row for every three meals or if it's the first meal
                    if (index % 3 === 0) {
                        row = document.createElement('div');
                        row.className = 'row';
                        RecentssContainer.appendChild(row); // Append the new row to the container
                    }
                    const mealElement = createRecentsMealElement(meal);
                    row.appendChild(mealElement); // Append the meal card to the current row
                });
            } else {
                console.error("No Recents meals found");
                RecentssContainer.innerHTML = '<p class="fw-bold text-muted">No orders found</p>';
            }
        })
        .catch(error => {
            console.error("Error fetching Recents meals:", error);
            RecentssContainer.innerHTML = '<div class="col-12 text-center">Error loading meals.</div>';
        });
}

function createRecentsMealElement(meal) {
    const columnDiv = document.createElement("div");
    columnDiv.className = "col-md-4 mb-3";

    columnDiv.innerHTML = `
        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">
            <div class="list-card-image">
                <div class="star position-absolute">
                    <span class="badge text-bg-success"><i class="feather-star"></i>( ${meal.avgRating} ++)</span>
                </div>
                <div class="favourite-heart text-danger position-absolute rounded-circle">
                    <a href="#"><i class="feather-heart"></i></a>
                </div>
              
                <a href="restaurant.html" class = "order-trigger">
                    <img alt="#" src="../img/trending1.png" class="img-fluid item-img w-100" />
                </a>
            </div>
            <div class="p-3 position-relative">
                <div class="list-card-body">
                    <h6 class="mb-1"><a href="restaurant.php?cafID = ${meal.cafeteriaID} &mealID =${meal.cafeteriaName}" class="text-black">${meal.name}</a></h6>
                    <p class="text-gray mb-3">${meal.timeframe} • GHS ${meal.price}</p>
                    <p class="text-gray mb-3 time">
                        <span class="bg-light text-dark rounded-sm py-1 px-2"><i class="feather-clock"></i> 15–25 min</span>
                    </p>
                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">${meal.cafeteriaName}</a></h6>
                </div>
            </div>
        </div>
    `;

    return columnDiv;
}










    