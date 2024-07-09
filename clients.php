<?php include 'headertrader.php';?><br><br><br>
  <main id="main">
    <section id="search-client" class="section">
      <div class="container">
        <div class="row">
         <div id="results">
            <div id="inserts" style="display: none;">
          <div class="col-md-6 offset-md-3" style="background-color: #f9f9f9; border-radius: 10px; padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                    <h2 style="text-align: center; color: #333;">Trader Registration</h2><br>
                     <form method="POST" action="forms/addclient.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tin" style="color: #333;">TIN (Tax Identification Number):</label>
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
    <br>
    <div class="row">   
 <div class="input-group col-md-8 float-right">
                <form method="POST" action="sclients.php">
                    <input type="text" class="form-control" id="search_form" name="keyword" placeholder="Search...">
                    <div class="input-group-append">
                       <button class="btn btn-primary float-right btn-sm" name="search" id="search_clients"><i class="fa fa-search"></i> Search Clients</button>

                    </div></form>
                </div>
        <div class="card col-lg-12">
            <button class="btn btn-success float-right btn-sm mr-2" id="print_all_clients"><i class="fa fa-print"></i> Print All clients</button>
            <div class="card-body">
                <table class="table-striped table-bordered col-md-12">
            <button class="btn btn-primary float-right btn-sm" id="new_client"><i class="fa fa-plus"></i> New client</button>
        </div>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                             <th class="text-center">ID Number</th>
                            <th class="text-center">Contact</th>
                            <th class="text-center">Email</th>
                            
                            <th class="text-center">Province</th>
                            <th class="text-center">District</th>
                            <th class="text-center">Sector</th>
                            <th class="text-center">Status</th>
                            <th class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'db_connect.php';
                            //$traders = $conn->query("SELECT * FROM trader ORDER BY name ASC");
  $traders_query  = "SELECT client.*, province.name AS province_name, district.name AS district_name, sector.name AS sector_name  FROM client LEFT JOIN province ON client.province= province.id LEFT JOIN district ON client.district = district.id LEFT JOIN sector ON client.sector= sector.id ORDER BY client.name ASC";
                            $i = 1;

$traders = $conn->query($traders_query);
// Check for errors
if (!$traders) {
    // Display the SQL error if the query fails
    echo "SQL Error: " . $conn->error;
} else {
    // Check if there are any traders
    if ($traders->num_rows > 0) {
        // Loop through each trader
        while ($row = $traders->fetch_assoc()) {
                         ?>
                         <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['idno'] ?>
                            </td>
                            <td>
                                <?php echo $row['contact'] ?>
                            </td>
                            <td>
                                <?php echo $row['email'] ?>
                            </td>
                            
                            <td>
                                <?php echo $row['province_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['district_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['sector_name'] ?>
                            </td>
                           
                            <td>
                                <?php echo $row['status'] ?>
                            </td>
                            <td class="actions">
                                <center>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        
                                        
                                    </div>
                                </center>
                            </td>
                         </tr>
                        <?php   }
    } else {
        echo "No Clients found.";
    }
}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


        </div>
        </div>
      </div>
      
    </section>
  </main>

<?php include 'footer.php';?>
<style>
#results {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f8f8f8;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left: 2%;
}

#results p {
    margin: 0;
    padding-bottom: 10px;
}

#results strong {
    font-weight: bold;
}
#results table {
        width: 100%;
        border-collapse: collapse;
    }

    #results th, #results td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    #results th {
        background-color: #f2f2f2;
    }

    #results tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #results tr:hover {
        background-color: #ddd;
    }
</style>
<script>
    $(document).ready(function(){
        $('#search_clients').click(function(){
            var keyword = prompt("Enter keyword to search clients:");
            if(keyword != null && keyword != "") {
                $('#search_keyword').val(keyword);
                $('#search_form').submit();
            }
        });
    });

    $(document).ready(function(){
    $('#print_all_clients').click(function(){
        // Hide unnecessary elements (like buttons)
        $('button').hide();
        // Clone the card element to retain its content
        var $printContent = $('.card').clone();
        // Remove unnecessary elements from the cloned content
        $printContent.find('button').remove();
        $printContent.find('td.actions').remove();$printContent.find('th.actions').remove();
        // Modify CSS of the table to add border and maintain table format
        $printContent.find('table').css({
            'border-collapse': 'collapse',
            'width': '100%',
            'border': '1px solid #000'
        });
        $printContent.find('th, td').css({
            'border': '1px solid #000',
            'padding': '8px'
        });
        // Open a new window and append the cloned content
        var $printWindow = window.open('', '_blank');
        $printWindow.document.open();
        $printWindow.document.write('<html><head><title>Print clients</title></head><body>');
        $printWindow.document.write($printContent.html());
        $printWindow.document.write('</body></html>');
        $printWindow.document.close();
        // Print the new window content
        $printWindow.print();
        // Show hidden buttons
        $('button').show();
    });
});
</script>
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

    // Show the "inserts" div when the "Add New Client" button is clicked
    $(document).ready(function() {
        $('#new_client').click(function() {
            $('#inserts').show();
        });
    });

</script>
