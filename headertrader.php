<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit();
}
?>

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

<body style="background-color: #eef0f8">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent" style="background-color: #014e84;">
    <div class="container d-flex align-items-center justify-content-between">
<a href="home.php" class="logo"><img src="assets/img/apple-touch-icon.png" alt="" class="img-fluid"></a>
      <h1 class="logo"><a href="home.php">AGAKAYE K'UMUCURUZI</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
     

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="profile.php">My Profile</a></li>
          <li class="dropdown"><a href="#"><span>Loans/Clients</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="clients.php">All Clients</a></li>
              <li class="dropdown"><a href="#"><span>Loan</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="trader_limits.php">Add New Loan Limit</a></li>
                  <li><a href="addnewloan.php">Add New Client Loan</a></li>
                  <li><a href="#">All Clients Allowed Loan</a></li>
                  <li><a href="#">All Clients denied Loan</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Payments</a></li>
      <li class="dropdown">
    <a href="#">
        <i class="bi bi-person-circle"></i> &nbsp;&nbsp;
        <span><?php echo $_SESSION['username']; ?></span>
       
        <i class="bi bi-chevron-down"></i>
    </a>
    <ul>
        <li><a href="updateprofile.php">Update Profile</a></li>
        <li><a href="changepass.php">Change Password</a></li>
        <li><a href="logout.php">Sign Out</a></li>
    </ul>
</li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">

