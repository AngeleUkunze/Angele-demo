<?php include 'headertrader.php'; ?>
<br><br><br>
<main id="main">
    <section id="registration" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3" style="background-color: #f9f9f9; border-radius: 10px; padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                    <h2 style="text-align: center; color: #333;">Trader Registration</h2><br>
                     <form method="POST" action="forms/addclient.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idno" style="color: #333;">ID (Identification Number):</label>
                                    <input type="text" class="form-control" id="tin" name="tin" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="color: #333;">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact" style="color: #333;">Contact:</label>
                                    <input type="text" class="form-control" id="contact" name="contact" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" style="color: #333;">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" style="color: #333;">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" style="color: #333;">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="province" style="color: #333;">Province:</label>
                                    <select name="province" id="province" class="form-control" required>
                                        <option value="">Select Province</option>
                                        <!-- Populate province options dynamically -->
                                        <?php
                                        $conn = new mysqli('localhost', 'root', '', 'agakaye') or die("Could not connect to mysql" . mysqli_error($conn));

                                        $provinces_result = $conn->query("SELECT * FROM province");
                                        if ($provinces_result->num_rows > 0) {
                                            while ($province = $provinces_result->fetch_assoc()) {
                                                echo "<option value='{$province['id']}'>{$province['name']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district" style="color: #333;">District:</label>
                                    <select name="district" id="district" class="form-control" required>
                                        <option value="" selected disabled>Select District</option>
                                        <!-- District options will be populated dynamically using JavaScript -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sector" style="color: #333;">Sector:</label>
                                    <select name="sector" id="sector" class="form-control" required>
                                        <option value="" selected disabled>Select Sector</option>
                                        <!-- Sector options will be populated dynamically using JavaScript -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" style="color: #333;">Status:</label>
                                     <select name="sector" id="sector" class="form-control" required>
                                        <option value="" selected disabled>Status</option>
                                        <option value="Active" >Active</option>
                                        <option value="Inactive" >Inactive</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <button type="submit" id="submitForm" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#province').change(function() {
        var provinceId = $(this).val();
        $.post('get_districts.php', {province_id: provinceId}, function(data) {
            $('#district').html(data);
            $('#sector').html('<option value="" selected disabled>Select Sector</option>').prop('disabled', true);
        });
    });

    $('#district').change(function() {
        var districtId = $(this).val();
        $.post('get_sectors.php', {district_id: districtId}, function(data) {
            $('#sector').html(data).prop('disabled', false);
        });
    });
});
</script>
