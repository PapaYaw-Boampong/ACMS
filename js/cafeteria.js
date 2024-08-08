document.addEventListener('DOMContentLoaded', function() {
    fetchMeals();

    function fetchMeals() {
      fetch('../actions/CafeteriaManagementService/get/fetchMeals.php')
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
                                    <h6 class="mb-1 fw-bold">${meal.name}</h6>
                                    <p class="text-muted mb-0">GHS ${meal.price}</p>
                                </div>
                                <div class="ms-auto">
                                    <input type="number" class="form-control d-inline-block w-25 mr-2" value="${meal.quantity}" data-mealID="${meal.mealID}" onchange="updatequantity(event)">
                                    <button class="btn btn-warning btn-sm" onclick="editMeal(${meal.mealID})">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="removeMeal(${meal.mealID})">Archive</button>
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
                                  <h6 class="mb-1 fw-bold">${meal.name}</h6>
                                  <p class="text-muted mb-0">GHS ${meal.price}</p>
                              </div>
                              <div class="ms-auto">
                                  <button class="btn btn-success btn-sm" onclick="restoreMeal(${meal.mealID})">Restore</button>
                                  <button class="btn btn-danger btn-sm ms-2" onclick="deleteMeal(${meal.mealID})">Delete</button>
                              </div>
                          </div>
                      `;
            archivedMealList.appendChild(li);
          });

          // Update the count of meals
          currentMealCount.textContent = `${data.currentMeals.length} ITEMS`;
          archivedMealCount.textContent = `${data.archivedMeals.length} ITEMS`;
        });
    }

    function clearFormFields(form) {
      const fields = form.querySelectorAll('input, select, textarea');
      fields.forEach(field => {
        if (field.type === 'checkbox' || field.type === 'radio') {
          field.checked = false;
        } else {
          field.value = '';
        }
      });
    }


    // Add meal
    document.getElementById('addMealForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("submitted");
        var formData = new FormData(this);
        const mealData = {
          name: formData.get('name'),
          price: formData.get('price'),
          quantity: formData.get('quantity')
        };

        fetch('../actions/CafeteriaManagementService/post/addMeal.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(mealData)
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              console.log("Meal added successfully");
              fetchMeals(); // Refresh meals
              clearFormFields(this); // Reset the form fields
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
      fetch(`../actions/CafeteriaManagementService/put/editMeal.php?mealID=${mealID}`)
        .then(response => response.json())
        .then(meal => {
          if (meal.error) {
            console.error('Error fetching meal:', meal.error);
            return;
          }
          document.getElementById('editname').value = meal.name;
          document.getElementById('editprice').value = meal.price;
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
        name: document.getElementById('editname').value,
        price: parseFloat(document.getElementById('editprice').value),
      };

      fetch('../actions/CafeteriaManagementService/put/editMeal.php', {
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
    window.updatequantity = (e) => {
      const mealID = parseInt(e.target.getAttribute('data-mealID'), 10);
      const quantity = parseInt(e.target.value, 10);

      if (quantity <= 0) {
        removeMeal(mealID);
      } else {
        fetch('../actions/CafeteriaManagementService/put/updateMealQuantity.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              mealID,
              quantity
            })
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
      }
    };

    // Function to move a meal from current to archived
    window.removeMeal = (mealID) => {
      // Send an AJAX request to update the meal status
      fetch('../actions/CafeteriaManagementService/put/removeMeal.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            mealID: mealID
          }),
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            fetchMeals(); // Refresh meals
          } else {
            console.error('Failed to update meal status:', data.error);
          }
        })
        .catch(error => console.error('Error:', error));
    };

    document.querySelectorAll('.remove-button').forEach(button => {
      button.addEventListener('click', () => {
        const mealID = button.dataset.mealId; // Or however you get the mealID
        removeMeal(mealID);
      });
    });

    // Restore meal
    window.restoreMeal = (mealID) => {
      fetch('../actions/CafeteriaManagementService/put/restoreMeal.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            mealID
          })
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

    window.deleteMeal = (mealID) => {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          fetch('../actions/CafeteriaManagementService/delete/deleteMeal.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                mealID
              })
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                Swal.fire('Deleted!', 'Your meal has been deleted.', 'success');
                fetchMeals(); // Refresh meals
              } else {
                Swal.fire('Error!', 'Failed to delete meal: ' + data.message, 'error');
              }
            })
            .catch(error => {
              Swal.fire('Error!', 'An error occurred: ' + error.message, 'error');
            });
        }
      });
    };


  });