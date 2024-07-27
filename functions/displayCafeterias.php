

<div class="bg-white">
    <div class="container">
        <div class="py-3 title d-flex align-items-center">
            <h5 class="m-0">Cafeterias</h5>
        </div>
        <div class="offer-slider">
            <div class="cat-item px-1 py-3">
                <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="../img/pro1.jpg" class="img-fluid rounded" />
                </a>
            </div>
            <div class="cat-item px-1 py-3">
                <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="../img/pro2.jpg" class="img-fluid rounded" />
                </a>
            </div>
            <div class="cat-item px-1 py-3">
                <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="../img/pro3.jpg" class="img-fluid rounded" />
                </a>
            </div>
            <div class="cat-item px-1 py-3">
                <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="../img/pro4.jpg" class="img-fluid rounded" />
                </a>
            </div>
            <div class="cat-item px-1 py-3">
                <a class="d-block text-center shadow-sm" href="trending.html">
                    <img alt="#" src="../img/pro2.jpg" class="img-fluid rounded" />
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="pt-4 pb-2 title d-flex align-items-center">
        <h5 class="m-0">Trending this week</h5>
        <a class="fw-bold ms-auto" href="trending.html">View all <i class="feather-chevrons-right"></i></a>
    </div>

    <div class="trending-slider">
        <?php
        // Retrieve cafeteria data
        $results = getCafeterias($conn);

        foreach ($results as $result) {
            echo '
            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
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
                            <h6 class="mb-1">
                                <a href="restaurant.html" class="text-black">
                                    ' . htmlspecialchars($result["cafeteriaName"]) . '
                                </a>
                            </h6>
                            <p class="text-gray mb-3">Description: ' . htmlspecialchars($result["description"]) . '</p>
                            <p class="text-gray mb-3 time">
                                <span class="bg-light text-dark rounded-sm py-1 px-2">
                                    <i class="feather-clock"></i> 15–30 min
                                </span>
                                <span class="float-end text-black-50">$350 FOR TWO</span>
                            </p>
                        </div>
                        <div class="list-card-badge">
                            <span class="badge text-bg-danger">OFFER</span>
                            <small>Use Coupon OSAHAN50</small>
                        </div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>
