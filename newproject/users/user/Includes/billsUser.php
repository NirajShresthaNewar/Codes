<?php
require_once('../../../connection/config.php');
require_once('../../../connection/session.php');

$user_id = $_SESSION['uid'];

$sql = "SELECT b.bill_id, b.tariff_id, m.previous_reading_value, m.current_reading_date, m.current_reading_value, b.units, b.total_amount, b.payment_status, b.due_date
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
                <th>Additional Charge(%)</th>
                <th>Charged Amount</th>
                <th>Due Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    // Fetching tariff details for the user's bill
                    $tariff_id = $row['tariff_id'];
                    $tariff_sql = "SELECT * FROM tariff WHERE tariff_id = $tariff_id";
                    $tariff_result = $con->query($tariff_sql);
                    $tariff_row = $tariff_result->fetch_assoc();
                    $unit_price = $tariff_row['unit_price'];
                    $base_fee = $tariff_row['base_fee'];
                    
                    // Calculating total amount for the bill
                    $units = $row['units'];
                    $total_amount = ($units * $unit_price) + $base_fee;

                    // Check if due date is exceeded
                    $due_date = $row['due_date'];
                    $current_date = date('Y-m-d');
                    $additional_charge = 0;
                    if ($due_date !== null && $current_date > $due_date) {
                        // Calculate number of days overdue
                        $days_overdue = (strtotime($current_date) - strtotime($due_date)) / (60 * 60 * 24);
                        // Fetch additional charge days and amount
                        $charge_sql = "SELECT * FROM additional_charge WHERE charge_days <= $days_overdue ORDER BY charge_days DESC LIMIT 1";
                        $charge_result = $con->query($charge_sql);
                        while ($charge_row = $charge_result->fetch_assoc()) {
                            $additional_charge_percent = $charge_row['charge_percent'];
                            $charge__id=$charge_row['charge_id'];
                        }
                    }
                    // Update total amount with additional charge
                    $additional_charge=($total_amount * $additional_charge_percent)/100;
                    $total_amount= $total_amount+ $additional_charge;
                     $bill_id = $row['bill_id'];
                    $update_sql = "UPDATE bill SET total_amount = total_amount + $additional_charge, charge_id =$charge__id WHERE bill_id = $bill_id";
                    $con->query($update_sql);

                    ?>
                    
                    <tr>
                        <td><?= $row['bill_id'] ?></td>
                        <td><?= $row['previous_reading_value'] ?></td>
                        <td><?= $row['current_reading_value'] ?></td>
                        <td><?= $row['units'] ?></td>
                        <td><?= $additional_charge_percent?  $additional_charge_percent : 'No Additional Charge' ?></td>
                        <td><?= $additional_charge ? 'Rs ' . $additional_charge : 'No Additional Charge' ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td><?= 'Rs ' .$total_amount ?></td>
                        <td><?= $row['payment_status'] ?></td>
                        <td><a href='pay.php?bill_id=<?= $row['bill_id'] ?>&total_amount=<?= $total_amount ?>'><button class="btn btn-success">Pay</button></a></td>
                    </tr>
                
                <?php }
            } else { ?>
                <tr>
                    <td colspan="10">No unpaid bills found for this user.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
