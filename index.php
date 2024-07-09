<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>agakaye</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-color: #eef0f8; font-family: Helvetica;">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent" style="background-color: #014e84;">
    <div class="container d-flex align-items-center justify-content-between">
<a href="index.php" class="logo"><img src="assets/img/apple-touch-icon.png" alt="" class="img-fluid"></a>
      <h1 class="logo"><a href="index.php">AGAKAYE K'UMUCURUZI Web App</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
     

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li> 
           <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Register/Login</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="regclients.php">Register(only Clients)</a></li>
              <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="loginclient.php">As Client</a></li>
                  <li><a href="traderlogin.php">As Trader</a></li>
                  <li><a href="adminlogin.php">As Admin</a></li>
                </ul>
              </li>
            </ul>
          </li>
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Welcome to AGAKAYE K'UMUCURUZI</h1>
      <a href="#about" class="btn-get-started scrollto">More Info</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
         
          <div class="col-lg-12 pt-4 pt-lg-0">
            <h3>Overview</h3>
            <p>
             Rwanda is a country situated in Central Africa, bordered to the North by Uganda, to the East by Tanzania, to the South by Burundi and to the West by the Democratic Republic of Congo. Rwanda’s total area is Km2 26,338, with a population density estimated to be 445 people per km².
            </p>
            <div class="row">
              <div class="col-md-6">
               
                <p><b>Name</b> <br>
<b>Capital City</b><br>
<b>Currency</b>  <br>
<b>Time Zone</b> </p>
              </div> 
              <div class="col-md-6">
               
                <p>Republic of Rwanda<br>
  Kigali<br>
Rwandan Franc (FRW)<br>
UTC +2 (Central Africa Time)</p>
              </div>
             
              <div class="col-md-6">
                <h4>Our Service</h4>
                <p>We provide credit to all our customers, the recipient has an ID and is already buying from us</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

   
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>SN 120 AVE, Nyanza Busasamana</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>tuyizereolivier102@gmail.com<br>agakayekumucurizi@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+250 784 228 471<br>+250 789 633 606</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <br>
              <div class="text-center"><button type="submit" style="border-radius: 0%;">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<center>
  <footer id="footer"  style="background-color: #014e84;">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start" style="color: white;margin-left: 20%;">
        <div class="copyright" >
          &copy; Copyright 2024&nbsp;&nbsp;<strong><span >Agakaye K'umucuruzi</span></strong>. All Rights Reserved<br><center><b>Designed by TUYIZERE Olivier</b></center>
        </div>
          
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer></center>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>