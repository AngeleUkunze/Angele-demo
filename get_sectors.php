
 
<?php
// Assuming you have established a database connection already
$conn = new mysqli('localhost', 'root', '', 'agakaye') or die("Could not connect to mysql" . mysqli_error($conn));
if(isset($_POST['district_id'])) {
    $districtId = $_POST['district_id'];
    
    // Query sectors based on the selected district ID
    $sectors_query = $conn->query("SELECT * FROM sector WHERE district_id = $districtId");
    
    // Generate HTML options for sectors
    $options = "<option value='' selected disabled>Select Sector</option>";
    while ($sector = $sectors_query->fetch_assoc()) {
        $options .= "<option value='{$sector['id']}'>{$sector['name']}</option>";
    }
    
    echo $options;
}
?>
