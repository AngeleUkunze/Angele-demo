<?php
session_start();
include 'headertrader.php';
include 'db_connect.php';

// Check if trader is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Check if form is submitted for updating the limit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['limit_amount'])) {
    $username = $_SESSION['username'];
    $query = "SELECT id FROM trader WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $trader_id = $row['id'];
        
        $limit_amount = $_POST['limit_amount'];

        // Check if trader already has a limit set
        $check_query = "SELECT * FROM loan_limit WHERE trader_id = '$trader_id'";
        $check_result = mysqli_query($conn, $check_query);

        if ($check_result && mysqli_num_rows($check_result) > 0) {
            // Update existing limit
            $update_query = "UPDATE loan_limit SET limit_amount = '$limit_amount' WHERE trader_id = '$trader_id'";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                $status = "success";
            } else {
                $status = "error";
            }
        } else {
            // Insert new limit
            $insert_query = "INSERT INTO loan_limit (trader_id, limit_amount) VALUES ('$trader_id', '$limit_amount')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                $status = "success";
            } else {
                $status = "error";
            }
        }
    } else {
        $status = "error";
    }

    // Redirect back to the page with status
    header("Location: trader_limits.php?status=$status");
    exit();
}

// Fetch loan limits for the logged-in trader
$username = $_SESSION['username'];
$query = "SELECT ll.id AS limit_id, ll.limit_amount
          FROM loan_limit ll
          INNER JOIN trader t ON ll.trader_id = t.id
          WHERE t.username = '$username'";
$result = mysqli_query($conn, $query);

// Initialize status
$status = isset($_GET['status']) ? $_GET['status'] : "";

// Initialize variables for editing
$edit_limit_id = "";
$edit_limit_amount = "";

// Check if an ID is provided for editing
if (isset($_GET['id'])) {
    $edit_limit_id = $_GET['id'];

    // Fetch the limit to be edited
    $edit_query = "SELECT * FROM loan_limit WHERE id = '$edit_limit_id'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $edit_row = mysqli_fetch_assoc($edit_result);
        $edit_limit_amount = $edit_row['limit_amount'];
    }
}

?>

<main id="main">
    <section id="loan-limit" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2" style="background-color: white;padding: 15px;">
                    <h2>Set Loan Limit</h2>
                    <form method="POST" action="trader_limits.php">
                        <div class="form-group">
                            <label for="limitAmount">Limit Amount:</label>
                            <input type="number" step="0.01" class="form-control" id="limitAmount" name="limit_amount" value="<?php echo $edit_limit_amount; ?>" required>
                        </div><br>
                        <input type="hidden" name="edit_limit_id" value="<?php echo $edit_limit_id; ?>">
                        <button type="submit" style="background-color:orange; border-color: orange;" class="btn btn-primary"><?php echo $edit_limit_id ? 'Update' : 'Set'; ?> Limit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2" style="background-color: white;padding: 15px; margin-top: 20px;">
                    <h2>Loan Limits</h2>
                    <?php if ($status == "success") : ?>
                        <div class="alert alert-success" role="alert">
                            Limit updated successfully!
                        </div>
                    <?php elseif ($status == "error") : ?>
                        <div class="alert alert-danger" role="alert">
                            Error updating limit. Please try again.
                        </div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Limit ID</th>
                                <th>Limit Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && mysqli_num_rows($result) > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['limit_id']; ?></td>
                                        <td><?php echo $row['limit_amount']; ?></td>
                                        <td>
                                            <a href="addnewloanlimit.php?id=<?php echo $row['limit_id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3">No loan limits set.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
