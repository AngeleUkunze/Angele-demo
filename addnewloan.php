<?php
include 'headertrader.php';
include 'db_connect.php';

// Check if trader is logged in
if (!isset($_SESSION['username'])) {
    echo "You are not logged in!";
    exit();
}

// Fetch current trader's ID
$username = $_SESSION['username'];
$query = "SELECT id FROM trader WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $trader_id = $row['id'];
} else {
    echo "Error fetching trader information!";
    exit();
}

// Fetch trader's loan limit
$limit_query = "SELECT limit_amount FROM loan_limit WHERE trader_id = '$trader_id'";
$limit_result = mysqli_query($conn, $limit_query);
$limit_amount = 0;
if ($limit_result && mysqli_num_rows($limit_result) > 0) {
    $limit_row = mysqli_fetch_assoc($limit_result);
    $limit_amount = $limit_row['limit_amount'];
}

// Select clients who do not exceed the loan limit
$clients_query = "SELECT client.id,client.idno, client.name FROM client
                  LEFT JOIN loans ON client.id = loans.client_id
                  GROUP BY client.id
                  HAVING SUM(loans.amount_due) <= $limit_amount OR SUM(loans.amount_due) IS NULL";
$clients_result = mysqli_query($conn, $clients_query);

?>

<main id="main">
    <section id="add-loan" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2" style="background-color: white;padding: 15px;">
                    <h2>Add Loan</h2>
                    <form method="POST" action="forms/newloan.php" enctype="multipart/form-data" id="addLoanForm">
                        <div class="form-group">
                            <label for="clientName">Client Name:</label>
                            <select class="form-control" id="clientName" name="client_id" required>
                                <option value="">Select Client</option>
                                <?php
                                while ($client = mysqli_fetch_assoc($clients_result)) {
                                    echo "<option value='{$client['idno']}'>{$client['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['user_id']; ?>" id="traderID" name="trader_id" required>
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Name:</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="loanDate">Loan Date:</label>
                            <input type="date" class="form-control" id="loanDate" name="loan_date" required>
                        </div>
                        <script>
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementById('loanDate').setAttribute('min', today);
                        </script>
                        <div class="form-group">
                            <label for="amountDue">Amount Due:</label>
                            <input type="number" class="form-control" id="amountDue" name="amount_due" required>
                        </div>
                        <div class="form-group">
                            <label for="amountPaid">Amount Paid:</label>
                            <input type="number" class="form-control" id="amountPaid" name="amount_paid" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="background-color:orange; border-color: orange;">Save Loan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php';?>
