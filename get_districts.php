
<?php
// Assuming you have established a database connection already
 $conn = new mysqli('localhost', 'root', '', 'agakaye') or die("Could not connect to mysql" . mysqli_error($conn));
if(isset($_POST['province_id'])) {
    $provinceId = $_POST['province_id'];
    
    // Query districts based on the selected province ID
    $districts_query = $conn->query("SELECT * FROM district WHERE province_id = $provinceId");
    
    // Generate HTML options for districts
    $options = "<option value='' selected disabled>Select District</option>";
    while ($district = $districts_query->fetch_assoc()) {
        $options .= "<option value='{$district['id']}'>{$district['name']}</option>";
    }
    
    echo $options;
}
?>
