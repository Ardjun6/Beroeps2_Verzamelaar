<?php
session_start();
// Assuming you've already connected to the database using $conn

// Get today's date
$today = date("Y-m-d");

// Check if there's an entry for today
$sql = "SELECT * FROM visit_counter WHERE visit_date = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If there's an entry for today, increment the count
    $sql = "UPDATE visit_counter SET visit_count = visit_count + 1 WHERE visit_date = '$today'";
} else {
    // Otherwise, create a new entry for today
    $sql = "INSERT INTO visit_counter (visit_date, visit_count) VALUES ('$today', 1)";
}

$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Photo Enthusiasts</title>
  <link rel="icon" type="image/x-icon" href="./images/logo1.png">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/photo-enthusiasts.css" />
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container d-flex justify-content-start">
      <a class="navbar-brand mr-auto" href="#">
        <img src="./images/logo.png" alt="Photo Enthusiasts Logo" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Features.php">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Pricing.php">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Community.php">Community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact</a>
          </li>
        </ul>
      </div>
      <?php
      if (isset($_SESSION['user_email'])) {
        echo '<a href="logout.php" class="btn btn-primary ml-2">' . $_SESSION['user_email'] . '</a>';
      } else {
        echo '<a href="login.php" class="btn btn-primary ml-2">Login</a>';
      }
      ?>

    </div>
    </div>
  </nav>



  <!-- Hero Section -->
  <section class="hero text-center d-flex justify-content-center align-items-center">
    <div class="overlay">
      <h1>The largest community of photo enthusiasts</h1>
      <a href="login.php" class="btn btn-primary mt-4">Join Today</a>
    </div>
  </section>

  <!-- Section 2 -->
  <section class="photo-sharing py-5">
    <div class="container">
      <h2 class="text-center mb-5">
        Snap photos and share like never before
      </h2>
      <div class="row">
        <!-- Left-Up -->
        <div class="col-lg-6 mb-4">
          <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h3>Exclusive Admin Gallery</h3>
            <p>
              Our platform offers an exclusive gallery curated by our admin. Dive into a world of breathtaking images
              that are not just pictures, but stories waiting to be told about sports, nature and cars.
            </p>
          </div>
        </div>
        <!-- Right-Up -->
        <div class="col-lg-6 mb-4">
          <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h3>Monetize Your Passion</h3>
            <p>
              As an admin, you have the unique opportunity to monetize your passion. Showcase your best shots and offer
              them for sale to our community of photography enthusiasts.
            </p>
          </div>
        </div>
        <!-- Left-Down -->
        <div class="col-lg-6 mb-4">
          <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h3>Community Engagement</h3>
            <p>
              Engage with a community that shares your passion.
            </p>
          </div>
        </div>
        <!-- Right-Down -->
        <div class="col-lg-6 mb-4">
          <div class="content-box h-100 d-flex flex-column justify-content-center align-items-center text-center">
            <h3>Secure</h3>
            <p>
              Our website is save and so is all your log in info.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 3 -->
  <section class="photo-text py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h3>Discover the Nature World</h3>
          <p>
            Explore diverse landscapes, cultures, and moments captured by photographers from different corners of the
            world. Every photo is a journey in itself.
          </p>
          <a href="nature.php" class="btn btn-primary mt-3">Explore Nature</a>
        </div>
        <div class="col-lg-6">
          <img src="images/nature-pic1.jpg" alt="Nature" class="img-fluid rounded" />
        </div>
      </div>
    </div>
  </section>

  <!-- Section 4 -->
  <section class="text-photo py-5 bg-light-gray">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <img src="images/cars-pic1.jpg" alt="Cars" class="img-fluid rounded" />
        </div>
        <div class="col-lg-6">
          <h3>Behind the Lens</h3>
          <p>
            Delve deeper into the stories behind each photo. Understand the perspective of the photographer and the
            emotions that the image encapsulates.
          </p>
          <a href="cars.php" class="btn btn-primary mt-3">Explore Cars</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 5 -->
  <section class="photo-text py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h3>Sporting Moments</h3>
          <p>
            Relive the adrenaline and passion of sports through our lens. From breathtaking goals to nail-biting
            finishes, experience the thrill of sports like never before. Our platform offers a unique perspective into
            the world of sports, capturing the raw emotion, dedication, and spirit of athletes and fans alike.
          </p>
          <a href="sports.php" class="btn btn-primary mt-3">Explore Sports</a>
        </div>
        <div class="col-lg-6">
          <img src="images/sports-pic1.jpg" alt="Sports" class="img-fluid rounded" />
        </div>
      </div>
    </div>
  </section>



  <!-- Section 6 -->
  <section class="join-us py-4">
    <div class="container">
      <div class="row align-items-center">
        <!-- Ad Message on the Left -->
        <div class="col-lg-8">
          <h4>Join Our Community!</h4>
          <p>
            Discover the benefits of joining our photography community.
            Exclusive events, workshops, and more!
          </p>
        </div>
        <!-- Buttons on the Right -->
        <div class="col-lg-4 text-lg-right">
          <a href="login.php" class="btn btn-primary mr-2">Join Today</a>
          <a href="contact.html" class="btn btn-outline-secondary">Contact Us</a>
        </div>
      </div>
    </div>
  </section>




  <!-- Footer -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>Join our vibrant community of photographers. learn and be inspired. Dive into a world of stunning images
            and be part of the journey.</p>
        </div>
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Contact</h5><br>
          <a style="color: white;" href="contact.php">Contact <> This is a link</a><br>
          Ardjundebitewarie@gmail.com<br>
          <address>
            Den Haag, Moerwijk<br>
            <p title="Phone">P: +31 (06) 14542308</p>
          </address>
        </div>
      </div>
      <hr>
      <div class="row align-items-center">
        <div class="col-md-6">
          <ul class="list-inline text-center text-md-left">
            <li class="list-inline-item"><a href="#">Terms of Service</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-6 text-center text-md-right">
          <a href="https://github.com/Ardjun6?tab=repositories" class="social-icon"><i class="fab fa-github"></i></a>
          <a href="https://instagram.com/ardjundebi?igshid=MjEwN2IyYWYwYw==" class="social-icon"><i
              class="fab fa-instagram"></i></a>
          <a href="#No_Twitter" class="social-icon"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
          <p>&copy; 2023 Ardjun Debi - Tewarie. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>




  <!-- Scripts -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="./javascript/photo-enthusiasts.js"></script>

</body>

</html>