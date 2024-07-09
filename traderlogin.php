<?php include 'header.php'; ?>
<br><br><br>
<main id="main">
    <section id="login" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3" style="background-color: white; padding: 15px;">
                    <h2>Sign in to your account</h2><br>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="forms/trader.php">
                        <div class="form-group">
                            <label for="username">Username/ Email address</label>
                            <input type="text" class="form-control" id="username" name="username" required><br>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required><br>
                            <center><a href="forget.php" style="color: orangered;">Forgot Your Password?</a></center>
                        </div>
                        <center><button type="submit" class="form-control" style="background-color: #014e84;color: white;">Login</button></center>
                    </form><br>
                    <label>Don't have an account?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="regclient.php" style="color: royalblue;">Sign Up</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
