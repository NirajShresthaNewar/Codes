<?php
// Step 1: Connect to the database
require_once('../../../connection/config.php'); 

// Step 2: Retrieve user id through session
require_once('../../../connection/session.php'); 
$user_id =  $_SESSION['uid']; 

// Step 3: Fetch payment records for the user
$sql = "SELECT p.payment_id, p.bill_id, p.payment_date, p.paid_amount, p.payment_mode, b.total_amount, b.payment_status
        FROM payment_record p
        JOIN bill b ON p.bill_id = b.bill_id
        WHERE b.user_id = $user_id
        ORDER BY p.payment_date DESC"; // Assuming you want to display the latest payments first

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Payments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
<?php 
// Include header and sidebar
include "../userHeader.php";
include "../sidebar.php";
?>   
<?php

// Display payment records in a table
if ($result->num_rows > 0) {
    ?>

<div class="container">
        <div class="title">
            <h1>Bills</h1>
        </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Bill ID</th>
                <th>Payment Date</th>
                <th>Paid Amount</th>
                <th>Total Amount</th>
                <th>Payment Mode</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['payment_id'] ?></td>
                <td><?= $row['bill_id'] ?></td>
                <td><?= $row['payment_date'] ?></td>
                <td><?= $row['paid_amount'] ?></td>
                <td><?= $row['total_amount'] ?></td>
                <td><?= $row['payment_mode'] ?></td>
                <td><?= $row['payment_status'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
} else {
    echo "No payment records found for this user.";
}
?>
</body>
</html>
