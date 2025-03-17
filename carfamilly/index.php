<?php
include 'search.php';
include "Include/Connection.php";
session_start();
if (!isset($_SESSION['email'])) {
    // header("Location: ../studentLogin.php"); // Redirect to login if not logged in
    // exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carfamily.lk</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <link rel="stylesheet" href="assets/css/homepage.css">

    <!--We use  This links for Icons -->

    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons.min.css">
    <script src="https://app.embed.im/snow.js" defer></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
    <!--We use  This links for function the Menu button in responsive mode -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--We use This link  for sign in icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  
</style>
</head>
<body>


    &emsp;
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><h1><u><i>Carfamily.lk</i></u></h1></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mx-2">
                <a class="nav-link" href="#home">Home</a>
            </li>&emsp;&emsp;
            <li class="nav-item mx-2">
                <a class="nav-link" href="#Get-Started">Get Started</a>
            </li>&emsp;&emsp;
            <li class="nav-item mx-2">
                <a class="nav-link" href="#aboutus">About Us</a>
            </li>&emsp;&emsp;
            <li class="nav-item mx-2">
                <a class="nav-link" href="#blog">Blog</a>
            </li>&emsp;&emsp;
           
            </li>&emsp;&emsp;
            <li class="nav-item mx-2">
                <a class="nav-link" href="#car-makers">
                    <i class="fas fa-car"></i> Go to Parts
                </a>
            </li>&emsp;&emsp;

            <?php if (isset($_SESSION['email'])): ?>


                <li class="nav-item mx-2">
                <a class="nav-link" href="Booking/index.php">Booking a Meeting</a>
                <li class="nav-item mx-2">
                    <span class="navbar-text" style="color:yellow;   font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-weight: bold;">
                        Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>
                    </span>
                </li>&emsp;&emsp;
                <li class="nav-item mx-2">
                    <a class="nav-link" href="logout.php" onclick="return confirm('You want to logout?');">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="customerLogin.php">
                        <i class="fas fa-user"></i> Sign In
                    </a>
                    
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>&emsp;

    <div class="hero-section">
      <img src="assets/images/test.jpg" alt="hero image" class="hero-section-image">
      <h3 class="text-center" style="padding:2px;">Your Convenient, Best <span class="hero-span">&</span> <br> Trusted Car Services Platform</h3>
      <section class="section banner" id="home" >
      <div class="container" >
          <div class="banner-content">
              <h2 class="h1 banner-title">Find Parts For Your Vehicle</h2>
              <!-- <p class="banner-text"><b>Over hundreds of brands and tens of thousands of parts</b></p> -->
          </div>

          <div class="form-wrapper" >
              <form action="" class="banner-form">
                  <div class="input-wrapper">
                      <label for="brandSearch" class="input-label">Make</label>
                      <input type="text" name="Enter Car Maker" id="brandSearch" class="input-field" placeholder="Enter Car Maker Here" oninput="searchBrand()">
                      <div id="brandResult"></div>
                  </div>

                  <div class="input-wrapper">
                      <label for="modelSearch" class="input-label">Model</label>
                      <input type="text" name="model" id="modelSearch" class="input-field" placeholder="Enter Car Model Here" oninput="searchModel()">
                      <div id="modelResult"></div>
                  </div>

                  <div class="input-wrapper">
                      <label for="partSearch" class="input-label">Part</label>
                      <input type="text" name="Part" id="partSearch" class="input-field" placeholder="Enter Car Part Here" oninput="searchPart()">
                      <div id="partResult"></div>
                  </div>

                  <div class="input-wrapper">
                      <label for="finalSearchBtn" class="input-label">Search</label>
                      <button type="button" id="finalSearchBtn" class="input-field">Search</button>
                  </div>
              </form>

              <div id="finalResult"></div>
          </div>
      </div>
    </section>

    <section class="decor__section">
      <div class="decor__body">
        <div class="feature">
          <div class="feature__item">
            <i class="icon free-shipping"></i>
            <h3>Free Shipping</h3>
            <p>For orders from $50</p>
          </div>
          <div class="feature__item">
            <i class="icon support"></i>
            <h3>Support 24/7</h3>
            <p>Call us anytime</p>
          </div>
          <div class="feature__item">
            <i class="icon safety"></i>
            <h3>100% Safety</h3>
            <p>Only secure payments</p>
          </div>
          <div class="feature__item">
            <i class="icon hot-offers"></i>
            <h3>Hot Offers</h3>
            <p>Discounts up to 90%</p>
          </div>
        </div>
      </div>
    </section>
    
    
</div>
     


<section class="section featured-car" id="car-makers" >
    <div class="container" >
    
      <div class="title-wrapper"> 
        <h2 class="h2 section-title">Select Brand</h2>


      </div>

      <ul class="featured-car-list">

        <li>
          <div class="featured-car-card">

            <figure class="card-banner">
              <img src="./assets/images/T111.jpg" alt="toyota-logo" loading="lazy" width="300" height="500"
                class="w-100">
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="Brands/Toyota.php">Toyota</a>
                </h3>
                <div>  <a href="toyota.html"><button class="btn">   Details</button></a></div>
             
              
               
              </div>



            </div>

          </div>
        </li>

        <li>
          <div class="featured-car-card">

            <figure class="card-banner">
              <img src="./assets/images/honda.jpg" alt="honda-logo" loading="lazy" width="440" height="200"
                class="w-100">
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="Brands/Honda.php">Honda</a>
                </h3>
                <div> <a href="honda.html"> <button class="btn">Details</button></a></div>
             
               
              </div>



            </div>

          </div>
        </li>

        <li>
          <div class="featured-car-card">

            <figure class="card-banner">
              <img src="./assets/images/nissanlg.jpg" alt="nissan-logo" loading="lazy" width="440"
                height="300" class="w-100">
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="Brands/Nissan.php">Nissan</a>
                </h3>
                <div> <a href="nissan.html"> <button class="btn">Details</button></a></div>
             
                

              </div>



            </div>

          </div>
        </li>

        <li>
          <div class="featured-car-card">

            <figure class="card-banner">
              <img src="./assets/images/bmbrand.jpg" alt="bmw-logo" loading="lazy" width="440"
                height="300" class="w-100">
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="Brands/BMW.php">BMW</a>
                </h3>
              <div> <a href="bmw.html">  <button class="btn">Details</button></a></div>
             
             
              
              </div>

            </div>

          </div>
        </li>

        <li>
          <div class="featured-car-card">

            <figure class="card-banner">
              <img src="./assets/images/Audi.jpg" alt="Audi-logo" loading="lazy" width="440"
                height="300" class="w-100">
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="Brands/Audi.php">Audi</a>
                </h3>
                <div> <a href="audi.html"> <button class="btn">Details</button></a></div>
             
               
                
              </div>



            </div>

          </div>
        </li>

        <li>
          <div class="featured-car-card">

            <figure class="card-banner">
              <img src="./assets/images/amg.jpg" alt="Benz-logo" loading="lazy" width="440" height="700"
                class="w-100"   >
                
            </figure>

            <div class="card-content">

              <div class="card-title-wrapper">
                <h3 class="h3 card-title">
                  <a href="Brands/Mercedes.php">Mercedes Benz</a>
                </h3>
                <div><a href="benz.html">  <button class="btn">Details</button></a></div>
             

              </div>



            </div>

          </div>
        </li>

      </ul>

    </div>
  </section>

  <section class="Get-Started" id="Get-Started" style="background-color: #f0f1f6; padding: 50px 0;">
    <div class="container">
        <h2 class="h2 section-title">Get Started with Simple Steps</h2>
        <ul class="featured-car-list2">

            <li class="card-item">
                <div class="featured-car-card">
                    <div class="icon-container">
                        <ion-icon name="person-add-outline" class="card-icon"></ion-icon>
                    </div>
                    <h4 class="card-title">Create a Profile</h4>
                    <p class="card-text">
                        Create an account to manage your orders easily.
                    </p>
                    <a href="customerLogin.php" class="card-link">Get Started</a>
                </div>
            </li>

            <li class="card-item">
                <div class="featured-car-card">
                    <div class="icon-container">
                        <ion-icon name="options-outline" class="card-icon"></ion-icon>
                    </div>
                    <h4 class="card-title">Select Your Part</h4>
                    <p class="card-text">
                        Browse through our catalog and select the part you need.
                    </p>
                </div>
            </li>

            <li class="card-item">
                <div class="featured-car-card">
                    <div class="icon-container">
                        <ion-icon name="cart-outline" class="card-icon"></ion-icon>
                    </div>
                    <h4 class="card-title">Purchase</h4>
                    <p class="card-text">
                        Choose your payment method and complete the purchase with ease.
                    </p>
                </div>
            </li>

        </ul>
    </div>
</section>


<section class="section aboutus" id="aboutus">
  <div class="container">
    <!-- <h2 class="h2 section-title hidden">About Us</h2> -->
    <div class="aboutus-car-card hidden">
      <h3 class="card-title hidden">Hello! Welcome to Car Family . . .</h3>
      <p class="styled-paragraph hidden" >
        Today we understand that busy professionals often struggle to find the time to maintain and repair their cars. That’s why we’ve created a convenient, reliable, and customer-focused platform designed specifically to meet your car service needs. Whether it’s routine maintenance, emergency repairs, or spare parts replacement, we’ve got you covered.
      </p>
      <p class="styled-paragraph hidden">
        Our team of experienced car consultants is always available to provide you with expert advice, help you book a repair service, or offer emergency support whenever you need it. We currently specialize in servicing major car models and provide replacement for commonly used parts such as brakes, batteries, and filters.
      </p>
      <p class="styled-paragraph hidden">
        As we continue to grow, we are committed to expanding our services to include a wider range of car models and spare parts, so you can always count on us, no matter what car you drive. At carfamily.lk, we combine technology and expertise to deliver exceptional car care solutions, making your life easier and your vehicle safer.
      </p>
      <p class="styled-paragraph hidden">
        Explore our services today and experience the difference of a platform built for you!
      </p>
      <a href="#" class="social-link hidden">
        <ion-icon name="mail-outline"></ion-icon>
      </a>
      <p class="link hidden">Gmail: carfamily@gmail.com</p>
    </div>
  </div>
</section>

<section class="section blog" id="blog">
  <div class="container">
    <h2 class="h2 section-title">Our Blog</h2>
    <p class="section-subtitle">Explore expert insights, tips, and the latest trends in the automotive world.</p>

    <div class="row">
      <!-- Blog Card -->
      <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="card blog-card flex-fill">
          <figure class="card-banner">
            <a href="#">
              <img src="./assets/images/b1.jpg" alt="Car Maintenance Tips" loading="lazy" class="card-img-top">
            </a>
          </figure>
          <div class="card-body">
            <h4 class="card-title">Car Maintenance Tips</h4>
            <h6 class="card-subtitle">Maintenance Checklists for Car Models</h6>
            <p class="card-text">
              Discover essential maintenance checklists tailored for different car models to keep your vehicle in top shape.
            </p>
            <a href="vehicle/CarMaintains.php" class="btn read-more-btn">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="card blog-card flex-fill">
          <figure class="card-banner">
            <a href="#">
              <img src="./assets/images/b2.jpg" alt="How-To Guides" loading="lazy" class="card-img-top">
            </a>
          </figure>
          <div class="card-body">
            <h4 class="card-title">How-To Guides</h4>
            <h6 class="card-subtitle">Step-by-Step Replacements</h6>
            <p class="card-text">
              Learn how to replace common car parts with step-by-step guidance to keep your car running smoothly.
            </p>
            <a href="vehicle/HowToGuides.php" class="btn read-more-btn">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="card blog-card flex-fill">
          <figure class="card-banner">
            <a href="#">
              <img src="./assets/images/b3.jpg" alt="Product Reviews" loading="lazy" class="card-img-top">
            </a>
          </figure>
          <div class="card-body">
            <h4 class="card-title">Product Reviews</h4>
            <h6 class="card-subtitle">In-Depth Analysis</h6>
            <p class="card-text">
              Explore in-depth reviews of popular car parts and accessories to help you make informed decisions.
            </p>
            <a href="vehicle/product.php" class="btn read-more-btn">Read More</a>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="card blog-card flex-fill">
          <figure class="card-banner">
            <a href="#">
              <img src="./assets/images/ke.jpg" alt="Industry News and Trends" loading="lazy" class="card-img-top">
            </a>
          </figure>
          <div class="card-body">
            <h4 class="card-title">Industry News and Trends</h4>
            <h6 class="card-subtitle">Stay Updated</h6>
            <p class="card-text">
              Discover the latest advancements and trends in car technology, including EVs, autonomous driving, and more.
            </p>
            <a href="vehicle/New.php" class="btn read-more-btn">Read More</a>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="card blog-card flex-fill">
          <figure class="card-banner">
            <a href="#">
              <img src="./assets/images/b4.jpg" alt="Safety Tips" loading="lazy" class="card-img-top">
            </a>
          </figure>
          <div class="card-body">
            <h4 class="card-title">Safety Tips</h4>
            <h6 class="card-subtitle">Drive with Confidence</h6>
            <p class="card-text">
              Learn about the importance of using quality parts for your vehicle to ensure safety and reliability on the road.
            </p>
            <a href="vehicle/SafetyTips.php" class="btn read-more-btn">Read More</a>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="card blog-card flex-fill">
          <figure class="card-banner">
            <a href="#">
              <img src="./assets/images/b5.jpg" alt="Special Events" loading="lazy" class="card-img-top">
            </a>
          </figure>
          <div class="card-body">
            <h4 class="card-title">Special Events</h4>
            <h6 class="card-subtitle">Mark Your Calendars</h6>
            <p class="card-text">
              Get a sneak peek at the highlights of upcoming car shows and automotive events happening near you.
            </p>
            <a href="vehicle/SpecialEvent.php" class="btn read-more-btn">Read More</a>
          </div>
        </div>
      </div>
      
        </div>
    </div>
</section>


<footer id="footer-custom" class="footer-custom bg-dark text-light py-5">
  <div class="container">
    <!-- Footer Top Section -->
    <div class="row">
      <!-- Navigation Links -->
      <div class="col-md-4 mb-4">
        <h5 class="footer-custom-title">Quick Links</h5>
        <ul class="footer-custom-links list-unstyled">
          <li><a href="#home" class="footer-custom-link">Home</a></li>
          <li><a href="#Get-Started" class="footer-custom-link">Get Started</a></li>
          <li><a href="#aboutus" class="footer-custom-link">About Us</a></li>
          <li><a href="#blog" class="footer-custom-link">Blog</a></li>
          <li><a href="Booking/index.php" class="footer-custom-link">Book a Meeting</a></li>
          <li><a href="#car-makers" class="footer-custom-link"> Go to Parts</a></li>
          <li><a href="customerLogin.php" class="footer-custom-link">Sign In</a></li>
        </ul>
      </div>

      <!-- Contact Information -->
      <div class="col-md-4 mb-4 text-center">
        <h5 class="footer-custom-title">Contact Us</h5>
        <p class="footer-custom-contact"><i class="fas fa-phone-alt"></i> +94 123 456 7890</p>
        <p class="footer-custom-contact"><i class="fas fa-envelope"></i> support@carfamily.lk</p>
        <p class="footer-custom-contact"><i class="fas fa-map-marker-alt"></i> 123, Main Street, Colombo</p>
      </div>

      <!-- Social Media Links -->
      <div class="col-md-4 mb-4 text-center">
        <h5 class="footer-custom-title">Follow Us</h5>
        <div class="footer-custom-socials">
          <a href="#" class="footer-custom-social"><ion-icon name="logo-facebook"></ion-icon></a>
          <a href="#" class="footer-custom-social"><ion-icon name="logo-linkedin"></ion-icon></a>
          <a href="#" class="footer-custom-social"><ion-icon name="logo-instagram"></ion-icon></a>
          <a href="#" class="footer-custom-social"><ion-icon name="logo-twitter"></ion-icon></a>
        </div>
      </div>
    </div>

    <!-- Footer Bottom Section -->
    <hr class="footer-custom-divider">
    <div class="text-center">
      <p class="footer-custom-copy">&copy; 2024 <a href="#" class="footer-custom-link-highlight">carfamily.lk</a>. All Rights Reserved.</p>
    </div>
  </div>
</footer>



<div id="back-to-top" class="back-to-top">
  <i class="fas fa-arrow-up"></i>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


const hiddenElements = document.querySelectorAll('.hidden');
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    } else {
      entry.target.classList.remove('visible');
    }
  });
});

