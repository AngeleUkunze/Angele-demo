<?php include 'headertrader.php';?><br><br><br>
<main id="main">
    <section id="search-client" class="section">
        <div class="container">
            <div class="row">
                <div id="results">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success float-right btn-sm mr-2" id="print_all_clients"><i class="fa fa-print"></i> Print All clients</button>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table-striped table-bordered col-md-12">
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
                                            $conn=mysqli_connect('localhost','root','','agakaye');
                                            if(isset($_POST['search'])) {
                                                $keyword = $_POST['keyword'];
                                                $search_query = "SELECT client.*, province.name AS province_name, district.name AS district_name, sector.name AS sector_name  
                                                                FROM client 
                                                                LEFT JOIN province ON client.province= province.id 
                                                                LEFT JOIN district ON client.district = district.id 
                                                                LEFT JOIN sector ON client.sector= sector.id 
                                                                WHERE client.name LIKE '%$keyword%' OR client.idno LIKE '%$keyword%' OR client.contact LIKE '%$keyword%' 
                                                                ORDER BY client.name ASC";
                                                $search_result = $conn->query($search_query);
                                                if ($search_result->num_rows > 0) {
                                                    $i = 1;
                                                    while ($row = $search_result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $i++ . "</td>";
                                                        echo "<td>" . $row['name'] . "</td>";
                                                        echo "<td>" . $row['idno'] . "</td>";
                                                        echo "<td>" . $row['contact'] . "</td>";
                                                        echo "<td>" . $row['email'] . "</td>";
                                                        
                                                        echo "<td>" . $row['province_name'] . "</td>";
                                                        echo "<td>" . $row['district_name'] . "</td>";
                                                        echo "<td>" . $row['sector_name'] . "</td>";
                                                        echo "<td>" . $row['status'] . "</td>";
                                                        echo "<td class='actions'>
                                                                <center>
                                                                    <div class='btn-group'>
                                                                        <button type='button' class='btn btn-primary'>Action</button>
                                                                    </div>
                                                                </center>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='11'>No matching clients found.</td></tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php';?>
