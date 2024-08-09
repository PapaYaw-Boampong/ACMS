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
    <link rel="icon" type="image/png" href="../img/fav.png" />
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
    <div class="osahan-profile">
      <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
          <a class="toggle togglew toggle-2" href="#"><span></span></a>
          <h4 class="fw-bold m-0 text-white">Profile</h4>
        </div>
      </div>

      <div class="container position-relative">
        <div class="py-5 osahan-profile row">
          <div class="col-md-4 mb-3">
            <div
              class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden" id="profile-nav"
            >
            </div>
        </div>
          <div class="container col-md-8 mb-3">
            <div class="rounded shadow-sm">
              <div
                class="osahan-cart-item-profile bg-white rounded shadow-sm p-4"
              >
                <div class="flex-column">
                  <h6 class="fw-bold">Tell us about your problems</h6>
                  <p class="text-muted">
                    Whether you have questions or you would just like to say
                    hello, contact us.
                  </p>
                  <form action="../actions/sendProblem.php" method="post">
                    <div class="form-group mb-3">
                      <label for="exampleFormControlInput1" class="small fw-bold pb-1">Your Name</label>
                      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Gurdeep Osahan" required />
                    </div>
                    <div class="form-group mb-3">
                      <label for="exampleFormControlInput2" class="small fw-bold pb-1">Email Address</label>
                      <input type="email" class="form-control" name="email" id="exampleFormControlInput2" placeholder="iamosahan@gmail.com" required />
                    </div>
                    <div class="form-group mb-3">
                      <label for="exampleFormControlInput3" class="small fw-bold pb-1">Phone Number</label>
                      <input type="number" class="form-control" name="phone" id="exampleFormControlInput3" placeholder="1-800-643-4500" required />
                    </div>
                    <div class="form-group mb-3">
                      <label for="exampleFormControlTextarea1" class="small fw-bold pb-1">HOW CAN WE HELP YOU?</label>
                      <textarea class="form-control" name="message" id="exampleFormControlTextarea1" placeholder="Hi there, I would like to ..." rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
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
        
    </div>

    <!-- Footer -->
    <special-footer></special-footer>
    
    <nav id="main-nav"></nav>
    
    </div>

      <!-- Pass session data to JavaScript -->
      <script>
          // Pass PHP session data to JavaScript
          var userName = <?php echo json_encode($_SESSION['username']); ?>;
          var userID =  <?php echo json_encode($userID); ?>;
          var cafID =  <?php echo json_encode($cafID); ?>;
      </script>


    <script
      data-cfasync="false"
      src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script
      
      src="../vendor/jquery/jquery.min.js"
    ></script>
    <script
      
      src="../vendor/bootstrap/js/bootstrap.bundle.min.js"
    ></script>

    <script
      
      src="../vendor/slick/slick/slick.min.js"
    ></script>

    <script
      
      src="../vendor/sidebar/hc-offcanvas-nav.js"
    ></script>

    <script
      
      src="../js/osahan.js"
    ></script>
 
    <script src="../js/headerFooterManager.js"></script>
  </body>
</html>
