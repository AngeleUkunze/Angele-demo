<?php include 'header.php';?>
<br><br><br>
<main id="main">
  <section id="login" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3" style="background-color: white; padding: 15px;">
          <h2>Sign in to your account</h2><br>
          <form method="post" action="">
            <div class="form-group">
              <label for="username">Username/ Email address</label>
              <input type="text" class="form-control" id="username" name="username" required><br>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required><br><center><a href="forget.php" style="color: orangered;">Forgot Your Password?</a></center>
            </div>
            <center><button type="submit" class="form-control" style="background-color: #014e84;color: white;">Login</button></center>
          </form><br>
          <label>Don't have an account?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="regclient.php" style="color: royalblue;">Sign Up</a>
        </div>
      </div>

    </div>
  </section>
</main>

<?php include 'footer.php';?>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    

    // Create connection
  $conn = new mysqli('localhost', 'root', '', 'agakaye');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the provided username and password match any records in the database
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        $_SESSION["submit"] = true;
        $_SESSION["username"] = $username;

        // Redirect to secure page
        header("Location: admin/forms/unpaidloan.php");
        exit;
    } else {
        // Authentication failed, set error message
        $error = "Invalid username or password!";
    }

    // Close connection
    $conn->close();
}
?>

