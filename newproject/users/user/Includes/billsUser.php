<?php
// Step 1: Connect to the database
require_once('../../../connection/config.php'); 

// Step 2: Retrieve userid through session
require_once('../../../connection/session.php'); 
$user_id =  $_SESSION['uid']; 

$sql = "SELECT b.bill_id, m.previous_reading_value, m.current_reading_value, b.units, b.dues, b.total_amount, b.payment_status
        FROM bill b
        JOIN meter_reading m ON b.reading_id = m.reading_id
        WHERE b.user_id = $user_id
        AND b.payment_status = 'unpaid'";

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bills</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->
</head>
<body>

<?php
// Step 3: Display bills in a table
if ($result->num_rows > 0) {
    ?>
    <table>
        <thead>
            <tr>
                <th>Bill ID</th>
                <th>Previous Reading</th>
                <th>Current Reading</th>
                <th>Units</th>
                <th>Dues</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['bill_id'] ?></td>
                    <td><?= $row['previous_reading_value'] ?></td>
                    <td><?= $row['current_reading_value'] ?></td>
                    <td><?= $row['units'] ?></td>
                    <td><?= $row['dues'] ?></td>
                    <td><?= $row['total_amount'] ?></td>
                    <td><?= $row['payment_status'] ?></td>
                    <td><a href='payment_api.php?bill_id=<?= $row['bill_id'] ?>'><button>Pay</button></a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No bills found for this user.";
}
?>
</body>
</html>
