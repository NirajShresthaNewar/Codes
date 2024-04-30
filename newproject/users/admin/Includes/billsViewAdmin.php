<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills</title>
    <link rel="stylesheet" href="../../../assets/style.css"> <!-- Link to your external CSS file -->
</head>
<body>

<h2>Bills</h2>

<!-- Filter Form -->
<form method="GET" id="filterForm">
    <label for="user_filter">Filter by User ID or Email:</label>
    <input type="text" id="user_filter" name="user_filter" value="<?php echo isset($_GET['user_filter']) ? $_GET['user_filter'] : ''; ?>">
    <button type="submit">Filter</button>
    <button type="button" onclick="resetFilter()">Reset</button>
</form>




<?php
// Step 1: Connect to the database
require_once('../../../connection/config.php');

// Step 2: Retrieve bills from the database based on filter, if provided
$filter = isset($_GET['user_filter']) ? $_GET['user_filter'] : '';
$sql = "SELECT b.bill_id, b.user_id,b.units,b.dues,b.total_amount, b.payment_status, u.email,
               r.previous_reading_value, r.previous_reading_date,
               r.current_reading_value, r.current_reading_date
        FROM bill b
        INNER JOIN user u ON b.user_id = u.user_id
        LEFT JOIN meter_reading r ON b.reading_id = r.reading_id";

if (!empty($filter)) {
    // Add filter condition to SQL query
    $sql .= " WHERE b.user_id = '$filter' OR u.email = '$filter'";

    // Modify based on your filter criteria
}

$result = $con->query($sql);

// Step 3: Display bills in a table
if ($result->num_rows > 0) {
    ?>
    <table>
        <thead>
            <tr>
            <th>Bill ID</th>
            <th>Email</th>
                <th>Previous Reading</th>
                <th>Current Reading</th>
                <th>Units</th>
                <th>Dues</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Operations</th>

            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['bill_id'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['previous_reading_value'] ?></td>
                    <td><?= $row['current_reading_value'] ?></td>
                    <td><?= $row['units'] ?></td>
                    <td><?= $row['dues'] ?></td>
                    <td><?= $row['total_amount'] ?></td>
                    <td><?= $row['payment_status'] ?></td>
                    <td>
            <!-- Update button redirect to update page -->
            <form action="update_bill.php" method="post" style="display: inline;">
                <input type="hidden" name="bill_id" value="<?= $row['bill_id'] ?>">
                <button type="submit">Update</button>
            </form>
            <!-- Delete button to delete page -->
            <form action="delete_bill.php" method="post" style="display: inline;">
                <input type="hidden" name="bill_id" value="<?= $row['bill_id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php
} else {
    echo '<script>';
    echo 'alert("User id does not exist!");';
    echo 'window.location.href="billsViewAdmin.php";';
    echo '</script>';

   
}

// Close the database connection
$con->close();
?>
<script>
    function resetFilter() {
        // Reset the filter input field
        document.getElementById('user_filter').value = '';
        
        // Submit the form to reset the filter
        document.getElementById('filterForm').submit();
        // Check if table has rows, if not, alert and redirect to old form
    }
    
</script>


</body>
</html>