hiddenElements.forEach((el) => observer.observe(el));

// Back-to-Top Functionality
const backToTopButton = document.getElementById('back-to-top');

window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    backToTopButton.classList.add('show');
  } else {
    backToTopButton.classList.remove('show');
  }
});

backToTopButton.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});




    function searchBrand() {
        var brand = $('#brandSearch').val();
        if (brand) {
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: { brandSearch: brand, type: 'brand' },
                success: function(data) {
                    $('#brandResult').html(data).show();
                    $('#modelSearch').val('');
                    $('#modelResult').html('').hide();
                    $('#partSearch').val('');
                    $('#partResult').html('').hide();
                }
            });
        } else {
            $('#brandResult').hide();
        }
    }

    function searchModel() {
        var model = $('#modelSearch').val();
        var brand = $('#brandSearch').val();
        if (model) {
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: { modelSearch: model, brandSearch: brand, type: 'model' },
                success: function(data) {
                    $('#modelResult').html(data).show();
                    $('#partSearch').val('');
                    $('#partResult').html('').hide();
                }
            });
        } else {
            $('#modelResult').hide();
        }
    }

    function searchPart() {
        var part = $('#partSearch').val();
        var brand = $('#brandSearch').val();
        var model = $('#modelSearch').val();
        if (part) {
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: { partSearch: part, brandSearch: brand, modelSearch: model, type: 'part' },
                success: function(data) {
                    $('#partResult').html(data).show();
                }
            });
        } else {
            $('#partResult').hide();
        }
    }

    $('#finalSearchBtn').click(function() {
        var brand = $('#brandSearch').val();
        var model = $('#modelSearch').val();
        var part = $('#partSearch').val();

        // Redirect to view_products.php with query parameters
        window.location.href = `cartnew/project/view_products.php`;
    });

    $(document).on('click', '.result-item', function() {
        var inputId = $(this).data('input');
        var itemText = $(this).text();
        $('#' + inputId).val(itemText);
        $('.result-item').parent().hide(); // Hide the dropdown after selection
    });
</script>

</body>
</html>
