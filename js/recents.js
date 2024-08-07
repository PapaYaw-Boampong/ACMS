
document.addEventListener("DOMContentLoaded", function() {
    fetchFavoriteMeals();
});

function fetchFavoriteMeals() {
    const url = '../actions/CafeteriaManagementService/get/popularMeals.php'; // Change this to your actual API endpoint

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.length > 0) {
                const favoritesContainer = document.querySelector('.most_popular.py-5'); // Directly target the specified container
                let row; // Variable to hold the current row element

                data.data.forEach((meal, index) => {
                    // Create a new row for every three meals or if it's the first meal
                    if (index % 3 === 0) {
                        row = document.createElement('div');
                        row.className = 'row';
                        favoritesContainer.appendChild(row); // Append the new row to the container
                    }
                    const mealElement = createFavoriteMealElement(meal);
                    row.appendChild(mealElement); // Append the meal card to the current row
                });
            } else {
                console.error("No favorite meals found");
                favoritesContainer.innerHTML = '<div class="col-12 text-center">No favorite meals found.</div>';
            }
        })
        .catch(error => {
            console.error("Error fetching favorite meals:", error);
            favoritesContainer.innerHTML = '<div class="col-12 text-center">Error loading meals.</div>';
        });
}

function createFavoriteMealElement(meal) {
    const columnDiv = document.createElement("div");
    columnDiv.className = "col-md-4 mb-3";

    columnDiv.innerHTML = `
        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">
            <div class="list-card-image">
                <div class="star position-absolute">
                    <span class="badge text-bg-success"><i class="feather-star"></i> 3.1 (300+)</span>
                </div>
                <div class="favourite-heart text-danger position-absolute rounded-circle">
                    <a href="#"><i class="feather-heart"></i></a>
                </div>
                <div class="member-plan position-absolute">
                    <span class="badge text-bg-dark">Promoted</span>
                </div>
                <a href="restaurant.html">
                    <img alt="#" src="../img/trending1.png" class="img-fluid item-img w-100" />
                </a>
            </div>
            <div class="p-3 position-relative">
                <div class="list-card-body">
                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">${meal.name}</a></h6>
                    <p class="text-gray mb-3">${meal.timeframe} • $${meal.price}</p>
                    <p class="text-gray mb-3 time">
                        <span class="bg-light text-dark rounded-sm py-1 px-2"><i class="feather-clock"></i> 15–25 min</span>
                        <span class="float-end text-black-50"> GHS ${(meal.price * 2).toFixed(2)} FOR TWO</span>
                    </p>
                </div>
            </div>
        </div>
    `;

    return columnDiv;
}









    