<?include 'db_connect.php';?>
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
          <li><a class="nav-link scrollto" href="#about">About</a></li> <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
