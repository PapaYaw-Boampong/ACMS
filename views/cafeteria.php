<!-- Include Connection File -->
<?php
// session_start();
include('../settings/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Askbootstrap" />
    <meta name="author" content="Askbootstrap" />
    <link rel="icon" type="image/png"  href="../img/fav.png"/>
    <title>Ashesi Eats</title>

    <link
      href="../vendor/slick/slick/slick.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="../vendor/slick/slick/slick-theme.css"
      rel="stylesheet"
      type="text/css"
    />

    <link href="../vendor/icons/feather.css" rel="stylesheet" type="text/css" />

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../css/style.css" rel="stylesheet" />

    <link href="../vendor/sidebar/demo.css" rel="stylesheet" />
  </head>
  <body class="fixed-bottom-bar">
    <special-header></special-header>
    <div class="d-none">
      <div class="bg-primary p-3 d-flex align-items-center">
        <a class="toggle togglew toggle-2" href="#"><span></span></a>
        <h4 class="fw-bold m-0 text-white">Cafeteria Menu</h4>
      </div>
    </div>
    <div class="offer-section py-4">
      <div class="container position-relative">
        <img alt="#" src="../img/trending1.png" class="restaurant-pic" />
        <div class="pt-3 text-white">
          <h2 class="fw-bold">Munchies Extra</h2>
          <p class="text-white m-0">Inside Ashesi University</p>
          <div class="rating-wrap d-flex align-items-center mt-2">
            <ul class="rating-stars list-unstyled">
              <li>
                <i class="feather-star text-warning"></i>
                <i class="feather-star text-warning"></i>
                <i class="feather-star text-warning"></i>
                <i class="feather-star text-warning"></i>
                <i class="feather-star"></i>
              </li>
            </ul>
            <p class="label-rating text-white ms-2 small">(245 Reviews)</p>
          </div>
        </div>
        <div class="pb-4">
          <div class="row">
            <div class="col-6 col-md-2">
              <p class="text-white-50 fw-bold m-0 small">Delivery</p>
              <p class="text-white m-0">GHS 5</p>
            </div>
            <div class="col-6 col-md-2">
              <p class="text-white-50 fw-bold m-0 small">Open time</p>
              <p class="text-white m-0">12:00 PM</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="p-3 bg-primary mt-n3 rounded position-relative" id="con1">
        <div class="d-flex align-items-center">
          <div class="feather_icon">
            <a
              href="#ratings-and-reviews"
              class="text-decoration-none text-dark"
              ><i class="p-2 bg-light rounded-circle fw-bold feather-upload"></i
            ></a>
            <a
              href="#ratings-and-reviews"
              class="text-decoration-none text-dark mx-2"
              ><i class="p-2 bg-light rounded-circle fw-bold feather-star"></i
            ></a>
            <a
              href="#ratings-and-reviews"
              class="text-decoration-none text-dark"
              ><i
                class="p-2 bg-light rounded-circle fw-bold feather-map-pin"
              ></i
            ></a>
          </div>
          <a href="contact-us.html" class="btn btn-sm btn-outline-light ms-auto"
            >Contact</a
          >
        </div>
      </div>
    </div>

    <div class="container position-relative">
      <div class="row">
        <div class="col-md-8 pt-3">
          <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
            <div class="d-flex item-aligns-center">
              <p class="fw-bold h6 p-3 border-bottom mb-0 w-100">Current Meals</p>
            </div>
            
            
            <div class="row m-0">
                <h6 class="p-3 m-0 bg-light w-100">
                  Meals <small class="text-black-50">ITEMS</small>
                </h6>
                <div class="col-md-12 px-0 border-top">
                  <ul class="list-group" id="mealList"></ul>
                </div>
              </div>

              
          </div>
          
          <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
            <div class="d-flex item-aligns-center">
              <p class="fw-bold h6 p-3 border-bottom mb-0 w-100">Archived Meals</p>
            </div>
            
            
            <div class="row m-0">
                <h6 class="p-3 m-0 bg-light w-100">
                  Meals <small class="text-black-50">ITEMS</small>
                </h6>
                <div class="col-md-12 px-0 border-top">
                    <ul class="list-group" id="archivedMealList"></ul>
                </div>
              </div>

              
          </div>
          
        </div>
        <div class="col-md-4 pt-3">
            <div
              class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar"
            >
              <div
                class="d-flex border-bottom osahan-cart-item-profile bg-white p-3"
              >
                <img
                  alt="osahan"
                  src="../img/starter1.jpg"
                  class="me-3 rounded-circle img-fluid"
                />
                <div class="d-flex flex-column">
                  <h6 class="mb-1 fw-bold">Munchies Extra</h6>
                  <p class="mb-0 small text-muted">
                    <i class="feather-map-pin"></i> Inside Ashesi University
                  </p>
                </div>
              </div>
              <div class="bg-white border-bottom py-2">

                
                <div
                  class="gold-members align-items-center justify-content-between px-3 py-2"
                >
                  
                <form id="addMealForm">
                  <div class="form-group mb-3">
                      <label for="mealName">Meal Name</label>
                      <input type="text" class="form-control" id="mealName" name="mealName" required>
                  </div>
                  <div class="form-group mb-3">
                      <label for="mealPrice">Price</label>
                      <input type="number" class="form-control" id="mealPrice" name="mealPrice" required>
                  </div>
                  <div class="form-group mb-3">
                      <label for="mealQuantity">Quantity</label>
                      <input type="number" class="form-control" id="mealQuantity" name="mealQuantity" required>
                  </div>
                  <div class="col-md-12 px-0 border-top">
                      <div class="py-3">
                          <button type="submit" class="btn btn-lg w-100 btn-primary">Add Meal</button>
                      </div>
                  </div>
              </form>

                
                
                </div>
              </div>
              
            </div>
          </div>
      </div>
    </div>

    <div
      class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none"
    >
      <div class="row">
        <div class="col">
          <a
            href="home.html"
            class="text-dark small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
            Home
          </a>
        </div>
        <div class="col selected">
          <a
            href="trending.html"
            class="text-danger small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-map-pin"></i></p>
            Trending
          </a>
        </div>
        <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
          <div class="bg-danger rounded-circle mt-n0 shadow">
            <a
              href="checkout.html"
              class="text-white small fw-bold text-decoration-none"
            >
              <i class="feather-shopping-cart"></i>
            </a>
          </div>
        </div>
        <div class="col">
          <a
            href="favorites.html"
            class="text-dark small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-heart"></i></p>
            Favorites
          </a>
        </div>
        <div class="col">
          <a
            href="profile.html"
            class="text-dark small fw-bold text-decoration-none"
          >
            <p class="h4 m-0"><i class="feather-user"></i></p>
            Profile
          </a>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <special-footer></special-footer>
    
    <nav id="main-nav"></nav>

    <!-- Edit Meal Modal -->
<div class="modal fade" id="editMealModal" tabmeal.mealID="-1" aria-labelledby="editMealModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMealModalLabel">Edit Meal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editMealForm">
            <div class="form-group mb-3">
              <label for="editMealName">Meal Name</label>
              <input type="text" class="form-control" id="editMealName" name="editMealName" required>
            </div>
            <div class="form-group mb-3">
              <label for="editMealPrice">Price</label>
              <input type="number" class="form-control" id="editMealPrice" name="editMealPrice" required>
            </div>
            <input type="hidden" id="editMealID">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  

    <script
      type="7e678b0dbcbf2a926c40af51-text/javascript"
      src="../vendor/jquery/jquery.min.js"
    ></script>

    
    <script
      type="7e678b0dbcbf2a926c40af51-text/javascript"
      src="../vendor/bootstrap/js/bootstrap.bundle.min.js"
    ></script>

    <script
      type="7e678b0dbcbf2a926c40af51-text/javascript"
      src="../vendor/slick/slick/slick.min.js"
    ></script>

    <script
      type="7e678b0dbcbf2a926c40af51-text/javascript"
      src="../vendor/sidebar/hc-offcanvas-nav.js"
    ></script>

    <script
      type="7e678b0dbcbf2a926c40af51-text/javascript"
      src="../js/osahan.js"
    ></script>
    <script
      src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="7e678b0dbcbf2a926c40af51-|49"
      defer
    ></script>
    <script
      defer
      src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
      integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
      data-cf-beacon='{"rayId":"8a5eb09f3977639d","version":"2024.7.0","r":1,"serverTiming":{"name":{"cfL4":true}},"token":"dd471ab1978346bbb991feaa79e6ce5c","b":1}'
      crossorigin="anonymous"
    ></script>
    <script src="../js/headerFooterManager.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
          fetchMeals();

          function fetchMeals() {
              fetch('../actions/fetchMeals.php')
                  .then(response => response.json())
                  .then(data => {
                      console.log('Fetched data:', data);

                      const currentMealList = document.getElementById('mealList');
                      const archivedMealList = document.getElementById('archivedMealList');
                      currentMealList.innerHTML = '';
                      archivedMealList.innerHTML = '';

                      data.currentMeals.forEach((meal) => {
                          const li = document.createElement('li');
                          li.className = 'list-group-item';
                          li.innerHTML = `
                              <div class="d-flex align-items-center">
                                  <img src="../img/starter1.jpg" class="img-fluid rounded" />
                                  <div class="ps-3">
                                      <h6 class="mb-1 fw-bold">${meal.mealName}</h6>
                                      <p class="text-muted mb-0">GHS ${meal.mealPrice}</p>
                                  </div>
                                  <div class="ms-auto">
                                      <input type="number" class="form-control d-inline-block w-25 mr-2" value="${meal.mealQuantity}" data-mealID="${meal.mealID}" onchange="updateMealQuantity(event)">
                                      <button class="btn btn-warning btn-sm" onclick="editMeal(${meal.mealID})">Edit</button>
                                      <button class="btn btn-danger btn-sm" onclick="removeMeal(${meal.mealID})">Remove</button>
                                  </div>
                              </div>
                          `;
                          currentMealList.appendChild(li);
                      });

                      data.archivedMeals.forEach((meal) => {
                          const li = document.createElement('li');
                          li.className = 'list-group-item';
                          li.innerHTML = `
                              <div class="d-flex align-items-center">
                                  <img src="../img/starter1.jpg" class="img-fluid rounded" />
                                  <div class="ps-3">
                                      <h6 class="mb-1 fw-bold">${meal.mealName}</h6>
                                      <p class="text-muted mb-0">GHS ${meal.mealPrice}</p>
                                  </div>
                                  <div class="ms-auto">
                                      <button class="btn btn-success btn-sm" onclick="restoreMeal(${meal.mealID})">Restore</button>
                                  </div>
                              </div>
                          `;
                          archivedMealList.appendChild(li);
                      });
                  });
          }

          // Add meal
          document.getElementById('addMealForm').addEventListener('submit', function(e) {
              e.preventDefault();
              var formData = new FormData(this);
              const mealData = {
                  mealName: formData.get('mealName'),
                  mealPrice: formData.get('mealPrice'),
                  mealQuantity: formData.get('mealQuantity')
              };

              fetch('../actions/addMeal.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(mealData)
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      fetchMeals(); // Refresh meals
                      this.reset(); // Reset the form fields
                  } else {
                      alert('Failed to add meal: ' + data.message);
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
              });
          });

          // Show edit modal with current meal data
          window.editMeal = (mealID) => {
            fetch(`../actions/editMeal.php?mealID=${mealID}`)
                .then(response => response.json())
                .then(meal => {
                    if (meal.error) {
                        console.error('Error fetching meal:', meal.error);
                        return;
                    }
                    document.getElementById('editMealName').value = meal.mealName;
                    document.getElementById('editMealPrice').value = meal.mealPrice;
                    document.getElementById('editMealID').value = meal.mealID;
                    new bootstrap.Modal(document.getElementById('editMealModal')).show();
                })
                .catch(error => console.error('Error fetching meal:', error));
        };



          // Save changes to the meal
          document.getElementById('editMealForm').addEventListener('submit', function(e) {
              e.preventDefault();

              const mealID = document.getElementById('editMealID').value;
              const updatedMeal = {
                  mealID: mealID,
                  mealName: document.getElementById('editMealName').value,
                  mealPrice: parseFloat(document.getElementById('editMealPrice').value),
              };

              fetch('../actions/editMeal.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(updatedMeal)
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      fetchMeals(); // Refresh meals
                      new bootstrap.Modal(document.getElementById('editMealModal')).hide(); // Hide modal
                  } else {
                      alert('Failed to update meal: ' + data.message);
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
              });
          });




          // Update meal quantity
          window.updateMealQuantity = (e) => {
              const mealID = parseInt(e.target.getAttribute('data-mealID'), 10);
              const quantity = parseInt(e.target.value, 10);

              fetch('../actions/updateMealQuantity.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ mealID, quantity })
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      fetchMeals(); // Refresh meals
                  } else {
                      alert('Failed to update meal quantity: ' + data.message);
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
              });
          };

          // Remove meal
          window.removeMeal = (mealID) => {
              fetch('../actions/removeMeal.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ mealID })
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      fetchMeals(); // Refresh meals
                  } else {
                      alert('Failed to remove meal: ' + data.message);
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
              });
          };

          // Restore meal
          window.restoreMeal = (mealID) => {
              fetch('../actions/restoreMeal.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ mealID })
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      fetchMeals(); // Refresh meals
                  } else {
                      alert('Failed to restore meal: ' + data.message);
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
              });
          };
      });

</script>

  </body>

</html>