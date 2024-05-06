<?php
// Step 1: Connect to the database
require_once('../../../connection/config.php'); 

// Step 2: Retrieve userid through session
require_once('../../../connection/session.php'); 
$user_id =  $_SESSION['uid']; 

$sql = "SELECT b.bill_id, b.tariff_id, m.previous_reading_value,m.current_reading_date, m.current_reading_value, b.units, b.total_amount, b.payment_status
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <link rel="stylesheet" href="../../../assets/style.css"> <!-- Link to your external CSS file -->
        <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your external CSS file -->
</head>
<body>
    
<?php 
         include "../userHeader.php";
         include "../sidebar.php";
?>   
<?php
// Step 3: Display bills in a table
if ($result->num_rows > 0) {
    ?>


   

<div class="container">
        <div class="title">
            <h1>Bills</h1>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Bill ID</th>
                    <th>Previous Reading</th>
                    <th>Current Reading</th>
                    <th>Units</th>
                    <th>Rate</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <?php
                    // Calculate difference in days between current reading date and today's date
                    $current_reading_date = new DateTime($row['current_reading_date']);
                    $today = new DateTime(); // Current date
                    $diff = $today->diff($current_reading_date)->days;
                    
                    // Update tariff ID based on difference in days
                    if ($diff > 30 && $diff <= 60) {
                        $tariff_id = 2;
                    } elseif ($diff > 60 && $diff <= 90) {
                        $tariff_id = 3;
                    } elseif ($diff > 90) {
                        $tariff_id = 4;
                    } else {
                        $tariff_id = $row['tariff_id']; // Keep the existing tariff ID
                    }
                    
                    // Update tariff ID in the database
                    $update_tariff_sql = "UPDATE bill SET tariff_id = $tariff_id WHERE bill_id = " . $row['bill_id'];
                    $con->query($update_tariff_sql);
                    
                    // Fetch tariff rate based on updated tariff ID
                    $tariff_rate_sql = "SELECT additional_charge_rate FROM tariff WHERE tariff_id = $tariff_id";
                    $tariff_result = $con->query($tariff_rate_sql);
                    $tariff_row = $tariff_result->fetch_assoc();
                    $tariff_rate = $tariff_row['additional_charge_rate'];
                    
                    // Recalculate total amount based on updated tariff rate
                    $units = $row['units'];
                    $total_amount = $units * $tariff_rate ;
                    
                    // Update total amount in the database
                    $update_amount_sql = "UPDATE bill SET total_amount = $total_amount WHERE bill_id = " . $row['bill_id'];
                    $con->query($update_amount_sql);
                    ?>
                <tr>
                    <td><?= $row['bill_id'] ?></td>
                    <td><?= $row['previous_reading_value'] ?></td>
                    <td><?= $row['current_reading_value'] ?></td>
                    <td><?= $row['units'] ?></td>
                    <td><?= $tariff_rate ?></td>
                    <td><?= $total_amount ?></td> <!-- Display recalculated total amount -->
                    <td><?= $row['payment_status'] ?></td>
                    <td><a href='payment_api.php?bill_id=<?= $row['bill_id'] ?>'><button class="btn btn-success">Pay</button></a></td>
                </tr>
            
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "No bills found for this user.";
}
?>
 <script type="text/javascript" src="../assets/js/script.js"></script>


</body>
</html>
