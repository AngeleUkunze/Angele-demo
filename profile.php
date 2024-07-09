<?php include 'headertrader.php'; ?>
<br><br><br>
<main id="main">
    <section id="registration" class="section">
        <div class="container">
            <div class="row">
                <?php 
                $conn=mysqli_connect('localhost','root','','agakaye');
                $meta = array();
                $trader_id = $_SESSION['user_id'];
  $trader_query  = "SELECT trader.*, province.name AS province_name, district.name AS district_name, sector.name AS sector_name  FROM trader LEFT JOIN province ON trader.province= province.id LEFT JOIN district ON trader.district = district.id LEFT JOIN sector ON trader.sector= sector.id WHERE trader.id = $trader_id ORDER BY trader.name ASC ";
$trader_result = mysqli_query($conn, $trader_query);
   if ($trader_result) {
    $trader_row = mysqli_fetch_assoc($trader_result);
    // Store trader details in the $meta array
    foreach ($trader_row as $k => $v) {
        $meta[$k] = $v;
    }
} 
?>
 <div class="col-md-6 offset-md-3"  style="background-color: white; padding: 15px"><center><h1>Profile</h1></center>
    <form action="forms/update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="form-group row">
            <div class="col">
                <label for="tin">TIN</label>
                <input type="text" name="tin" id="tin" class="form-control" value="<?php echo isset($meta['tin']) ? $meta['tin']: '' ?>" required>
            </div>
            <div class="col">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
            </div>
            <div class="col">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact" class="form-control" value="<?php echo isset($meta['contact']) ? $meta['contact']: '' ?>" required>
            </div>
        </div>
        <div class="form-group row">
            
            <div class="col">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required>
            </div>
             <div class="col">
            <label for="province">Province:<br><?php echo isset($meta['province_name']) ? $meta['province_name']: '' ?></label>
            
        </div>
        <div class="col">
            <label for="district">District:<br><?php echo isset($meta['district_name']) ? $meta['district_name']: '' ?></label>
           
        </div>
        </div>
        <div class="form-group row">
           
        
        </div> 
        <div class="form-group row">
          <div class="col">
            <label for="district">Sector:<br><?php echo isset($meta['sector_name']) ? $meta['sector_name']: '' ?></label>
           
        </div>
        <div class="col">
            <label for="status">Status: <?php echo isset($meta['status']) ? $meta['status']: '' ?></label>
           
        </div> 
        
        </div>
        <!-- Rest of your form fields -->
        <div class="form-group">
            <!-- Add the rest of your form fields here -->
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
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